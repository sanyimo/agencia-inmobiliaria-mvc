# Usamos una imagen base de PHP
FROM php:8.0-apache

# Crear un usuario no root
RUN useradd -ms /bin/bash appuser

# Habilitar mod_rewrite y otras configuraciones necesarias como root
USER root
RUN a2enmod rewrite

# Instalar dependencias de PHP necesarias para tu proyecto
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    libwebp-dev \
    libavif-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql

# Instalamos Node.js y npm
RUN apt-get update && apt-get install -y \
    curl \
    gnupg2 \
    lsb-release \
    && curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs

# Instalamos dependencias de `sharp`
RUN apt-get update && apt-get install -y \
    build-essential \
    libvips-dev \
    && rm -rf /var/lib/apt/lists/*

# Establecemos el directorio de trabajo en el contenedor
WORKDIR /var/www/html

# Cambiar el directorio de instalación de npm para evitar problemas con .npm
RUN mkdir -p /var/www/html/.npm-global \
    && npm config set prefix /var/www/html/.npm-global

# Cambiar al usuario appuser
USER appuser

# Instalamos las dependencias de Node.js para Gulp y otras herramientas de desarrollo
COPY package.json /var/www/html/
RUN npm install --unsafe-perm=true --allow-root

# Instalamos las dependencias de Composer
COPY composer.json /var/www/html/
RUN curl -sS https://getcomposer.org/installer | php \
    && php composer.phar install

# Copiar el código fuente de la aplicación en el contenedor
COPY . /var/www/html/

# Cambiar la propiedad de los directorios clave para que Apache tenga acceso
USER root
RUN chown -R www-data:www-data /var/www/html/public

# Configurar el contenedor para exponer el puerto 80 (por defecto en Apache)
EXPOSE 80

# Comando para iniciar Apache en primer plano
CMD ["apache2-foreground"]
