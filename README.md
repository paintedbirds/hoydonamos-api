![Logo](docs/logo.svg)

# Che, ¿hoy donamos?

API y Panel de Administración de `Che, ¿hoy donamos?`, realizado en [Laravel](https://laravel.com/).

## Características

-   Utilizamos el paquete [Orchid](https://orchid.software/) el cual nos facilita la creacion de un panel administrador donde podemos gestionar los registros de nuestra base de datos de forma sencilla. Ademas nos permite poder validar ciertos recursos facilitando asi el analisis de los mismos.

-   Gestionamos la creacion de nuestra base de datos a travez de [migraciones de laravel](https://laravel.com/docs/8.x/migrations), estas estan ligadas a los modelos dentro de nuestra aplicacion.

---

## Endpoints

Encontraran una coleccion de [Postman](https://www.postman.com/) con todos los endpoints de nuestra aplicacion.
Tambien pueden verlo en formato online: https://www.postman.com/avionics-participant-66176292/workspace/proyecto-integrador-equipo-3

## Autenticación en nuestros servicios

La autentificacion de la aplicacion esta basada en tokens y la seguridad en rutas dependientes de la presencia de estos tokens. Para una correcta gestion de la autentificacion utilizamos [Sanctum](https://laravel.com/docs/8.x/sanctum#how-it-works).

Decidimos utilizar este metodo ya que se amolda a las necesidades del proyecto, ademas tiene cierta sencilles en su implementacion lo que agilizo el proceso de desarrollo.

Por el momento, el `Panel de Administración` utiliza el mismo servicio de autenticacion.

---

Las rutas de la `API` que necesitan autentificacion estas agrupadas bajo el `middleware` de Sanctum, en nuestro archivo de rutas.

```php
  Route::group(['middleware' => ['auth:sanctum']], function () {
    // rutas protegidas aquí
  });
```

Todas las rutas puestas dentro del `middleware` estarán protegidas y solo podran ser accedidas si la autenticación via token es exitosa.
Las rutas que esten por fuera de este no tendran autentificacion.

---

## Paginacion en los endpoints de la API

Hemos utilizado las facilidades que nos da Eloquent para poder paginar los endpoints de nuestra API que devuelven grandes cantidades de recursos. Decidimos que el limite de registros enviados en un endpoint paginado seria de 10, un limite que del lado del cliente es aceptable.

Ejemplo de una endpoint con paginacion :

```http
  GET /api/donations
```

---
## Alojamiento de imagenes

 Para el almacenamiento y control de imagenes se decicdio utilizar el servicio de [Cloudinary](https://cloudinary.com/), este guarda los archivos dentro de la nube, evitando asi tener que alojarlos en nuestro `storage` local.

---

# Levantar el servicio
## Localmente : 

-   Clonar este repositorio

```bash
git clone https://github.com/Anima-Tec/2021_Proyecto_Integrador_Equipo_3-Backend.git
```

-   Ir a la carpeta `root` del proyecto

```bash
cd 2021_Proyecto_Integrador_Equipo_3-Backend
```

-   Instalar y actualizar las dependencias, utilizando [composer](https://getcomposer.org/)

```bash
composer install
composer update
```

-   Crear un archivo `.env` basandote en el `.env.example`

-   Correr las migraciones y seeders de nuestra base de datos

Las seeders es una forma de ingresar los datos minimos que la aplicacion necesita para correr correctamente.

```bash
php artisan migrate --seed
```

-   Levantar el servidor

```bash
php artisan serve
```
## Produccion 

Cambiar las siguientes variables del `.env`  para poder levantar el servico en `produccion`

```bash
APP_ENV=production
...
APP_DEBUG=false
```

---

## Authors

-   [Alejandro Gonzalez](https://github.com/alejandroGonGon)
-   [Nicolás Machado da Silva](https://github.com/nicocadq)
-   [Lautaro Pardo](https://github.com/LautaroPardo)
-   [Facundo Correa](https://github.com/facorrea700)
