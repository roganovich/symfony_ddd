FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libzip-dev \
    libonig-dev \
    && docker-php-ext-install mbstring zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory contents
COPY . /var/www/html

# Set proper permissions for development
RUN chown -R www-data:www-data /var/www

# Fix git ownership issue
RUN git config --global --add safe.directory /var/www/html
RUN chmod -R 755 /var/www

# Create composer cache directory with proper permissions
RUN mkdir -p /var/www/.composer/cache && chown -R www-data:www-data /var/www/.composer

# Keep root user for development (will be changed to www-data in production)
# USER www-data

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
