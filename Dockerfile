FROM php:8.1-apache

# Change the Apache DocumentRoot Directive
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

#Install PDO for using Databases with PDO
RUN docker-php-ext-install pdo pdo_mysql

CMD ["apache2-foreground"]