<?php
session_start();	
include 'config.php';

$username=$_SESSION["username"];


//mysqli_close($conn);
?>

<button type="button" class="cancelbtn"><a href="select_lesson.php">Έξοδος</a></button>