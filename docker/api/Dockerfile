ARG APP_DIR=/var/www/myapp

FROM yiisoftware/yii2-php:7.4-apache AS base

ARG APP_DIR
WORKDIR ${APP_DIR}
RUN ln -s /var/www/myapp/src/web /app

RUN echo "ServerSignature Off" >> /etc/apache2/conf-available/security.conf
RUN echo "ServerTokens Prod" >> /etc/apache2/conf-available/security.conf
RUN unlink /etc/apache2/mods-enabled/autoindex.load
RUN unlink /etc/apache2/mods-enabled/alias.conf

RUN composer self-update 2.0.14


FROM base AS dev

COPY ./dockerd-entrypoint.sh /
RUN chmod 777 /dockerd-entrypoint.sh
ENTRYPOINT ["/dockerd-entrypoint.sh"]


FROM base AS deployment

COPY . ${APP_DIR}
COPY docker/api/rewrite.conf /etc/apache2/mods-enabled/
RUN sed -ri 's/^MaxKeepAliveRequests [0-9]+/MaxKeepAliveRequests 1000/' /etc/apache2/apache2.conf
RUN sed -ri 's/^KeepAliveTimeout [0-9]+/KeepAliveTimeout 120/' /etc/apache2/apache2.conf
RUN cd src && composer install

RUN apt update && apt install -y --no-install-recommends openssh-server dnsutils