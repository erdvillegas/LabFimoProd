<?php
require_once('genera_log.php');
require_once('estilos.css');
require_once('estilos.php');

$ru=$_GET['rut'];   //Recivo la ruta
$nom=$_GET['nom']; //Recive el nombre del archivo


unlink( "$ru" );
print "<br><p class ='error'>El archivo: ".$nom." fue eliminado <br><br>Ahora puede cargar el archivo</p>";

echo '<meta http-equiv="Refresh" content="2;url=../vista/maestros_ad.php"> ';
?>