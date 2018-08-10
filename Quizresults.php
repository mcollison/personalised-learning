<?php
include_once 'connect.php';
include_once 'functions.php';
secure_session();
if(login_check($mysqli))
{
$logged = 'in'; 

}
{
$logged = 'out';
}

?> 
<HTML>
<head>
</head>
<title> </title>
<body>


<div>
<div id= "Logout">
<form action="/includes/process_login.php" >
<input type='submit' name='logout' value='logout'/>
</form>
</div>
<div>



<?php 
	
	if ($statement = $mysqli->prepare("SELECT * FROM Results WHERE User=?"))
	{
		
	$statement->bind_param('s', htmlentities($_SESSION['username']));
	$statement->execute();
	$statement->store_result();
	$statement->bind_result($QuizTopic, $QuizScore, $QuizDate, $User);
	
		while($statement->fetch())
		{
			echo "On The Quiz <b>".$QuizName."</b> Which you took at".$QuizDate." You got ".$QuizScore." Answers Correct <br>";
		}
	}
	
?>


</body> 
<HTML>