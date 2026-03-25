FROM php:8.2-cli

# Instalar dependencias del sistema + Node
RUN apt-get update && apt-get install -y \
    unzip git curl libzip-dev zip nodejs npm \
    && docker-php-ext-install zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Carpeta de trabajo
WORKDIR /app

# Copiar proyecto
COPY . .

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# 🔥 Instalar y compilar frontend (Vite)
RUN npm install
RUN npm run build

# 🔥 Crear base de datos SQLite
RUN mkdir -p database
RUN touch database/database.sqlite

# 🔥 Permisos (CRÍTICO para sesiones y cache)
RUN chmod -R 777 storage
RUN chmod -R 777 bootstrap/cache
RUN chmod -R 777 database

# Exponer puerto
EXPOSE 10000

# 🔥 Comando de arranque (orden correcto)
CMD php artisan config:clear && \
    php artisan cache:clear && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=10000