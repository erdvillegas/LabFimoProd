<?php
//Muestra datos de la brigada
/**************Datos basico*******************************************/
require_once('controles_mysql.php');
require_once('estilos.css');
require_once('estilos.php');
require_once('genera_log.php');

if (!isset($_SESSION['User'])) { 
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{

/**************Datos basico*******************************************/


function brigadas ($d,$h) {
$sql="SELECT *
FROM brigada where hora_clase='$d' AND no_brigada='$h'";
		$brigadas =array();
		$result	= mysql_query($sql);
		$i=0;
		while ($row = mysql_fetch_object($result)){
		$brigadas[$i]=$row;
		$i++;
		}
		return $brigadas;
		}

function imprime ($d,$ho)
{
	$brigadas = brigadas($d,$ho);
print"<table border='2' class='infot' align ='center'>";
print"<tr>";
print"<td>";
print"<p><strong>Id</strong></p>";
print"</td>";
print"<td>";
print"<p><strong>Num de brigada</strong></p>";
print"</td>";
print"<td>";
print"<p><strong>Maestro</strong></p>";
print"</td>";
print"<td>";
print"<p><strong>D&iacute;a</strong></p>";
print"</td>";
print"<td>";
print"<p><strong>Inicio</strong></p>";
print"</td>";
print"<td>";
print"<p><strong>Fin</strong></p>";
print"</td>";
print"<td>";
print"<p><strong>Disponible</strong></p>";
print"</td>";
print"<td>";
print"<p><strong>Mensaje</strong></p>";
print"</td>";
print"<td>";
print"<p><strong>Prueba</strong></p>";
print"</td>";
print"</tr>";

/* Alimentar tabla*/
foreach ($brigadas as $key =>$brig){
print"<tr>";
print"<td>";
print$brig->id;
print"</td>";
print"<td>";
print$brig->no_brigada;
print"</td>";
/*Solo es para imprimir el nombre del maestro*/
/****************************************************************************/
$sql = "SELECT * FROM maestro where no_empleado= '$brig->no_empleado';";
$datos = mysql_query($sql);
$numDatos = @mysql_num_rows($datos); 
if ($numDatos <= 0) {
	print"<td>";
	 print "Maestro a&uacute;n no asignado";
	 print"</td>";
}else	{
while ($col=mysql_fetch_array($datos)){
print"<td>";
print $col['nombre'];
print"</td>";
	}
}
/*****************************************************************************/
/****Arreglo con el horario****/
$hr= $brig->hora_clase;

	function d ($h){
		if ($h==1 || $h==7 || $h==13 || $h==19 || $h==25 || $h==31 || $h==37 || $h==43 || $h==49)
		{
		return 'Lunes';	
		}else {
			if ($h==2 || $h==8 || $h==14 || $h==20 || $h==26 || $h==32 || $h==38 || $h==44 || $h==50)
		{
		return 'Martes';	
		}else {
			if ($h==3 || $h==9 || $h==15 || $h==21 || $h==27 || $h==33 || $h==39 || $h==45 || $h==51)
		{
		return 'Miercoles';	
		}else {
			if ($h==4 || $h==10 || $h==16 || $h==22 || $h==28 || $h==34 || $h==340 || $h==46 || $h==52)
		{
		return 'Jueves';	
		}else {
			if ($h==5 || $h==11 || $h==17 || $h==23 || $h==29 || $h==35 || $h==41 || $h==47 || $h==53)
		{
		return 'Viernes';	
		}else {
			if ($h==6 || $h==12 || $h==18 || $h==24 || $h==30 || $h==36 || $h==42 || $h==48 || $h==54)
		{
		return 'Sabado';	
		}
		}
		}
		}
		}
		}
	}
print"<td>";
print d($hr);
print"</td>";
/****Arreglo con el horario****/
print"<td>";
print$brig->hora_inicio;
print"</td>";
print"<td>";
print$brig->hora_fin;
print"</td>";
if (($brig->disponibilidad)==1){
print"<td>";
print "Disponible";
print"</td>";
/*Imprime el letrero de disponible o no */
}else {
print"<td>";
print "No Disponible";
print"</td>";	
}
/***************************************/
print"<td>";
print$brig->mensaje;
print"</td>";
print"<td>";
print$brig->plan;
print"</td>";
print"</tr>";
}
print"</table>";
}
}
?>

