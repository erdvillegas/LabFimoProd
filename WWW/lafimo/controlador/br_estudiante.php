<?php
require_once('controles_pra.php');
require_once('controles_br.php');
//Este documento controla la oferta de brigadas
/*****Datos Basicos**********************************************/
require_once('estilos.css');
require_once('controles_mysql.php');
require_once('estilos.php');
require_once('genera_log.php');
$b = $_SESSION['User'];
print "<title>Usuario: "." ".$b."</title>";
/*****Datos Basicos**********************************************/

/*****Funcion que consulta los datos****************************************/
function cons(){
		$consulta_p = "SELECT * FROM practica WHERE disponible = 1 "; 
		$datos_p = mysql_query($consulta_p); 
		$numDatos_p = @mysql_num_rows($datos_p); 
		if ($numDatos_p <= 0) { 
		echo "<p class= 'error'>No hay pr&aacute;cticas habilitadas<br></p>"; 
		} else { 	
		while ($col_p=mysql_fetch_array($datos_p))
	    {
		$pr= $col_p['no_practica'];
		return $pr;
		}
		}
		}
/*****Funcion que consulta los datos****************************************/

/*****Datos del estudiante****************************************/
		$consulta_e = "SELECT * FROM estudiante WHERE matricula = '$b'"; 
		$datos_e = mysql_query($consulta_e); 
		$numDatos_e = @mysql_num_rows($datos_e); 
		if ($numDatos_e <= 0) { 
		echo "<p class= 'error'>No hay datos disponibles<br></p>"; 
		} else { 	
		while ($col_e=mysql_fetch_array($datos_e))
	    {
		$plan= $col_e['plan'];
		}
		}
/*****Datos del estudiante****************************************/

/*****Consulto si existe estudiante****************************************/
		$consulta_es = "SELECT * FROM grupo_pra WHERE gmatricula = '$b'"; 
		$datos_es = mysql_query($consulta_es); 
		$numDatos_es = @mysql_num_rows($datos_es); 
		if ($numDatos_es <= 0) { 
		echo "<p class='error'>No estas registrado en ninguna pr&aacute;ctica</p>"; 
		$cubi=0;
		$reg=0;
		} else { 	
		while ($col_es=mysql_fetch_array($datos_es))
	    {
		$cubi= $col_es['cubierto'];
		$pr_registrada= $col_es['no_gpractica'];
		$reg=1;
		}
		}
/*****Consulto si existe estudiante****************************************/

/*Si no esta registrado valido si concluyo la practica anterior*/
//print "Cubierto: ".$cubi."<br>Registrado: ".$reg."<br>Practica: ".$prc=cons()."<br>Practica registrada: ".$pr_registrada;

if($reg!=1){
		$prc=cons();		
		print "<h1><marquee behavior='alternate' >Brigadas disponibles para la Pr&aacute;ctica: ".$prc."</marquee></h1>";
/*****Datos de la practica****************************************/
		function brig ($h){
		global $b,$plan;
		$consulta = "SELECT * FROM brigada WHERE hora_clase = '$h' AND plan ='$plan' AND (disponibilidad) IN (SELECT disponible FROM practica WHERE disponible=1) AND disp_mae=1 AND lleno=0"; 
		$datos = mysql_query($consulta); 
		$numDatos = @mysql_num_rows($datos); 
		if ($numDatos <= 0) { 
		echo "<strong>"."Brigada no disponible"."<br>"; 
		} else { 	
		while ($col=mysql_fetch_array($datos))
	    {print "<p class ='info'   align='center'><strong>".$col['no_brigada']."</strong></p>";}
		return true;}
		}

}
//Si esta registrado
else {
if(($cubi!=1) || $cubi==null){print "<p class='error'>No has concluido la pr&aacute;ctica</p>";
echo '<meta http-equiv="Refresh" content="3;url=../vista/estudiantes.php"> ';
session_destroy();
}else{
/*****Datos de la practica nva****************************************/

/*****Consulto si la practica nueva esta disponible****************************************/
		$pr=$pr_registrada; 	//Practica actual
		$prc=$pr+1;		//Practica nueva
		$sq_p = "SELECT * FROM practica WHERE no_practica = '$prc'"; 
		$datos_p = mysql_query($sq_p); 
		$numDatos_p= @mysql_num_rows($datos_p); 
		if ($numDatos_p <= 0){ 
		echo "<strong>"."<p class='error'>La pr&aacute;ctica ".$prc."<br> no esta disponible a&uacute;n</p>"."<br>"; 
		echo '<meta http-equiv="Refresh" content="3;url=../vista/estudiantes.php"> ';
		} else { 	
		print "<h1><marquee behavior='alternate' >Brigadas disponibles para la Pr&aacute;ctica: ".$prc."</marquee></h1>";
		
/*****Consulto si la practica nueva esta disponible****************************************/

/*****Datos de la practica nva****************************************/

		function brig ($h){
		global $b,$plan;
		$consulta = "SELECT * FROM brigada WHERE hora_clase = '$h' AND plan ='$plan' AND (disponibilidad) IN (SELECT disponible FROM practica WHERE disponible=1) AND disp_mae=1"; 
		$datos = mysql_query($consulta); 
		$numDatos = @mysql_num_rows($datos); 
		if ($numDatos <= 0) { 
		echo "<strong>"."Brigada no disponible"."<br>"; 
		} else { 	
		while ($col=mysql_fetch_array($datos))
	    {print "<p class ='info'   align='center'><strong>".$col['no_brigada']."</strong></p>";}
		return true;}
		}
		}
		}
	}
		
?>

<blockquote>
<ul class="dropdown dropdown-horizontal">

	<li><a href="../vista/estudiantes.php" >Regresar</a>

		<ul>

			<!lia href="./"Cargar Archivo/a/li>

			<!li<a href=""Regresar</a/li>

			<!li<a href="./"...</a</li>

		</ul>

	</li>

	<li><a href="../controlador/cerrar.php">Salir</a></li>

</ul>

</p>
<table border="1" align="center">
    <caption>
    <h2>Brigadas</h2>
    </caption>
    <tr>
      <th scope="col">Hora</th>
      <th scope="col">Clase</th>
      <th scope="col">Lunes</th>
      <th scope="col">Martes</th>
      <th scope="col">Miercoles</th>
      <th scope="col">Jueves</th>
      <th scope="col">Viernes</th>
      <th scope="col">Sabado</th>
    </tr>
    <tr>
      <th scope="row">7:00 - 8:40 </th>
      <td>M1-M2</td>
	  <?php for ($i=1; $i<=6;$i++){
      	print "<td>";  if (brig($i)){print "<p><a class ='detalle' href ='det_brigada_e.php?brig=$i&pc=$prc'>Detalles</a></p>";}
      }
	  ?>
          
    </tr>	
    <tr>
      <th scope="row">8:40-10:20</th>
      <td>M3-M4</td>
      <?php for ($i=7; $i<=12;$i++){
      	print "<td>";  if (brig($i)){print "<p><a class ='detalle' href ='det_brigada_e.php?brig=$i&pc=$prc'>Detalles</a></p>";}
      }
	  ?>
    </tr>
    <tr>
      <th scope="row">10:20 12:00</th>
      <td>M5-M6</td>
      <?php for ($i=13; $i<=18;$i++){
      	print "<td>";  if (brig($i)){print "<p><a class ='detalle' href ='det_brigada_e.php?brig=$i&pc=$prc'>Detalles</a></p>";}
      }
	  ?>
    </tr>
    <tr>
      <th scope="row">12:00-13:40</th>
      <td>V1-V2</td>
      <?php for ($i=19; $i<=24;$i++){
      print "<td>";  if (brig($i)){print "<p><a class ='detalle' href ='det_brigada_e.php?brig=$i&pc=$prc'>Detalles</a></p>";}
      }
	  ?>
    </tr>
    <tr>
      <th scope="row">13:40-15:20</th>
      <td>V3-V4</td>
      <?php for ($i=25; $i<=30;$i++){
      print "<td>";  if (brig($i)){print "<p><a class ='detalle' href ='det_brigada_e.php?brig=$i&pc=$prc'>Detalles</a></p>";}
      }
	  ?>
      
    </<tr>
    <tr>
      <th scope="row">15:20-17:00</th>
      <td>V5-V6</td>
      <?php for ($i=31; $i<=36;$i++){
      print "<td>";  if (brig($i)){print "<p><a class ='detalle' href ='det_brigada_e.php?brig=$i&pc=$prc'>Detalles</a></p>";}
      }
	  ?>
    </tr>
    <tr>
      <th scope="row">17:00-18:20</th>
      <td>N1-N2</td>
      <?php for ($i=37; $i<=42;$i++){
      print "<td>";  if (brig($i)){print "<p><a class ='detalle' href ='det_brigada_e.php?brig=$i&pc=$prc'>Detalles</a></p>";}
      }
	  ?>
    </tr>
    <tr>
      <th scope="row">18:20-19:40</th>
      <td>N3-N4</td>
      <?php for ($i=43; $i<=48;$i++){
      print "<td>";  if (brig($i)){print "<p><a class ='detalle' href ='det_brigada_e.php?brig=$i&pc=$prc'>Detalles</a></p>";}
      }
	  ?>
    </tr>
    <tr>
      <th scope="row">19:40-21:00</th>
      <td>N5-N6</td>
      <?php for ($i=49; $i<=54;$i++){
      print "<td>";  if (brig($i)){print "<p><a class ='detalle' href ='det_brigada_e.php?brig=$i&pc=$prc'>Detalles</a></p>";}
      }
	  ?>
    </tr>
</table>
</form>
