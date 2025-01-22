FROM php:8.3-fpm

# Installeer benodigde extensies
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip \
    && docker-php-ext-install pdo pdo_mysql zip

# Installeer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Stel de werkdirectory in
WORKDIR /var/www/html

# Kopieer het project
COPY . .

# Installeer afhankelijkheden
RUN composer install
RUN chmod -R 777 storage bootstrap/cache

# Start Laravel server
CMD php artisan serve --host=0.0.0.0 --port=8000
