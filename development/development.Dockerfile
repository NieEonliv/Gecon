FROM php:8.1.16-fpm

RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    libmcrypt-dev \
    libicu-dev \
    libpq-dev \
    unzip \
    bash \
 && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
    docker-php-ext-configure intl && \
    docker-php-ext-install \
    pdo \
    pdo_pgsql \
    pgsql \
    gettext \
    zip \
    mbstring \
    bcmath \
    intl \
    exif \
 && rm -rf /tmp/pear \
 && mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

COPY php.ini "$PHP_INI_DIR/conf.d/php.ini"

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get purge

ARG UNAME=gecon
ARG UID=1000
ARG GID=1000
RUN groupadd -g $GID -o $UNAME && useradd -m -u $UID -g $GID -o -s /bin/bash $UNAME
USER $UNAME
