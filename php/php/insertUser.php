<!--
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
-->

<?php

	// ini_set('display_errors', true);
	// error_reporting(E_ALL);
	/**
	 * Este script sirve para insertar un usuario dentro
	 * de una base de datos
	 *
	 * @author Jose Miguel Colella <josecolella@correo.ugr.es>
	 * @version 1.0
	 */
	session_start();

	include_once('UserVerification.php');

	$user = new UserVerification();
	$user->connect();
	$user->setInsertVariables();
	$user->insertUser();

  $_SESSION['username'] = $user->getUserName();

	$user->close();


	echo "<script>alert('Registración Completada'); location.href='../index.php';</script>";
	//Redireccion a la pagina principal. El usuario tiene una sesion establecida
	// $url = '../index.html';

	// //Se va para la pagina principal despues de tener una cuenta
	// //Cosa nueva
	// header( "Location: $url" );

	//Ademas despues de registrarse, se deberia desaparecer los botones
	//de registrarse e iniciar sesion, y se deberia poner un boton de cerrar sesion.

?>
