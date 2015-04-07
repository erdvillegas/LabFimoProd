<?php
require_once('estilos.css');
require_once('controles_mysql.php');
require_once('muestra_dtos.php');
require_once('genera_log.php');
require_once('estilos.php');
/***************************************************
Datos basicos
***************************************************/
$ma     =   $_SESSION['User'];      //Matricula del estudiante
$bri    =   $_GET['n_br'];         //Recivo la brigada
$pra    =   $_GET['pra'];         //Recivo la clave de la practica

if (!isset($_SESSION['User'])) { 
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{
$b = $_SESSION['User'];
print "<title>"."Usuario:"." ".$b."</title>";
/**************************************************/

/*****Extraer practicas*******************************************/
    function pracctica_a() {
    global $pra;            
    $sql_a="SELECT * FROM practica WHERE no_practica=$pra";
    $pracctica_a =array();
    $result_a = mysql_query($sql_a);
    $tot =mysql_num_rows($result_a);
    $numDatos_a =mysql_num_rows($result_a);
    $i_a=0;
    while ($row_a = mysql_fetch_object($result_a)){
    $pracctica_a[$i_a]=$row_a;
    $i_a++;
    }
    return $pracctica_a;
    }
    }

    /*****Extraigo las cantidades Mesas y estudiantes*******************************************/
    $pracctica_a = pracctica_a();
    foreach ($pracctica_a as $key =>$p){
    $prac=$p->no_practica;     //Recivo el numero de la practica
    $d=$p->disponible;        //Disponibilidad
    $m=$p->mesas;            //Mesas disponibles
    $e=$p->estp_mesa;   //Estudiantes por mesa
    /*****Control de apertura y cierre de practicas***************************/ 
    }
  
    $to= $m*$e;         //Cupo de la practica
    $sql_b = "SELECT gmatricula FROM grupo_pra WHERE (no_gpractica) IN (SELECT no_practica FROM practica WHERE disponible=1) AND no_gbrigada=$bri AND cubierto !=1 ;";

    $re_b = mysql_query($sql_b);    
    $tot_e =mysql_num_rows($re_b)+1;    //Total de estudiantes
        
    if ($to>=$tot_e)
    {
        
    $c = "UPDATE brigada SET  lleno=0, mensaje ='Apertura automatica -Hay cupos disponibles !' Where no_brigada = $bri";   
    mysql_query($c);
/**************************************************/
    /*Valido la disponibilidad de la brigada*************************************************************************/
            
        $consulta="INSERT INTO grupo_pra(id,no_gpractica,no_gbrigada,gmatricula,asistencia,cubierto) VALUES ('null','$pra','$bri','$ma','null','2')";
 
        if(mysql_query($consulta)){
        print "<p class ='info'>Te has inscrito correctamente</p>";
                echo '<meta http-equiv="Refresh" content="2;url=../vista/estudiantes.php">';
        }else{
        print"<p class ='info'>Ya estas registrado en otra pr&aacute;ctica</p>";
        echo '<meta http-equiv="Refresh" content="2;url=../vista/estudiantes.php"> ';
        }       
    /*Valido la disponibilidad de la brigada*************************************************************************/  
    }
  
   else 
   {
   $c="UPDATE brigada SET  lleno=1, mensaje ='Cierre automatico -Se lleno el grupo'  Where no_brigada = $bri";
   mysql_query($c);
   
   echo '<meta http-equiv="Refresh" content="2;url=br_estudiante.php">';
   print"<p class ='info'>Grupo lleno, seleccione otro</p>";
   
   $ac="UPDATE brigada SET  lleno=0 WHERE no_brigada = $bri";
   mysql_query($ac);
   }                
   
?>     