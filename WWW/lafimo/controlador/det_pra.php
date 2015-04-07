<?php 
//Este documento se para modificar las brigadas, Solo para maestro administrador

/****Datos principales******************************************************/
require_once('controles_mysql.php');
require_once('estilos.css');
require_once('genera_log.php');
require_once('estilos.php');

if (!isset($_SESSION['User'])) { 
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{
$b = $_SESSION['User'];
print "<title>Usuario:"." ".$b."</title>";
print "<br>";
/****Datos principales******************************************************/

		$pra=$_GET['pra']; 
		
		require_once('controles_mysql.php');
		$sql = "SELECT * FROM practica WHERE no_practica = '$pra'";
		$datos = mysql_query($sql); 
		$numDatos = @mysql_num_rows($datos);
		if ($numDatos <= 0) {
		echo "No hay datos disponibles";}
		else {
		while ($col=mysql_fetch_array($datos))
	    {
		$practica = $col['no_practica'];
		$inicio = $col['f_inicio'];
		$fin = $col['f_fin'];
		$mesas = $col['mesas'];
		$estudiantes = $col['estp_mesa'];
		$msj= $col['mensaje'];
		$di=$col['disponible'];
		
		print "<form id='form1' name='form1' method='post' action='r_modpra.php?pra=$pra' >";
		print "<h1><p align ='center'>Detalles de la pr&aacute;ctica ".$pra."</p></h1>";
		print "<p><label>	Fecha de inicio  ";
		print "<input type='text' name='inicio'  title='Fecha de inicio de la practica con el siguiente formato (AAAA-MM-DD)' value= $inicio>";
		print "</label>";
		print "<label></label>";
		print "<label>Fecha ";
		print "fin";
		print "<input type='text' name='fin'  title=' Fecha de fin de la practica con el siguiente formato (AAAA-MM-DD)' value=$fin>";
		print "</label>";
		print "<label></label>";
		print "</p>";
		print "<p>";
		print "<label></label>";
		print "Mesas disponiobles";
		print "<input type='text' name='mesas'  title='Mesas disponible' value=$mesas>";
  
		print "<label>Estudiantes por mesa";
		print "<input type='text' name='estudiantes' title='Total de estudiantes por mesa' value= $estudiantes>";
		print "</label>";
		print "</p>";
		print "<p>";
		print "<label>Mensaje ";
		print "<input type='text' name='msj' title='Mensaje' value =$msj>";
		print "</label>";
		print "</p>";
		
		/**********Ofresco la opcion para el cambio de la brigada***********************/
		if ($di==1){print "<h3>La pr&aacutectica esta disponible <br><br>¿Desea deshabilitarla ?</h3>";
		print "<select name='disponible' title='Disponibilidad de la brigada'>";
		print "<option value='0'>NO DISPONIBLE</option>";
		print "</select>";
		print "</p>";
		}
		
		else {print "<h3>La pr&aacutectica no esta disponible <br><br>¿Desea habilitarla ?</h3>";
		print "<select name='disponible' title='Disponibilidad de la brigada'>";
		print "<option value='1'>DISPONIBLE</option>";
		print "</select>";
		print "<p>";
		
		print "</p>";
		print "<label>";
		print "</p>";
		}		
		print "<input name='Submit' type='submit' accesskey='E' value='Modificar' title='!! Al acer click se modifica toda la informacion'/>";
		print "<p />";
		print "<br />";
		/**********Ofresco la opcion para el cambio de la brigada***********************/
		
		/*Links*****************************************************************************************************/
		
		print "<ul class=dropdown dropdown-horizontal>";
		print "<li><a href= ../vista/maestros_ad.php class=dir>Regresar</a>";
		print "<li><a href= repo_pra.php>Ver Todas</a></li>";
		print "<li><a href ='elim_pra.php?pra=$pra'>Eliminar</a></li>";
		print "</ul>";

		print "</p>";
		
		
		
		/*Links*****************************************************************************************************/
		}
	}
	}
?>