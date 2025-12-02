# Imagen base con PHP 8.2 y Composer
FROM php:8.2-cli

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install zip pdo pdo_mysql pdo_pgsql

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Configurar directorio de trabajo
WORKDIR /app
COPY . .

# Instalar dependencias Laravel
RUN composer install --no-dev --prefer-dist

# Exponer puerto para Laravel
EXPOSE 8000

# Comando para arrancar Laravel
CMD php artisan serve --host 0.0.0.0 --port 8000
