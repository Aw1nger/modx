FROM php:7.4-apache

# Установка необходимых инструментов и расширений PHP
RUN apt-get update && apt-get install -y libpng-dev zlib1g-dev libzip-dev  \
    && docker-php-ext-install pdo pdo_mysql mysqli gd zip

WORKDIR /var/www/html

RUN chown -R www-data:www-data . \
    && chmod -R 755 .

# Настройка конфигурации Apache
COPY apache-modx.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

EXPOSE 80
