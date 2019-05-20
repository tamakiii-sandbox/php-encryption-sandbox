FROM php:7.3.3-cli-stretch

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
      libmcrypt-dev \
      make less && \
    rm -r /var/lib/apt/lists/*

RUN pecl install mcrypt channel://pecl.php.net/mcrypt-1.0.2 && \
    docker-php-ext-enable mcrypt
