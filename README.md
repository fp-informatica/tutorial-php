# Tutorial PHP

Versión mejorada del tutorial realizado para [FP Informática](http://www.fp-informatica.es/tutorial-registro-usuarios-php/). En este caso se ha desarrollado una pequeña web modular usando la metodología orientada a objetos.

Además se usa la extensión mysqli para la conexión y se han declarado métodos para mejorar la seguridad como **genHash()**.

Vista previa:
![Tutorial PHP](preview.png)

## Requisitos

* Apache o Nginx
* MySQL
* PHP

## Instalación

Suponiendo que ya hemos creado una base de datos para este propósito necesitamos crear la tabla de usuarios, en caso de usar phpMyAdmin podemos ejecutar la siguiente sentencia SQL:

```
CREATE TABLE IF NOT EXISTS `users` (
`id` int unsigned NOT NULL AUTO_INCREMENT,
`username` varchar(40) NOT NULL,
`password` varchar(40) NOT NULL,
`email` varchar(100) NOT NULL,
`regdate` unsigned int NOT NULL,
`ip` varchar(40) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

Definir parámetros de conexion (include/db.php)

```
const SERVER_DB = '';
const USER_DB   = '';
const PASS_DB   = '';
const DB_NAME   = '';
```

[Descargar los ficheros](https://github.com/jslirola/tutorial-php/archive/master.zip) del repositorio en un directorio que reconozco vuestro servidor web, por ejemplo:

* /var/www/html/tutorial-php
* C:\Program Files\Apache2\htdocs\tutorial-php

Por último (con el servidor iniciado) abrir en un navegador web la dirección que corresponda con el directorio, en mi caso: http://localhost/tutorial-php/
## Change Log

## Contribuir

Si quieres colaborar con el proyecto puedes abrir una [issue](https://github.com/jslirola/tutorial-php/issues/new) o enviar una [PR](https://github.com/jslirola/tutorial-php/pulls) si has programado algo.