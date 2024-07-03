# Proyecto desarrollado con Laravel 11
## Seguir los siguientes pasos para instalar correctamente el proyecto:

Se debe de tener instalado node y npm. Revisar README.md de Express js en caso de requerir la instalacion.

### Debemos tener instalados  PHP y Composer

Para instalar PHP utilizamos:

    sudo apt install php libapache2-mod-php php-curl php-xml unzip php-zip

Para instalar Composer:
- Primero nos dirigimos al directorio ~

    ```
    cd ~
    ```
- Descargamos Composer
    ```
    curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
    ```

- Para comprobar que se descargo correctamente, obtenemos el hash  con:
    ```
    HASH=`curl -sS https://composer.github.io/installer.sig`
    echo $HASH
    ```
    
    y luego ejecutamos el siguiente codigo:
    ```
    php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"        sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
    ``` 
    Si obtenemos:
    ```
    Installer verified
    ```
    Se instalo correctamente, para comprobarlo podemos escribir:
    ```
    composer
    ```

    Y se deberia de obtener una pantalla similar a: 
    ```
     ______
    / ____/___  ____ ___  ____  ____  ________  _____
    / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
    / /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
    \____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                        /_/
    Composer version Composer version <version> <fecha de inslacion>
    ```

- Luego volvemos al directorio del proyecto y ejecutamos:
    ```
    composer update
    composer install
    ```

## Pasos a seguir para instalar postgres:
### Instalar postgres:
    sudo apt install postgresql
    sudo apt-get install php-pgsql

### Compruebe que el servidor de postgres esta corriendo con:
    pg_lsclusters
Si no esta corriendo reinicie postgres con: 
    
    sudo service postgresql restart

### El proyecto utiliza una base de datos con las siguientes caracteristicas:
```
user: 'postgres',
host: 'localhost',
database: 'laravel_db',
password: 'postgres',
port: 5432
```

Por lo que debemos cambiar las credenciades del usuarios postgres

- Utilizamos el usuario 'postgres' con el comando en la terminal:

    ```
    sudo -i -u postgres
    ```

- Para crear la nueva base de datos utilizamos:

    ```
    createdb laravel_db
    ```

- Ejecutamos postgres con el comando:

    ```
    psql
    ```

- Para cambiar la contrasena utilizamos:
    
    ```
    ALTER USER postgres WITH PASSWORD 'postgres';
    ```

- Nos salimos de la base de datos con: 
    
    ```
    exit
    ```

- Por ultimo queda crear las migraciones:

### Debemos crear el .env
Para ello creamos un archivo .env en la raiz del proyecto con el siguiente contenido:

```
APP_NAME=Laravel
APP_ENV=development
APP_KEY=base64:c7Lwa9/XU3+7oMEWjN/ze4Mme6fziZOuqFl32hoE4Wo=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=laravel_db
DB_USERNAME=postgres
DB_PASSWORD=postgres

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD= 

MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your@gmail.com
MAIL_FROM_NAME="laracoding.test EmailDemo"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"
```

### Instalamos las dependencias de node

    npm install

### Cargamos todos los estilos de la app.

    npm run build

### Ejecutamos el proyecto con:

    php artisan serve --host=0.0.0.0 --port=8000

