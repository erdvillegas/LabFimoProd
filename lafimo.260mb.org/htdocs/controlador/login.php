<?php require_once('controles_mysql.php');
?>
<title>Login</title><?php 
require_once('directorios.php');
require_once('genera_log.php');
//Recupero los valores del formulario
$u=$_POST['usu'];
$p=$_POST['pass'];
$t=$_POST['tipo'];


switch ($t){
case 1: //Si es estudiante
        global $u,$p,$t;
		//session_start(); 
		if (!isset($u)) { 
		} else { 
		$consulta = "SELECT * FROM estudiante WHERE matricula = '$u' AND pas_e = '$p'"; 
		$datos = mysql_query($consulta); 
		$numDatos = @mysql_num_rows($datos); 
		if ($numDatos <= 0) { 
		$_SESSION['es'] = 'Error';
		$_SESSION['cta'] ='error';	//Envio un identificador q indica el tipo de usuario
		echo "<p class= 'error'>Error: Usuario o contrase&ntilde;a incorrectos<br></p>"; 
		echo '<meta http-equiv="Refresh" content="2;url=../index.php"> ';
		} else { 	
			while ($col=mysql_fetch_array($datos))
	    {
	    if ($_SESSION['User'] = $u ){
		//Lo mando a la pagina del estudiante y establesco criterios de session
		$_SESSION['es'] =$col['nombre'];
		$_SESSION['cta'] ='estu';	//Envio un identificador q indica el tipo de usuario
		header("location: ../vista/estudiantes.php");
		}
		return true;
		}
break;
		}
		}
		
case 2: //Si es maestro
        global $u,$p,$t;
		//session_start(); 
		if (!isset($u )) { 
		} else { 
		$consulta = "SELECT * FROM maestro WHERE no_empleado = '$u' AND pas_m ='$p'"; 
		$datos = mysql_query($consulta); 
		$numDatos = @mysql_num_rows($datos); 
		if ($numDatos <= 0) { 
		echo "<p class= 'error'>Error: Usuario o contrase&ntilde;a incorrectos<br></p>"; 
		echo '<meta http-equiv="Refresh" content="2;url=../index.php"> ';
		} else 	{ 	
		while ($col=mysql_fetch_array($datos))
	    {
	    if ($_SESSION['User'] = $u ){
		if ($col['admin']==1){
		//Lo mando a la pagina del maestro estandar y establesco criterios de session
		$_SESSION['ma_a'] =$col['nombre'];
		$_SESSION['cta'] ='maa';	//Envio un identificador q indica el tipo de usuario
		;
		header("location: ../vista/maestros_ad.php");
		}else {
		if ($_SESSION['User'] = $u ){
		if ($col['admin']==2){
		//Lo mando a la pagina del maestro estandar y establesco criterios de session
		$_SESSION['ma_a'] =$col['nombre'];
		$_SESSION['cta'] ='masu';	//Envio un identificador q indica el tipo de usuario
		header("location: ../vista/maestros_ad.php");
		}else{
		//Lo mando a la pagina del maestro estandar y establesco criterios de session
		$_SESSION['ma_e'] =$col['nombre'];
		$_SESSION['cta'] ='mae';	//Envio un identificador q indica el tipo de usuario
		header("location: ../vista/maestros_es.php");
		}
		 
         //Tipos de cuenta para identificar el superusuario		 
		//estu = Estudiante
	   //mae  =  Maestro estandar
	  //maa	  =  Maestro administrador
	 //masu	  =  Maestro superusuario	
		return true;

		}else {echo "Error: usuario o contrasña incorrectos. O usuario no dado de alta.<br>"; }
		}
		break;
		}
		}

}
}
}
?>