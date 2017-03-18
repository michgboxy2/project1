<?php

session_start();
include('db/db_config.php');
#include 'function.php';

?>



<?php

if(array_key_exists("submit", $_POST)){

	$error = array();

	if(empty($_POST['firstname'])){
		$error[] = "PLEASE ENTER YOUR FIRST NAME";
	} else {
		$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
	}

	if(empty($_POST['lastname'])){

		$error[] = "PLEASE ENTER YOUR LAST NAME";
		
		}else{

			$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
		}

		if(empty($_POST['email'])){

			$error[] = "PLEASE ENTER YOUR EMAIL";
		}else{
			$email = mysqli_real_escape_string($db, $_POST['email']);
		}

		if(empty($_POST['phone'])){
			$error[] = "PLEASE ENTER YOUR PHONE NUMBER";
			#elseif(!is_numeric($_POST['phone'])){
				#$error[] = "please enter correct phone number";
			#}
		}else{
			$phone = mysqli_real_escape_string($db, $_POST['phone']);
		}


		if(empty($_POST['password'])){
			$error[] = "PLEASE ENTER PASSWORD";
		}else{
			$password = md5(mysqli_real_escape_string($db, $_POST['password']));
		}

		if(empty($error)){

			$INSERT = mysqli_query($db, "INSERT INTO project1 VALUES(NULL,
																	'".$firstname."',
																	'".$lastname."',
																	'".$email."',
																	'".$phone."',
																	'".$password."')") or die(mysqli_error($db));
			$success = 'SIGN UP SUCCESSFUL';
			header('location:form1.php?success=$success');
		}//close of empty error in 50
		else{

		foreach ($error as $err){
			echo "<p><strong>".$err. "</strong></p>";
			# code...
		}
}

}//close of array key exist in 10
	
	#$purge = success($success);
	#echo $purge;

	if(isset($_GET['success'])){

		echo $_GET['success'] ;
	}

?>  





<!DOCTYPE html>
<html>
<head>
	<title>sign up form</title>
</head>
<body>
<h3>SIGN UP FORM</h3>
<h2>PLEASE FILL THE FORM BELOW</h2>

<form action="" method="post">

<p>Firstname: <input type="text" name="firstname"></p>

<p>Lastname: <input type="text" name="lastname"></p>

<p>Email: 	<input type="text" name="email"></p>

<p>Phone number: <input type="text" name="phone"></p>

<p>Password: <input type="Password" name="password"></p>

<input type="submit" name="submit" value="click to signup">
	



</form>
</body>
</html>