FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip

COPY --from=composer/composer:latest-bin /composer /usr/bin/composer
COPY apache-vhost.conf /etc/apache2/sites-available/000-default.conf

RUN pecl install redis && docker-php-ext-enable redis
RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite 
# a2enmod for friendly url