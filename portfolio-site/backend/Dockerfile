FROM php:8.3-fpm
WORKDIR /var/www
COPY src/ src/
RUN docker-php-ext-install pdo pdo_mysql
CMD ["php-fpm"]
