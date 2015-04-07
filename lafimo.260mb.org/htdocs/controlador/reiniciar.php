<style>p{text-align:center;}</style>
<?php

//Este documento muestra las transaciones de los usuarioes en el sistema
/************************Datos basicos ******************************/
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

 print "<script> 

var r=window.confirm('Desea limpiar la base de datos ?');
if(r){

var c=window.confirm('Realmente desea limpiar la base de datos?');
if(c){
var dir='limpiar.php'; 
var ps=window.prompt('Ingrese su password');
var mae=window.confirm('Eliminar tambien registro de maestros?');
if (mae)
{
var elimMaes=1;
}else {var elimMaes=0;}

var el='?psw='+ps+'&mae='+elimMaes;
location=dir+el;
document.write('Location <b>href</b>: ' + location.href  + '<br>'); 
}else{}

}else{ window.alert('Los datos no se modificaron');
var dir='../vista/maestros_ad.php'; 
location=dir;
document.write('Location <b>href</b>: ' + location.href  + '<br>'); 


}
</script>";
	
}
}

?>