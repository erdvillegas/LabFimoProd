<?php 
/************Datos Basicos***************************************************/
require_once('controles_mysql.php');
require_once('estilos.css');
require_once('genera_log.php');
require_once('estilos.php');

print "<br>";
//Este documento se para modificar las brigadas, Solo para maestro administrador


if (!isset($_SESSION['User'])) { 
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{
$b = $_SESSION['User'];
print "<title>Usuario:"." ".$b."</title>";
/************Datos Basicos***************************************************/

$bri=$_GET['brig']; 

$sql = "SELECT * FROM brigada WHERE hora_clase = '$bri' AND no_empleado='$b' AND lleno=0";
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
	print "<form id='form1' name='form1' method='post' action='recive_adbrigada.php?hora=$bri'>";
	print "<p>";
	print "<label>Brigada";
	print "<input type='text' name='brigada'  value ='$brigada'title='N&Uacute;mero de brigada'/>";
	print "</label>";
    print "<label>";
    print " Disponibilidad ";
	/*************************************************************************************/
	/**Muestra la situacion de la brigada**/
	if(($disponible)==1)
    {
     print "<select name='disponible' title='Disponibilidad de la brigada' >"; 
     print "<option value='1' selected='selected'>DISPONIBLE</option>";
     print "</select>";
	}else{
	print "<select name='disponible' title='Disponibilidad de la brigad'  >"; 
    print "<option value='0' selected='selected'>NO DISPONIBLE</option>";
      
    print "</select>";		
	}
	/************************************************************************************/
	print "</label>";
	print "</p>";
	print "<p>";
    print "<label></label>";
    print "<label></label>";
	
	/*Mostrar maestro*****************************************************************************/
	$nem = "SELECT * FROM maestro WHERE no_empleado = '$maestro'";
	print "<br><br>";
	$tdm = mysql_query($nem); 
	$nd = @mysql_num_rows($tdm);
	if ($nd <= 0) {
		print $nd;
		print "<label>Maestro";
    	print "<input type='text' name='maestro' title='N&Uacute;mero de empleado' value =' hay datos disponibles Solo: $maestro'/>";
    	print "</label>";
    }
	else {
	while ($m=mysql_fetch_array($tdm))
	    {
	print "<label>Maestro";
	$mae= $m['nombre'];
    print "<input type='text' name='maestro' title='N&Uacute;mero de empleado' value = '$mae'/>  ";
    print "</label>";	
		}
	}
	/*Mostrar maestro*****************************************************************************/
	print "<label>Hora de inicio";
  	print "<input type='text' name='inicio' value = '$inicio' />";
  	print "</label>";
  	print "<label>Hora de termino";
  	print "<input type='text' name='fin' value ='$fin'/>";
  	print "</label>";
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
	print "</form>";
	
	print "<ul class=dropdown dropdown-horizontal>";
			print "<li><a href ='mod_brigada.php?brig=$bri&no_brig=$brigada?'>Modificar</a></li>";
		print "</ul>";
		
			print "<ul class=dropdown dropdown-horizontal>";
			print "<li><a href=r_brigadas_mes.php class=dir>Regresar</a></li>";
		print "</ul>";
	
	//print "<p><a class ='agregar' href ='mod_brigada.php?brig=$bri&no_brig=$brigada?'>Modificar</a></p>";
	$_SESSION['cta']='mae';
	print "</p>";
    print "<p>&nbsp;</p>";
	if ($numDatos<=1){print "";}else{print "********************************************************************************************************************************************";}
	}
}
}
?>