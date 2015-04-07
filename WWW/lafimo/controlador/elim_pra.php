<?php
//Este documento se para eliminar las brigadas, Solo para maestro administrador
/**************Cabecera***************************************************************/
require_once('controles_mysql.php');
require_once('estilos.css');
require_once('estilos.php');
require_once('controles_mysql.php');
print "<br>";
require_once('genera_log.php');
if (!isset($_SESSION['User'])) { 
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{
$b = $_SESSION['User'];
print "<title>Usuario: "." ".$b."</title>";

/**************Cabecera***************************************************************/
$pra=$_GET['pra']; 
$eliminar="DELETE FROM practica WHERE no_practica ='$pra'";
mysql_query($eliminar);
$consulta = "SELECT * FROM practica WHERE no_practica = '$pra'"; 
$datos = mysql_query($consulta); 
$numDatos = @mysql_num_rows($datos); 
if ($numDatos <= 0) { 
echo "<p class ='brigeliminada'>La pr&aacute;ctica ".$pra." fue dada de baja exitosamente</p>"; 
echo '<meta http-equiv="Refresh" content="3;url=../vista/maestros_ad.php"> ';
} else { print "Un error ha ocurrido, contacte a su administrador";}
}
?>