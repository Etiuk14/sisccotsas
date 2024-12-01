# modules/contapass/Dockerfile
FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Instalar extensiones de PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer el directorio de trabajo
WORKDIR /var/www

# Copiar el archivo composer.json y composer.lock desde la raíz del proyecto
COPY /composer.json /var/www/composer.json
COPY /composer.lock /var/www/composer.lock

# Instalar dependencias de Composer
RUN composer install --no-scripts --no-autoloader

# Copiar el resto del código de la aplicación
COPY . .

# Generar autoload de Composer
RUN composer dump-autoload --optimize

# Exponer el puerto 9000 y ejecutar PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]