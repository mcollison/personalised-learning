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


<?php
//get quiz title
$sql = "SELECT questions.QuestionText, options.OptionText FROM questions FULL OUTER JOIN WHERE QuizID = $_GET['quiz']";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<h1>" . $row["QuizTitle"] . "</h1>";
    }
}
?>

<div class="container">
  <div class="row">

<?php
//GET ALL QUIZZES FROM THE DATABASE
$sql = "SELECT * FROM quizzes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<div class=\"col-sm-4\">";
      echo "<a href=\"?quiz=" . $row["QuizID"] . "\"> <i class=\"fa fa-question-circle fa-5x\"></i> </a>";
      echo "<p>" .  $row["QuizTitle"] . " <br \>";
      echo "</div>";
    }
} else {
    echo "There are currently no quizzes. ";
}
?>

  </div>
</div>
