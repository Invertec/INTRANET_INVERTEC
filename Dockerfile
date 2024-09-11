FROM php:8.0.25-cli

RUN apt-get update -y && apt-get install -y libmcrypt-dev && apt-get install git -y && apt-get install libzip-dev -y

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mysqli pdo_mysql zip

WORKDIR /app
COPY . /app

RUN composer install
RUN php artisan storage:link

EXPOSE 80
CMD php artisan serve --host=0.0.0.0 --port=80