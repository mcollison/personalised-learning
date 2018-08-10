<?php
include_once 'connect.php';

include 'header.php';
include 'navbar.php';
?>

<?php
if (isset($_GET['quiz'])) {
    include 'quiz-layout-angular.php';
} else {
    include 'quizzes-summary.php';
}
?>

<?php
echo $_SERVER['HTTP_HOST'] . " => " . $_SERVER['REQUEST_URI'];
include 'footer.php';
?>
