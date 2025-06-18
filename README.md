# 🦖 DinoShop

**DinoShop** es un sistema multitienda open source construido con Laravel que permite crear múltiples tiendas desde una sola instalación. Ideal para desarrolladores que quieren probar APIs, lanzar tiendas rápidamente o construir soluciones SaaS personalizadas.

---

## 🚀 Características Principales

- 🏪 **Multitienda real**: Crea y gestiona múltiples tiendas independientes bajo un solo sistema.
- ⚙️ **API RESTful**: Prueba endpoints fácilmente, ideal para desarrollo frontend o integración con apps externas.
- 🧪 **Entorno de pruebas**: Perfecto para testing, prototipos o sandbox de comercio electrónico.
- 🧩 **Extensible**: Arquitectura modular, pensada para escalar.
- 🌐 **Multiusuario y multitenant**: Cada usuario puede crear su propia tienda con su propio catálogo.
- 🔐 **Autenticación y permisos**: Gestión completa de usuarios por tienda.
- 📦 **Open Source**: Puedes contribuir, modificar o usarlo como base para tu próximo proyecto SaaS.

---

<center>
<img src="https://raw.githubusercontent.com/bemtorres/apa-store-laravel/refs/heads/master/public/logo.png" width="100px">
</center>

## Descripción


## Requisitos

- PHP 8.2.5>
- MySQL

## Tecnologías

- [Bootstrap 5.3](https://getbootstrap.com/docs/5.3/getting-started/introduction/)
- [Tailwind CSS](https://tailwindcss.com/docs/installation)
- [VUE 3](https://v3.vuejs.org/guide/introduction.html)

## start project 🚀

in your terminal run:

```shell
git clone https://github.com/bemtorres/dinoshop-laravel tienda

cd tienda

composer install

npm install

npm run build

php artisan storage:link

php artisan key:generate

cp .env.example .env

```
### create database

In the file .env.example change the name to .env and change the following lines:

```shell
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=tienda
  DB_USERNAME=root
  DB_PASSWORD=
```
once the changes are made, run the following command:

```shell
php artisan migrate
```

if you reinstall the database, run the following command: 😄

```shell
php artisan migrate:fresh
```

### Others

 * CoreUI - HTML, CSS, and JavaScript UI Components Library
 * @version v4.2.6
 * @link https://coreui.io/
 * Copyright (c) 2022 creativeLabs Łukasz Holeczek
 * License MIT  (https://coreui.io/license/)

## License
MIT License (MIT). Please see [License File](LICENSE.md) for more information.
