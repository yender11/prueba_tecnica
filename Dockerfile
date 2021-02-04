FROM php:7.2-apache

RUN apt-get update && apt-get install -y

RUN a2enmod rewrite

RUN chmod 777 -R -c /var/www
