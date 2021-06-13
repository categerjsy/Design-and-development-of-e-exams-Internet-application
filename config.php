<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "8873"; /* Password */  
$dbname = "examination_system_db"; /* Database name */



$conn = mysqli_connect($host, $user, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");
?>