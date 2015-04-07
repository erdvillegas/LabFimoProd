<blockquote>
  <p>
  <?php

//Este es el documento inicial en el cual se incluyen las demas opciones.
/****************Daros basicos*************************************************/
require_once('../controlador/estilos.css');
require_once('../controlador/genera_log.php');
require_once('../controlador/estilos.php');
$d=$_SESSION['User'];   //Usuario
$e=$_SESSION['ma_e'];  //Nombre de usuario
$c=$_SESSION['cta'];  //Tipo de usuario

//Redirecciono a la pagina de login si alguien no authoriza intenta entrar
$c=$_SESSION['cta'];   //Tipo de usuario
if ($c=='estu' || $e==null){
print "<p align ='center' class='error'>No  cuenta con los suficientes privilegios <br>para esta opci&oacute;n</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}
else {
if (!isset($_SESSION['User'])) { 
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{

{
print '<h1>Bienvid@!'.' '.$e.'</h1>';
print '<title>'.'Maestro: '.' '.$d.'</title>';}
// Mostrar aqui la p&aacute;gina personal del usuario 

/****************Daros basicos*************************************************/

//Sañor
print " <ul class=dropdown dropdown-horizontal>";
print "<li><a href=../controlador/cerrar.php>Salir</a></li>";

	
//Brigadas
print "<li><a href=../controlador/r_brigadas_mes.php>Brigadas</a>";	
print"<ul>";
print "<li><a href=../controlador/r_brigadas_mes.php>Brigadas</a>";	
print "<li><a href=../controlador/reporte_brigadas.php >Reporte</a>";
print "<li><a href=../controlador/ext.php >Asistencia especial</a>";
print"</ul>";
print "</li>"; 
print"</ul>";



//Cambio de pasword
print"<ul class=dropdown dropdown-horizontal>";
print"<li><a href=../controlador/camb_psw.php>Password</a></li>";		
print"</ul>";

}
}
?>