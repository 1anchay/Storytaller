# Используем многоэтапную сборку для уменьшения размера образа
FROM php:8.2-fpm AS builder

# 1. Установка системных зависимостей
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl

# 2. Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Рабочая директория и копирование файлов
WORKDIR /var/www
COPY . .

# 4. Установка зависимостей и сборка
RUN composer install --no-dev --optimize-autoloader --no-interaction \
    && npm install --force \
    && npm run build \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# 5. Финальный образ
FROM php:8.2-fpm

# Копируем только нужные файлы из builder
COPY --from=builder /var/www /var/www

# Настройка прав
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

WORKDIR /var/www

# Порт и команда запуска
EXPOSE ${PORT:-8000}
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=${PORT:-8000}"]