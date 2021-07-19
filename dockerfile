FROM php:7.4-apache
RUN apt update
RUN apt install libpng-dev -y
RUN apt autoremove -y
RUN rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install gd

COPY src /var/www