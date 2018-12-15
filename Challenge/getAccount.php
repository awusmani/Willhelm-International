<?php

	//DBLogin start and returns the database
	require_once "DBLogin.php";


	$query = "select * from accounts where username='".$_POST["username"]."'";

	$result = $database->query($query);
	if(!$result){
		$_SESSION["ret"] = "Fail";
	} else{

		$num_rows = $result->num_rows;
		if($num_rows === 0){
			//user not found
			$_SESSION["ret"] = "Fail";

		} else{

			$result->data_seek(0);
			$row = $result->fetch_array(MYSQLI_ASSOC);

			if(password_verify($_POST["password"], $row["password"])){
				$_SESSION["firstname"] = $row["firstname"];
				$_SESSION["lastname"] = $row["lastname"];
				$_SESSION["username"] = $row["username"];
				$_SESSION["type"] = $row["type"];

				$_SESSION["ret"] = "Success";

			} else{

				$_SESSION["ret"] = "Fail";
			}

		}
	}

	$result->close();


	$database->close();


?>