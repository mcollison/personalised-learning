<?php
include_once 'connect.php';

include 'header.php';
include 'navbar.php';
?>

<?php
if (isset($_GET['quiz'])) {
    include 'quiz-layout-static.php';
} else {
    include 'quizzes-summary.php';
}
?>

<?php
include 'footer.php';
?>
