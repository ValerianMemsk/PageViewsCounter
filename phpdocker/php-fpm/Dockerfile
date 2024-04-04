FROM phpdockerio/php:8.3-fpm
WORKDIR "/var/www/html"

ARG NODE_VERSION=21
ARG USER_ID=1000

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        php8.3-pgsql \
        php8.3-phpdbg \
        php8.3-xdebug \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# PHP-FPM packages need a nudge to make them docker-friendly
COPY overrides.conf /etc/php/8.3/fpm/pool.d/z1-overrides.conf

# Install Nodejs, Yarn
RUN curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg
RUN echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_$NODE_VERSION.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list
RUN apt-get update
RUN apt-get -y install nodejs && npm install -g npm yarn

RUN apt -y remove gcc-10 cpp-10 make *-dev \
  && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN usermod -u $USER_ID www-data && groupmod -g $USER_ID www-data