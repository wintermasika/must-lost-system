FROM php:8.2-apache

# Install required PostgreSQL libraries
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pgsql pdo pdo_pgsql

# Enable Apache mod_rewrite (optional, but useful for friendly URLs)
RUN a2enmod rewrite

# Copy your app code into the container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html
