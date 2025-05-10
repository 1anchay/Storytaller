# -----------------------
# Stage 1: Сборка проекта
# -----------------------
FROM php:8.2-fpm AS build

# Установка системных зависимостей
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev zip \
    libzip-dev npm nodejs sqlite3 gnupg

# Установка Node.js LTS 18
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Установка рабочей директории
WORKDIR /var/www

# Копируем все файлы проекта
COPY . .

# Создание SQLite-базы перед установкой Laravel
RUN mkdir -p database && touch database/database.sqlite

# Установка зависимостей PHP
RUN composer install --prefer-dist --no-dev --optimize-autoloader --no-interaction

# Установка зависимостей JS + сборка фронта (vite)
RUN npm install && npm run build

# Кэш Laravel
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Установка прав
RUN chown -R www-data:www-data /var/www

# -------------------------
# Stage 2: Финальный образ
# -------------------------
FROM php:8.2-fpm

# Установка SQLite
RUN apt-get update && apt-get install -y sqlite3

# Рабочая директория
WORKDIR /var/www

# Копируем собранный проект
COPY --from=build /var/www /var/www

# Создание БД если нет (на всякий случай)
RUN mkdir -p database && touch database/database.sqlite

# Установка прав на записи
RUN chown -R www-data:www-data storage bootstrap/cache database && \
    chmod -R 775 storage bootstrap/cache database

# Laravel порт
EXPOSE 8000

# Запуск миграций и сервера
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
