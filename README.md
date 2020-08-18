# Web Reportes

- El objetivo principal de este proyecto es generar reportes de la cantidad de personas detectadas a distintas horas, posiciones y recorridos de los buses del transporte público.
- Dicha información es obtenida a través de una API la cuál fue alimentada mediante tecnologías automatizadas de conteo de personas en imagenes.
- Los reportes tienen como objetivo mostrar al usuario la información necesaria a través de data grids y gráficos para que tomen decisiones logísticas más eficientes, tales como cuándo enviar o suplir de más buses a ciertos recorridos, como también saber cuáles son los puntos más críticos en donde la afluencia de personas es mayor.

# Tecnologías Utilizadas
- PHP versión 7
- Framework CakePHP 3.x
- Javascript y jQuery
- Bootstrap 4
- Chart.js
- CSS
- Template AdminLTE

# CakePHP Application Skeleton

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application.

## Layout

The app skeleton uses a subset of [Foundation](http://foundation.zurb.com/) (v5) CSS
framework by default. You can, however, replace it with any other library or
custom styles.
