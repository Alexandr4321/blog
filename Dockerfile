FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libzip-dev unzip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN if [ -f composer.json ]; then composer install --no-dev --optimize-autoloader --no-interaction || true; fi

RUN mkdir -p var/smarty/compile var/smarty/cache var/smarty/configs \
    && chown -R www-data:www-data var public || true

EXPOSE 9000
CMD ["php-fpm"]
