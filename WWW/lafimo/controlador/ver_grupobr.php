<style>
p{
text-align:center;
}

</style>

<?php
/******Datos Basicos**************************************************/
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
$tpo=$_SESSION['cta'];  //Tipo de cuena estandar = es o admin=ad
print "<title>Usuario: ".$b."</title>";
if($tpo=='estu'){
print "<p align ='center' class='error'>No cuentas con los suficientes privilegios <br>para ver esta p&aacute;gina</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{
/******Datos Basicos**************************************************/
	$h=$_GET['h'];     //Clave de clase
	$r=$_GET['b'];    //Numero de la brigada

if ($tpo=='mae'){
	 print"<ul class=dropdown dropdown-horizontal>";
		print"<li><a href=r_brigadas_mes.php>Regresar</a></li>";
		print"</ul>";
	}
		else {
		print"<ul class=dropdown dropdown-horizontal>";
		print"<li><a href=r_brigadas.php>Regresar</a></li>";
		print"</ul>";
			}
print "<br>";			
print "<br>";		
		$consulta_p = "SELECT * FROM grupo_pra WHERE no_gbrigada = $r AND (no_gpractica) IN (SELECT no_practica FROM practica WhERE disponible=1)";
		$datos_p = mysql_query($consulta_p); 
		$numDatos_p = @mysql_num_rows($datos_p); 
		if ($numDatos_p <= 0) { 
		//echo "<p class= 'error'>No hay datos disponibles<br></p>"; 
		} else { 	
		while ($col_p=mysql_fetch_array($datos_p))
	    {
		$pr=$col_p['no_gpractica'];
	    }
		}
	
	function estudiantes () {
	global $x, $y, $r, $tpo,$mt, $pr;
	$sql = "SELECT * FROM estudiante WHERE (matricula) IN (SELECT gmatricula FROM grupo_pra WHERE no_gpractica=$pr AND no_gbrigada=$r  AND cubierto !=1)";
	$estudiantes =array();
	$result	= mysql_query($sql);
	$tot =mysql_num_rows($result);
	if ($tot<=0){
	print "<h1><p align='center' stong>La pr&aacute;ctica ya no esta disponible <br>&oacute; <br>No cuenta con estudiantes inscritos en la brigada: ".$r."</p></h1>";
	}
	else {
	
	$co="SELECT * FROM practica WhERE no_practica=$pr";
	$d_co=mysql_query($co);
		while ($co_d=mysql_fetch_array($d_co))
	    {
		$m=$co_d['mesas'];
		$e=$co_d['estp_mesa'];
		}
		
	print "<h1><p align='center' stong>Total de estudiantes: ".$tot." <br>Inscritos en la brigada: ".$r."<br>Para la pr&aacute;ctica: ".$pr."</p></h1>
	<h1>Mesas disponibles: ".$m."</h1><br><h1>Estudiantes por mesa: ".$e."</h1><br>";}
	$i=0;
	while ($row = mysql_fetch_object($result)){
	$estudiantes[$i]=$row;
	$i++;
	}
	return $estudiantes;
	}
	
	$estudiantes = estudiantes();
	print"<table border='2' class='infot' align='center'>";
	print"<tr>";
	print"<td>";
	print"<p><strong>N&uacute;mero de <br>lista</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Matricula</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Nombre</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Plan</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Mensaje</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Asistencia</strong></p>";
	print"</td>";
	print"</tr>";
	
	/* Alimentar tabla*/
	$i=1;
	foreach ($estudiantes as $key =>$es){
	print"<tr>";
	print"<td>";
	print "<p>".$i++."</p>";
	print"</td>";
	print"<td>";
	print "<p>".$es->matricula."</p>";
	print"</td>";
	print"<td>";
	print "<p>".$es->nombre."</p>";
	print"</td>";
	print"<td>";
	print "<p>".$es->plan."</p>";
	print"</td>";

	/*Mensaje de practica**************************************************************/
	global $pr,$h,$r;
	$mt=$es->matricula;
		
		print "<form id='form1' name='form1' method='post' action='msj_pra.php?h=$h&brig=$r&ma=$mt'>";
		$consulta_m = "SELECT * FROM grupo_pra WHERE gmatricula = '$mt' AND no_gpractica=$pr"; 
		$datos_m = mysql_query($consulta_m); 
		$numDatos_m = @mysql_num_rows($datos_m); 
		if ($numDatos_m<= 0) { 	
		print "<td>";
		print "<p><b>No hay mensajes</b></p>";
		print "</td>";
		
		} else { 	
			while ($col_m=mysql_fetch_array($datos_m))
	    {
		global $mtr;
		$msj=$col_m['msj'];
		}
		
		/***Modifcar msj*****************************/
		print "<td>";
		print "<textarea name='mensj' cols=15 rows=5>".$msj."</textarea>";
		print "<br><p align='center'><input type='submit' name='env' value='Comentar'></p>";
		print "</form>";
		print "</td>";	
		/***Modifcar msj*****************************/
		}

	/*Mensaje de practicas****************************************************************************/
	
	/********Opciones para evaluar******************/
	global $pr,$h,$r;
	$m=$es->matricula;
		print "<form id='form1' name='form1' method='post' action='evaluar.php?h=$h&b=$r&ma=$m'>";
		print"<td>";
        print "<label>";
		print "<select name='asistencia' title='Asistencia'>";
		print "<option value='1'>ASISTENCIA</option>";
        print "<option value='2'>FALTA</option>";
		print "<option value='3'>RETARDO</option>";
		print "</select>";
		print "<p align='center'><input type='submit' name='Submit' value='Enviar'/></p>";
		print "</form>";
		print"</td>";
	/********Consulta de asistencia y calificaciones ******************/
	
	/********Consulta disponibilidad ******************/
	
	/********Consulta disponibilidad ******************/

	}
	print"</tr>";
	print"</table>";
	
	
	}
	}
?>