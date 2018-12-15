<?php
		
	require_once "support.php";

	$error = "";
	$username = "";

	
	
	if(isset($_POST['username'])){

		/* getAccount.php finds the username if it exists in the database 
		and verifies if password is correct for the account */
		require_once('getAccount.php');

		if($_SESSION["ret"] === "Success"){

			//if an admin logged in then redirect to admin page
			if($_SESSION["type"] === "Admin"){

				header('Location: admin.php');

			} else if($_SESSION["type"] === "Doctor"){//if doctor logged in redirect o doctor page

				header('Location: doctor.php');

			} else{//everyone else that logs in is a patient and gets redirected to patient page

				header('Location: patient.php');

			}

		}
		else{/*if username or password are incorrect then set 
			variables to show error message and restore the previous username
			entered for easability*/

			$error = "Invalid Login";
			$username = $_POST["username"];

		}

	}



	$body = <<<EOBODY

		<h2 class="loginsignupheader">Login</h2>

				
		<form action = "login.php" method="post" id="submit" class="loginForm">

			<input type= "text" name= "username" placeholder= "username" value="{$username}" id="username" required autofocus>

				</br></br>

			<input type= "password" name= "password" placeholder="password" id="password" required>

				</br></br>
				

		</form>

		<span class="loginForm">{$error}</span>

		<div class="loginForm">

			<input type= "button" name= "login" value= "Login" id="login">

		</div>

		<script src="loginvalidation.js"></script>


EOBODY;


	$compPage = buildPage($body, "Login");
	echo $compPage;

?>