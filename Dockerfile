# Gebruik een officiële PHP-image
FROM php:8.2-fpm

# Installeer afhankelijkheden
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    sqlite3

# Installeer extensies
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring zip

# Installeer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Stel werkmap in
WORKDIR /var/www/html

# Kopieer alle bestanden
COPY . .

# Geef schrijfpermissies aan storage en bootstrap/cache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 777 storage bootstrap/cache

# Stel PHP in
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
