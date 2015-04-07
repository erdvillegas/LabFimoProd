<?php
session_start();
require_once('controles_mysql.php');
require_once('estilos.css');
require_once('muestra_dtos.php');
require_once('genera_log.php');
require_once('estilos.php');
$motivo=$_GET['mtv'];
$bri=$_GET['bri'];

$sql = "UPDATE brigada SET mensaje ='$motivo' where no_brigada='$bri'";	
if(mysql_query($sql)){
print "<p class='brigeliminada'>La brigada se modifico correctamente</p>";


if ($_SESSION['ma']=='es')
	{echo '<meta http-equiv="Refresh" content="2;url=r_brigadas_mes.php"> ';}
else {echo '<meta http-equiv="Refresh" content="2;url=r_brigadas.php"> ';}

}else { print "<p class='error'>Un error ocurrio</p>";}

?>