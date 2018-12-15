<?php


	require_once "support.php";
	require_once "DBLogin.php";

	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$user = $_POST["username"];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


	$query = "insert into accounts values('$user', '$password', '$firstname', '$lastname', 'Patient')";

	$result = $database->query($query);

	if (!$result) {
		die("Insertion failed: " . $database->error);
	}

	$database->close();


	$body = <<<EOBODY


	<div id="confirmText">

		<p>

			<h2>Welcome to Willhelm International, {$firstname}!</h2>

			</br></br>

			Account Details:

			</br></br>

			First Name: {$firstname}

			</br>

			Last Name: {$lastname}

			</br>

			Username: {$user}

			</br></br>

			Login to start making appointments today.

		</p>

		<a href="login.php" id="signupconfirmlogin">Login</a>


	</div>



EOBODY;

	$compPage = buildPage($body,"Welcome!");
	echo $compPage;


?>