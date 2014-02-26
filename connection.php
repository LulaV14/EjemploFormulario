<?php

	$connect = mysql_connect('localhost', 'your_username', 'your_password');
	if(!$connect){ die('Could not make the connection to db'); }

	$selectdb = mysql_select_db('your_database');
	if(!$selectdb){ die('Could not select the DataBase'); }

?>