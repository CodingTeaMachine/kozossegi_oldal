# IB152L-6 - Kozossegi Oldal

<div style="color: orange">
   WARN: A jelenlegi környezetednek megfelelő parancsot futtasd
</div>

## Telepítés

A telepítés feltételezi, hogy a számítógépre telepítve van a docker

1. .env fájl létrehozása .env.example alapján

    Beállítások a [beállítások](#Beállítások) résznél

2. Docker containerek buildelése

    1. Composer csomagok telepítése

       Unix/Linux:

         ```shell
         docker run --rm \
             -u "$(id -u):$(id -g)" \
             -v $(pwd):/var/www/html \
             -w /var/www/html \
             laravelsail/php82-composer:latest \
             composer install --ignore-platform-reqs
         ```

       Windows (powershell):

         ```bash
         docker run --rm -m 2g -v ${PWD}:/var/www/html -w /var/www/html laravelsail/php82-composer:latest composer install --ignore-platform-reqs
         ```

    2. Laravel container buildelése

         Unix/Linux:

        ```shell
        ./vendor/bin/sail build
        ```

       Windows (powershell):
    
        ```bash
        docker compose build
        ```

   3. NPM csomagok telepítése

       Unix/Linux:
    
        ```shell
        ./vendor/bin/sail up -d && ./vendor/bin/sail npm i
        ```
    
       Windows (powershell):
    
        ```bash
        docker compose up -d laravel.test ; docker compose exec laravel.test npm i
        ```

## Beállítások

1. hosts

    A hosts file csak rendszergazdaként szerkeszthető.

   Unix/Linux: /etc/hosts
   Windows: C:\Windows\System32\drivers\etc\hosts

   Új sorban a végére: 127.0.0.1 kozossegioldal.local

   .env-ben APP_URL=kozossegioldal.local

2. DB_- al kezdődő változók
   Ajánlott:

    - DB_CONNECTION=oracle
    - DB_HOST= ```Az oracle-db container IP címe *1```
    - DB_PORT=1521
    - DB_DATABASE=FREE
    - DB_SERVICE_NAME=FREE
    - DB_USERNAME=```A docker/oracle/00_create_user.sql fájlban megadott érték *2```
    - DB_PASSWORD= ```A docker/oracle/00_create_user.sql fájlban megadott érték```

   *1 A "docker inspect -f '{{range.NetworkSettings.Networks}}{{.IPAddress}}{{end}}' oracle-db" futtatásával kapjuk meg (Amennyiben az "oracle-db" nevű container fut. A parancsot úgy ahogy van kell lefuttatni, nem kell semmit behellyetesíteni) <br />
   *2 Mivel a felhasználónlévnek 'C##'-el kell kezdődnie, ezért a változó értékét idézőjelek közé kell tenni

3. APP_KEY

   Unix/Linux:
    ```shell
    ./vendor/bin/sail up -d && ./vendor/bin/sail artisan key:generate
    ```

   Windows (powershell):
    ```bash
    docker compose up -d laravel.test ; docker compose exec laravel.test php artisan key:generate
    ```

## Indítás

Unix/Linux

```shell
./vendor/bin/sail up -d && ./vendor/sailsail npm run dev
```

Windows (powershell):

```shell
docker compose up -d ; docker compose exec laravel.test npm run dev
```

Ez után az oldal elindítható a http://kozossegioldal.local címen
