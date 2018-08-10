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


<?php
//GET ALL QUIZZES FROM THE DATABASE
$sql = "SELECT * FROM quizzes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["QuizID"]. " - Name: " . $row["QuizTitle"]. " " . $row["QuixText"]. "<br>";
    }
} else {
    echo "0 results";
}
?>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <a href="content.html"> <img src="../Images/content.png" alt="content"> </a>
      <p>Your course materials</p>
    </div>
    <div class="col-sm-4">
      <a href="quizzes.html"> <img src="../Images/Quizzes.png" alt="quizzes"> </a>
      <p>A selection of quizzes</p>
    </div>
    <div class="col-sm-4">
  	   <a href="results.html"> <img src="../Images/Results.png" alt="results"> </a>
       <p>See your results here </p>
    </div>
  </div>
</div>

<?php
include 'footer.php';
?>
