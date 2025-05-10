FROM php:8.2-fpm

# Установка системных зависимостей
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libsqlite3-dev \
    zip \
    unzip \
    nodejs \
    npm

# Создаем не-root пользователя
RUN useradd -G www-data,root -d /var/www appuser
RUN mkdir -p /var/www/.composer && \
    chown -R appuser:www-data /var/www/.composer

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Рабочая директория
WORKDIR /var/www

# Копируем файлы
COPY . .

# Меняем владельца файлов
RUN chown -R appuser:www-data /var/www

# Переключаемся на не-root пользователя
USER appuser

# Установка PHP зависимостей
RUN composer install --prefer-dist --no-dev --optimize-autoloader --no-interaction

# Установка JS зависимостей и сборка фронта
RUN npm install && npm run build

# Возвращаемся к root для запуска php-fpm
USER root

# Настройка прав
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]