FROM php:8.2-fpm

COPY composer.* /var/www/kanbaboard/

WORKDIR /var/www/kanbaboard

RUN apt-get update && apt-get install -y \
unzip \
git \
curl \
libzip-dev \
zip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . .

COPY --chown=www:www . .

USER www 

EXPOSE 9000

CMD [ "php-fpm" ]