<?php
/************************Datos basicos ******************************/
require_once('controles_mysql.php');
require_once('estilos.css');
require_once('genera_log.php');
require_once('estilos.php');

if (!isset($_SESSION['User'])) { 
require_once('genera_log.php');
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{
$b=$_SESSION['User'];
print "<title>Usuario: ".$b."</title>";
/************************Datos basicos ******************************/

	/*****Extraer practicas*******************************************/
	function pracctica () {			
	$sql="SELECT * FROM practica";
	$practica =array();
	$result	= mysql_query($sql);
	$tot =mysql_num_rows($result);
	$numDatos = @mysql_num_rows($result);
	$i=0;
	while ($row = mysql_fetch_object($result)){
	$practica[$i]=$row;
	$i++;
	}
	return $practica;
	}
	}
	/*****Extraigo las fechas*******************************************/
	$practica = pracctica();
	foreach ($practica as $key =>$pra){
	$prac=$pra->no_practica;     //Recivo el numero de la practica
	$d=$pra->disponible;		//Disponibilidad
	$in=$pra->f_inicio;        //Recupero la fecha de inicio
	$fi=$pra->f_fin;          //Recupero la fecha final
	$re =date("Y-m-d");	     //Fecha real
	
	/*****Control de apertura y cierre de practicas***************************/	
		//Defino la zona horaria
		//Si la fecha real es mayor o igual que la de inicio, abro la practica 
		if ($re>=$in) {
		$sql = "UPDATE  practica SET disponible=1, mensaje='Apertura automatica - Inicio de la practica' WhERE  no_practica=$prac";
		mysql_query($sql); 
		}
		
		//Si la fecha final es mayor o igual que la real, cierro la practica 
		if($re>$fi){
		//Defino la zona horaria
		date_default_timezone_set('America/Monterrey');
		$sql = "UPDATE  practica SET disponible=0, mensaje='Cierre automatico - Termino la practica' WhERE  no_practica=$prac";
		mysql_query($sql); 
		}
		}
				
	/*****Cierro practia si ya termino***************************/
	
?>