# Baskito

## About Baskito

Baskito stands for Backend Starter Kit Task Force that [Timedoor Backend Developer](https://github.com/backend-timedoor) built to improve development time for the admin page with a standardized tech stack and components built on [Laravel 9](https://laravel.com/docs/9.x) :

- [Laravel 9](https://laravel.com/docs/9.x)
- [Vue 3](https://vuejs.org/guide/introduction.html)
- [Inertia](https://inertiajs.com)
- [Bootstrap 4](https://getbootstrap.com/docs/4.6/getting-started/introduction)
- [Stisla](https://github.com/stisla/stisla)

## Prerequisites

Before starting a Baskito project, you need to install this program on your computer to match the Baskito tech stack.

- ```php : ^8.0.2``` [docs](https://www.php.net)
- ```composer : ^2.0.0``` [docs](https://getcomposer.org/doc)
- ```nodejs : ^16.0.0``` [docs](https://nodejs.org)

## Dependencies

Besides the package that is already built-in with Laravel, here's the list of installed dependencies within this project.

### PHP

- ```inertiajs/inertia-laravel : ^0.6.4``` [docs](https://inertiajs.com)
- ```innocenzi/laravel-vite: 0.2.*``` [docs](https://laravel-vite.dev/guide/extra-topics/inertia.html)
- ```laravel/ui: ^4.1``` [docs](https://github.com/laravel/ui)
- ```tightenco/ziggy: ^1.5``` [docs](https://github.com/tighten/ziggy)
- ```barryvdh/laravel-debugbar: ^3.7``` [docs](https://github.com/barryvdh/laravel-debugbar)

### Javascript

- ```@types/bootstrap: ^5.2.6``` [docs](https://github.com/DefinitelyTyped/DefinitelyTyped)
- ```@types/jquery: ^3.5.14``` [docs](https://github.com/DefinitelyTyped/DefinitelyTyped)
- ```@types/ziggy-js: ^1.3.2``` [docs](https://github.com/DefinitelyTyped/DefinitelyTyped)
- ```@types/select2: ^4.0.56``` [docs](https://github.com/DefinitelyTyped/DefinitelyTyped)
- ```@typescript-eslint/eslint-plugin: ^5.46.1``` [docs](https://typescript-eslint.io)
- ```@typescript-eslint/parser: ^5.46.1``` [docs](https://typescript-eslint.io)
- ```@vitejs/plugin-vue: ^3.2.0``` [docs](https://github.com/vitejs/vite-plugin-vue/blob/main/packages/plugin-vue/README.md)
- ```@vue/compiler-sfc: ^3.2.45``` [docs](https://github.com/vuejs/core/tree/main/packages/compiler-sfc#readme)
- ```eslint: ^8.29.0``` [docs](https://eslint.org)
- ```eslint-config-prettier: ^8.5.0``` [docs](https://github.com/prettier/eslint-config-prettier)
- ```eslint-plugin-vue: ^9.8.0``` [docs](https://eslint.vuejs.org)
- ```prettier: ^2.8.1``` [docs](https://prettier.io)
- ```sass: ^1.56.1``` [docs](https://sass-lang.com)
- ```vite: ^3.2.5``` [docs](https://vitejs.dev)
- ```vite-plugin-laravel: ^3.2.5``` [docs](https://laravel-vite.dev)
- ```vue-eslint-parser: ^9.1.0``` [docs](https://github.com/vuejs/vue-eslint-parser)
- ```@inertiajs/inertia: ^0.11.1``` [docs](https://inertiajs.com)
- ```@inertiajs/inertia-vue3: ^0.6.0``` [docs](https://inertiajs.com)
- ```@inertiajs/progress: ^0.2.7``` [docs](https://inertiajs.com/progress-indicators#top)
- ```vue: ^3.2.36``` [docs](https://vuejs.org/guide/introduction.html)
- ```ziggy-js: ^1.5.0``` [docs](https://github.com/tighten/ziggy)

## Installation

### PHP

First, you need to install all PHP package requirements.

```bash
composer install
```

Copy and paste the `.env.example` file into `.env` this project and generate `APP_KEY`.

```bash
cp .env.example .env

php artisan key:generate
```

Create and set your database configuration in the `.env` file then run the database migration and seeder.

```bash
php artisan migrate --seed
```

### Javascript

Install Javascript package dependencies.

```bash
npm install
```

Run Vite for development.

```bash
npm run dev
```

Build Vite.

```bash
npm run build
```

## Settings

### Vite

Set `DEV_SERVER_URL` setting in `.env` to match your local project URL and add a port for Vite to it.

```.env
DEV_SERVER_URL=http://baskito.test:4000
```

### Vite SSL

If you use HTTPS for `DEV_SERVER_URL` while using Laragon that is not placed in the default folder (`C:\laragon`) or somehow have an SSL error, you must specify the SSL key and certificate file path in the `DEV_SERVER_KEY` and `DEV_SERVER_CERT` settings in the `.env`.

```.env
DEV_SERVER_KEY="D:\\laragon\\etc\\ssl\\laragon.key"
DEV_SERVER_CERT="D:\\laragon\\etc\\ssl\\laragon.crt"
```
