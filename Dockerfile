# Usar PHP 8.2 con Apache
FROM php:8.2-apache

# Instalar herramientas y extensiones necesarias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpq-dev \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libicu-dev \
    libexif-dev \
    && docker-php-ext-install \
       pdo \
       pdo_mysql \
       pdo_pgsql \
       zip \
       exif \
       intl \
       mbstring \
       bcmath \
       gd \
       opcache

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Copiar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar todo el proyecto
COPY . .

# Establecer permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Instalar dependencias de Laravel
RUN composer install --no-dev --prefer-dist --ignore-platform-reqs

# Generar APP_KEY
RUN php artisan key:generate

# Exponer puerto de Apache
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"]
