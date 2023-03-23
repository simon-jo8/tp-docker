FROM php:apache

RUN apt-get update && apt-get install -y \
    git \
    libicu-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install \
    intl \
    pdo_mysql \
    zip \
    && a2enmod rewrite

WORKDIR /var/www/html

COPY . .

RUN composer install --no-interaction --no-dev --optimize-autoloader

RUN chown -R www-data:www-data var

CMD ["apache2-foreground"]