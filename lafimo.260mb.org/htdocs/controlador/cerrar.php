<title>Adios</title><?php
require_once('genera_log.php');
require_once('estilos.php');
session_destroy();
    echo '<meta http-equiv="Refresh" content="2;url=../index.php"> ';
    print "<h1><p><BR>"."Te has desconectado del sistema"."</h1></p>";
	
?>