<?php
include_once 'connect.php';

include 'header.php';
include 'navbar.php';
?>

<div id="header">
  <div class="jumbotron text-center">
    <h1>Quizzes</h1>
    <p>Test yourself across the curriculum to identify your strengths and weaknesses</p>
  </div>
</div>

<div class="container">
  <div class="row">

<?php
//GET ALL QUIZZES FROM THE DATABASE
$sql = "SELECT * FROM quizzes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<div class=\"col-sm-4\">"
      echo "<a href=\"content.html\"> <i class=\"fas fa-database\"></i> </a>" //update this for relevant icon once db scema is updated to store icon link
      echo "<p>" .  $row["QuizTitle"] . " <br \>";
      echo "</div>"
    }
} else {
    echo "There are currently no quizzes. ";
}
?>

  </div>
</div>

<?php
include 'footer.php';
?>
