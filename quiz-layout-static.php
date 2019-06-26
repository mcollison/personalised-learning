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
<?php
echo "<form action=\"./results.php?quiz=" . $_GET['quiz'] . "\" method=\"POST\">";
?>
<nav class="navbar navbar-light bg-white">
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
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Submit Quiz</button>
</nav>

  <!-- Form mapping needs updating to quiz form processing -->
  <div class="tab-content">
<?php
//get quiz questions

$sql = "SELECT quizzes.QuizID, questions.QuestionID, questions.QuestionText, questions.Prescription, options.OptionText FROM quizzes LEFT JOIN questions ON quizzes.QuizID = questions.QuizID LEFT JOIN options ON questions.QuestionID = options.QuestionID where quizzes.QuizID=" . $_GET['quiz'] . " ORDER BY QuestionID";

$result = $conn->query($sql);
//if there are questions for that quiz
if ($result->num_rows > 0) {
    $num=1;//QuestionID index
    $temp = -1;//initiate at an impossible number

    // output data of each row to row variable
    while($row = $result->fetch_assoc()) {
      //if new question - QuestionID has not been seen before
      if ($row["QuestionID"] != $temp) {
        //Create html tabs for questions - First tab should be 'active' and doesn't need to close the previous <p>
        if($num==1){
          echo "<div class=\"tab-pane active\" id=\"home-$num\" role=\"tabpanel\" aria-labelledby=\"home-tab-$num\">";
        } else {
          //must close <p> and <div> from previous tab unless first question
          echo "</div></div></p></div><div class=\"tab-pane\" id=\"home-$num\" role=\"tabpanel\" aria-labelledby=\"home-tab-$num\">";
        }
        //update QuestionID variable
        $temp = $row["QuestionID"];
        //Increment number of question index
        $num++;

        //Print question text

        echo "<div class=\"row\"><div class=\"col-md-6\"><p>" . $row["QuestionText"] . "</p>";

        //Print question image - replace image filepath with database field
        echo "<img src=\"" . $row["Prescription"] . "\" alt=\"Prescription image\" width=\"90%\"></div>";

        //Print the first option
        echo "<div class=\"col-md-6\"><p><br /><input type=\"radio\" name=\"$temp\" value=\"" . $row["OptionText"] . "\">" . $row["OptionText"];

      } else {
        //if existing question - add the new option
        echo "<br /><input type=\"radio\" name=\"$temp\" value=\"" . $row["OptionText"] . "\">" . $row["OptionText"];
      }
    }
    //close the options after the final question
    echo "</p>";
}
?>

  </div>
</div>
</form>
</div>
