FROM php:8.3-fpm-alpine AS base

# Arguments untuk user dan group IDs
ARG PUID=1000
ARG PGID=1000

# Install dependensi
RUN apk add --no-cache \
    nginx \
    curl \
    git \
    build-base \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    icu-dev \
    zip \
    unzip \
    postgresql-dev \
    libzip-dev \
    supervisor \
    && docker-php-ext-install -j$(nproc) pdo_mysql pdo_pgsql bcmath exif gd intl opcache pcntl zip \
    && docker-php-ext-enable opcache

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Buat user non-root untuk keamanan
RUN addgroup -g ${PGID} appgroup && adduser -u ${PUID} -G appgroup -s /bin/sh -D appuser

# Set working directory
WORKDIR /var/www/html

# Setel izin (penting untuk storage/cache Laravel)
COPY --chown=appuser:appgroup . /var/www/html
RUN chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

USER appuser

# Expose port (PHP-FPM mendengarkan di 9000)
EXPOSE 9000
# Mulai PHP-FPM
CMD ["php-fpm"]