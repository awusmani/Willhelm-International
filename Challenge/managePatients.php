<?php


	require_once "support.php";

	//makes sure an admin is logged in to view this page
	if($_SESSION["type"] != "Admin"){
		header('Location: login.php');
	}




	$body = <<<EOBODY

	

EOBODY;


	
	$compPage = buildPage($body, "Admin");
	echo $compPage;



?>