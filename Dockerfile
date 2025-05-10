# Stage 1: Composer и PHP зависимости
FROM php:8.2-fpm AS build

# Установим зависимости и инструменты
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev zip \
    libzip-dev npm nodejs sqlite3

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Установка Node.js и NPM
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

WORKDIR /var/www

# Копируем файлы проекта
COPY . .

# Очистка кэша Composer
RUN composer clear-cache

# Установка зависимостей
RUN composer install --prefer-dist --no-dev --optimize-autoloader --no-interaction

# Сборка фронтенда
RUN npm install && npm run build

# Кэш Laravel
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Установим права
RUN chown -R www-data:www-data /var/www

# Stage 2: Финальный контейнер
FROM php:8.2-fpm

# Установка SQLite (важно!)
RUN apt-get update && apt-get install -y sqlite3

# Копируем приложение
COPY --from=build /var/www /var/www

WORKDIR /var/www

# Создаём базу, если её нет (чтобы избежать 500)
RUN mkdir -p database && touch database/database.sqlite

# Устанавливаем правильные права
RUN chown -R www-data:www-data storage bootstrap/cache database && \
    chmod -R 775 storage bootstrap/cache database

# Laravel порт
EXPOSE 8000

# CMD: Миграция и запуск сервера
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
