FROM php:8.2-fpm AS base

COPY composer.* /var/www/html/

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
unzip \
git \
curl \
libzip-dev \
zip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

FROM base AS dev

COPY /composer.json composer.json
COPY /composer.lock composer.lock
COPY /app app
COPY /bootstrap bootstrap
COPY /config config
COPY /routes routes
COPY /artisan artisan

FROM base AS build-fpm

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer


COPY . /var/www/html


FROM build-fpm AS fpm

# COPY --from=build-fpm /var/www/html /var/www/html