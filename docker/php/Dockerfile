FROM php:7.4-fpm

# Set working directory
WORKDIR /var/www/gothic

# Copy files
COPY . /var/www/gothic

# Install required libs before extensions
RUN apt-get update && apt-get install -y \
    nano \
    sendmail \
    libzip-dev \
    zip

# Install extensions
RUN docker-php-ext-install pdo_mysql bcmath zip

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