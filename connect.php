<?php
//session_start(); //Starts PhP Session
//* Database credentials.*/
define('DB_SERVER', 'homepages.cs.ncl.ac.uk');
define('DB_USERNAME', 'username');//username needs to be updated
define('DB_PASSWORD', 'password');//password needs to be updated
define('DB_NAME', 'dbname');//database name needs to be updated

/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
