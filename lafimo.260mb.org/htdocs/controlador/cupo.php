<?php
/************************Datos basicos ******************************/
require_once('controles_mysql.php');
require_once('estilos.css');
require_once('genera_log.php');

if (!isset($_SESSION['User'])) { 
require_once('genera_log.php');
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh'content='4;url=../index.php'>";session_destroy();}

else{
$b=$_SESSION['User'];
print "<title>Usuario: ".$b."</title>";
/************************Datos basicos ******************************/

	/*****Extraer practicas*******************************************/
	function pracctica_cs() {			
	$sql_cs="SELECT * FROM practica";
	$pracctica_cs =array();
	$result_cs	= mysql_query($sql_cs);
	$tot_cs =mysql_num_rows($result_cs);
	$numDatos_cs = @mysql_num_rows($result_cs);
	$i=0;
	while ($row_cs = mysql_fetch_object($result_cs)){
	$pracctica_cs[$i]=$row_cs;
	$i++;
	}
	return $pracctica_cs;
	}
	}

	/*****Extraigo las cantidades Mesas y estudiantes*******************************************/
	$pracctica_cs = pracctica_cs();
	foreach ($pracctica_cs as $key =>$pra){
	$prac=$pra->no_practica;     //Recivo el numero de la practica
	$d=$pra->disponible;		//Disponibilidad
	$m=$pra->mesas;			   //Mesas disponibles
	$e=$pra->estp_mesa;	      //Estudiantes por mesa
	/*****Control de apertura y cierre de practicas***************************/	
	
	$to= $m*$e;			//Cumpo de la practica
	
	$sq_c="SELECT gmatricula FROM grupo_pra WhERE no_gpractica=$prac";
	$re	= mysql_query($sq_c); 
	$tot_e =mysql_num_rows($re);    //Total de estudiantes
	
	$sql = "DELETE FROM grupo_pra WHERE mesa>$m";
	mysql_query($sql);
	
	
	}
?>