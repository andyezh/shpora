FROM php:7.3-fpm

ARG TZ

RUN echo ${TZ} > /etc/timezone
RUN dpkg-reconfigure -f noninteractive tzdata

RUN apt-get update -yqq && apt-get install -yqq \
    apt-utils \
    git \
    curl \
    nano \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip

# Install bcmath extension
RUN docker-php-ext-install bcmath

# Install ctype extension
RUN docker-php-ext-install ctype

# Install json extention
RUN docker-php-ext-install json

# Install mbstring extention
RUN docker-php-ext-install mbstring

# Install pdo_mysql extention
RUN docker-php-ext-install pdo_mysql

# Install tokenizer extention
RUN docker-php-ext-install tokenizer

# Install xml extention
RUN docker-php-ext-install xml

# Install xdebug extention
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Install opcache extention
RUN docker-php-ext-install opcache

# Install redis extention
RUN pecl install -o -f redis && docker-php-ext-enable redis

# Install zip extention
RUN docker-php-ext-configure zip --with-libzip && docker-php-ext-install zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www
