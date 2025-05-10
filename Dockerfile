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

COPY . .

# Установка зависимостей
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Кэш Laravel
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Stage 2: Финальный контейнер
FROM php:8.2-fpm

COPY --from=build /var/www /var/www

WORKDIR /var/www

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
