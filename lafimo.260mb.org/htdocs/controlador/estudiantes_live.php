<?php
require_once('controles_mysql.php');

$q = $_GET['q'];


/*************************************************************************************/
function estudiantes () {
    global $q;
    $sql="SELECT * FROM estudiante WHERE nombre like '%$q%'";
    $estudiantes =array();
    $result = mysql_query($sql);
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
        
/*************************************************************************************/