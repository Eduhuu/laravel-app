# Proyecto desarrollado con Laravel 11
## Seguir los siguientes pasos para instalar correctamente el proyecto:

### Debemos tener instalados  PHP y Composer

Para instalar PHP utilizamos:

    sudo apt install php libapache2-mod-php

Para instalar Composer:
- Primero nos dirigimos al directorio ~

        cd ~
- Descargamos Composer

        curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
- Para comprobar que se descargo correctamente, obtenemos el hash  con:

        HASH=`curl -sS https://composer.github.io/installer.sig`

        echo $HASH
    
    y luego ejecutamos el siguiente codigo:

        php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
        sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
    
    Si obtenemos:

        Installer verified
    Se instalo correctamente, para comprobarlo podemos escribir:

        composer
    
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

## Pasos a seguir para instalar postgres:
### Instalar postgres:
    sudo apt install postgresql

### Compruebe que el servidor de postgres esta corriendo con:
    pg_lsclusters
Si no esta corriendo reinicie postgres con: 
    
    sudo service postgresql restart

### El proyecto utiliza una base de datos con las siguientes caracteristicas:
```
user: 'postgres',
host: 'localhost',
database: 'postgres',
password: 'postgres',
port: 5432
```

Por lo que debemos cambiar las credenciades del usuarios postgres

- Utilizamos el usuario 'postgres' con el comando en la terminal:

        sudo -i -u postgres

- Ejecutamos postgres con el comando:

        psql

- Para cambiar la contrasena utilizamos:
    
        ALTER USER postgres WITH PASSWORD 'postgres';

- Nos salimos de la base de datos con: 
    
        exit

- Por ultimo queda crear las migraciones:

### Ejecutamos el proyecto con: