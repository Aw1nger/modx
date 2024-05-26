FROM php:7.4-apache

# Установка необходимых инструментов и расширений PHP
RUN apt-get update && apt-get install -y unzip wget \
    && docker-php-ext-install pdo pdo_mysql mysqli

# Копирование MODX из официального релиза
RUN wget https://modx.com/download/direct/modx-2.8.6-pl.zip -O modx.zip \
    && unzip modx.zip -d /var/www/html/ \
    && rm modx.zip \
    && mv /var/www/html/modx-2.8.6-pl/* /var/www/html/ \
    && rm -r /var/www/html/modx-2.8.6-pl

# Настройка прав доступа
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Настройка конфигурации Apache
COPY apache-modx.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

EXPOSE 80
