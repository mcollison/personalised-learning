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

<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">

<?php
$sql = "SELECT QuestionID FROM questions WHERE QuizID=" . $_GET['quiz'];
$result = $conn->query($sql);
$x=0;
//a silly function because row count wasn't working
while($row = $result->fetch_assoc()) {
  $x++;
}
echo "<li class=\"nav-item\"><a class=\"nav-link active\" id=\"home-tab-1\" data-toggle=\"tab\" href=\"#home-$i\" role=\"tab\" aria-controls=\"home-1\" aria-selected=\"true\">Question 1:</a></li>";

for ($i=2;$i<=$x;$i++) {
    // output data of each row
echo "<li class=\"nav-item\"><a class=\"nav-link\" id=\"home-tab-$i\" data-toggle=\"tab\" href=\"#home-$i\" role=\"tab\" aria-controls=\"home-$i\" aria-selected=\"true\">Question $i:</a></li>";
}
?>
</ul>

  <!-- Tab panes -->
  <form>
  <div class="tab-content">
    <div class="tab-pane active" id="home-1" role="tabpanel" aria-labelledby="home-tab-1">
<?php
//get quiz questions
$num=2;
$sql = "SELECT quizzes.QuizID, questions.QuestionID, questions.QuestionText, options.OptionText FROM quizzes LEFT JOIN questions ON quizzes.QuizID = questions.QuizID LEFT JOIN options ON questions.QuestionID = options.QuestionID where quizzes.QuizID=" . $_GET['quiz'] ;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    $temp = $row["QuestionID"];
    echo "<p>" . $row["QuestionText"] . "</p>";

    while($row = $result->fetch_assoc()) {
      if ($row["QuestionID"] != $temp) {
        echo "</div><div class=\"tab-pane\" id=\"home-$num\" role=\"tabpanel\" aria-labelledby=\"home-tab-$num\"><p>" . $row["QuestionText"] . "</p>";
        $num++;
      } else {
        echo "<br /> <p>" . $row["OptionText"] . "</p>";
      }
    }
}
?>
  </div>
</div>
</form>
</div>
