# Use the official PHP 8.2 Apache image
FROM php:8.2-apache

# Install dependencies
RUN apt-get update && \
    apt-get install -y libpq-dev libpng-dev libjpeg-dev libfreetype6-dev && \
    docker-php-ext-configure gd --with-jpeg --with-freetype && \
    docker-php-ext-install pdo pdo_mysql gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www/html

# Copy the Laravel application files to the container
COPY . .

RUN chmod -R 777 /var/www/html/storage

# Generate .env file
RUN cp .env.example .env

# Install dependencies using Composer
RUN composer install

# Set up Laravel application key
RUN php artisan key:generate

# Expose port 80
EXPOSE 80
