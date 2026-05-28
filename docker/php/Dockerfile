FROM php:8.5-apache

COPY --from=composer:2.9.8 /usr/bin/composer /usr/bin/composer
RUN apt-get update && apt-get install -y unzip libzip-dev zip chromium-driver
RUN docker-php-ext-install zip
COPY docker/php/news.conf /etc/apache2/sites-available/news.conf
RUN a2ensite news.conf
RUN a2dissite 000-default.conf

WORKDIR /var/www/html
COPY html/composer.json .

RUN composer install -d /var/www/html --optimize-autoloader