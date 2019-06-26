
<?php
//submit answer for each question into submissions table
$sql = "SELECT QuestionID FROM questions WHERE QuizID=" . $_GET['quiz'];
$result = $conn->query($sql);
//a silly function because row count wasn't working
while($row = $result->fetch_assoc()) {
  $txt=$row["QuestionID"];
  if (empty($_POST[$txt])){
    $sql2 = "INSERT INTO submissions (UserID, QuestionID, Answer) Values (1," . $txt . ",'No answer submitted')";    
  }else{
    $sql2 = "INSERT INTO submissions (UserID, QuestionID, Answer) Values (1," . $txt . ",'" . $_POST[$txt] . "')";
  }

  $result2 = $conn->query($sql2);

//  echo $sql2 . "<br />";
//  echo $_POST[$txt] . "<br />";
}
?>
