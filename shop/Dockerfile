FROM php:8.1-apache

RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    zip \
    unzip

RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT /var/www/html/public
ENV COMPOSER_HOME /composer

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo pdo_mysql zip

COPY apache-site.conf /etc/apache2/sites-available/000-default.conf
RUN sed -i -e 's|DocumentRoot /var/www/html|DocumentRoot ${APACHE_DOCUMENT_ROOT}|' /etc/apache2/sites-available/000-default.conf
RUN service apache2 restart


COPY apache-site.conf /etc/apache2/sites-available/000-default.conf

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN a2ensite 000-default && service apache2 restart



WORKDIR /var/www/html

COPY . /var/www/html

COPY wait-for-it.sh /wait-for-it.sh
RUN chmod +x /wait-for-it.sh

RUN composer install --optimize-autoloader --no-dev

EXPOSE 80

