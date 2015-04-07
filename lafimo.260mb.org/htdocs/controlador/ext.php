<?php 
//Este documento se para modificar las brigadas, Solo para maestro administrador

/****Datos principales**********************************/
require_once('controles_mysql.php');
require_once('muestra_dtos.php');
require_once('estilos.css');
require_once('estilos.php');
require_once('genera_log.php');
print "<br>";


if (!isset($_SESSION['User'])) { 
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{
$b = $_SESSION['User'];
$tpo=$_SESSION['cta']; //Tipo de maestro
print "<title>Usuario:"." ".$b."</title>";
print "<h1><p align='center'>Datos actuales</p></h1>";
print "<br>";
/****Datos principales**********************************/

		print "<script> 
		var dir='as_es.php';
		var m=window.prompt('Matricula'); 
		var p=window.prompt('Num de Practica'); 
		var mt=window.prompt('Motivo'); 
		var mtv='?mat='+m+'&pr='+p+'&mto='+mt; 
		location=dir+mtv;
		document.write('Location <b>href</b>: ' + location.href + m + '<br>');
		</script>";
}
?>