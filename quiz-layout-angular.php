<div id="header">
  <div class="jumbotron text-center">

<?php
//get quiz title
$sql = "SELECT QuizTitle FROM quizzes WHERE QuizID=" . $_GET['quiz'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<h1>" . $row["QuizTitle"] . "</h1>";
    }
}
?>

  </div>
</div>

<div class="container">
  <div class="row">

<?php
//get quiz questions
$sql = "SELECT quizzes.QuizID, questions.QuestionID, questions.QuestionText, options.OptionText FROM quizzes LEFT JOIN questions ON quizzes.QuizID = questions.QuizID LEFT JOIN options ON questions.QuestionID = options.QuestionID where quizzes.QuizID=" . $_GET['quiz'] ;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    $temp = $row["QuestionID"];
    echo "<h1>" . $row["QuestionText"] . "</h1>";

    while($row = $result->fetch_assoc()) {
      if ($row["QuestionID"] != $temp) {
        echo "</div></div><div class=\"container\"><div class=\"row\"><h1>" . $row["QuestionText"] . "</h1>";
      } else {
        echo "<br /> <p>" . $row["OptionText"] . "</p>";
      }
    }
}
?>
  </div>
</div>
