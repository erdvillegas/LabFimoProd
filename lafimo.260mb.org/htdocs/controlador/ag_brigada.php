<?php $bri=$_GET['brig']; 
print "<form id='form1' name='form1' method='post' action='recive_adbrigada.php?hora=$bri'>";
require_once('genera_log.php');
require_once('estilos.php');
?>
<p>
  <?php
//Este documento se utiliza para agregar brigadas
session_start();
$b = $_SESSION['User'];
print "<title>Agregar para:"." ".$b."</title>";
?>
</p>
<p>
  <label>Brigada
  <input type="text" name="brigada"  title="N&Uacute;mero de brigada"/>       
  </label>
    <label>
    Disponibilidad
    <select name="disponible" title="Disponibilidad de la brigada">
      <option value="1">DISPONIBLE</option>
      <option value="0">NO DISPONIBLE</option>
    </select>
    </label>
</p>
<p>
    
    <label>Maestro</label>
	
	<?php
	require_once('controles_mysql.php');
		function maestros (){
		$sql = "SELECT * FROM maestro";
		$maestros = array();
		$datos=mysql_query($sql);
		{
		$i=0;
		while ($col=mysql_fetch_object($datos))
		{
		$maestros[$i]=$col;
		$i++;
		}
		return $maestros;
		}
		}
		$maestros =maestros();		
		
		print "<select name='maestro'>";		
		foreach ($maestros as $key =>$ma)
		{		
		print "<option value='$ma->no_empleado'>".$ma->nombre."</option>";
		}
		print "</select>";
		
	?>
</p>

 <p>
    <label> Plan
    <input type="text" name="plan"  title="Plan de estudios" align="center"   />
    </label>
  </p>
  <p>
    
	<label>Mensaje 
	<textarea name='msj' cols=20 rows=5></textarea>
    
    </label>
</p>
  <label></label>
    <label>
<label></label>
    <label></label>
    <label></label>
    <p>
      <input type="submit" name="Submit" value="Enviar" />
</p>
    <p>&nbsp;</p>

	
	
	<ul class="dropdown dropdown-horizontal">
	<li><a href ='r_brigadas.php?brig=$bri'>Cancelar</a></li>
			
	</ul>