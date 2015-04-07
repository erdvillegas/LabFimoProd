<!--
	Laboratorio Flexible:
	Es un Software diseñado para la fácil administracion de prácticas de laboratorio, el cuál le permite
	a los estudiantes inscribirse en una brigada (grupo) distinta para realizar la practica correspondiente
	cada semana.
	
	Autores:
	Erik Daniel Villegas Sánchez
	Marcro Antonio Ordoñez Contreras
	
	FIME, UANL.
	A 6 de Junio del 2012
	
-->



<?php
session_start();
print "<link rel='shortcut icon' href='../favicon.ico' />";
//Este documento genera el log de actividad de los usuarios

$usuario =$_SESSION['User'];
$ip=$_SERVER['REMOTE_ADDR'];
$historial =$_SERVER['REQUEST_URI'];
$fecha =date("y-m-d H:i:s");

print "<title>Usuario: ".$usuario."</title>";

		
/****************Guardo los datos*********************************************************************/
		function grabar_log($usuario,$ip,$historial,$fecha){
		$sql_insert="INSERT INTO log (id,usuario,ip,historial,fecha)
		VALUES (null,'$usuario','$ip','$historial','$fecha');";
		return mysql_query($sql_insert);
		}
		if(grabar_log($usuario,$ip,$historial,$fecha)){
		}
/****************Guardo los datos*********************************************************************/

?>
