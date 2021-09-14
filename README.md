
# Che, ¿ Hoy donamos ?

Este proyecto esta creado sobre [Laravel](https://laravel.com/).




## Características


Utilizamos el paquete [BackPack](https://backpackforlaravel.com/docs) el cual nos facilita la creacion de un panel administrador donde podemos gestionar los registros de nuestra base de datos de forma sencilla. Ademas nos permite poder validar ciertos recursos facilitando asi el analisis de los mismos.

Gestionamos la creacion de nuestra base de datos a travez de [migraciones de laravel](https://laravel.com/docs/8.x/migrations), estas estan ligadas a los modelos dentro de nuestra aplicacion.
 
## Levantar el servicio localmente

clonar este repositorio

```bash
  git clone https://github.com/Anima-Tec/2021_Proyecto_Integrador_Equipo_3-Backend.git
```

ir a la carpeta `root` del proyecto
```bash
  cd 2021_Proyecto_Integrador_Equipo_3-Backend
```

instalar y actualizar las dependencias, utilizando [composer](https://getcomposer.org/)

```bash
  composer install
  composer update
```

correr las migraciones de nuestra base de datos
```bash
  php artisan migrate
  php artisan migrate:refresh
  ```

Levantar el servidor :

```bash
  php artisan serve
```
---
## Variables de entorno

Para poder levantar el servicio correctamente se necesitan ciertas variables de entorno :

`DB_DATABASE`

`DB_USERNAME`

`DB_PASSWORD`

Estas siendo para configurar donde se localizara la base de datos.

---

## BackPack

Para la implementacion del Admin Panel se decidio utilizar Backpack, este siendo un conjunto de paquetes, el cual nos permite la moderacion del Backend.

Aplicando las funcionalidades requeridas para que un Administrador puede ver listadas las donaciones, peticiones, usuarios y en caso de aprobar una donacion o eliminarla este tenga las herramientas para hacerlo.


---

## Endpoints 

A continuación se explicará todo sobre la creación de los Endpoints realizados y su formato dentro de la herramienta seleccionada [Postman](https://www.postman.com/).

### Collection

Archivo : proyecto_integrador_postman_collection

URL : https://www.postman.com/avionics-participant-66176292/workspace/proyecto-integrador-equipo-3

## Autenticación en los Endpoints

Se utilizó el manejo de Tokens y de Rutas aseguradas para la Autenticación y Seguridad dentro del proyecto gracias a [Sanctum](https://laravel.com/docs/8.x/sanctum#how-it-works) que es un paquete mismo de Laravel.

Esto se decidio utilizar gracias a que se acoplaba al proyecto con sus neccesidades, por su facil forma de implementar dentro de Laravel.


---

_Ejemplo de la protección vía Sanctum :_
```php
  Route::group(['middleware' => ['auth:sanctum']], function () {
    // Todas las rutas puestas aqui estarán protegidas y solo serán ejecutadas si la autenticación via token coincide.
  });
```
_Ejemplo de una ruta sin protección :_
```php
  <Route::post('/DIRECCION_API', [CONTROLADOR::class, 'FUNCION_EJECUTAR']);
```
---
## Request


Para la creacion de los endpoints dentro del proyecto, se utilizo la herramienta ya mencionada anteriormente, Postman.

Para la facilitacion de obtencion de datos dentro delos endpoints, se decidio implementar _Pagination_ para que si reciben grandes cantidades de datos esto no sea un problema dentro de las Request, evitando un mal perfomance dividiendo el resultado obtenido en pequeñas listas.

Aclarar que el limite de objetos recibidos a mostrar dentro de una Request es de 10, siendo lo suficientemente neccesario para el uso dentro del FrontEnd.

### EJemplo de una Request con Pagination :

```http
  GET /api/donations
```

---
## Authors

- [@Alejandro Gonzalez](https://github.com/alejandroGonGon)
- [@Nicolas Machado](https://github.com/nicocadq)
- [@Lautaro Pardo](https://github.com/LautaroPardo)
- [@Facundo Correa](https://github.com/facorrea700)



