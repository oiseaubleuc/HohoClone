FROM php:8.3-fpm

# Installeer benodigde extensies
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip \
    && docker-php-ext-install pdo pdo_mysql zip

# Installeer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Stel de werkdirectory in
WORKDIR /var/www/html

# Kopieer alleen de bestanden die nodig zijn voor composer-install
COPY composer.json composer.lock ./

# Kopieer alle bestanden naar de container
COPY . .

# Installeer afhankelijkheden
RUN composer install --no-dev --optimize-autoloader


# Zorg voor juiste permissies
RUN chmod -R 777 storage bootstrap/cache

# Exposeer poort 8000
EXPOSE 8000

# Start Laravel server
CMD php artisan serve --host=0.0.0.0 --port=8000
