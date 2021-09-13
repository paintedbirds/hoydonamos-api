
# Che, ¿ Hoy donamos ?

Este proyecto fue creado y producido gracias al Framework [Laravel](https://laravel.com/).

Siendo un proyecto de fin de año, donde aplicamos todos los conocimientos adquiridos a lo largo del año cursado.



## Caracteristicas

Dentro del proyecto se decidió implementar el uso del Framework Laravel para poder desarrollar y gestionar todos los datos recibidos y almacenados en el Backend, usando el modelo MVC para las entidades y los datos.

Tambien se implemento el paquete [BackPack](https://backpackforlaravel.com/docs) de Laravel, que se usa como panel, donde el administrador controla todos los datos almacenados dentro de la Base de datos, pudiendo aprobarlos, rechazarlos, analizarlos y eliminarlos a gusto.
Esto es gracias a que BackPack nos da un panel pre definidos ya que este usa muchos paquetes y vistas que nos facilita su uso.


 
## Deploy localmente

clonar el proyecto

```bash
  git clone https://github.com/Anima-Tec/2021_Proyecto_Integrador_Equipo_3-Backend.git
```

ir a la carpeta del proyecto
```bash
  cd 2021_Proyecto_Integrador_Equipo_3-Backend
```

instalar/actualizar composer

```bash
  composer install
  composer update
```

usar/actualizar migrations
```bash
  php artisan migrate
  php artisan migrate:refresh
  ```

Para correr el proyecto usar :

```bash
  php artisan serve
```
---
## Variables de entorno

Para poder correr el proyecto correctamente se necesita cambiar algunas variables de entorno, tales como :

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

Para la facilitacion de obtencion de datos dentro delos endpoints, se decidio implementar _Pagination_ para que si reciben grandes cantidades de datos esto no sea un problema dentro de las Request.

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



