<?php

		require_once "support.php";

		$body = <<<EOBODY

			<h2 class="loginsignupheader">Sign Up</h2>

					
			<form action = "signupConfirm.php" method="post" id="submit" class="loginForm">

				<input type= "text" name= "firstname" placeholder= "firstname" id="firstname" required autofocus>

					</br></br>

				<input type= "text" name= "lastname" placeholder= "lastname" id="lastname" required>

					</br></br>

				<input type= "text" name= "username" placeholder= "username" id="username" required>

					</br></br>

				<input type= "password" name= "password" placeholder="password" id="password" required>

					</br></br>


					

			</form>

			<div class="loginForm">

				<input type= "button" name= "create" value= "Create Account" id="create">

			</div>

			<script src="signupvalidation.js"></script>


EOBODY;

		$compPage = buildPage($body,"Sign Up");

		echo $compPage;

?>