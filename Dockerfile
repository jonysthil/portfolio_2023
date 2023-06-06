# Imagen a descargar
FROM php:8.1-apache

RUN apt-get update && apt-get upgrade -y

RUN apt-get install -y git
RUN apt-get install -y vim
RUN apt-get install -y libmcrypt-dev
RUN apt-get install -y openssl
RUN apt-get install -y libzip-dev
RUN apt-get install -y libpng-dev

#RUN docker-php-ext-install mcrypt
#RUN docker-php-ext-install mbstring
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-enable mysqli
RUN docker-php-ext-install zip

RUN apt-get update && \
    apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libwebp-dev && \
    docker-php-ext-configure gd --with-freetype=/usr --with-jpeg=/usr --with-webp &&  \
    docker-php-ext-install gd \
    && docker-php-ext-enable \
    gd

# Instalamos composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Asignamos permisos al directorio www
RUN chown -R www-data:www-data /var/www
RUN chmod 755 /var/www

WORKDIR /var/www/html/

RUN a2enmod rewrite