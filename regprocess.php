<?	
$error = 'Registration Failed';
 
    $dbname= DB_NAME;
	$username = $_POST["userName"]; 
	$password = md5($_POST["password"]); 
	$firstName =$_POST["firstName"];
	$lastName= $_POST["lastName"];
	$email = $_POST["userEmail"];




	$query = "INSERT INTO Users('" . $username . "', '" .$password. "', '" . $email . "', '" . $firstName . "', '" . $lastname . "', '" ."')";
	$result = mysqli_query($query);
	
	
	if(empty($result)){
	
		echo $error_message;
	}
	else{
	$success_message = "You have registered successfully!";	
		echo $success_message;	
	}
		
	//	unset($_POST);
	
?>
	