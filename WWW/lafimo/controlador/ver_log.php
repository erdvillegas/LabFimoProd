<style>p{text-align:center;}</style>
<?php

//Este documento muestra las transaciones de los usuarioes en el sistema
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
$_POST['tipo']="id";
$_POST['ord']="ASC";
}
/************************Validador***********************************/

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

	print "<form align='center' id='ordenar' name='ordenar' method='post' action='ver_log.php'>";
	print "<label>Ordenar por";
    print "<select name='tipo' size='1'>";
	print "<option value='id' selected='selected'>Id</option>"; 
	print "<option value='usuario'>Usuario</option>";
	print "<option value='historial'>Transaccion</option>";
	print "<option value='ip'>Ip</option>";
	print "<option value='fecha'>Fecha</option>";
	print "<option value='hora'>Hora</option>";
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


		print"<ul class=dropdown dropdown-horizontal>";
		print "<li><p = align='center'><a href=../vista/maestros_ad.php class=dir>Regresar</a></p>";
		print"</ul>";
	
	function log_t() {
	global $x, $y;				
	$sql="SELECT * FROM log ORDER BY $x $y";
	$log_t =array();
	$result	= mysql_query($sql);
	$tot =mysql_num_rows($result);
	print "<h1><p align='center' stong>Total de actividad: ".$tot."</p></h1>";
	$numDatos = @mysql_num_rows($result);
	$i=0;
	while ($row = mysql_fetch_object($result)){
	$log_t[$i]=$row;
	$i++;
	}
	return $log_t;
	}
		

	$log = log_t();
	global $numDatos;
	
	print"<table border='2' class='infot' align='center'>";
	print"<tr>";
	print"<td>";
	print"<p><strong>Id</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Usuario</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Nombre</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Priviegios</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>P&aacute;gina consultada</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Fecha y hora</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Ip</strong></p>";
	print"</td>";
	print"</tr>";

	/* Alimentar tabla*/
	foreach ($log as $key =>$l){
	print"<tr>";
	print"<td>";
	print "<p>$l->id</p>";
	print"</td>";
	print"<td>";
	print "<p>$l->usuario</p>";
	print"</td>";
	/**************Nombre de usuario***************************/
	//Si es estudiante
	$us=$l->usuario;
	
		$consulta_e = "SELECT * FROM estudiante WHERE matricula = '$us'"; 
		$datos_e = mysql_query($consulta_e); 
		$numDatos_e = @mysql_num_rows($datos_e); 
		if ($numDatos_e <= 0) {  
		
		/*******Si es maestro******************************************/
		$consulta_m = "SELECT * FROM maestro WHERE no_empleado = '$us'"; 
		$datos_m = mysql_query($consulta_m); 
		$numDatos_m = @mysql_num_rows($datos_m); 
		if (!$numDatos_m <= 0) { 
		while ($col_m=mysql_fetch_array($datos_m))
	    {
		print "<td>";
		print "<p>".$col_m['nombre']."</p>";
		print "</td>";
		$a=$col_m['admin'];
		switch ($a){
		case 0: {print "<td>";print "<p>Maestro estandar</p>"; print "</td>";}
		break;
		
		case 1: {print "<td>";print "<p>Maestro administrador</p>"; print "</td>";}
		break;
		
		case 2: {print "<td>";print "<p>Maestro Superusuario</p>"; print "</td>";}
		break;
		default: {print "<td>";print "<p>&iquest;?</p>"; print "</td>";}
		break;
		}
		}
		}else{print "<td>";
		print "<p>&iquest;?</p>";
		print "</td>";
		print "<td>";
		print "<p>&iquest;?</p>";
		print "</td>";
		}
		}
		
		/*******Si es maestro******************************************/
		else {	
		while ($col_e=mysql_fetch_array($datos_e))
	    {
		print "<td>";
		print "<p>".$col_e['nombre']."</p>";
		print "</td>";
		print "<td>";
		print "<p>Estudiante</p>";
		print "</td>";
		}
		}
	/**************Nombre de usuario***************************/
	
	/**************Link para ver actividad***************************/
	$li=$l->historial;
	print"<td>";
	print "<p><a href="."'".$li."'>".$li."</a></p>";
	print"</td>";
	/**************Link para ver actividad***************************/
	print"<td>";
	print "<p>$l->fecha</p>";
	print"</td>";
	print"<td>";
	print "<p>$l->ip</p>";
	print"</td>";
	print"</tr>";
	}
	print"</table>";
	
	/*****Limpiar automaticamente***************************/
	
		//Selecciona la la actividad mas antigua
		$consulta_i = "SELECT fecha FROM log WHERE id = '1'"; 
		$datos_i = mysql_query($consulta_i); 
		$numDatos_i = @mysql_num_rows($datos_i); 
		if ($numDatos_i <= 0) {  }
		else {	
		while ($col_i=mysql_fetch_array($datos_i))
	    {
		$f=$col_i['fecha'];
		
		//Calculo la fecha siguiente

		$sig=date("Y-m-d H:i:s",strtotime("+7days",strtotime("$f")));
		$rea=date("Y-m-d H:i:s");     //hora actual
		//Si la fecha calculada es mayor o igual que la calculada, vacio la base de datoss
		if ($rea>=$sig){
		$consulta_v = "TRUNCATE log "; 
		$consulta_v = mysql_query($consulta_v); 
		}
		}
		}	
		
	/*****Limpiar automaticamente***************************/
}
}


?>