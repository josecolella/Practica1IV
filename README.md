IV: Practica 1
==============

Autor: Jose Miguel Colella
-------------------

##Licencia de la aplicación: [GPLv3](http://www.gnu.org/licenses/)


En este documento hablo sobre el despliegue de una aplicación PHP,
en el PaaS llamado OpenShift de RedHat. Dentro de dicha aplicación
agrego funcionalidad de trabajar con la base de dato *MySQL*, y usando
*phpmyadmin* para gestionar las bases de datos de la aplicación.

Los pasos para crear y desplegar dicha aplicación en OpenShift sigue los
siguientes puntos:

> 1. Registrar la aplicación usando la interfaz web de OpenShift ó usando
> la herramienta **rhc**.
> 2. Agregar funcionalidades y herramientas adicionales que requiere la aplicación.
> Por ejemplo, bases de datos relacionales, no relaciones, interfaces web para las
> bases de datos, sistemas de integración continua, etc...
> 3. Después de registrar la aplicación, OpenShift proportica una URL donde
> que indica donde esta localizado el repositorio git remoto. Usando git, hacemos
> hacemos una copia local para poder almacenar y codificar la aplicación que se
> visualiza en una dirección proporcionada por OpenShift.
> 4. (Opcional) Si la aplicación usa base de datos, hay que configurar las bases de
datos y la conexión a las mismas.
> 5. Codificación de la aplicación, y el uso de git para subir la aplicación al
> repositorio de OpenShift.
> 6. Visualizar la aplicación y ver que todo funciona bien.
> 7. Si se quiere almacenar el codigo en github para poder trabajar
> con otros, agregamos una repositorio remoto adicional.
> Subimos el codigo a Github, donde la gente puede contribuir, y puedes
> compartir tu codigo.
> 8. Agregamos una licencia de software que clarifica como se puede trabajar
con el código creado.

A continuación detallo los pasos previamente vistos.

* Para registrar la aplicación he optado por usar la interfaz web que proporciona
OpenShift. OpenShift proporciona runtime para una multitud de lenguajes script.
He seleccionado PHP 5.3 para que pueda ejecutar mi aplicación.
Como podemos ver en la siguiente imagen, he registrado la aplicación con
el nombre http://periodico-ivblog.rhcloud.com/.

!["Registración de una aplicación"](https://raw.github.com/josecolella/GII-2013/master/Screenshots/Practica1Photos/Screen%20Shot%202013-10-16%20at%2012.49.18.png)


* A continuación, OpenShift nos habilita agregar herramientas, como bases de datos
a nuestra aplicación. En mi caso, he agregado la gestor de bases de datos, *MySQL*,
y la herramient web *phpyadmin* para facilitar la creación de las bases de datos de la aplicación.

En la siguiente imagen, vemos la agregación de *phpmyadmin*.

!["Foto en la cual se ve la addición de phpmyadmin como herramienta"](https://raw.github.com/josecolella/GII-2013/master/Screenshots/Practica1Photos/Screen%20Shot%202013-10-15%20at%2023.14.32.png)

*Una cosa muy importante de tener en cuenta es que cuando se agregan estan dos herramientas,*
*OpenShift proporciona información sobre autentificación para acceso a dichas herramientas*

Como podemos ver en las siguientes imagenes, OpenShift proporciona el nombre de usuario y contraseña
para poder acceder a *MySQL* y a *phpmyadmin*.

En la siguiente imagen, vemos como OpenShift ha proporcionado los credenciales para poder acceder a *MySQL*.

!["Credenciales para poder acceder a MySQL"](https://raw.github.com/josecolella/GII-2013/master/Screenshots/Practica1Photos/Screen%20Shot%202013-10-15%20at%2023.13.32.jpg)

Para *phpmyadmin*, emplea el mismo mecanismo, como podemos ver en la siguiente imagen.

!["Credenciales para acceder a phpmyadmin"](https://raw.github.com/josecolella/GII-2013/master/Screenshots/Practica1Photos/Screen%20Shot%202013-10-15%20at%2023.14.48.jpg)

Ya integrados estas herramientas dentro de nuestra aplicación, el próximo
paso es crear las bases de datos. Usando *phpmyadmin* podemos crear las bases
de datos con facilitad, definiendo detallamente con una interfaz las tablas que
componen nuestra aplicación.

Por ejemplo, para el periodico digital que se esta desplegando se requieren
tres tablas; una que contenga a los usuarios que se han registrado, otra para
los comentarios que dejan los usuarios, y finalmente una tabla que contiene
las noticias de última hora.

Como podemos en la siguiente imagen, *phpmyadmin* proporciona una interfaz
robusta para un desarrollo ágil.


* Ya podemos trabajar sobre la aplicación registrada usando el comando *git*.
OpenShift proporciona un URL en la cual almacena el codigo que desplega.
Usando el siguiente comando, he podido crear una copia local del codigo:

```sh
git clone ssh://525dae914382ec45c2000090@periodico-ivblog.rhcloud.com/~/git/periodico.git/
```

Dentro de dicho dicho directorio, en el subdirectio llamado `php`, hay un fichero index.php.
Este es el fichero que ejecuta OpenShift cuando se hace un **git push**.
La aplicación que se despliega se almacena aquí.

* Este paso es el más importante para un correcto despliegue en OpenShift.
Después de tener la aplicación ya codificada, la parte que interactua con las
bases de datos *MySQL* tiene que ser configurada correctamente con el OpenShift.
Para que la aplicación pueda interactuar con el *MySQL* que esta en el runtime de
OpenShift, hay que obtener información sobre variables del entorno.

OpenShift proporciona acceso remoto al servidor. Usando acceso remoto, y
ejecutando el siguiente comando:

```sh
env | grep OPENSHIFT | grep SQL
```

podemos conocer la información del entorno necesaria para conectarse al servidor *MySQL*.

Por ejemplo, en la aplicación que he desplegado, he usado la clase *mysqli* para
poder conectarme a la base de datos. La conexión se hace usando los siguientes
parametros en el constructor:

```php
<?php
  connection = new mysqli(
    $_ENV['OPENSHIFT_MYSQL_DB_HOST'],
    $_ENV['OPENSHIFT_MYSQL_DB_USERNAME'],
    $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'],
    $_ENV['OPENSHIFT_APP_NAME'], // By default, app name == db name
    $_ENV['OPENSHIFT_MYSQL_DB_PORT'],
    $_ENV['OPENSHIFT_MYSQL_DB_SOCKET']
  );
?>
```

Los parametros en el constructor garantizan que el PHP lea las
variables del entorno OpenShift para poder conectarse e interactuar con
las bases de datos.

A continuación se puede ver que se ha conectado correctamente, ya que puede
visualizar la página de administración de las noticias de última hora,
y además que podemos hacer operaciones CRUD sobre dichas noticias.

!["Foto de la página de administración"](https://raw.github.com/josecolella/GII-2013/master/Screenshots/Practica1Photos/Screen%20Shot%202013-10-16%20at%2012.00.49.png)



Este paso me tomo tiempo en completar, pero después de leer [este][ref1] enlace y [este][ref2],
se me aclaro en como OpenShift trabaja con las bases de datos.


* Después de hacer toda la codificación de la aplicación y la configuración
para conectarse a las bases de datos, subimos la aplicación usando la combinación
de los siguientes comandos.

```sh
git add .
git commit -m "Terminado la Practica 1"
git push
```

Lo que me fue interesante es cuando se ejecutada el *git push*,
que como vemos en la siguiente imagen, ha primero desactivado
los servicios *php*, *mysql*, *phpmyadmin*. Después los ha reactivado y puesto
el codigo en el branch `master`.

!["Resultado de git push"](https://raw.github.com/josecolella/GII-2013/master/Screenshots/Practica1Photos/Screen%20Shot%202013-10-16%20at%2009.07.31.png)


* Visualizamos la aplicación accediendo a la dirección http proporcionada por
OpenShift cuando se ha registrado la aplicación.
En mi caso la aplicación se accede en la dirección:
http://periodico-ivblog.rhcloud.com/

Como vemos en la siguiente imagen, la aplicación se ejecuta con éxito.

!["Imagen de la aplicación"](https://raw.github.com/josecolella/GII-2013/master/Screenshots/Practica1Photos/Screen%20Shot%202013-10-16%20at%2011.47.46.png)

* Para poder almacenar el codigo a Github, hay que agregar otro destino remoto
en el cual se almacenará el codigo. Hay que recordar que el destino *remote*
lo tiene reservado el repositorio git que proporciona OpenShift.
Usando el siguiente comando:

```sh
git remote add github git@github.com:josecolella/Practica1IV.git
git push github master
```
y habiendo creado previamente un repositorio en Github, se almacena el
codigo de nuestra aplicación con carpetas específicas de OpenShift en Github.

Ya podemos compartir nuestro codigo y trabajar en conjunto a otras personas.

El código de la aplicación se puede visualizar en el siguiente enlace:
https://github.com/josecolella/Practica1IV

* En el aspecto de licencias, hay muchas licencias de software disponible,
desde licencias permisivas como MIT y Apache a las que son copyleft y los
pioneros de software libre GPLv3 (GNU).

Para esta aplicación he optado por una licencia GPLv3 debido a que quiero que
futuras contribuciones o forks que usen mi código como fundación se reincorporen
en la comunidad para poder aprender más sobre como mejorar un aspecto de
la aplicación.

Para aplicar la licencia sobre el proyecto hay que crear un fichero `LICENSE`,
que contenga la licencia. Además, al comienzo de los ficheros de código hay
que insertar el siguiente texto.

```sh
> Copyright (C) 2013  Jose Miguel Colella

> This program is free software: you can redistribute it and/or modify
> it under the terms of the GNU General Public License as published by
> the Free Software Foundation, either version 3 of the License, or
> (at your option) any later version.

> This program is distributed in the hope that it will be useful,
> but WITHOUT ANY WARRANTY; without even the implied warranty of
> MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
> GNU General Public License for more details.

> You should have received a copy of the GNU General Public License
> along with this program.  If not, see <http://www.gnu.org/licenses/>
```
###Conclusión

Después de haber almacenado la aplicación en OpenShift, me he quedado con una
visión positiva del despliegue de mi aplicación. Aunque tuve un poco de dificultad
en la configuración con las bases de datos *MySQL* de OpenShift, el despliegue
se ha podido hacer en relativamente poco tiempo. OpenShift me ha facilitado un
monton la addición de herramientas a mi applicación en poco tiempo, reduciendo
el tiempo que hubiera usado configurando el sistema, e invertirlo en
la codificación de la aplicación. En verdad usaré dicho PaaS para futuros proyectos,
y entiendo ya porque cloud computing esta tan popular con desarrolladores de software.








[ref1]: https://www.openshift.com/blogs/manipulate-your-paas-database
[ref2]: http://wogan.wordpress.com/2013/08/13/zero-to-php-mysql-on-redhat-openshift/






