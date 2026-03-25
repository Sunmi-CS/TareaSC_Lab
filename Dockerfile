FROM php:8.2-cli

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    unzip git curl libzip-dev zip nodejs npm \
    && docker-php-ext-install zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# 🔥 Instalar y compilar frontend (CLAVE)
RUN npm install
RUN npm run build

# Crear base de datos sqlite
RUN touch database/database.sqlite

# Permisos
RUN chmod -R 777 storage bootstrap/cache database

EXPOSE 10000

CMD php artisan migrate --force && \
    php artisan config:clear && \
    php artisan cache:clear && \
    php artisan serve --host=0.0.0.0 --port=10000