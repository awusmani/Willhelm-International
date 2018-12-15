<?php


	require_once "support.php";
	require_once "DBLogin.php";

	//makes sure a patient is logged in to view this page
	if($_SESSION["type"] != "Patient"){
		header('Location: login.php');
	}

	$output = "";


	if(isset($_POST["bookAppt"])){
		//insert into values into appointments database

		$username = $_SESSION["username"];
		$date = $_POST["apptDate"];
		$time = explode(' ', $_POST["timelist"]);
		$timeNum = $time[0].":00:00";
		$AMPM = $time[1];
		$doctorUser = $_POST["doctorslist"];

		$query = "insert into appointments values(NULL,'$username','$date','$timeNum','$AMPM','$doctorUser','Current');";
		$result = $database->query($query);

		$query = "select firstname,lastname from accounts where username = '$doctorUser'";
		$resultDoc = $database->query($query);
		$resultDoc->data_seek(0);
		$row = $resultDoc->fetch_array(MYSQLI_ASSOC);
		$docName = $row['firstname']." ".$row['lastname'];

		if(!$result){
			//query failed
			$output = "</br>Appoinment booking failed!";

		} else{

			$output = "</br>
					   Appoinment booked successfully!
					   </br></br>
					   Appointment details:</br>
					   Date: $date</br>
					   Time: {$_POST['timelist']}</br>
					   Doctor: $docName";

		}


	}



	//creates the list of doctors

	$doctors = "<select name='doctorslist'>
					<option value='Select Doctor'>Select Doctor</option>";

	$query = "select * from accounts where type ='Doctor'";

	$result = $database->query($query);
	if(!$result){
		//query failed
	} else{

		$num_rows = $result->num_rows;
		if($num_rows === 0){
			//doctors not found
			

		} else{

			for($x = 0; $x < $num_rows; $x++){

				$result->data_seek($x);
				$row = $result->fetch_array(MYSQLI_ASSOC);

				//creates the list with every doctor in the database

				$doctors .= "<option value='".$row["username"]."'>".$row["firstname"]." ".$row["lastname"]."</option>";

			}

		}

	}

	$doctors .= "</select>";




	$body = <<<EOBODY

	<div id="apptDiv">

		<h2>Book an Appointment</h2>

		<form action = 'bookAppt.php' method='post' id='submitAppt'>

			<input type="date" name="apptDate">
			</br></br>
			<select name='timelist'>
				<option value='Select Time'>Select Time</option>";
				<option value='7 AM'>7 AM</option>";
				<option value='9 AM'>9 AM</option>";
				<option value='11 AM'>11 AM</option>";
				<option value='1 PM'>1 PM</option>";
				<option value='2 PM'>2 PM</option>";
				<option value='4 PM'>4 PM</option>";
			</select>

			</br></br>

			$doctors

			</br></br>

			<input type= 'submit' name= 'bookAppt' value= 'Book Appointment' id='bookAppt'>
			</br>
			<span>$output</span>


		</form>


	</div>
	

EOBODY;


	
	$compPage = buildPage($body, "Patient");
	echo $compPage;



?>