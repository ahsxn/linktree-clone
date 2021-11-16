FROM php:8.0.2-fpm

RUN docker-php-ext-install pdo pdo_mysql