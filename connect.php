<?php
session_start(); //Starts PhP Session 
//* Database credentials. Assuming you are running MySQL
//server with default setting (user 'root' with no password) 
//https://www.tutorialspoint.com/php/php_mysql_login.htm*/
define('DB_SERVER', 'db.cs.ncl.ac.uk');
define('DB_USERNAME', 'ComputingIA');
define('DB_PASSWORD', 'Email r.crosby for password');
define('DB_NAME', 'ComputingIA');
 
/* Attempt to connect to MySQL database */
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
