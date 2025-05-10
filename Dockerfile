# Stage 1: Composer и PHP зависимости
FROM php:8.2-fpm AS build

# Установим зависимости и инструменты
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev zip \
    libzip-dev npm nodejs

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Установка Node.js и NPM (если нужно)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

WORKDIR /var/www

# Копируем файлы приложения
COPY . .

# Очистка кэша Composer перед установкой зависимостей
RUN composer clear-cache

# Устанавливаем зависимости PHP
RUN composer install --prefer-dist --no-dev --optimize-autoloader --no-interaction -vvv

# Установка зависимостей Node.js и сборка фронтенда
RUN npm install && npm run build

# Кэш Laravel
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Установим права на каталоги Laravel
RUN chown -R www-data:www-data /var/www /var/www/storage /var/www/bootstrap/cache /var/www/vendor

# Stage 2: Финальный контейнер
FROM php:8.2-fpm

# Копируем файлы из предыдущего этапа
COPY --from=build /var/www /var/www

# Устанавливаем права на каталоги, где Laravel будет писать
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/vendor

WORKDIR /var/www

# Открытие порта 8000 для сервера Laravel
EXPOSE 8000

# Выполнение миграций и запуск сервера
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
