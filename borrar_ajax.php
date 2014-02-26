<?php

include'connection.php';

$q=$_GET["q"];

if(mysql_query("DELETE FROM Asistente WHERE ID_Asist = {$q}")){
	//echo "<div class='alert alert-success alert-block'><button type='button' class='close' data-dismiss='alert'>&times;</button><h4>Borrado!</h4>Se ha borrado exitosamente el asistente #{$q} ...</div>";
	//echo '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">&times;</button><h4>Borrado!</h4>Se ha borrado exitosamente el asistente ...</div>';
	echo '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">&times;</button><h4>Borrado!</h4>Se ha borrado exitosamente el asistente ...</div>';
} else {
	echo "<div class='alert alert-block'><button type='button' class='close' data-dismiss='alert'>x</button><b>Cuidado!!</b><br/>Hubo un error y no se ha podido eliminar el asistente . . .</div>";
}

?>