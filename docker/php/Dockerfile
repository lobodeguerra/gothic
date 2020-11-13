FROM php:7.4-fpm

# Set working directory
WORKDIR /var/www/gothic

# Copy files
COPY . .

# Install required libs before extensions
RUN apt-get update && apt-get install -y \
    nano \
    sendmail \
    libzip-dev \
    zip

# Install extensions
RUN docker-php-ext-install pdo_mysql bcmath zip

# Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

# Add gothic user
RUN groupadd gothic
RUN useradd -ms /bin/bash -g gothic gothic

# Set directory permissions
RUN chown -R gothic:gothic /var/www/gothic

# Change current user to www
USER gothic

# Expose port 9000
EXPOSE 9000

# Run php-fpm
CMD ["php-fpm"]