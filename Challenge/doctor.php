<?php


	require_once "support.php";

	//makes sure a doctor is logged in to view this page
	if($_SESSION["type"] != "Doctor"){
		header('Location: login.php');
	}




	$body = <<<EOBODY


		<div class="taskPage">
			<div id="manDocDiv">
				<img src="images\manageDocImg.jpg" id=manDocImg>
				<div id="manDocTxt"><a href="prescribeMed.php">Prescribe Medication</a></div>
			</div>

			<div id="manPatDiv">
				<img src="images\managePatientImg.jpg" id=manPatImg>
				<div id="manPatTxt"><a href="viewAppts.php">View Appointments</a></div>
			</div>

			<div id="manDocDiv">
				<img src="images\managePatientImg.jpg" id=manPatImg>
				<div id="manPatTxt"><a href="viewPastApptsMeds.php">View Past Medical/Appointment History</a></div>
			</div>
		</div>

	

EOBODY;


	
	$compPage = buildPage($body, "Doctor");
	echo $compPage;



?>