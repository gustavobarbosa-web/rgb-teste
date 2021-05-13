FROM php:7.3-fpm
LABEL mantainer="Gustavo Barbosa <gustavo@agenciawebsoft.com.br>"

# Install "curl", "libmemcached-dev", "libpq-dev", "libjpeg-dev",
#         "libpng12-dev", "libfreetype6-dev", "libssl-dev", "libmcrypt-dev",
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        curl \
        git \
        libmemcached-dev \
        libz-dev \
        libzip-dev \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libssl-dev \
        libmcrypt-dev \
        unzip \
        zip

# Install the PHP mcrypt extention
RUN pecl install mcrypt-1.0.2 \
    && docker-php-ext-enable mcrypt.so
    
# Install the PHP pdo_mysql extention
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Install the PHP soap extention
RUN rm /etc/apt/preferences.d/no-debian-php \
        && apt-get update -yqq \
        && apt-get -y install libxml2-dev php-soap \
        && docker-php-ext-install soap
    
# Install the PHP xdebug extention
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

#####################################
# gd:
#####################################

# Install the PHP gd library
RUN docker-php-ext-configure gd \
        --with-jpeg-dir=/usr/lib \
        --with-freetype-dir=/usr/include/freetype2 && \
        docker-php-ext-install gd

# Install the PHP zip extention
RUN docker-php-ext-install zip \
    && docker-php-ext-enable zip

# Set user permission over folder
RUN chown -R www-data:www-data /var/www
RUN chmod 777 -R /var/www

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --filename=composer --install-dir=/bin
ENV PATH /root/.composer/vendor/bin:$PATH