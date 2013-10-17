/*
Copyright (C) 2013  Jose Miguel Colella

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>
*/

<?php

  /**
   * Este script sirve para cerrar la session con el servidor
   * @author Jose Miguel Colella <josecolella@correo.ugr.es>
   * @version 1.0
   *
   */

  //ini_set('display_errors', true);
  //error_reporting(E_ALL);
  session_start();

  // //Cerramos la session con el usuario
   if(isset($_SESSION['username']))
     unset($_SESSION['username']);

  //Cerramos la session completamente
  session_destroy();
  //Ahora solo con session_start podemos comenzar otra sesion

  //Redireccion a la pagina principal. El usuario tiene una sesion establecida
  $url = '../index.php';

  //Se va para la pagina principal despues de tener una cuenta
  //Cosa nueva
  header( "Location: $url" );
?>
