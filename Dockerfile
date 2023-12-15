FROM php:8.1-apache

# Copy application files to the container
COPY . /var/www/html/

# Install dependencies
RUN apt-get update \
&& apt-get install -y curl git unzip libpq-dev libicu-dev libzip-dev gnupg \
zlib1g-dev g++ libpng-dev libonig-dev unixodbc-dev \
&& curl -s https://getcomposer.org/installer > composer_installer.php && \ 
php composer_installer.php \
&& mv composer.phar /usr/local/bin/composer && \
rm composer_installer.php

# Install SQL Server Drivers & Tools
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
RUN curl https://packages.microsoft.com/config/ubuntu/20.04/prod.list > /etc/apt/sources.list.d/mssql-release.list
RUN apt-get update && ACCEPT_EULA=Y apt-get install -y msodbcsql18 \
    && ACCEPT_EULA=Y apt-get install -y mssql-tools18 \
    && echo 'export PATH="$PATH:/opt/mssql-tools18/bin"' >> ~/.bashrc \
    source ~/.bashrc
    
# Enable extensions
RUN docker-php-ext-install pdo intl gd mbstring zip \
    && pecl install sqlsrv pdo_sqlsrv  \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv 

# Create folder cache and permissions
RUN mkdir -p writable/cache
RUN chown -R www-data:www-data writable/cache \
    && chmod -R 775 writable/cache

# Configurando apache
RUN a2enmod rewrite

# Expose port 80 the container for web traffic
EXPOSE 80