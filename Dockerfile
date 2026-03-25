FROM php:8.2-apache

# Copy source code vào container
COPY . /var/www/html/

# Bật mod rewrite (nếu dùng route)
RUN a2enmod rewrite

# Set quyền
RUN chown -R www-data:www-data /var/www/html
