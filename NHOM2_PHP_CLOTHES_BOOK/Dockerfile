FROM php:8.2-apache

# Copy đúng thư mục chứa code
COPY NHOM2_PHP_CLOTHES_BOOK/ /var/www/html/

# Bật rewrite
RUN a2enmod rewrite

# Set quyền
RUN chown -R www-data:www-data /var/www/html