# 1. Imagem PHP 8.1 + Apache
FROM php:8.1-apache

# 2. Instala extensões e utilitários
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    unzip \
  && docker-php-ext-install pdo_mysql mbstring zip \
  && a2enmod rewrite

 
  # <-- adicione este bloco para alterar o DocumentRoot
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" \
    /etc/apache2/sites-available/*.conf \
  && sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

# 3. Instala o Composer globalmente
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
EXPOSE 80
