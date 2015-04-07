<?php
/**Datos basicos***************************************************/
require_once('estilos.css');
require_once('controles_mysql.php');
require_once('muestra_dtos.php');
require_once('genera_log.php');

if (!isset($_SESSION['User'])) { 
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{
$b = $_SESSION['User'];
$tpo=$_SESSION['cta'];
print "<title>"."Usuario:"." ".$b."</title>";
/**Datos basicos***************************************************/

/***Valida el paswword anterior*************************************************/		
/**********************Recivo datos********************************/
$ant  	 	 = 		$_POST['ant'];		 	       //Recivo el psw anterior
$nva	 	 =   	$_POST['nva'];                //Recivo el psw nuevo
$con	 	 =		$_POST['con'];        	 	//Recivo la confirmacion del psw

/**********************Recivo datos********************************/

/***************Fumion que valida el psw***************************/
		//$tb  ->Tabla
	   //$us   ->Usuario
	  //$psq   ->Pasword
	 //$at	   ->Atributo
	 
		function val($tpo){
		global $b, $ant;
		if($tpo=='estu'){
		$consulta="SELECT * FROM estudiante WhERE matricula=$b AND pas_e=$ant";
		return $consulta;
		}else {	$consulta="SELECT * FROM maestro WhERE no_empleado=$b AND pas_m=$ant";
		return $consulta;}
		}
/***************Fumion que valida el psw***************************		
		
/***Valida el paswword anterior*************************************************/		
	function	conf($t){
		$q=val($t);
		$datos = mysql_query($q); 
		$numDatos = @mysql_num_rows($datos); 
		if ($numDatos <= 0) { 
		return 0;} else { return 1;}
		}
		
		
/**********Actualizo los datos***************************************/	


if($nva==$con){
$c=conf($tpo);
if($tpo=='estu')
{
//Si cuenta es estudiante
if ($c==1){
$sql = "UPDATE estudiante  SET pas_e =$nva WHERE matricula = $b;";	
if(mysql_query($sql)){
print "<p class='error'>Tu password se modifico correctamente</p>";
print "<p class='error'>Es nescesario volver a loguearse</p>";
echo "<meta http-equiv='Refresh' content='3;url=../index.php'>";
}else { print "<p class='error'>Un error ocurrio</p>";}
}else{
print "<p class='error'>El password anterior no es correcto</p>";
echo "<meta http-equiv='Refresh' content='2;url=camb_psw.php'>";
}
}//Si es maestro
else{
$sql = "UPDATE maestro  SET pas_m =$nva WHERE no_empleado = $b;";	
if(mysql_query($sql)){
print "<p class='error'>El password se modifico correctamente</p>";
print "<p class='error'>Es nescesario volver a loguearse</p>";
echo "<meta http-equiv='Refresh' content='3;url=../index.php'>";
}
}
}else{
Print "<p class='error'>No coinciden los passwors <br>Vuelva a intentar</p>";
echo "<meta http-equiv='Refresh' content='2;url=camb_psw.php'>";
}
}


?>