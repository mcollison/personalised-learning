<div id="header">
  <div class="jumbotron text-center">

<?php
//get quiz title
$sql = "SELECT QuizTitle FROM quizzes WHERE QuizID = $_GET['quiz']";
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
$sql = "SELECT QuestionText, OptionText FROM questions WHERE QuizID = $_GET['quiz'] LEFT JOIN options ON questions.QuestionID = options.QuestionID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    echo "<h1>" . $row["QuestionText"] . "</h1>";

    while($row = $result->fetch_assoc()) {
      if ($row["QuestionText"] > 0) {
        echo "</div></div><div class=\"container\"><div class=\"row\"><h1>" . $row["QuestionText"] . "</h1>";
      } else {
        echo "<p>" . $row["OptionText"] . "</p>";
      }
    }
}
?>
  </div>
</div>
