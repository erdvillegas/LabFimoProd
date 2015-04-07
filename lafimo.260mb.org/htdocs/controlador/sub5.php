<?php

/***Funcion para separar estudiantes********************/
	 	function sub_es($mat,$nom,$brig,$plan){
		$sql_insert="INSERT INTO estudiante (id,matricula,grupo,nombre,mensaje,pas_e,plan,medio_c,ord)
		VALUES (null,'$mat','$brig','$nom' ,null,'$mat','$plan',null,null);";
		return mysql_query($sql_insert);
		}
		
			
/***Funcion para separar estudiantes********************/		
require_once('controles_mysql.php');
require_once('estilos.css');
require_once('estilos.php');


	$ru		=$_GET['rut'];  //Ruta del archivo


    $archivo = fopen( "$ru", "rb" );
    // Leer la primera línea:
     $aDatos = fgetcsv( $archivo, 100, ";");
    //print_r( $aDatos );
    //echo "<br />";
    // Tras la lectura anterior, el puntero ha quedado en la segunda línea:
     $aDatos = fgetcsv( $archivo, 100, ";" );
    //print_r( $aDatos );
    //echo "<br />-------------------------------------<p />";
    // Volvemos a situar el puntero al principio del archivo:
    fseek($archivo, 0);
    // Recorremos el archivo completo:
     while( feof($archivo) == false )
     {
	 
     $aDatos = fgetcsv( $archivo, 100, ";");
	 $mat=$aDatos[0];
	 $nom=$aDatos[1];
	 $brig=$aDatos[2];
	 $plan=$aDatos[3]; //Cuando se configure el plan
	 //print $mat."<br>".$nom."<br>".$brig."<br>"."<br>";
	 
	if(sub_es($mat,$nom,$brig,$plan)){print "<h1>El estudiante. ".$nom." se cargo exitosamente</p>";}
	else{print "<h1>Un error ocurrio, contacte al administrador</p>";}
	}
	
	fclose( $archivo );
	echo '<meta http-equiv="Refresh" content="2;url=../vista/maestros_ad.php"> ';
	
?>