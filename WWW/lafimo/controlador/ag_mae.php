
<?php 

//Este documento se utiliza para agregar maestros
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

print '<h1><p align =center>Agregar maestros</p></h1>';
print "<ul class=dropdown dropdown-horizontal>";
print "<li><a href= ../vista/maestros_ad.php >Regresar</a>";
print "</ul>";


print "<form id='form1' name='form1' method='post' action='rec_mae.php'>";

print "<br>";
print "<br>";
print "<br>";
print "<table>";
print "<tr>";
print "<td>";
print "N&uacute;mero de empleado";
print "</td>";
print "<td>";
print "<input type='text' name='no_em'  title='N&uacute;mero de empleado'/>";
print "</td>";
print "</tr>";
print "<td>";
print "Nombre";
print "</td>";
print "<td>";
print "<input type='text' name='nom'  title='Nombre'/>";
print "</td>";
print "</tr>";
print "<td>";
print "Password";
print "</td>";
print "<td>";
print "<input type='password' name='psw'  title='Password'/>";
print "</td>";
print "</tr>";
print "<td>";
print "Mensaje";
print "</td>";
print "<td>";
print "<textarea name='msj' title='Descripcion' cols='18' rows='5'></textarea>";
print "</td>";
print "</tr>";
print "<tr>";
print "<td>";
print "Privilegio";
print "</td>";
print "<td>";
print "<select name='tp' title='Nivel de privilegios' >"; 
print "<option value='0' selected='selected'>Maestro estandar</option>";
print "<option value='1' selected='selected'>Maestro administrador</option>";
print "<option value='2' selected='selected'>Maestro superusuario</option>";
print "</select>";		
print "</td>";
print "<tr>";
print "</table>";

print "<br><input name='Submit' type='submit'value='Enviar' />";




}
?>
