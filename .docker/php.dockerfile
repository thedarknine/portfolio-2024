FROM php:8-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libxslt-dev \
    zip \
    unzip \
    nodejs npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
# RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl xsl
RUN docker-php-ext-install pdo pdo_mysql gd opcache intl dom mbstring gd xsl

# Install Symfony CLI
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash
RUN apt-get update && apt-get install symfony-cli

RUN npm install -g pnpm

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN ls -l /usr/bin/composer

# Set working directory
WORKDIR /var/www/html
