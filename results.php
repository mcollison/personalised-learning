<?php
include_once 'connect.php';

include 'header.php';
include 'navbar.php';
?>

<?php
if (isset($_GET['quiz'])) {
  if (!empty($_POST)){
    include 'quiz-processing.php';
  }
  include 'results-layout-static.php';
} else {
  include 'results-summary.php';
}
?>

<?php
include 'footer.php';
?>
