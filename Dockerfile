# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Set the working directory in the container to /var/www/html
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Copy the Laravel application files into the container
COPY . /var/www/html

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel dependencies using Composer
RUN composer install

# Expose port 80 for the Apache web server
EXPOSE 80

# Define the command to run when the container starts
CMD ["apache2-foreground"]
