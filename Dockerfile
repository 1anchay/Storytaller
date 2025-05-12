FROM php:8.2-fpm AS builder

# 1. Установка системных зависимостей
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev libzip-dev zip unzip \
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo pdo_mysql zip

# 2. Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Рабочая директория и копирование файлов
WORKDIR /var/www
COPY . .

# 4. Установка зависимостей с обработкой ошибок
RUN composer clear-cache && \
    composer install --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs || \
    { echo "Composer install failed, retrying..." && composer install --no-dev --optimize-autoloader --no-interaction; }

# 5. Установка Node.js зависимостей
RUN npm install --legacy-peer-deps --force && \
    npm run build

# 6. Кэширование Laravel
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# 7. Финальный образ
FROM php:8.2-fpm
COPY --from=builder /var/www /var/www
RUN chown -R www-data:www-data /var/www && \
    chmod -R 775 storage bootstrap/cache
WORKDIR /var/www
EXPOSE ${PORT:-8000}
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=${PORT:-8000}"]