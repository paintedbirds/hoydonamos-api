
# Che, ¿ Hoy donamos ?

Este proyecto esta creado sobre [Laravel](https://laravel.com/).




## Características


Utilizamos el paquete [BackPack](https://backpackforlaravel.com/docs) el cual nos facilita la creacion de un panel administrador donde podemos gestionar los registros de nuestra base de datos de forma sencilla. Ademas nos permite poder validar ciertos recursos facilitando asi el analisis de los mismos.

Gestionamos la creacion de nuestra base de datos a travez de [migraciones de laravel](https://laravel.com/docs/8.x/migrations), estas estan ligadas a los modelos dentro de nuestra aplicacion.
 
 ---
## Variables de entorno

Para poder levantar el servicio correctamente se necesitan ciertas variables de entorno :

`DB_DATABASE`

`DB_USERNAME`

`DB_PASSWORD`

Informacion sobre nuestra base de datos local.

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

correr las migraciones y seeders de nuestra base de datos 
```bash
  php artisan migrate --seed
  ```
 Las seeders es una forma de crear datos falsos para que al inicializar la aplicacion tenga datos pre cargados.

Levantar el servidor :

```bash
  php artisan serve
```

---
## BackPack

Para la implementacion del Admin Panel se decidio utilizar Backpack, este siendo un conjunto de paquetes, el cual nos permite la moderacion del Backend.

Aplicando las funcionalidades requeridas para que un Administrador puede ver listadas las donaciones, peticiones, usuarios y en caso de aprobar una donacion o eliminarla este tenga las herramientas para hacerlo.


---

## Endpoints 

Encontraran una coleccion de [Postman](https://www.postman.com/) con todos los endpoints de nuestra aplicacion.

Archivo : proyecto_integrador_postman_collection

URL : https://www.postman.com/avionics-participant-66176292/workspace/proyecto-integrador-equipo-3

## Autenticación en los Endpoints

La autentificacion de la aplicacion esta basada en tokens y la seguridad en rutas dependientes de la presencia de estos tokens. Para una correcta gestion de la autentificacion utilizamos [Sanctum](https://laravel.com/docs/8.x/sanctum#how-it-works).

Decidimos utilizar este metodo ya que se amolda a las necesidades del proyecto, ademas tiene cierta sencilles en su implementacion lo que agilizo el proceso de desarrollo.


---

Las rutas que necesitan autentificacion estas agrupadas bajo el `middleware` de Sanctum dentro de nuestro archivo de rutas.
```php
  Route::group(['middleware' => ['auth:sanctum']], function () {
    // Todas las rutas puestas aqui estarán protegidas y solo podran ser accedidas si la autenticación via token es exitosa.
  });
```
Las rutas que esten por fuera del `middleware` no tendran autentificacion.

---
## Paginacion en los endpoints

Hemos utilizado las facilidades que nos da Eloquent para poder paginar los endpoints de nuestra API que devuelven grandes cantidades de recursos. Decidimos que el limite de registros enviados en un endpoint paginado seria de 10, un limite que del lado del cliente es aceptable.

### Ejemplo de una endpoint con paginacion :

```http
  GET /api/donations
```

---
## Authors

- [@Alejandro Gonzalez](https://github.com/alejandroGonGon)
- [@Nicolas Machado](https://github.com/nicocadq)
- [@Lautaro Pardo](https://github.com/LautaroPardo)
- [@Facundo Correa](https://github.com/facorrea700)



