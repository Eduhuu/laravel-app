# Proyecto desarrollado con Laravel 11
## Seguir los siguientes pasos para instalar correctamente el proyecto:



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