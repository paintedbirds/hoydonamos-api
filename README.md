
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

  
  
## Variables de entorno

Para poder correr el proyecto correctamente se necesita cambiar algunas variables de entorno, tales como :

`DB_DATABASE`

`DB_USERNAME`

`DB_PASSWORD`

Estas siendo para configurar donde se localizara la base de datos.



  
## Endpoints 

A continuación se explicará todo sobre la creación de los Endpoints realizados y su formato dentro de la herramienta seleccionada [Postman](https://www.postman.com/).

### Link del Postman

Workspace : _https://www.postman.com/avionics-participant-66176292/workspace/proyecto-integrador-equipo-3_

### Autenticación en los Endpoints

Se utilizó el manejo de Tokens y de Rutas aseguradas para la Autenticación y Seguridad dentro del proyecto gracias a [Sanctum](https://laravel.com/docs/8.x/sanctum#how-it-works) que es un paquete mismo de Laravel.

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
### Request
Estos son algunos Endpoints usados normalmente dentro del Front que se explicaran su funcionamiento y que retornan.
#### Traer todas las donaciones
```http
  GET /api/donations
```
Esto retorna todas las donaciones que han sido aprobadas con un formato _JSON_ más _Pagination_ controlado desde el Back.

--- 
#### Crear una donación
```http
  POST /api/donations
```
Esto creará una donación(requiere un nombre, descripción, imagen y un usuario autenticado) que además de los valores que se le pasaran se le sumarán los valores del user que la creó gracias al token utilizado, ya que para poder ejecutar todos los endpoint se le tendrán que pasar el token de un usuario logueado.

--- 
--- 
#### Registrar un usuario
```http
  POST /api/register
```
Esto creará un usuario dentro de la BD donde si se cumplen todos los campos de validaciones, se retornará un 201 junto al usuario creado en el Postman.

--- 
--- 
#### Iniciar sesion un usuario
```http
  POST /api/login
```
Esto loguea un usuario si cumple con todas las condiciones predefinidas, tales como haber registrado un usuario anteriormente y que los campos están llenos, esto retornara un 200 junto al user con el token asignado que utilizara para poder usar todos los Endpoints dentro de Postman, también servirá como insumo dentro del Front.

--- 


## Authors

- [@Alejandro Gonzalez](https://github.com/alejandroGonGon)
- [@Nicolas Machado](https://github.com/nicocadq)
- [@Lautaro Pardo](https://github.com/LautaroPardo)
- [@Facundo Correa](https://github.com/facorrea700)



