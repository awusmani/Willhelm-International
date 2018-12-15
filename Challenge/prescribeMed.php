<?php


	require_once "support.php";

	//makes sure an doctor is logged in to view this page
	if($_SESSION["type"] != "Doctor"){
		header('Location: login.php');
	}

	require_once "DBLogin.php";

	$output = "";

	if(isset($_POST["prescMed"])){
		//code to insert prescription into prescription table

		$username = $_POST["patientlist"];
		$medicationID = (int) $_POST["medlist"];
		$dosage = $_POST["dosage"];
		$startdate = $_POST["medStartDate"];
		$frequency = $_POST["frequency"];
		$duration = $_POST["duration"];
		

		$query = "insert into prescriptions values(NULL,'$username',$medicationID,'$dosage','$startdate','$frequency','duration', 'Current');";

		$result = $database->query($query);

		if(!$result){
			$output = "Prescription Failed!";
		} else{
			$output = "Prescription Successful!";
		}



	}


	//creates the list of patients

	$patients = "<select name='patientlist'>
					<option value='Select Patient'>Select Patient</option>";

	$query = "select distinct A.username,T.firstname,T.lastname from appointments A,accounts T where A.doctor='{$_SESSION["username"]}' and A.username = T.username;";

	$result = $database->query($query);
	if(!$result){
		//query failed
	} else{

		$num_rows = $result->num_rows;
		if($num_rows === 0){
			//patients not found
			

		} else{

			for($x = 0; $x < $num_rows; $x++){

				$result->data_seek($x);
				$row = $result->fetch_array(MYSQLI_ASSOC);

				//creates the list with every patient for that doctor in the database

				$patients .= "<option value='".$row["username"]."'>".$row["firstname"]." ".$row["lastname"]."</option>";

			}

		}

	}

	$patients .= "</select>";



	//creates the list of medications

	$medList = "<select name='medlist'>
					<option value='Select Medication'>Select Medication</option>";

	$query = "select * from medications;";

	$result = $database->query($query);
	if(!$result){
		//query failed
	} else{

		$num_rows = $result->num_rows;
		if($num_rows === 0){
			//medications not found
			

		} else{

			for($x = 0; $x < $num_rows; $x++){

				$result->data_seek($x);
				$row = $result->fetch_array(MYSQLI_ASSOC);

				//creates the list with medication in the table

				$medList .= "<option value='".$row["medicationID"]."'>".$row["name"]."</option>";

			}

		}

	}

	$medList .= "</select>";



	$body = <<<EOBODY


		<div id="prescMedPage">

			<h2>Prescribe Medication</h2>

			<form action = 'prescribeMed.php' method='post' id='submitPresc'>

				$patients

				</br></br>

				$medList

				</br></br>

				Dosage: <input type="text" name="dosage"></input>
				</br></br>

				Start Date: <input type="date" name="medStartDate">
				</br></br>

				Frequency: <input type="text" name="frequency"></input>
				</br></br>

				Duration: <input type="text" name="duration"></input>
				</br></br>

				<input type= 'submit' name= 'prescMed' value= 'Prescribe' id='prescMed'>
				</br>
				<span>$output</span>


			</form>

			
		</div>

	

EOBODY;


	
	$compPage = buildPage($body, "Prescribe Medication");
	echo $compPage;



?>