<?php
if ($argc < 7 )
{
    exit( "Este script requiere los siguientes parametros:
         \t 1. user -> usuario de la base de datos (admin)
		 2. pass -> contraseña para conectarse a la base de datos (123)
		 3. database -> nombre de la base de datos (userdb)
		 4. host -> nombre de host (localhost) 
		 5. table -> la tabla de la base de datos para leer (users)
		 6. output -> el archivo de salida (output.csv)" );
}
$mysqli = new MySQLi($argv[4], $argv[1],$argv[2], $argv[3]);
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
				. ") " . $mysqli -> mysqli_connect_error());
		} else {
			echo "Conexión establecida..." . "\n";

			$output = $argv[6];//nombre archivo csv
			$newfile=fopen($output.'.csv','w');

			$consulta=mysqli_query($mysqli,"SELECT * FROM $argv[5]");
		    while($arreglo=mysqli_fetch_array($consulta)){
		    	fwrite($newfile, $arreglo[0] . " , " . $arreglo[1] . " , " . $arreglo[2] . " , " . $arreglo[3] . "\r\n");
			}
			echo "Tu archivo se ha guardado con el nombre: " . $output;
			fclose($newfile); 	
		}
?>