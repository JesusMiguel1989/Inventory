FROM mysql:latest

ENV MYSQL_ROOT_PASSWORD=password
ENV MYSQL_DATABASE=laravel
ENV MYSQL_USER=root
ENV MYSQL_PASSWORD=1234

COPY ./scripts /docker-entrypoint-initdb.d

EXPOSE 3306
