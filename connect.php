<?php
//session_start(); //Starts PhP Session
//* Database credentials.*/
define('DB_SERVER', 'homepages.cs.ncl.ac.uk');
define('DB_USERNAME', 'b5038039');
define('DB_PASSWORD', 'Doze=IreAnts');
define('DB_NAME', 'b5038039');

/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
