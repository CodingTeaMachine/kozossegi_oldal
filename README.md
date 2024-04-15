# IB152L-6 - Kozossegi Oldal

## Telepítés

A telepítés feltételezi, hogy a számítógépre telepítve van a docker

1. .env fájl létrehozása .env.example alapján

2. Docker containerek buildelése:

```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

```shell
./vendor/bin/sail build
```

Ezzel buildelődik a 2 konténer amit a projekt használ ['laravel.test', 'oracle-db']


## Beállítás

A .env fájl ban a DB_- al kezdődő változókat be kell állítani.

Ajánlott:

 - DB_CONNECTION=oracle
 - DB_HOST= ```Az oracle-db container IP címe```
 - DB_PORT=1521
 - DB_DATABASE=FREE 
 - DB_SERVICE_NAME=FREE
 - DB_USERNAME=```A docker/oracle/00_create_user.sql fájlban megadott érték```
 - DB_PASSWORD= ```A docker/oracle/00_create_user.sql fájlban megadott érték```

## Indítás

```shell
./vendor/bin/sail up
```
