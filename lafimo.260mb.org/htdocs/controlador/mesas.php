<?php
/************************Datos basicos ******************************/
require_once('controles_mysql.php');
require_once('estilos.css');
require_once('genera_log.php');


if (!isset($_SESSION['User'])) { 
require_once('genera_log.php');
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh'content='4;url=../index.php'>";session_destroy();}

else{
$b=$_SESSION['User'];
print "<title>Usuario: ".$b."</title>";
/************************Datos basicos ******************************/

	/*****Extraer practicas*******************************************/
	function pracctica_c() {			
	$sql="SELECT * FROM practica";
	$pracctica_c =array();
	$result	= mysql_query($sql);
	$tot =mysql_num_rows($result);
	$numDatos = @mysql_num_rows($result);
	$i=0;
	while ($row = mysql_fetch_object($result)){
	$pracctica_c[$i]=$row;
	$i++;
	}
	return $pracctica_c;
	}
	}

	/*****Extraigo las cantidades Mesas y estudiantes*******************************************/
	$pracctica_c = pracctica_c();
	foreach ($pracctica_c as $key =>$pra){
	$prac=$pra->no_practica;     //Recivo el numero de la practica
	$d=$pra->disponible;		//Disponibilidad
	$m=$pra->mesas;			   //Mesas disponibles
	$e=$pra->estp_mesa;	  //Estudiantes por mesa
	/*****Control de apertura y cierre de practicas***************************/	
	}
    $to= $m*$e;         //Cupo de la practica
    $sql = "SELECT gmatricula FROM grupo_pra WhERE (no_gpractica) IN (SELECT no_practica FROM practica WHERE disponible=1)";
    $re = mysql_query($sql);    
    $tot_e =mysql_num_rows($re);    //Total de estudiantes
    
    function ac ($brigada)  //Funcion abrir o cerrar
   {
     global $tot_e, $to;
    print "<br>($to>=$tot_e)";
    if ($to>=$tot_e)
    {
    $c = "UPDATE brigada SET disp_mae=1, disponibilidad=1, mensaje ='Apertura automatica -Hay cupos disponibles !' Where no_brigada = $brigada";
    mysql_query($c);
    print "<br>Cierto ".$c;
    }
  
   else 
   {
   $c="UPDATE brigada SET disp_mae=0, disponibilidad=0, mensaje ='Cierre automatico -Se lleno el grupo'  Where no_brigada = $brigada";
   mysql_query($c);
   print "<br>Falso ".$c;
   }
   
  }
    /*****Cierro practia si ya termino***************************/
   
    
?>