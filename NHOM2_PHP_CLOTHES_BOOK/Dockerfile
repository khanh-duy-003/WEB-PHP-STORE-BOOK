FROM php:8.2-apache

# Cài thư viện cần thiết
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    git

# Cài composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Copy đúng thư mục chứa code
COPY . /var/www/html/

# Bật rewrite
RUN a2enmod rewrite

# Cài dependency (QUAN TRỌNG)
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Set quyền
RUN chown -R www-data:www-data /var/www/html
