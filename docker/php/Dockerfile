FROM php:8-fpm

# Install dependencies
RUN apt-get -qqy update && apt-get install -qqy \
    libzip-dev \
    zip

# Install composer
COPY ./docker/php/scripts/install-composer.sh /install-composer.sh
RUN chmod +x /install-composer.sh
RUN /install-composer.sh
