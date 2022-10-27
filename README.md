# Investigación de librerías

<p align="center"><img height="200" width="200" src="Public/img/facha.jpg"></p>
<h1 align="center">Proyecto Spreadsheet</h1>
<p align="center">Para la utilización de las librerías PhpSpreadsheet y DataTables con funcionalidad Login</p>

## Requisitos

- PHP version >= 7.3.
- Composer
- WAMP / XAMPP

## Instalación

Es necesario utilizar [composer](https://getcomposer.org) para instalar PhpSpreadSheet en su proyecto:

```sh
composer require phpoffice/phpspreadsheet
```

Si está realizando la instalación en una computadora que posee una versión de PHP diferente al servidor donde se implementará, o si su versión de la CLI de PHP no es la misma que corre en tiempo de ejecución (como `php-fpm` o `mod_php` de Apache), entonces es posible que deba agregar lo siguiente a su `composer.json` antes de realizar la instalación:

```json
{
    "require": {
        "phpoffice/phpspreadsheet": "^1.23"
    },
    "config": {
        "platform": {
            "php": "7.3"
        }
    }
}
```

Luego ejecutar el comando

```sh
composer install
```

para asegurarse de que las dependencias se hayan actualizado en el servidor de desarrollo correctamente.
