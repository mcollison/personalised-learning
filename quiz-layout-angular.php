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
<form action="/form-processing.php">
<nav class="navbar navbar-light bg-light">
<ul class="nav nav-tabs" id="myTab" role="tablist">

<?php
$sql = "SELECT QuestionID FROM questions WHERE QuizID=" . $_GET['quiz'];
$result = $conn->query($sql);
$x=0;
//a silly function because row count wasn't working
while($row = $result->fetch_assoc()) {
  $x++;
}
//separate statement to include 'active'
echo "<li class=\"nav-item\"><a class=\"nav-link active\" id=\"home-tab-1\" data-toggle=\"tab\" href=\"#home-1\" role=\"tab\" aria-controls=\"home-1\" aria-selected=\"true\">Question 1:</a></li>";

for ($i=2;$i<=$x;$i++) {
    // output data of each row
echo "<li class=\"nav-item\"><a class=\"nav-link\" id=\"home-tab-$i\" data-toggle=\"tab\" href=\"#home-$i\" role=\"tab\" aria-controls=\"home-$i\" aria-selected=\"true\">Question $i:</a></li>";
}
?>
</ul>
<a class="navbar-brand" href="#">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</a>
</nav>

  <!-- Form mapping needs updating to quiz form processing -->
  <div class="tab-content">
    <div class="tab-pane active" id="home-1" role="tabpanel" aria-labelledby="home-tab-1">
<?php
//get quiz questions MAY NEED TO ORDER BY IF OPTIONS AREN'T RETURNED AFTER EAXG Q
$num=2;//start from 2 as first is listed separate for 'action' attribute
$sql = "SELECT quizzes.QuizID, questions.QuestionID, questions.QuestionText, options.OptionText FROM quizzes LEFT JOIN questions ON quizzes.QuizID = questions.QuizID LEFT JOIN options ON questions.QuestionID = options.QuestionID where quizzes.QuizID=" . $_GET['quiz'] ;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    $temp = $row["QuestionID"];
    $mcq = false;
    echo "<p>" . $row["QuestionText"] . "</p>";

    while($row = $result->fetch_assoc()) {
      if ($row["QuestionID"] != $temp) {
        if($mcq==false){
          echo "<p><input type=\"text\" name=\"" . $temp . "\" rows=\"6\">";
        }
        echo "</p></div><div class=\"tab-pane\" id=\"home-$num\" role=\"tabpanel\" aria-labelledby=\"home-tab-$num\"><p>" . $row["QuestionText"] . "</p>";
        $mcq = false;//reset multiple choice until options are seen
        $temp = $row["QuestionID"];
        $num++;
      } else {
        //echo "<br /> <p>" . $row["OptionText"] . "</p>";
        if($mcq==false){
          echo "<p>";
        }
        echo "<br /><input type=\"radio\" name=\"$temp\" value=\"" . $row["OptionText"] . "\">" . $row["OptionText"];
        $mcq=true;
      }
    }
}
if($mcq==false){
  echo "<p><input type=\"text\" name=\"" . $temp . "\" rows=\"6\">";
}
?>

</p>
  </div>
</div>
</form>
</div>
