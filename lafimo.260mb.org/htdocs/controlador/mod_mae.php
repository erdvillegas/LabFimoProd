<?php 

//Este documento se para modificar los datos del maestro
/************************Datos basicos******************************************/
require_once('controles_mysql.php');
require_once('controles_mysql.php');
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
print "<title>Usuario:"." ".$b."</title>";
/************************Datos basicos******************************************/
$ne=$_GET['ne']; //Recivo el número de empleado
$sql = "SELECT * FROM maestro WHERE no_empleado = '$ne'";
$datos = mysql_query($sql); 
$numDatos = @mysql_num_rows($datos);
if ($numDatos <= 0) {
	echo "No hay datos disponibles";}
else {
	while ($col=mysql_fetch_array($datos))
	    {
	$nombre = $col['nombre'];	//Nombre del maestro
	$admin 	= $col['admin'];
	$msj 	= $col['mensaje'];
	
	//Menu
	print	"<ul class=dropdown dropdown-horizontal>";
	print "<li><p = align='center'><a href=../vista/maestros_ad.php class=dir>Regresar</a></p>";
	print"</ul><br><br><br><br>";
	
	print "<p>";
	print "<form id='form1' name='form1' method='post' action='rec_modmae.php?ne=$ne'>";
	print "<p>";
	print "<table >";
	print "<tr>";
	print "<td>";
	print "Nombre";
	print "</td>";
	print "<td>";
	print "<input type='text' name='nom'  value ='$nombre' title='Nombre del empleado' size='40'/>";
	print "</td>";
	print "<tr>";
	print "<td>";
	print "Mensaje";
	print "</td>";
	print"<td>";
	print "<textarea name='msj' cols='33' rows='5'>".$msj."</textarea>";
	print "</td>";
	print "<tr>";
	print "<td>";
	print "Privilegios";
	print "</td>";
	print "<td>";
	
	/**opciones de privilegios**/
	print "<select name='admin' title='Privilegio' >"; 
	print "<option value='0' selected='selected'>Maestro est&aacute;ndar</option>";
	print "<option value='1'>Maestro administrador</option>";
	print "<option value='2'>Maestro superusuario</option>";
	print "</select>";
	/**opciones de privilegios**/		
			
	print "</td>";
	print "</tr>";
	print "</table>";
    
	}
	print "<table>";
	print "<tr>";
	print "<td>";
	print "&nbsp;<br><input name='Submit' type='submit' value='Actualizar' />";
	print "</form>";
	print "</td>";
	print "</tr>";
	print "<tr>";
	print "<td>";
	print "<form id='form1' name='elim' method='post' action='elim_mae.php?ne=$ne'>";
	print "<input name='Submit' type='submit' value='Eliminar' />";
	print "</form>";
	print "</tr>";
	print "</td>";	
	print "</table>";
}
}
?>