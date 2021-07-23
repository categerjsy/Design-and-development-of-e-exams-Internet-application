<?php
include 'config.php';
session_start ();


      $_SESSION["number"]++;
      $location="/Ptuxiaki/examination1.php";
      header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);

 
?>