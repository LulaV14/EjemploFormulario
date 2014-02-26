<?php
	
	include'connection.php';

	$q=$_GET["q"];


	if($q!=""){

	$sql ="SELECT ID_Asist, Nombre, Email, Empresa, Tipo FROM Asistente WHERE ID_Asist LIKE '%$q%' OR Nombre LIKE '%$q%' OR Email LIKE '%$q%' OR Empresa LIKE '%$q%' OR Tipo LIKE '%$q%' ORDER BY ID_Asist ASC";

	$result = mysql_query($sql);

	if(mysql_num_rows($result) == 0){
		echo "<h4>No se encontró ningún resultado . . .</h4>";
	}else{


	echo "<table class='table table-striped table-bordered table-condensed'>\n<thead>\n<tr>\n<th>ID</th>\n<th>Nombre</th>\n<th>Email</th>\n<th>Empresa o Institucion</th>\n<th>Tipo de Asistente</th>\n<th></th>\n</tr>\n</thead>\n</tbody>"; 
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) { 
   		echo "\t<tr>\n"; 
   		foreach ($line as $col_value) { 
       			echo "\t\t<td>$col_value</td>\n"; 
   		} 
   		echo "<td>&nbsp;<a href='javascript:eraseAsist({$line['ID_Asist']})'><i class='icon-remove'></i></a></td>";
   		echo "\t</tr>\n"; 
	}
	echo "</tbody>\n</table>\n"; 	
}

}else{
	$sql2="SELECT * FROM Asistente";

	$result2 = mysql_query($sql2);

	echo "<table class='table table-striped table-bordered table-condensed'>\n<thead>\n<tr>\n<th>ID</th>\n<th>Nombre</th>\n<th>Email</th>\n<th>Empresa o Institucion</th>\n<th>Tipo de Asistente</th>\n<th></th>\n</tr>\n</thead>\n</tbody>"; 
	while ($line2 = mysql_fetch_array($result2, MYSQL_ASSOC)) { 
   		echo "\t<tr>\n"; 
   		foreach ($line2 as $col_value2) { 
       			echo "\t\t<td>$col_value2</td>\n"; 
   		} 
   		echo "<td>&nbsp;<a href='javascript:eraseAsist({$line2['ID_Asist']})'><i class='icon-remove'></i></a></td>";
   		echo "\t</tr>\n"; 
	}
	echo "</tbody>\n</table>\n"; 	

}

	?>	