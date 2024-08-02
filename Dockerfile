FROM php:8.2-cli

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    libonig-dev \
    && docker-php-ext-install bcmath mbstring

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /usr/src/app

COPY composer.json composer.lock ./
RUN composer install

COPY . .

RUN ./vendor/bin/phpunit --version

CMD ["php", "-S", "0.0.0.0:8000", "-t", "src/"]