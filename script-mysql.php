<?php
$mysqli = new MySQLi("localhost", "admin","123", "userdb");
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
				. ") " . $mysqli -> mysqli_connect_error());
		} else {
			echo "Conexión establecida..." . "\n";

			$consulta=mysqli_query($mysqli,"SELECT * FROM users");
			    while($arreglo=mysqli_fetch_array($consulta)){
			    	echo $arreglo[0] . " | " . $arreglo[1] . " | " . $arreglo[2] . " | " . $arreglo[3] . "\n";
				}
		}
?>