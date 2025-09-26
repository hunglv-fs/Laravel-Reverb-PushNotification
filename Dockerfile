# Base image: PHP 8.3 FPM
FROM php:8.3-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    nano \
    libicu-dev \
    libxml2-dev \
    nodejs \
    npm \
    supervisor \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
       pdo_mysql \
       mbstring \
       exif \
       pcntl \
       bcmath \
       gd \
       intl \
       zip \
       opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy Supervisor configs
COPY ./docker/supervisord.conf /etc/supervisord.conf
COPY ./docker/php-fpm.conf /etc/supervisor/conf.d/php-fpm.conf
COPY ./docker/reverb.conf /etc/supervisor/conf.d/reverb.conf
COPY ./docker/queue-worker.conf /etc/supervisor/conf.d/queue-worker.conf

# Expose port for PHP-FPM
EXPOSE 9000

# Start Supervisor (it will manage php-fpm, reverb, queue workers)
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
