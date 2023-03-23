FROM richarvey/nginx-php-fpm:latest

COPY ./ /var/www/html

RUN composer install
RUN php bin/console doctrine:databse:create
RUN php bin/console doctrine:migrations:migrate


ENV WEBROOT /var/www/html/public
ENV APP_ENV prod