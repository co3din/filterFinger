<?php
	$host = "your machine host";
	$user = "username";
	$pass = "password";
	$db = "database";
	
	$konek = mysql_connect($host,$user,$pass);
	$db = mysql_select_db($db);
	
?>