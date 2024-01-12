FROM php:8.2-apache

COPY /resources/ops/docker/fpm/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY /resources/ops/docker/fpm/start-apache.sh /usr/local/bin
RUN a2enmod rewrite

COPY index.php /var/www/
RUN chown -R www-data:www-data /var/www

CMD ["start-apache.sh"]
