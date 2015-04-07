<?php

require_once('../controlador/estilos.php');

$b = $_SESSION['User'];
print "<title>"."Administrador:"." ".$b."</title>";
require_once('estilos.css');


if (($_FILES["file"]["type"] == "text/plain"))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Carga: " . $_FILES["file"]["name"] . "<br />";
    echo "Tipo: " . $_FILES["file"]["type"] . "<br />";
    echo "Tama&ntilde;o: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";

	$rut= ("../extra/" . $_FILES['file']['name']);   //Enviar la ruta del archivo por get
	$nom=$_FILES["file"]["name"];
	
    if (file_exists("../extra/" . $_FILES["file"]["name"]))
      {
	  print "<br><p class ='error'>El archivo : ".$nom."<br> ya existe</p>";
	  //Script para eliminar el archivo existente
	    print"<ul class=dropdown dropdown-horizontal>";
		print "<br><p align ='center'><a href=elim_doc.php?rut=$rut&nom=$nom>Sustituirlo</p></a>";
		print "<br><p align ='center'><a href=../vista/maestros_ad.php>Regresar</p></a>";
		print"</ul>";
	   }
    else
      {
      move_uploaded_file($_FILES['file']['tmp_name'], "../extra/" . $_FILES["file"]["name"]); echo "Stored in: " . "../extra/" . $_FILES["file"]["name"];
	  print "<br><p class ='error'>El archivo : ".$_FILES['file']['name']."<br> se cargo exitosamente</p>";
 	    print"<ul class=dropdown dropdown-horizontal>";
		print "<li> <a href=../controlador/sub5.php?rut=$rut>Separar estudiantes</a>";
		print"<li><a href=../vista/maestros_ad.php>Regresar</a>";
		print"</ul>";
	  
	 
      }
    }
  }
else
  {
  print	"<ul class=dropdown dropdown-horizontal>";
  print "<li><a href=../vista/maestros_ad.php>Regresar</a>";
  print"</ul><br><br><br>";
  print "<br><p class ='error'>El archivo es invalido</p>";
  echo '<meta http-equiv="Refresh" content="2;url=cargares.php"> ';
  
  }
?>
