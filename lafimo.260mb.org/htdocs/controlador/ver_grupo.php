<style>
p{
text-align:center;
}
</style>
<?php
/******Datos Basicos**************************************************/
require_once('controles_mysql.php');
require_once('estilos.css');
require_once('genera_log.php');
require_once('estilos.php');

if (!isset($_SESSION['User'])) { 
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
}else{
$b=$_SESSION['User'];
$tpo=$_SESSION['cta'];  //Tipo de cuena estandar = es o admin=ad
print "<title>Usuario: ".$b."</title>";
if($tpo=='estu'){
print "<p align ='center' class='error'>No cuentas con los suficientes privilegios <br>para ver esta p&aacute;gina</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{

/************************Validador***********************************/
function validar()
{
if ($_POST==null){
	
	//print "Es null";
    throw new Exception("null");
	return true;
	}
	else { return null;}
}

try
{	
	validar();	
}
catch(Exception $e)
{
$_POST['tipo']="matricula";
$_POST['ord']="ASC";
}
/************************Validador***********************************/

/******Datos Basicos**************************************************/
	$h=$_GET['h'];     //Clave de clase
	$b=$_GET['b'];    //Numero de la brigada
	
	$_SESSION['hl']=$h;
	$_SESSION['bl']=$b;
				
	if ($tpo=='mae'){
	 print"<ul class=dropdown dropdown-horizontal>";
		print"<li><a href=r_brigadas_mes.php>Regresar</a></li>";
		print"</ul>";
		}else {
		print"<ul class=dropdown dropdown-horizontal>";
		print"<li><a href=r_brigadas.php>Regresar</a></li>";
		print"</ul>";
			}
		print "<br>";	
	print "<form align='center' id='ordenar' name='ordenar' method='post' action='ver_grupo.php?h=$h&b=$b'>";
	print "<label>Ordenar por";
    print "<select name='tipo' size='1'>";
	print "<option value='matricula'>Matricula</option>";
	print "<option value='nombre' >Nombre</option>";
	print "<option value='promedio'>Promedio</option>";
	print "<option value='plan'>Plan</option>";
	print "<option value='mensaje'>Mensaje</option>";
    print "</select>";
    print "</label>";
	$x=$_POST['tipo'];
	
	print "<label> Ordenar:";
	print "<select name='ord' size='1'>";
    print "<option value='ASC' selected='selected'>Ascendente</option>";
    print "<option value='DESC'>Descendente</option>";
    print "</select>";
    print "</label>";
	print "<br><br><input name='Submit' type='submit' accesskey='O' value='Ordenar' />";
	print "</form>";
	print "</label>";
	$y=$_POST['ord'];
	
/**Filtrar datos***********************************/
?>
<html>
    <head>
    
        <script type="text/javascript">

            function showHint(str)
            {
                if (str.length==0)
                    { 
                        document.getElementById("txtHint").innerHTML="";
                        return;
                    }
                if (window.XMLHttpRequest)
                    {// code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp=new XMLHttpRequest();
                    }
                else
                    {// code for IE6, IE5
                        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                    } 
               xmlhttp.onreadystatechange=function()
                    {
                        if (xmlhttp.readyState==4 && xmlhttp.status==200)
                            {
                                document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
                            }
                    } 
                xmlhttp.open("GET","recive_live.php?q="+str,true);
                xmlhttp.send();
            }
        </script>

        <form>
                <table align='center'>
                    <tr>
                        <td><h4>Buscar por nombre</h4></td>
                        <td><input type="estudiante" name='est' onkeyup="showHint(this.value)"/></td> 
                    </tr>
                </table>
        </form>
<p><span id="txtHint"></span></p>

    </head>
</html>

<?php
/**Filtrar datos***********************************/


	function estudiantes () {
	global $x, $y, $b, $tpo;		
	$sql="SELECT * FROM estudiante WHERE grupo= '$b' ORDER BY $x $y";
	$estudiantes =array();
	$result	= mysql_query($sql);
	$tot =mysql_num_rows($result);
	print "<h1><p align='center' stong>Total de estudiantes: ".$tot." <br>En la brigada: ".$b."</p></h1>";
	$i=0;
	while ($row = mysql_fetch_object($result)){
	$estudiantes[$i]=$row;
	$i++;
	}
	return $estudiantes;
	}
	
	$estudiantes = estudiantes();
	print"<table border='2' class='infot' align='center'>";
	print"<tr>";
	print"<td>";
	print"<p><strong>N&uacute;mero <br>de lista</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Matricula</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Nombre</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Plan</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Mensaje</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>M. Curso</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Ordinario</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Faltas en la <br>practica</strong></p>";
	print"</td>";
	print"<td>";
	print"<p align='center'><strong>Pr&aacute;cticas <br>completadas <br></strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Promedio</strong></p>";
	print"</td>";
	print"</tr>";
	
	/*******Calculo el total de retardos si es >2 es una falta************************/	
		function ret($mt){
		$consulta_r = "SELECT * FROM grupo_pra WHERE gmatricula = $mt AND asistencia=3"; 
		$datos_r = mysql_query($consulta_r); 
		$numDatos_r = @mysql_num_rows($datos_r); 
		if ($numDatos_r>= 2) 
		{
		return 1;	
		} else { return 0;	}
		}
/*******Calculo el total de retardos si es >3 es una falta************************/	

/*******Calculo el total de asistencia************************/	
		function asi($mt){
		$consulta_a = "SELECT * FROM grupo_pra WHERE gmatricula = $mt AND asistencia=1"; 
		$datos_a = mysql_query($consulta_a); 
		$numDatos_a = @mysql_num_rows($datos_a); 
		if ($numDatos_a<=0) 
		{
		return 0;	
		} else { return $numDatos_a;	}
		}
/*******Calculo el total de retardos si es >3 es una falta************************/	

/*****Consulto el total de practicas****************************************/
		function tpr(){
		$consulta_tpr = "SELECT no_practica FROM practica"; 
		$datos_tpr = mysql_query($consulta_tpr); 
		$numDatos_tpr = @mysql_num_rows($datos_tpr); 
		if ($numDatos_tpr <= 0) { 
		return 0;
		}else {	return $numDatos_tpr;}	
		}
/*****Consulto el total de practicas****************************************/
	$a=0;
	/* Alimentar tabla*/
	foreach ($estudiantes as $key =>$es){
	$a++;
	print"<tr>";
	print"<td>";
	//Numero de lista
	print "<p>".$a."</p>";
	print"</td>";
	print"<td>";
	print "<p>".$es->matricula."</p>";
	print"</td>";
	print"<td>";
	print "<p>".$es->nombre."</p>";
	print"</td>";
	print"<td>";
	print "<p>".$es->plan."</p>";
	print"</td>";
	print"<td>";
	print "<p>".$es->mensaje."</p>";
	print"</td>";
	$mt=$es->matricula;  //Matricula del estudiante
	
	/*******Medio Curso y ordinario************************/	
		$consulta_m = "SELECT * FROM estudiante WHERE matricula = '$mt'"; 
		$datos_m = mysql_query($consulta_m); 
		$numDatos_m = @mysql_num_rows($datos_m); 
		if ($numDatos_m<= 0) { 	
		print"<td>";
		print "No tiene calificaciones";
		print"</td>";
		print"<td>";
		print "No tiene calificaciones";
		print"</td>";
		} else { 	
			while ($col_m=mysql_fetch_array($datos_m))
	    {
		global $mtr;
		$mc=$col_m['medio_c'];
		$o=$col_m['ord'];
		$id=$col_m['id'];
		print "<form id='form1' name='form1' method='post' action='evaluar_br.php?h=$h&b=$b&ma=$mt'>";
		print"<td>";
		/***Modifcar datos  M.C*****************************/
			print "<input type='text' name='ev_m' value ='$mc'title='Medio Curso' size='5'/>";
		/***Modifcar datos  M.C*****************************/
		print"</td>";
		
		print"<td>";
		/***Modifcar datos  Ordinario*****************************/
			print "<input type='text' name='ev_o'  value ='$o'title='Ordinario' size ='5'/>";
		/***Modifcar datos  Ordinario*****************************/
		print"</td>";
		}
		}
	/*******Medio Curso y ordinario************************/	
	
	/*******Total de faltas************************/
		print"<td>";
		$consulta_f = "SELECT * FROM grupo_pra WHERE gmatricula = $mt AND asistencia=2"; 
		$datos_f = mysql_query($consulta_f); 
		$numDatos_f = @mysql_num_rows($datos_f); 
		$rt=ret($mt);
		$nf=$numDatos_f;
		$ntf=$rt+$numDatos_f;
		print "<p><b>Total de faltas: </b>".$ntf."</p>";
		if ($numDatos_f<= 0) 
		{ 	
		$r=ret($mt);
		
		//Imprimo si tiene o no retardos
		if ($r>0){print "<p align='center'>Tiene retardo</p>";}
		else{print "<p align='center'><b>No tiene faltas</b></p>";}
		} else { 	
			while ($col_f=mysql_fetch_array($datos_f)){
			print "<p align='center' >N&uacute;m. de pr&aacute;ctica: <br>".$col_f['no_gpractica']."</p>";
		}
		}
		print "</td>";
	/*******Total de faltas************************/		
	
	/********Imprimo la relacion de asistencia / total*******/
		print "<td>";
		$tp=tpr();
		$ta=asi($mt);
		print "<p align='center'>".$ta."/".$tp."</p>";
		print "<p align='center'><br>".(($ta/$tp)*100)."%</p>";
		print "</td>";
		/********Imprimo la relacion de asistencia / total*******/
		
	/*******Calculo el promedio************************/	
		$pm=(($mc+$o)/2);
		if ($pm>=70){
		print"<td>";
		print "<p align='center'>".$pm."<br><b>Aprobado</b></p>";
		print "<p align='center'><input type='submit' name='Submit' value='Evaluar'/></p>";
		print "</form>";
		print"</td>";
		}else {
		print "<td>";
		print "<p align='center'>".$pm."<br><b>No aprobado</b></p>";
		print "<p align='center'><input type='submit' name='Submit' value='Evaluar'/></p>";
		print "</form>";
		print "</td>";
		}		
	/*******Calculo el promedio************************/	
	
		print"</tr>";
	}
	print"</table>";
	}
	}
?>