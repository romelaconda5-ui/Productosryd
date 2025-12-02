# Usar PHP 8.2 con Apache
FROM php:8.2-apache

# Instalar dependencias necesarias y extensiones
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    libpq-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif xml zip \
    && a2enmod rewrite

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar todos los archivos del proyecto
COPY . .

# Ajustar permisos
RUN chown -R www-data:www-data storage bootstrap/cache

# Instalar dependencias de PHP sin ejecutar scripts de post-autoload
RUN composer install --no-dev --prefer-dist --no-scripts --no-interaction

# Exponer puerto 80
EXPOSE 80

# Comando por defecto para arrancar Apache
CMD ["apache2-foreground"]
