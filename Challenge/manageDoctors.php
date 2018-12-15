<?php
	

	require_once "support.php";
	
	//makes sure an admin is logged in to view this page
	if($_SESSION["type"] != "Admin"){
		header('Location: login.php');
	}

	require_once "DBLogin.php";
	
	$addret = "";
	$delret = "";


	if(isset($_POST["addDoc"])){
		//add doctor clicked

		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$user = $_POST["username"];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

		$query = "insert into accounts values('$user', '$password', '$firstname', '$lastname', 'Doctor')";

		$result = $database->query($query);

		if (!$result) {
			$addret = "Doctor " . $firstname . " " . $lastname . " add failed!";
		}
		else{
			$addret = "Doctor " . $firstname . " " . $lastname . " added successfully";
		}


	} else if(isset($_POST["delDoc"])){
		//delete doctor clicked

		if($_POST["doctorslist"] != "Select Doctor"){

			$delDocName = $_POST["doctorslist"];

			$query = "delete from accounts where username ='".$delDocName."'";

			$result = $database->query($query);

			if (!$result) {
				$delret = "User " . $delDocName . " delete failed!";
			}
			else{
				$delret = "User " . $delDocName . " deleted successfully!";
			}

		}


	} else{
		//continue on to loading the page
	}



	$options = "<select name='doctorslist'>
					<option value='Select Doctor'>Select Doctor</option>";

	//gets the list of doctors from accounts database to create selection list						
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

				$options .= "<option value='".$row["username"]."'>".$row["firstname"]." ".$row["lastname"]."</option>";

			}

		}

	}

	$options.= "</select>";







	$body = "

			<form action = 'manageDoctors.php' method='post' id='submitDoc'>

				<div id='addDoc'>

					<h3>Add Doctor</h3>

					<input type= 'text' name= 'firstname' placeholder= 'firstname'>
					</br></br>
					<input type= 'text' name= 'lastname' placeholder= 'lastname'>
					</br></br>
					<input type= 'text' name= 'username' placeholder= 'username'>
					</br></br>
					<input type= 'password' name= 'password' placeholder= 'password'>
					</br></br>

					<span>".$addret."</span>

					</br>


					<input type= 'submit' name= 'addDoc' value= 'Add Doctor' id='addDoButton'>

				</div>

				<div id='delDoc'>

					

					<h3>Delete Doctor</h3>

					$options
								
					<input type= 'submit' name= 'delDoc' value= 'Delete Doctor' id='delDocButton'>


					</br>

					<span>".$delret."</span>

					

				</div>

			</form>

			


		</body>";



	$compPage = buildPage($body, "Admin");
	echo $compPage;



?>