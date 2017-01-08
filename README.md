docker build -t=dearfamily .

docker run -d --link MariaDB:mariadb.docker --name dearfamily dearfamily
