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
	 * Este script se usar para modificar las noticias de ultima hora
	 * @author Jose Miguel Colella <josecolella@correo.ugr.es>
	 * @version 1.0
	 */


	include_once('BreakingNewsDB.php');
	$breakingNews = new BreakingNewsDB();
	$breakingNews->connect();
	$breakingNews->deleteAllElements();
	$breakingNews->modifyStory();
	$breakingNews->close();

	$url = '../admin.php';

	header( "Location: $url" );


?>