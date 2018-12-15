<?php


	require_once "support.php";

	//makes sure an admin is logged in to view this page
	if($_SESSION["type"] != "Patient"){
		header('Location: login.php');
	}

	$body = <<<EOBODY


	<div class="taskPage">
		<div id="manDocDiv">
			<img src="images\manageDocImg.jpg" id=manDocImg>
			<div id="manDocTxt"><a href="bookAppt.php">Book Appointment</a></div>
		</div>

		<div id="manPatDiv">
			<img src="images\managePatientImg.jpg" id=manPatImg>
			<div id="manPatTxt"><a href="currMed.php">View Current Medication</a></div>
		</div>
	</div>

	

EOBODY;


	
	$compPage = buildPage($body, "Patient");
	echo $compPage;



?>