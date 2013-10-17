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
			include_once('DBInteraction.php');

		/**
		 * La clase de Commentary gestiona todo relacionado
		 * con los comentarios de la noticia destacada de la sección
		 *
		 * @author Jose Miguel Colella <josecolella@correo.ugr.es>
		 * @version 1.0
		 */
		class Commentary extends DBInteraction
		{
			/**
			 * El metodo de insertComentary inserta el comentario
			 * que esta compuesto por el nombre de usuario, fecha y tiempo del
			 * comentario, y texto del comentario
			 *
			 * @param  string $username       Nombre de Usuario
			 * @param  dateTime $dateT          Tiempo cuando se hizo el comentario
			 * @param  string $commentaryText El texto del comentario
			 * @return Comentario agregado en la base de datos
			 */
			public function insertCommentary($username,$dateT,$commentaryText)
			{
				// "INSERT INTO `x1453965`.`Commentary` (`username`, `dateT`, `commentaryText`) VALUES (\'josecolella\', \'2013-06-18 05:26:31\', \'Hello\');";
				$insertSQL = "INSERT INTO `Commentary`(`username`, `dateT`, `commentaryText`) VALUES (\"$username\",\"$dateT\",\"$commentaryText\")";
				$result = $this->connection->query($insertSQL);
			}


		/**
		 * Metodo usado para ver el contenido de la base de datos
		 * @return La base de datos entera
		 */
		public function echoDataBase()
		{
			$query = "SELECT * FROM `Commentary`";

			$result = $this->connection->query($query);

			while ($row = $result->fetch_assoc())
			{
				echo '<section class="leftNewsGrouping">';
				echo '<article class="oldCommentary">';
				echo '<p><strong>Comentario: </strong></p>';
				echo '<p>Usuario: '.$row["username"].'</p>';
				echo '<p>Día y hora: '.$row["dateT"].'</p>';
				echo '<p><em>'.$row["commentaryText"].'</em></p>';
				echo '</article>';
				echo '</section>';

			}
		}


	}



	?>