<?php
include_once 'connect.php';
include_once 'functions.php';

if(login_check($connection))
{
$logged = 'in'; 

}
{
$logged = 'out';
}
?> 

<!DOCTYPE HTML>
<head>

<title> </title>
<meta charset="UTF-8">
</head>

<body>
<div id= "Logout">
<form action="/includes/process_login.php" >
<input type='submit' name='logout' value='logout'/>
</form>
</div


<div id = "">
<h2>  </h2>

<?php 
//Origional source of code, was a combination of the following two tutorirals 
//Source: http://www.coderslexicon.com/creating-an-online-quiz-with-php/ Last Accessed 07/05/2015
//SOurce: https://css-tricks.com/building-a-simple-quiz/  Last Accessed 07/05/2015
	echo "<form action='/includes/QuizProcess.php' method = 'post' name='KeyExchangeQuiz'>";
	//Select four random questions from the database for the quiz. Changing '4' will change how many questions are present in the quiz. 
		if ($statement = $connection->prepare("SELECT * FROM Quiz ORDER BY RAND() LIMIT 10"))
		{
		
		$statement->execute();
		$statement->store_result();
		$statement->bind_result($Qnumb, $Question);
		$counter=0;
		$QuestionNumbers = array();
			while ($statement->fetch())
			{
				echo "<b>".$Question."</b>";
				if ($statement2 = $connection->prepare("SELECT * FROM Quiz WHERE QuestionNumber=".$Qnumb.""))
				{
		
					$statement2->execute();
					$statement2->store_result();
					$statement2->bind_result($AnsNumb, $Ans1, $Ans2, $Ans3);
					while ($statement2->fetch())
					{
						echo "<br>";
						echo "<input type='radio' name=".$counter." value= 'Ans1'/>".$Ans1."<br>";
						echo "<input type='radio' name=".$counter." value= 'Ans2'/>".$Ans2."<br>";
						echo "<input type='radio' name=".$counter." value= 'Ans3'/>".$Ans3."<br>";
						echo "<br>";
						$counter++;
					}
				}
				array_push($QuestionNumbers, $Qnumb);

			
			}
		//Source http://stackoverflow.com/questions/3638915/php-array-post-data/3638962#3638962
		$QN=htmlspecialchars(serialize($QuestionNumbers));
		echo "<input type='hidden' name='QuestionNumbers' value='$QN'/>";
		// End of Source
		echo "Click here to submit your answers: <input type='submit' name='quiz' value='KeyExchange'/>";
		echo "</form>";
		}
		
    
	
		?>
</div>

</body> 
<HTML>