<?php 
/** 
Author: Ryan Crosby 
Project: Dissertation / Diverse Computing
Date Created: 07/04/2015
Last Edited:  07/04/2015 
**/ 

include_once 'connect.php';
include_once 'functions.php';


//Source http://stackoverflow.com/questions/3638915/php-array-post-data/3638962#3638962
$Questions = unserialize($_POST['QuestionNumbers']);
// End of Source 

$QuestionsCorrect = 0; // Keep track of how many questions the user got correct 
$QuestionsWrong = 0;   // Keep track of how many questions the user got wrong 
$QuestionWrongNumbers = array(); // This array is used to keep track of the questions that the user got wrong so they can be referenced later. $_POST['quiz']."ca"
$sizeofarray = count($Questions);
$table=$_POST['quiz'];

// If the user has submitted the quiz 
if(isset($_POST['0'], $_POST['1'], $_POST['2'], $_POST['3']))
{	
$tablename = $_POST['Quiz']; //Store the table name 

$position = 0;
	while ($position < $sizeofarray) //While there are questions to mark
	{
		if($statement = $mysqli->prepare("SELECT CorrectAnswer FROM Quiz WHERE QuestionNumber = ?"))
		{
			
			//Select the correct question number from the table using the number from the POST array 
			$statement->bind_param('i', $Questions[$position]);
			$statement->execute();
			$statement->store_result();
			$statement->bind_result($QuestAns);	
			$statement->fetch();
			
			if($_POST[$position] == $QuestAns) // Compare the correct answer to the users answer 
			{
				$QuestionsCorrect ++; // Add a mark to the score 
			}
			else 
			{
				$QuestionsWrong ++; // Add to questions wrong count 
				array_push($QuestionWrongNumbers, $Questions[$position]);
			}
		}
	$position ++; //Move to the next question 
	}
	
	if($statement = $mysqli->prepare( "INSERT INTO Results (QuizTopic, QuizScore, UserID, QuizDate) VALUES ( ?, ?, ?, ?)"))
	{
		$y = "test";
		//Store user marks into system
		$statement->bind_param('sis', $table, $QuestionsCorrect, $y);
		
		$statement->execute();
		$statement->store_result();
		$statement->bind_result($QuizName, $Score, $User);
		$statement->fetch();
		return header('location: ../HTML/results.php'); //Divert the user to the correct page
	}
	}
	else 
	{
	
	}

?> 