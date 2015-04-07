<?php

//Este es el documento inicial en el cual se incluyen las demas opciones.
/*******************Datos Basicos****************************************************/
require_once('../controlador/genera_log.php');
require_once('../controlador/estilos.css');
require_once('../controlador/estilos.php');

$e=$_SESSION['ma_a'];	//Nombre
$d=$_SESSION['User'];  //Usuario
$c=$_SESSION['cta']; //Tipo de usuario

//Redirecciono a la pagina de login si alguien no authoriza intenta entrar
$c=$_SESSION['cta'];   //Tipo de usuario
if ($c=='estu' || $e==null){
print "<p align ='center' class='error'>No  cuenta con los suficientes privilegios <br>para esta opci&oacute;n</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}
else {

if (isset($_SESSION['User'])){      //Si no esta logueado, le restringo el acceso

print "<h1>Bienvid@!"." ".$e."</h1>";
print "<title>"."Usuario:"." ".$d."</title>";

/*******************Datos Basicos****************************************************/

print "</p>";
print "<p>";
print "<ul class=dropdown dropdown-horizontal>";
print "<li><a href=../controlador/cerrar.php>Salir</a></li>";

//Brigadas

print "<li><a href=../controlador/r_brigadas.php>Brigadas</a>";
print"<ul>";

if($c=='mae'){
print " <li><a href=../controlador/r_brigadas_mes.php>Brigadas</a></li>";
}else{
print " <li><a href=../controlador/r_brigadas.php>Brigadas</a></li>";
}
print "<li><a href= ../controlador/reporte_brigadas.php>Reporte</a></li>";
print "<li><a href=../controlador/ext.php >Asistencia especial</a>";
print"</ul>";
print "</li>"; 

//Practicas
print "<li><a href=../controlador/ag_prac.php>Pr&aacute;cticas</a>";	
print"<ul>";
print "<li><a href=../controlador/ag_prac.php>A&ntilde;adir</a></li>";	
print "<li><a href= ../controlador/repo_pra.php>Reporte</a></li>";
print"</ul>";
print "</li>"; 

  
  
if ($c=='masu'){

//Estudiantes
print "<li><a href=../controlador/cargares.php>Estudiantes</a>";
print"<ul>";
print"<li><a href=../controlador/cargares.php>A&ntilde;adir estudiantes</a></li>";		
print"<li><a href=../controlador/ver_estudiantes.php>Estudiantes inscritos</a></li>";		
print"</ul>";
print "</li>";


//Maestros
print "<li><a href=../controlador/ag_mae.php>Maestros</a>";
print"<ul>";
print"<li><a href=../controlador/ag_mae.php>A&ntilde;adir maestros</a></li>";		
print"<li><a href=../controlador/ver_mae.php>Maestros dados de alta</a></li>";		
print"</ul>";
print "</li>";


//Transacciones
print "<li><a href=../controlador/ver_log.php>Mantenimiento</a>";
print"<ul>";
print"<li><a href=../controlador/ver_log.php>Actividad de los usuarios</a></li>";		
print"<li><a href=../controlador/reiniciar.php>Reiniciar el sistema</a></li>";		
print"</ul>";
print "</li>";
print "</ul>";

}
//Cambio de pasword
print"<ul class=dropdown dropdown-horizontal>";
print"<li><a href=../controlador/camb_psw.php>Password</a></li>";		
print"</ul>";
	
             }
			 
			 else {
			 print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
			 echo '<meta http-equiv="Refresh" content="4;url=../index.php"> ';
			 }
			 
			 }
//Soporte
print"<ul class=dropdown dropdown-horizontal>";
print"<li><a href=reportes.260mb.org target = _blank>Reportar un problema</a></li>";		
print"</ul>";

?>