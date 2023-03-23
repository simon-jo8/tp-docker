FROM richarvey/nginx-php-fpm:latest

COPY ./ /var/www/html

RUN composer install
RUN php bin/console doctrine:database:create
RUN php bin/console make:migration
RUN php bin/console doctrine:migrations:migrate
RUN php bin/console doctrine:fixtures:load --no-interaction


ENV WEBROOT /var/www/html/public
ENV APP_ENV prod

EXPOSE 80