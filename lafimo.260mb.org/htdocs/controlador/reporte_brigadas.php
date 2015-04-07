<style>
p{text-align:center;}
</style>
<?php
/******Datos Basicos**************************************************/
require_once('controles_mysql.php');
require_once('estilos.css');
require_once('genera_log.php');
require_once('controles_br.php');
require_once('estilos.php');

if (!isset($_SESSION['User'])) { 
print "<p align ='center' class='error'>Usuario no logueado, Si deseas ver esta p&aacute;gina <br>loguearse primero</p>";
echo "<meta http-equiv='Refresh' content='4;url=../index.php'>";
session_destroy();
}else{
$b=$_SESSION['User'];
$tpo=$_SESSION['cta'];  //Tipo de cuena estandar = es o admin=ad

print "<title>Usuario: ".$b."</title>";
/******Datos Basicos**************************************************/

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

	print "<form align='center' id='ordenar' name='ordenar' method='post' action='reporte_brigadas.php'>";
	print "<label>Ordenar por";
    print "<select name='tipo' size='1'>";
    print "<option value='id' selected='selected'>Id</option>";
	print "<option value='no_brigada'>N&uacute;mero de brigada</option>";
	print "<option value='no_empleado'>Maestro</option>";
	print "<option value='hora_clase' >D&iacute;a</option>";
	print "<option value='hora_inicio'>Inicio</option>";
	print "<option value='hora_fin'>Fin</option>";
	print "<option value='disponibilidad'>Disponible</option>";
	print "<option value='alumnos_por_mesa'>Estudiantes por mesa</option>";
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
	
	//Menu 
	if ($tpo=='mae'){
	print	"<ul class=dropdown dropdown-horizontal>";
	print "<li><a href=r_brigadas_mes.php>Regresar</a>";
	print"</ul>";
	}else {
	print	"<ul class=dropdown dropdown-horizontal>";
	print "<li><a href=r_brigadas.php>Regresar</a>";
	print"</ul>";
	}
	
	print "<ul class=dropdown dropdown-horizontal>";
    print "<li><a href=ext.php >Asistencia especial</a>";
    print"</ul>";
	print "<br><br>";
	
	
	//print "<a href='ext.php'>Asistencia especial</a>";
	function brigadas () {
	global $x, $y, $b, $tpo;		
	//Si el maestro es estandar
	if ($tpo=='mae'){
	$sql="SELECT * FROM brigada WHERE no_empleado= '$b' ORDER BY $x $y";
	}else {$sql="SELECT * FROM brigada ORDER BY $x $y";}
	$brigadas =array();
	$result	= mysql_query($sql);
	$tot =mysql_num_rows($result);
	print "<h1><p align='center' stong>Total de brigadas: ".$tot."</p></h1>";
	$i=0;
	while ($row = mysql_fetch_object($result)){
	$brigadas[$i]=$row;
	$i++;
	}
	return $brigadas;
	}
	
	$brigadas = brigadas();
	print"<table border='2' class='infot' align='center'>";
	print"<tr>";
	print"<td>";
	print"<p><strong>Id</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Num de brigada</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Maestro</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>D&iacute;a</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Inicio</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Fin</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Disponible</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Mensaje</strong></p>";
	print"</td>";
	print"<td>";
	print"<p><strong>Plan</strong></p>";
	print"</td>";
	print"<td>";
	print"<p align ='center'><strong>Estudiantes <br>del semestre </strong></p>";
	print"</td>";
	print"<td>";
	print"<p align ='center'><strong>Estudiantes <br> esta semana</strong></p>";
	print"</td>";
	print"</tr>";
	
	/* Alimentar tabla*/
	foreach ($brigadas as $key =>$brig){
	print"<tr>";
	print"<td>";
	print$brig->id;
	print"</td>";
	print"<td>";
	print$brig->no_brigada;
	print"</td>";
	/*Solo es para imprimir el nombre del maestro*/
	/****************************************************************************/
	$sql = "SELECT * FROM maestro where no_empleado= '$brig->no_empleado';";
	$datos = mysql_query($sql);
	$numDatos = @mysql_num_rows($datos); 
	if ($numDatos <= 0) {
	print"<td>";
	print "Maestro a&uacute;n no asignado";
	print"</td>";
	}else	{
	while ($col=mysql_fetch_array($datos)){
	print"<td>";
	print $col['nombre'];
	print"</td>";
	}
	}
	/*****************************************************************************/
	//Muestra el dia
	/*****************************************************************************/
	$hra=$brig->hora_clase;

	if ($hra==1 || $hra==7 || $hra==13 || $hra==19 || $hra==25 || $hra==31 || $hra==37 || $hra==43 || $hra==49)
	{
	print"<td>";
	print "Lunes";
	print"</td>";
	}else {
	if ($hra==2 || $hra==8 || $hra==14 || $hra==20 || $hra==26 || $hra==32 || $hra==38 || $hra==44 || $hra==50)
	{
	print"<td>";
	print "Martes";
	print"</td>";		
	}else {
	if ($hra==3 || $hra==9 || $hra==15 || $hra==21 || $hra==27 || $hra==33 || $hra==39 || $hra==45 || $hra==51)
	{
	print"<td>";
	print "Miercoles";
	print"</td>";
	}else {
	if ($hra==4 || $hra==10 || $hra==16 || $hra==22 || $hra==28 || $hra==34 || $hra==340 || $hra==46 || $hra==52)
	{
	print"<td>";
	print "Jueves";
	print"</td>";
	}else {
	if ($hra==5 || $hra==11 || $hra==17 || $hra==23 || $hra==29 || $hra==35 || $hra==41 || $hra==47 || $hra==53)
	{
	print"<td>";
	print "Viernes";
	print"</td>";	
	}else {
	if ($hra==6 || $hra==12 || $hra==18 || $hra==24 || $hra==30 || $hra==36 || $hra==42 || $hra==48 || $hra==54)
	{
	print"<td>";
	print "S&aacute;bado";
	print"</td>";	
	}
	}
	}
	}
	}
	}
	/*****************************************************************************/
	print"<td>";
	print$brig->hora_inicio;
	print"</td>";
	print"<td>";
	print$brig->hora_fin;
	print"</td>";
	if (($brig->disponibilidad)==1){
	print"<td>";
	print "Disponible";
	print"</td>";
	/*Imprime el letrero de disponible o no */
	}else {
	print"<td>";
	print "No Disponible";
	print"</td>";	
	}
	/***************************************/
	print"<td>";
	print$brig->mensaje;
	print"</td>";
	print"<td>";
	print$brig->plan;
	print"</td>";
	print"<td>";
	$hora=$hra;
	$brigada=$brig->no_brigada;
	print "<a href='ver_grupo.php?h=$hora&b=$brigada'><p align='center'>Ver</p></a>";
	print"</td>";
	print"<td>";
	$hora=$hra;
	$brigada=$brig->no_brigada;
	print "<a href='ver_grupobr.php?h=$hora&b=$brigada'><p align='center'>Ver</p></a>";
	print"</td>";
	print"</tr>";
	}
	print"</table>";
	
	}
?>