<?php 

//Este documento se utiliza para mpdificar el password
/*******Datos basicos**********************************************/
require_once('genera_log.php');
require_once('estilos.css');
require_once('estilos.php');
if (!isset($_SESSION['User'])) { 
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{
$b = $_SESSION['User'];
print '<title>Agregar para:'.' '.$b.'</title>';
/*******Datos basicos**********************************************/

print '<h1><p align =center>Cambiar password</p></h1>';
print "<form id='form1' name='form1' method='post' action='mcamb_psw.php'>";
print "<br>";

print "<table border='0' align='center'>";
print "<tr>";
print "<td>";
print "<p><label>Anterior &nbsp;";
print "<td>";
print "<input type='password' name='ant'  title='Password anterior'/>";
print "</td>";
print "</label>";
print "</tr>";
print "</p>";

print "<tr>";
print "<td>";
print "<p><label>Nueva &nbsp;&nbsp;&nbsp;";
print "</td>";
print "<td>";
print "<input type='password' name='nva'  title='Password nueva'/>";
print "</td>";
print "</label>";
print "</tr>";
print "</p>";

print "<tr>";
print "<td>";
print "<p><label>Confirmar &nbsp;";
print "</td>";
print "<td>";
print "<input type='password' name='con'  title='Confirmar'/>";
print "</td>";
print "</label>";
print "</p>";
print "</tr>";

print "</table>";

print "<p>";
print "<input type='submit' name='Submit' value='Enviar' />";
print "</p>";

print"<ul class=dropdown dropdown-horizontal>";
print"<li><a href = cerrar.php>Terminar</a></li>";		
print"</ul>";

}
?>

