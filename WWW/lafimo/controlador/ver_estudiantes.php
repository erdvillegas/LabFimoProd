<style>
p {text-align:center}
</style>	
<?php
/************************Datos basicos ******************************/
require_once('controles_mysql.php');
require_once('estilos.css');
require_once('genera_log.php');
require_once('controles_pra.php');
require_once('estilos.php');

if (!isset($_SESSION['User'])) { 
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{
$b=$_SESSION['User'];
print "<title>Usuario: ".$b."</title>";
/************************Datos basicos ******************************/

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
$_POST['tipo']="id";
$_POST['ord']="ASC";
}
/************************Validador***********************************/

	print "<form align='center' id='ordenar' name='ordenar' method='post' action='ver_estudiantes.php'>";
	print "<label>Ordenar por";
    print "<select name='tipo' size='1'>";
    print "<option value='id' selected='selected'>Id</option>";
	print "<option value='matricula'>Matricula</option>";
	print "<option value='brigada'>Brigada</option>";
	print "<option value='nombre'>Nombre</option>";
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
	
	//Menu
	print	"<ul class=dropdown dropdown-horizontal>";
	print "<li><p = align='center'><a href=../vista/maestros_ad.php class=dir>Regresar</a></p>";
	print"</ul><br><br>";
	


/***********************Estudiantes live**********************************/
?>
<br>
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
                xmlhttp.open("GET","estudiantes_live.php?q="+str,true);
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
/*************************************Estudiantes live*************************************/

	function estudiantes () {
	global $x, $y;				
	$sql="SELECT * FROM estudiante ORDER BY $x $y";
	$estudiantes =array();
	$result	= mysql_query($sql);
	$tot =mysql_num_rows($result);
	print "<h1><p align='center' stong>Total de estudiantes: ".$tot."</p></h1>";
	$numDatos = @mysql_num_rows($result);
	$i=0;
	while ($row = mysql_fetch_object($result)){
	$estudiantes[$i]=$row;
	$i++;
	}
	return $estudiantes;
	}
		

	$estudiantes = estudiantes();
	global $numDatos;
	
	print"<table border='2' class='infot' align='center'>";
	print"<tr>";
	print"<td>";
	print"<p><strong>Id</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Matricula</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Nombre</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Brigada</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Mensaje</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Password</strong></p>";
	print"</td>";
	print"<td>";	
	print"<p><strong>Plan</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Medio Curso</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Ordinario</strong></p>";
	print"</td>";
	print"</tr>";

	/* Alimentar tabla*/
	foreach ($estudiantes as $key =>$est){
	print"<tr>";
	print"<td>";
	print "<p align='center'>".$est->id."</p>";
	print"</td>";
	print"<td>";
	print "<p align='center'>".$est->matricula."</p>";
	print"</td>";
	print"<td>";
	print "<p align='center'>".$est->nombre."</p>";
	print"</td>";
	print"<td>";
	print "<p align='center'>".$est->grupo."</p>";
	print"</td>";
	print"<td>";
	print "<p align='center'>".$est->mensaje."</p>";
	print"</td>";
	print"<td>";
	print "<p align='center'>".$est->pas_e."</p>";
	print"</td>";
	print"<td>";
	print "<p align='center'>".$est->plan."</p>";
	print"</td>";
	print"<td>";
	print "<p align='center'>".$est->medio_c."</p>";
	print"</td>";
	print"<td>";
	print "<p align='center'>".$est->ord."</p>";
	print"</td>";
	print"</tr>";
	}
	print"</table>";
		

}
?>