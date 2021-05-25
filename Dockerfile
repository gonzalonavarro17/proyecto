
FROM php:8.0-apache
RUN apt-get update && apt-get upgrade -y
RUN apt-get install nano
RUN apt-get install net-tools
RUN docker-php-ext-install mysqli
EXPOSE 443
EXPOSE 80
