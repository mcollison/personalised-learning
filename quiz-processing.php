
<?php
//submit answer for each question into submissions table
$sql = "SELECT QuestionID FROM questions WHERE QuizID=" . $_GET['quiz'];
$result = $conn->query($sql);
//a silly function because row count wasn't working
while($row = $result->fetch_assoc()) {
  $txt=$row["QuestionID"];
  echo $_POST[$txt];
}
?>
