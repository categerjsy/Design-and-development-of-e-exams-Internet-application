<?php
include 'config.php';
session_start ();


      $_SESSION["number"]++;

      header("Location: examination1.php");

 
?>