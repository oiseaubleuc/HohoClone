FROM php:8.2-fpm


# Installeer afhankelijkheden
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Installeer Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Stel de werkmap in
WORKDIR /var/www

# Kopieer het project
COPY . .

# Installeer PHP-afhankelijkheden
RUN composer install --prefer-dist --no-dev --no-interaction

# Zorg dat opslag toegankelijk is
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Start Laravel server
CMD php artisan serve --host=0.0.0.0 --port=8000
