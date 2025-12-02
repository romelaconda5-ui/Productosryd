# Usar PHP 8.2 con Apache
FROM php:8.2-apache

# Instalar extensiones necesarias y herramientas
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_mysql zip

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Copiar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar proyecto al contenedor
COPY . /var/www/html/

# Establecer permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Instalar dependencias de Laravel
RUN composer install --no-dev --prefer-dist

# Generar key
RUN php artisan key:generate
#RUN php artisan migrate --force  # Descomentar solo si la DB está lista

# Exponer el puerto
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"]
