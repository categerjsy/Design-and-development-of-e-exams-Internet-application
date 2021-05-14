<?php
session_start();	

include 'config.php';
$id_lesson=$_POST['course'];
$username=$_SESSION["username"];


  echo $id_lesson;
  
  
  //εδω αλλάζει τις ερωτησεις στη βαση
///////////////////////////
//mysqli_close($conn);
?>