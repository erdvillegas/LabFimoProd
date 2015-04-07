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
$_POST['tipo']="no_practica";
$_POST['ord']="ASC";
}
/************************Validador***********************************/
	print	"<ul class=dropdown dropdown-horizontal>";
	print "<li><p = align='center'><a href=../vista/maestros_ad.php class=dir>Regresar</a></p>";
	print"</ul>";
	
	
	print "<form align='center' id='ordenar' name='ordenar' method='post' action='repo_pra.php'>";
	print "<label>Ordenar por";
    print "<select name='tipo' size='1'>";
    print "<option value='no_practica' selected='selected'>N&uacute;mero de pr&aacute;ctica</option>";
	print "<option value='mesas'>Mesas disponibles</option>";
	print "<option value='estp_mesa'>Estudiantes por mesa</option>";
	print "<option value='f_inicio'>Fecha de inicio</option>";
	print "<option value='f_fin'>Fecha final</option>";
	print "<option value='mensaje'>Mensaje</option>";
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
	
	function practica () {
	global $x, $y;				
	$sql="SELECT * FROM practica ORDER BY $x $y";
	$practica =array();
	$result	= mysql_query($sql);
	$tot =mysql_num_rows($result);
	print "<h1><p align='center' stong>Total de pr&aacute;cticas: ".$tot."</p></h1>";
	$numDatos = @mysql_num_rows($result);
	$i=0;
	while ($row = mysql_fetch_object($result)){
	$practica[$i]=$row;
	$i++;
	}
	return $practica;
	}
		

	$practica = practica();
	global $numDatos;
	
	print"<table border='2' class='infot' align='center'>";
	print"<tr>";
	print"<td>";
	print"<p><strong>No. de pr&aacute;ctica</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Mesas disponibles</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Estudiantes por mesa</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Fecha de inicio</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Fecha final</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Mensaje</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Disponible</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Ver detalles</strong></p>";
	print"</td>";
	print"</tr>";

	/* Alimentar tabla*/
	foreach ($practica as $key =>$pra){
	print"<tr>";
	print"<td>";
	print$pra->no_practica;
	print"</td>";
	print"<td>";
	print$pra->mesas;
	print"</td>";
	print"<td>";
	print$pra->estp_mesa;
	print"</td>";
	print"<td>";
	print$pra->f_inicio;
	print"</td>";
	print"<td>";
	print$pra->f_fin;
	print"</td>";
	print"<td>";
	print$pra->mensaje;
	print"</td>";
	/******Imprime el letrero de disponible o no *************/
	if (($pra->disponible)==1){
	print"<td>";
	print "Disponible";
	print"</td>";
	}else {
	print"<td>";
	print "No Disponible";
	print"</td>";	
	}
	/******Imprime el letrero de disponible o no *************/
	print"<td>";
	$np=$pra->no_practica;  //Numero de practia
	print "<p align='center'><a href='det_pra.php?pra=$np'>Detalle</a></p>";
	print"</td>";
	print"</tr>";
	}
	print"</table>";
	
	
}
?>