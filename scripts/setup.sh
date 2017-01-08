#!/usr/bin/env bash

docker run --name MariaDB --restart always -e MYSQL_ROOT_PASSWORD=temp -d mariadb
docker exec -i MariaDB mysql -uroot -ptemp < ../../stephy/stephy.sql

docker run --name phpMyAdmin -d --link MariaDB:db -P --restart always phpmyadmin/phpmyadmin
