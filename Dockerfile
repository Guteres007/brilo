FROM php:8.3-fpm

# Aktualizace balíčků a instalace potřebných knihoven
RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install \
    pdo_mysql \
    zip \
    opcache
ENV COMPOSER_ALLOW_SUPERUSER=1
# Instalace Composeru
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Nastavení pracovního adresáře
WORKDIR /var/www/symfony

# Kopírování aplikace do kontejneru a instalace závislostí přes Composer
COPY . /var/www/symfony
RUN composer install --optimize-autoloader

# Nastavení oprávnění
RUN chown -R www-data:www-data /var/www/symfony

# Otevření portu 9000 pro php-fpm
EXPOSE 9000

CMD ["php-fpm"]