<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "test";
	
	$konek = mysql_connect($host,$user,$pass);
	$db = mysql_select_db($db);
	
?>