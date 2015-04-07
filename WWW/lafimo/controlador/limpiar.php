<style>p{text-align:center;}</style>
<?php

//Este documento muestra las transaciones de los usuarioes en el sistema
/************************Datos basicos ******************************/
require_once('controles_mysql.php');
require_once('estilos.css');
require_once('genera_log.php');
require_once('estilos.php');

if (!isset($_SESSION['User'])) { 

print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{
$b=$_SESSION['User'];
$tpo=$_SESSION['cta'];
print "<title>Usuario: ".$b."</title>";
if($tpo!='masu'){
print "<p align ='center' class='error'>No cuentas con los suficientes privilegios <br>para ver esta p&aacute;gina</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{
/************************Datos basicos ******************************/

$ps  = $_GET['psw'];
$mae =  $_GET['mae'];

	//Funcion que valida que si tenga privilegios
	function val($us, $pw){
	$sql="SELECT * FROM maestro Where no_empleado=$us AND pas_m =$pw AND admin=2";
	$result	= mysql_query($sql);
	$tot =mysql_num_rows($result);
	if ($tot<=0){
	return 0;
	}else{return 1;}
	}
		
	$r=val($b,$ps);
	if($r==1){
	
	//Si es Superusario vacio todas las tablas, escepto los registros de maestro SuperUsuario
	
	$brigada = "TRUNCATE brigada";
	$e_brigada= mysql_query($brigada); 
	$estu 	 ="TRUNCATE estudiante";
	$e_estu= mysql_query($estu); 
	$gru 	 ="TRUNCATE grupo_pra";
	$e_gru= mysql_query($gru); 
	$log	 ="TRUNCATE log";
	$e_log= mysql_query($log); 
	$pra	 ="TRUNCATE practica"; 
	$e_pra= mysql_query($pra); 
	if (mae==1){
	$su="DELETE FROM maestro WHERE admin !=2";
	$e_su= mysql_query($su); 
	}
	
	echo "<p class= 'error'>El sistema se ha reiniciado correctamente<br> Es necesario volver a loguearte</p>"; 
	echo '<meta http-equiv="Refresh" content="3;url=../index.php"> ';
	session_destroy();
	}else {
	echo "<p class= 'error'>Has intentado realizar una accion no permitida<br></p>"; 
	echo '<meta http-equiv="Refresh" content="3;url=../index.php"> ';
	session_destroy();
	}
	
		
		
	/*****Limpiar automaticamente***************************/
}
}


?>