<?php
//Este documento contiene las funciones nescesarias para manejar la base de datos//
function con (){
$con = mysql_connect("localhost","lafimo","rootlafimo");
$db = mysql_select_db("lafimo", $con);

if (!$con)
  {							
    die('No se ha podido establecer la conexion al servidor');
  } 
else {
  //comprobamos que se pueda accesar a la base de datos
	if (!$db){ 
  print "Error al seleccionar la Base de datos";
  }
else {
  return true; 
  }
  }
  }
  
  con ();
 
  
?>