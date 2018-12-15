<?php
	require_once "support.php";


	$body = <<<EOBODY
		

		<img src="images\hospital2.jpeg" id=hos1img>

		
EOBODY;

	$compPage = buildPage($body, "Willhelm International");
	echo $compPage;

?>