<?php
	/* Update based on your database and account info */
	$host = "localhost";
	$DBuser = "admin";
	$DBpassword = "password";
	$DBname = "willhelm";


	/*starts the database and returns it so any page that includes this file has
	the database started and connected already*/
	$database = new mysqli($host, $DBuser, $DBpassword, $DBname);
	if ($database->connect_error) {
		die($database->connect_error);
	}

	return $database;
?>
