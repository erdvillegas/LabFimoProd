<?php
require_once('genera_log.php');
require_once('estilos.php');
$b = $_SESSION['User'];
print "<title>"."Usuario:"." ".$b."</title>";
?>
<html>
<body>
		
<h1>Subir archivo</h1>
<ul class="dropdown dropdown-horizontal">
		<li><a href="../vista/maestros_ad.php">Regresar</a></p>
		</ul>
		<br><br><br>
<form action="carga_est.php" method="post" enctype="multipart/form-data">
<label for="file">Selecciona el archivo:</label>
<input type="file" name="file" id="file" /> 
<br />
<br>
<input type="submit" name="Subir" value="Subir" />
</form>

</body>
</html>
