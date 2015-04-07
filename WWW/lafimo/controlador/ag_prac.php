
<?php 

//Este documento se utiliza para agregar practicas
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

print '<h1><p align =center>Agregar practicas</p></h1>';
print "<ul class=dropdown dropdown-horizontal>";
print "<li><a href= ../vista/maestros_ad.php >Regresar</a>";
print "<li><a href= repo_pra.php>Ver Todas</a></li>";
print "</ul><br><br>";


print "<form id='form1' name='form1' method='post' action='recive_practicas.php'>";

print "<br>";
print "<p>";
print "<table>";
print "<tr>";
print "<td>";
print "Fecha de inicio";
print "</td>";
print "<td>";
print "<input type='text' name='inicio'  title='Fecha de inicio de la practica con el siguiente formato (AAAA-MM-DD)'/>";
print "</td>";
print "</tr>";
print "<tr>";
print "<td>";
print "Fecha Fin ";
print "</td>";
print "<td>";
print "<input type='text' name='fin'  title=' Fecha de fin de la practica con el siguiente formato (AAAA-MM-DD)'/>";
print "</td>";
print "</te>";
print "<tr>";
print "<td>";
print "Mesas disponibles";
print "</td>";
print "<td>";
print "<input type='text' name='mesas'  title='Mesas disponible'/>";
print "</td>";
print "</tr>";
print "<tr>";
print "<td>";
print "Estudiantes por mesa";
print "</td>";
print "<td>";
print "<input type='text' name='estudiantes' title='Total de estudiantes por mesa' />";
print "</td>";
print "</tr>";
print "<tr>";
print "<td>";
print "Mensaje";
print "</td>";
print "<td>";
print "<textarea name='msj' title='Mensaje' colums=15 rows=5></textarea>";
print "</td>";
print "</tr>";
print "</table>";

print "<input type='submit' name='Submit' value='Enviar' />";

}
?>
