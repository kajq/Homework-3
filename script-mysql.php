<?php
$mysqli = new MySQLi("localhost", "admin","123", "userdb");
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
				. ") " . $mysqli -> mysqli_connect_error());
		} else {
			echo "Conexión establecida..." . "\n";

			$output = $argv[1];//nombre archivo csv
			$newfile=fopen($output.'.txt','w');

			$consulta=mysqli_query($mysqli,"SELECT * FROM users");
		    while($arreglo=mysqli_fetch_array($consulta)){
		    	fwrite($newfile, $arreglo[0] . " , " . $arreglo[1] . " , " . $arreglo[2] . " , " . $arreglo[3] . "\r\n");
			}
			echo "Tu archivo se ha guardado con el nombre: " . $output;
			fclose($newfile); 	
		}
?>