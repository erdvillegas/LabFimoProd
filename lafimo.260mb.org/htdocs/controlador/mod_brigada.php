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
$bri=$_GET['brig'];     //Clave clase
$br=$_GET['no_brig'];  //Numero de brigada
$tpo=$_SESSION['cta']; //Tipo de maestro
print "<title>Usuario:"." ".$b."</title>";
print "<h1><p align='center'>Datos actuales</p></h1>";
imprime($bri,$br);
print "<br>";
/****Datos principales**********************************/

$sql = "SELECT * FROM brigada WHERE no_brigada = '$br' ";
$datos = mysql_query($sql); 
$numDatos = @mysql_num_rows($datos);
if ($numDatos <= 0) {
	echo "No hay datos disponibles";}
else {
	while ($col=mysql_fetch_array($datos))
	    {
$brigada = $col['no_brigada'];
$maestro = $col['no_empleado'];
$hora = $col['hora_clase'];
$inicio = $col['hora_inicio'];
$fin = $col['hora_fin'];
$disponible= $col['disponibilidad'];
$msj = $col['mensaje'];
$plan = $col['plan'];               
	
print "<p>";
	print "<form id='form1' name='form1' method='post' action='r_modbrigada.php?hora=$bri&brigada=$brigada'>";
	print "<p>";
	print "<label>Brigada";
	print "<input type='text' name='brigada'  value ='$brigada'title='N&Uacute;mero de brigada'/>";
	print "</label>";
    print "<label>";
    print " Disponibilidad ";
    print "<select name='disponible' title='Disponibilidad de la brigada' >"; 
    print "<option value='1' selected='selected'>DISPONIBLE</option>";
    print "<option value='0' selected='selected'>NO DISPONIBLE</option>";
    print "</select>";		
	print "</label>";
	print "</p>";
	print "<br>";
	print "<label>Maestro";
    print "<input type='text' name='maestro' title='N&Uacute;mero de empleado' value =' $maestro'/>";
    
	print "</p>";
  	print "<p>";
    print "<label> Plan";
    print "<input type='text' name='plan' title='Plan de estudios' align='center' value ='$plan'  />";
    print "</label>";
	print "</p>";
  	print "<p>";
    print "<label>Mensaje ";
    print "<input type='text' name='msj'  value ='$msj' title='Mensaje al grupo' align='center'>";
    print "</label>";
	print "</p>";
  	print "<label></label>";
    print "<label>";
	print "<label></label>";
    print "<label></label>";
    print "<label></label>";
    print "<p>";
	print "<input name='Submit' type='submit' accesskey='E' value='Enviar' />";
	print "</form>";
	
	//Si es estandar lo mando a la pagina estandar sino lo mando a la de administrador
    if ($_SESSION['cta']=='mae')
	{
	print "<ul class=dropdown dropdown-horizontal>";
			print "<li><a href ='r_brigadas_mes.php?brig=$bri'>Cancelar</a></li>";
			
		print "</ul>";
	
	//print "<p><a class ='agregar' href ='r_brigadas_mes.php?brig=$bri'>Cancelar</a></p>";
	}
	
	else {
	print "<ul class=dropdown dropdown-horizontal>";
			print "<li><a href ='r_brigadas.php?brig=$bri'>Cancelar</a></li>";
			
		print "</ul>";
	}
	print "</p>";
    print "<p>&nbsp;</p>";
	}
}
}
?>