# Use PHP 8.3-FPM
FROM php:8.3-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# COPY ./config/php/php.ini /usr/local/etc/php/php.ini # Uncomment if not using yml file

# Set working directory
WORKDIR /src/public

# Expose port 9000 for PHP-FPM
EXPOSE 9000
