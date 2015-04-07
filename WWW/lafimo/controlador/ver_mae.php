<style>
#mod{color:#FFFFFF;
text-align:center;}

</style>
<?php
/************************Datos basicos ******************************/
require_once('controles_mysql.php');
require_once('estilos.css');
require_once('genera_log.php');
require_once('controles_pra.php');
require_once('estilos.php');

if (!isset($_SESSION['User'])) { 
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{
$b=$_SESSION['User'];
print "<title>Usuario: ".$b."</title>";
/************************Datos basicos ******************************/
/************************Validador***********************************/
function validar()
{
if ($_POST==null){
	
	//print "Es null";
    throw new Exception("null");
	return true;
	}
	else { return null;}
}

try
{	
	validar();	
}
catch(Exception $e)
{
$_POST['tipo']="no_empleado";
$_POST['ord']="ASC";
}
/************************Validador***********************************/


	//Menu
	print	"<ul class=dropdown dropdown-horizontal>";
	print "<li><p = align='center'><a href=../vista/maestros_ad.php class=dir>Regresar</a></p>";
	print"</ul>";
	
	print "<form align='center' id='ordenar' name='ordenar' method='post' action='ver_mae.php'>";
	print "<label>Ordenar por";
    print "<select name='tipo' size='1'>";
	print "<option value='no_empleado'>N&uacute;mero de empleado</option>";
	print "<option value='nombre'>Nombre</option>";
	print "</select>";
    print "</label>";
	$x=$_POST['tipo'];
	
	print "<label> Ordenar:";
	print "<select name='ord' size='1'>";
    print "<option value='ASC' selected='selected'>Ascendente</option>";
    print "<option value='DESC'>Descendente</option>";
    print "</select>";
    print "</label>";
	print "<br><br><input name='Submit' type='submit' accesskey='O' value='Ordenar' />";
	print "</form>";
	print "</label>";
	$y=$_POST['ord'];
		
	
	function maestro () {
	global $x, $y;				
	$sql="SELECT * FROM maestro ORDER BY $x $y";
	$maestro =array();
	$result	= mysql_query($sql);
	$tot =mysql_num_rows($result);
	print "<h1><p align='center' stong>Total de maestros: ".$tot."</p></h1>";
	$numDatos = @mysql_num_rows($result);
	$i=0;
	while ($row = mysql_fetch_object($result)){
	$maestro[$i]=$row;
	$i++;
	}
	return $maestro;
	}
		

	$maestro = maestro();
	global $numDatos;
	
	print"<table border='2' class='infot' align='center'>";
	print"<tr>";
	print"<td>";
	print"<p align='center'><strong>N&uacute;mero de empleado</strong></p>";
	print"</td>";
	print"<td>";
	print"<p align='center'><strong>Nombre</strong></p>";
	print"</td>";
	print"<td>";
	print"<p align='center'><strong>Mensaje</strong></p>";
	print"</td>";
	print"<td>";
	print"<p align='center'><strong>Password</strong></p>";
	print"</td>";
	print"<td>";
	print"<p align='center'><strong>Privilegios</strong></p>";
	print"</td>";
	print"<td>";
	print"<p align='center'><strong>Detalles </strong></p>";
	print"</td>";
	print"</tr>";

	/* Alimentar tabla*/
	foreach ($maestro as $key =>$mae){
	print"<tr>";
	print"<td>";
	$maes=$mae->no_empleado;
	print "<p align='center'>".$mae->no_empleado."</p>";
	print"</td>";
	print"<td>";
	print "<p align='center'>".$mae->nombre."</p>";
	print"</td>";
	print"<td>";
	print "<p align='center'>".$mae->mensaje."</p>";
	print"</td>";
	print"<td>";
	print "<p align='center'>".$mae->pas_m."</p>";
	print"</td>";
	
	//h
	/****Muestro el letrero de los privilegios*****/
	switch($mae->admin){
	case 0: {
				print "<td>";
				print "<p align='center'>Maestro est&aacute;ndar</p>";
				print "</td>";
			}
	break;
	case 1: {
				print "<td>";
				print "<p align='center'>Maestro administrador</p>";
				print "</td>";
			}
	break;
	case 2: {
				print "<td>";
				print "<p align='center'>Maestro Superusuario</p>";
				print "</td>";
			}
	break;

	default: {
				print "<td>";
				print "<p align='center'>No tiene privilegios</p>";
				print "</td>";
			}
	break;
	}
	
	/****Muestro el letrero de los privilegios*****/
	
	/****Opcion para modificar*****/
	print "<td>";
	print "<div='mod'><a href=../controlador/mod_mae.php?ne=$maes>Modificar</a></p>";
	print "</td>";
	/****Opcion para modificar*****/
	}
	print "</tr>";
	print"</table>";
	
}

?>