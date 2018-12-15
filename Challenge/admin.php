<?php


	require_once "support.php";


	//makes sure an admin is logged in to view this page
	if($_SESSION["type"] != "Admin"){
		header('Location: login.php');
	}


	$body = <<<EOBODY

	<div class="taskPage">
		<div id="manDocDiv">
			<img src="images\manageDocImg.jpg" id=manDocImg>
			<div id="manDocTxt"><a href="manageDoctors.php">Manage Doctors</a></div>
		</div>

		<div id="manPatDiv">
			<img src="images\managePatientImg.jpg" id=manPatImg>
			<div id="manPatTxt"><a href="managePatients.php">Manage Patient Entries</a></div>
		</div>
	</div>

EOBODY;


	$compPage = buildPage($body, "Admin");
	echo $compPage;



?>