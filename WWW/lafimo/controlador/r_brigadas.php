<?php
require_once('estilos.css');
require_once('controles_mysql.php');
require_once('controles_pra.php');
require_once('controles_br.php');
require_once('estilos.php');

print "<h1>Brigadas</h1>";

print "<ul class=dropdown dropdown-horizontal>";
print "<li><a href= ../controlador/cerrar.php>Salir</a></li>";
print "<li><a href= ../vista/maestros_ad.php >Regresar</a>";
print "<li><a href= ../controlador/reporte_brigadas.php >Reporte</a></li>";
print "</ul>";

print"<br>";

require_once('genera_log.php');
$b = $_SESSION['User'];
print "<title>Usuario: "." ".$b."</title>";
require_once('genera_log.php');

		function brig ($h){
		global $b;
		$consulta = "SELECT * FROM brigada WHERE hora_clase = '$h'"; 
		$datos = mysql_query($consulta); 
		$numDatos = @mysql_num_rows($datos); 
		if ($numDatos <= 0) { 
		echo "<strong>"."Brigada no asignada"."<br>"; 
		} else { 	
		while ($col=mysql_fetch_array($datos))
	    {print "<p class ='info' align='center'><strong>".$col['no_brigada']."</strong></p>";}
		return true;}
		}
		

?>

<blockquote>
  <p>
</blockquote>
<p>
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
      	print "<td>";  if (brig($i)){
		print "<p><a class ='detalle' href ='det_brigada.php?brig=$i'>Detalles</a></p>";
		}	
		else{
			print "<p><a class ='agregar' href ='ag_brigada.php?brig=$i'>Agregar</a></p>";
		} 
		print "</td>";
      }
	  ?>
     
      
    </tr>	
    <tr>
      <th scope="row">8:40-10:20</th>
      <td>M3-M4</td>
      <?php for ($i=7; $i<=12;$i++){
      	print "<td>";  if (brig($i)){print "<p><a class ='detalle' href ='det_brigada.php?brig=$i'>Detalles</a></p>";}else{print "<p><a class ='agregar' href ='ag_brigada.php?brig=$i'>Agregar</a></p>";} print "</td>";
      }
	  ?>
    </tr>
    <tr>
      <th scope="row">10:20 12:00</th>
      <td>M5-M6</td>
      <?php for ($i=13; $i<=18;$i++){
      	print "<td>";  if (brig($i)){print "<p><a class ='detalle' href ='det_brigada.php?brig=$i'>Detalles</a></p>";}else{print "<p><a class ='agregar' href ='ag_brigada.php?brig=$i'>Agregar</a></p>";} print "</td>";
      }
	  ?>
    </tr>
    <tr>
      <th scope="row">12:00-13:40</th>
      <td>V1-V2</td>
      <?php for ($i=19; $i<=24;$i++){
      	print "<td>";  if (brig($i)){print "<p><a class ='detalle' href ='det_brigada.php?brig=$i'>Detalles</a></p>";}else{print "<p><a class ='agregar' href ='ag_brigada.php?brig=$i'>Agregar</a></p>";} print "</td>";
      }
	  ?>
    </tr>
    <tr>
      <th scope="row">13:40-15:20</th>
      <td>V3-V4</td>
      <?php for ($i=25; $i<=30;$i++){
      	print "<td>";  if (brig($i)){print "<p><a class ='detalle' href ='det_brigada.php?brig=$i'>Detalles</a></p>";}else{print "<p><a class ='agregar' href ='ag_brigada.php?brig=$i'>Agregar</a></p>";} print "</td>";
      }
	  ?>
      
    </<tr>
    <tr>
      <th scope="row">15:20-17:00</th>
      <td>V5-V6</td>
      <?php for ($i=31; $i<=36;$i++){
      	print "<td>";  if (brig($i)){print "<p><a class ='detalle' href ='det_brigada.php?brig=$i'>Detalles</a></p>";}else{print "<p><a class ='agregar' href ='ag_brigada.php?brig=$i'>Agregar</a></p>";} print "</td>";
      }
	  ?>
    </tr>
    <tr>
      <th scope="row">17:00-18:20</th>
      <td>N1-N2</td>
      <?php for ($i=37; $i<=42;$i++){
      	print "<td>";  if (brig($i)){print "<p><a class ='detalle' href ='det_brigada.php?brig=$i'>Detalles</a></p>";}else{print "<p><a class ='agregar' href ='ag_brigada.php?brig=$i'>Agregar</a></p>";} print "</td>";
      }
	  ?>
    </tr>
    <tr>
      <th scope="row">18:20-19:40</th>
      <td>N3-N4</td>
      <?php for ($i=43; $i<=48;$i++){
      	print "<td>";  if (brig($i)){print "<p><a class ='detalle' href ='det_brigada.php?brig=$i'>Detalles</a></p>";}else{print "<p><a class ='agregar' href ='ag_brigada.php?brig=$i'>Agregar</a></p>";} print "</td>";
      }
	  ?>
    </tr>
    <tr>
      <th scope="row">19:40-21:00</th>
      <td>N5-N6</td>
      <?php for ($i=49; $i<=54;$i++){
      	print "<td>";  if (brig($i)){print "<p><a class ='detalle' href ='det_brigada.php?brig=$i'>Detalles</a></p>";}else{print "<p><a class ='agregar' href ='ag_brigada.php?brig=$i'>Agregar</a></p>";} print "</td>";
      }
	  ?>
    </tr>
</table>
</form>
