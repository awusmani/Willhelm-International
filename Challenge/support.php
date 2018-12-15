<?php
	
	session_start();
	

	function buildPage($body, $title){

		//user a user is logged in, change the header to task page, greeting, and logout links
		if(isset($_SESSION["username"])){


			$rightdetails = <<<EOBODY

			<div id=loginsignup>

				Hello, {$_SESSION["firstname"]}!
				<a href="logout.php">Logout<a/>

			</div>

EOBODY;



			$gotoPage = "";
			//based on who is logged in, task page redirects them to their own task page
			if($_SESSION["type"] === "Admin"){
				$gotoPage = "admin.php";
			} else if($_SESSION["type"] === "Doctor"){
				$gotoPage = "doctor.php";
			} else{
				$gotoPage = "patient.php";
			}

			$leftdetail = "<a href='$gotoPage' id=taskpagelink>Task Page</a>";


		} else {//if a user is not signed in, show login/signup links

			$rightdetails = <<<EOBODY

			<div id=loginsignup>

				<a href="login.php">Login</a>
				<a href="signup.php">Sign Up<a/>

			</div>
EOBODY;

			$leftdetail = "";

		}


		$page = <<<EOBODY


		<!doctype html>
			<html>
				<head>

					<meta charset="utf-8"/>
					<title>$title</title>

					<link rel="stylesheet" href="style.css"/>

				</head>

				<header id="mainheader">

					<span>$leftdetail</span>

					<h1 id=willhelmtitle>
						Willhelm International
					</h1>

				</header>


				<body class="main">

					$rightdetails

					$body

				</body>


			</html>



EOBODY;


		return $page;


	}


?>