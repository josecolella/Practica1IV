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

//ini_set('display_errors', true);
//error_reporting(E_ALL);
        /**
         * Este script sirve para autentificarse en el sistema y comenzar
         * una sesión
         *
         * @author Jose Miguel Colella <josecolella@correo.ugr.es>
         * @version 1.0
         */
        session_start();
        include_once('UserVerification.php');

        $user = new UserVerification();
        $user->connect();
        $user->setUser();
        if($user->verifyUser()) {
        	if(strcasecmp($user->getUserName(), "Admin") == 0)
        		echo "<script>alert('Has sido autentificado!'); location.href='../admin.php';</script>";
        	else
        		echo "<script>alert('Has sido autentificado!'); location.href='../index.php';</script>";
          //Registramos la variable de usuario
          $_SESSION['username'] = $user->getUserName();
        }
        else
        	echo "<script>alert('Combinación de nombre de usuario y contraseña errónea.'); location.href='../index.php';</script>";

        $user->close();

?>
