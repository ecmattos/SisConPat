<?php

	$server	    = "localhost";
	$user 		= "root";
	$pass 		= "";
	$db 		= "sisconpat_ceasa";

	$conexaoDB = mysql_connect($server, $user, $pass);
	mysql_select_db($db,$conexaoDB);
?>