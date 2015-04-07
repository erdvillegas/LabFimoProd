  <?php
//Este es el documento inicial en el cual se incluyen las demas opciones.  
/**********************Datos Basicos**************************************************/
require_once('../controlador/estilos.css');
require_once('../controlador/genera_log.php');
require_once('../controlador/estilos.php');

if (!isset($_SESSION['User'])) { 

require_once('../controlador/genera_log.php');
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}
else
{
$d=$_SESSION['User'];    //Usuario
$e=$_SESSION['es'];     //Nombre


print '<h1>Bienvid@!'.' '.$e.'</h1>';
print '<title>'.'Estudiante:'.' '.$d.'</title>';
// Mostrar aqui la p&aacute;gina personal del usuario 
/**********************Datos Basicos**************************************************/
print "<ul class=dropdown dropdown-horizontal>";

print "<li><a href=../controlador/br_estudiante.php>Inscribirse</a></li>";
print 	"<li><a href=../controlador/cerrar.php>Salir</a></li>";
print "</ul>";
    
//Cambio de pasword
print"<ul class=dropdown dropdown-horizontal>";
print"<li><a href=../controlador/camb_psw.php>Password</a></li>";		
print"</ul>";

}
?>