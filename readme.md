# ASECE-WEB
---
## Contenido
- [Requisitos](#requisitos)
- [Instalacion](#instalacion)
  - [Configurando archivo .env](#env)
  - [Configuracion MariaDB](#MariaDB)
  - [Instalando Dependencias](#dependencias)
  - [Migraciones](#migraciones)
  - [Seeders](#seeders)
- [Ejecucion](#ejecucion)

### Requisitos
Las siguientes versiones de las herramientas son necesarias:
```
Composer 1.2.0, Laravel 5.4, php 7 y MariaDB 10.1
```

Cuando las herramientas anteriores estén instaladas se procede a la instalación y configuración del proyecto.

**NOTA:** No se recomiendan otras versiones para este projecto.

### Instalacion
Se debe clonar el proyecto para acceder a el, luego se ejecuta en la terminal:

```
$ cd asece-web
```
para acceder a la carpeta raíz del proyecto.


#### Configurando archivo .env
Como se sabe, el archivo .env contiene las variables de entorno que el framework utiliza para la configuración de base de datos, opciones de debugging, etc.
El repositorio incluye un arhcivo .env.example, que sirve como plantilla para poder modificar los valores a gusto del programador. Se debe renombrar este archivo para que Laravel lo reconozca como tal.
Si se esta dentro de una terminal Linux:

```
mv .env.example .env
```
Caso contrario bastará con renombrar el archivo .env.example a .env
Ahora es necesario abrir el archivo .env en un editor de texto plano, y modificar las siguientes variables:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
En este caso, las variables a modificar son: DB_USERNAME, DB_DATABASE y DB_PASSWORD. Colocar las credenciales necesarias.
(Si bien es cierto que la base de datos usada es MariaDB, el driver para conectarse a ella y a MariaDB son el mismo.)

#### Configuracion MariaDB
Para poder trabajar con la aplicación se debe configurar un usuario y un passsword para la base de datos MariaDB (Cabe resaltar que puede ser cualquier motor de base de datos soportado por Laravel).

Para crear un usuario en MariaDB (Todos los comandos se hacen desde la terminal; Si se prefiere se puede crear el usuario, contraseña y la base de datos desde la interfaz gráfica de utilerías como PHPMyAdmin) se ejecuta lo siguiente:

```
CREATE USER 'nombre'@'localhost' IDENTIFIED BY 'passsword';
```
El comando anterior debe ser ejecutado por un usuario que tenga permisos para crear otros usuarios (root por ejemplo). Se debe tener en cuenta que 'nombre' y 'passsword' deben coincidir con los nombre y passsword proporcionados en el archivo .env.

Ahora se le deben otorgar permisos para la creación de bases de datos al nuevo usuario creado:

```
GRANT ALL PRIVILEGES ON *.* TO 'nombre'@'localhost';
```
Luego se loguea con el usuario creado de la siguietne manera:

```
$ mysql -u nombre -p
```
En seguida pedirá la contraseña que debemos escribir. (el signo de dólar al principio del comando es para especificar un usuario dentro de sistemas UNIX sin permisos de super usuario.)

Dentro de la consola de MariaDB, se debe crear la base de datos que utilizará el proyecto:
```
CREATE DATABASE 'DATABASE';
```
Ahora ya se tiene configurada la base de datos a utilizar.

#### Instalando Dependencias
Dentro de la carpeta raíz del proyecto se encuentra otra llamada vendor. Dentro de ella se instalan aquellos componentes que el framework necesita para su correcto funcionamiento. Para instalar esos paquetes simplemente se ejecuta, dentro de la carpeta raíz:

```
$ composer install
```

#### Migraciones
Ahora se deben instalar las tablas dentro de la base de datos que utiliza la aplicación. Dentro de Laravel esta tarea es sencilla y se debe ejecutar lo siguiente dentro de la raíz del proyecto:

```
$ php artisan migrate
```
Si no hay errores se puede loguear con el usuario de MariaDB y verificar la existencia de las tablas creadas.

#### Seeders
Los archivos seeders, son clases dentro de laravel que permiten el llenado de una tabla dentro de una base datos. Los creadores de Laravel pensaron en una forma de dejar de lado los archivos .sql para el trabajo colaborativo y los seeders son una gran ayuda para eliminar completamente los archivos backup de bases de datos.
Se debe llenar la tabla permisos en primer lugar, se debe ejecutar lo siguiente:

```
$ php artisan db:seed
```
Luego de lo anterior, se tienen insertados algunas instituciones, un administrador cuyas credenciales son, email: admin@example.com y password: admin123; además de dos proveedores: proveedor@example.com, 123456 y proveedor2@example.com, 123456.


#### Ejecucion
Antes de verificar si la aplicación funciona correctamente, se debe registrar las llaves en el archivo .env. Laravel lo maneja automáticamente de la siguiente forma:

```
$ php artisan key:generate
```

Si todo ha ido acorde, solamente basta probar la aplicación de la siguiente forma:
```
$ php artisan serve
```
Se abre el navegador en localhost, para el puerto 8000 y comprobar que todo esta funcionando correctamente.
