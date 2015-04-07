<?php
/************************Datos basicos ******************************/
require_once('controles_mysql.php');
require_once('estilos.css');
require_once('genera_log.php');

if (!isset($_SESSION['User'])) { 
require_once('genera_log.php');
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{
$b=$_SESSION['User'];
print "<title>Usuario: ".$b."</title>";
/************************Datos basicos ******************************/

/****Arreglo con el horario****/
	    function dia ($hra){
		if ($hra==1 || $hra==7 || $hra==13 || $hra==19 || $hra==25 || $hra==31 || $hra==37 || $hra==43 || $hra==49)
		{
		return 'monday';	
		}else {
			if ($hra==2 || $hra==8 || $hra==14 || $hra==20 || $hra==26 || $hra==32 || $hra==38 || $hra==44 || $hra==50)
		{
		return 'tuesday';	
		}else {
			if ($hra==3 || $hra==9 || $hra==15 || $hra==21 || $hra==27 || $hra==33 || $hra==39 || $hra==45 || $hra==51)
		{
		return 'wednesday';	
		}else {
			if ($hra==4 || $hra==10 || $hra==16 || $hra==22 || $hra==28 || $hra==34 || $hra==340 || $hra==46 || $hra==52)
		{
		return 'thursday';	
		}else {
			if ($hra==5 || $hra==11 || $hra==17 || $hra==23 || $hra==29 || $hra==35 || $hra==41 || $hra==47 || $hra==53)
		{
		return 'friday';	
		}else {
			if ($hra==6 || $hra==12 || $hra==18 || $hra==24 || $hra==30 || $hra==36 || $hra==42 || $hra==48 || $hra==54)
		{
		return 'saturday';	
		}
		}
		}
		}
		}
		}
	}


	/*****Extraer brigadas*******************************************/
	function brigada() {			
	$sql= "SELECT * FROM brigada where disp_mae=1"; 
	$brigada =array();
	$result	= mysql_query($sql);
	$tot =mysql_num_rows($result);
	$numDatos = @mysql_num_rows($result);
	$i=0;
	while ($row = mysql_fetch_object($result)){
	$brigada[$i]=$row;
	$i++;
	}
	return $brigada;
	}
	}
	/*****Extraigo las fechas*******************************************/
	$brigada = brigada();
	foreach ($brigada as $key =>$br){
	$hr=$br->hora_clase; 			 //Clave de la hora
	$bri=$br->no_brigada;			//Numero de brigada
	$di= $br->disponibilidad;	   //Disponibilidad
	$in= $br->hora_inicio;			      			  //Recivo la hora de inicio
	$fi= $br->hora_fin;			   					 //Recivo la hora de fin
	$rea =date("H:i:s");       				//hora actual
	$in_c=date("H:i:s",strtotime("-1hours",strtotime("$in")));	   //Calculada	

	$di_a=date("Y-m-d");											  //Dia
	$v=dia($hr);
	$di_c=date("Y-m-d",strtotime("$v"));
	
/****Arreglo con el horario****/

	/*****Control de apertura y cierre de practicas***************************/	
	
		//Defino la zona horaria
		
		
		//Si la fecha real es mayor o igual que la de inicio, abro la practica 
		if (($rea<=$in_c) || ($di_a<=$di_c)) {
		$sql = "UPDATE  brigada SET disp_mae=1, mensaje='Apertura automatica -Fecha de inicio' WhERE  no_brigada=$bri";
		mysql_query($sql); 
		}
		
		if(($rea>=$in_c) && ($di_a>=$di_c)){
		//Si la fecha final es mayor o igual que la real, cierro la practica 
		//Defino la zona horaria
		date_default_timezone_set('America/Monterrey');
		$sql = "UPDATE  brigada SET disp_mae=0, mensaje= 'Cierre automatico -Fecha terminada' WhERE  no_brigada=$bri";
		mysql_query($sql); 
		}	
		}
		
		require_once('mesas.php');
		
	/*****Cierro practia si ya termino***************************/	

?>