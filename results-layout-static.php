<div id="header">
  <div class="jumbotron text-center">

<?php
//get quiz title
$sql = "SELECT QuizTitle FROM quizzes WHERE QuizID=" . $_GET['quiz'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<h1>Results - " . $row["QuizTitle"] . "</h1>";
    }
}
?>

  </div>
</div>

<div class="container">
<div class="row"><div class="col">Question</div><div class="col">Submitted answer</div><div class="col">Correct Answer</div></div>

<?php
$sql2 = "SELECT S.SubID, S.Answer, Q.QuestionID, Q.QuestionText, Q.QAnswer FROM questions Q, submissions S WHERE Q.QuestionID=S.QuestionID AND Q.QuizID=" . $_GET['quiz'] . " ORDER BY QuestionID ASC, SubID DESC";
//echo $sql2;
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $temp = -1;//initiate at an impossible number
    $questions=0;
    $correct=0;
    while($row = $result2->fetch_assoc()) {
      //if new question - QuestionID has not been seen before
      if ($row["QuestionID"] != $temp) {
        $questions++;
        //set background colour
        $bg = "text-danger";
        if ($row["Answer"]==$row["QAnswer"]){
          $bg = "text-success";
          $correct++;
        }
        //print question text
        echo "<div class=\"row m-3\"><div class=\"col\">" . $row["QuestionText"] . "</div>";
        //print question answer
        echo "<div class=\"col " . $bg . "\">" . $row["Answer"] . "</div>";
        //print top submission (order by means latest submission should come first)
        echo "<div class=\"col\">" . $row["QAnswer"] . "</div></div>";
        $temp = $row["QuestionID"];//reset temp variable
      }
    }
}
$incorrect = $questions-$correct;
?>
<canvas id="myChart" width="200" height="100"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Incorrect','Correct'],
        datasets: [{
            label: '%correct',
<?php echo  "data: [" . $incorrect . ", " . $correct . "],"?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
