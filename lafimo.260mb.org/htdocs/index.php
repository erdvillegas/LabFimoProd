
    <?php require_once('estilos.php'); session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laboratorio Flexible FIME-UANL</title>

</head>

 <body background="extra/4.jpg">
<form id="ingresar" name="ingresar" method="post" action="controlador/login.php">
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">
    <label>Usuario</label>
    <input type="text" name="usu" tabindex="1" />
  </p>
  <p align="center">
    <label>Password 
    <input type="password" name="pass" tabindex="2" />
    </label>
  </p>
  <p align="center">
    <label></label>
    <label></label>
    <label></label>
    <label>Tipo de cuenta
    <select name="tipo" size="1">
      <option value="1" selected="selected">Estudiante</option>
      <option value="2">Maestro</option>
    </select>
    </label>
  </p>
  <p align="center">
    <input name="Submit" type="submit" accesskey="E" value="Enviar" />
	<?php print "<br><br>* Nota: algunos datos podr&aacute;n ser almacenados temporalmente";?>
  </p>
</form>
</body>
</html>

