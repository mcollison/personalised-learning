<?php
$error = 'Login Failed, please try again';
if(isset($_POST['submit'])){
	
	//This is the part of the code that causes a login.
	
	if (empty($_POST['username']) || empty($_POST['password'])) {
	$error = "Username or Password is invalid";
	}
	else 
	{
	$dbname= DB_NAME;
	$username =$_POST['username']; 
	$password = $_POST['password']; 
	
	
 
	// Check connection
	if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	//These statements protect from mysql Injection 
	//Removes speechmarks 
	$username = stripslashes($username); 
	$password = stripslashes($password);
	//Removes special characters 
	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);
	
	
	
	// SQL query to fetch information of registerd users and finds user match.
	//$query = mysqli_real_query($connection, "select * from users where password='$password' AND username='$username'");
	//$rows = mysqli_num_rows(;
	$queryString = "select * from Users where password='$password' AND username='$username'";
	$result = mysqli_query($connection, $queryString);
	$number= mysqli_num_rows($result);
		if ($number == 1) {
	$_SESSION['login_user']=$username; // Initializing Session
	header("location:../HTML/homepage.html"); // Redirecting To Other Page
	} else {
	$error = "Username or Password is invalid";
	echo $error;
	}
	
	mysqli_close($connection); // Closing Connection
	}
	
	}	
?>