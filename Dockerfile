FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo_mysql
# Enable Apache rewrite module
RUN a2enmod rewrite
# Set the document root to Laravel's public directory
#ENV APACHE_DOCUMENT_ROOT /var/www/html/public
COPY . /var/www/html
WORKDIR /var/www/html