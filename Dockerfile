# Usar una imagen oficial de PHP con Apache
FROM php:7.4-apache

# Copiar los archivos de la aplicación al directorio web de Apache
COPY . /var/www/html/

# Instalar extensiones necesarias de PHP
RUN docker-php-ext-install mysqli

# Exponer el puerto 80 para Apache
EXPOSE 80
