FROM ubuntu:14.04

MAINTAINER Ministerio de Minas y Energia OARE <jcreyes@minminas.gov.co>

LABEL version="1.0" app_name="Sistema de Cobertura" auhor="Ministerio de Minas y Energía"

EXPOSE 80

COPY cobertura/ /var/www/html/cobertura/

WORKDIR /var/www/html/cobertura/

RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -y \
curl \
apache2 \
git \
php 5 \
php5-cli \
php5-curl \
php5-intl \
&& apt-get clean && \
rm -rf /tmp/* /var/tmp/*

RUN a2enmod rewrite

RUN service apache2 restart

RUN curl -sS http://getcomposer.org/installer | php \
&& mv composer.phar /usr/local/bin/composer

RUN composer global requiere "fxp/composer-asset-plugin:dev-master" --prefer-source --no-interaction \
&& composer config --global github-oauth.github.com ef4c9afd2df86cdc2a2e4ea28e73cb71f638640d \
&& composer config --global store-auths false \
&& composer self update \
&& composer global update \
&& composer update