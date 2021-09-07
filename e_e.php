<?php
include 'config.php';
session_start ();
$my_exam=$_POST["exam"];
$_SESSION["id_exam"]=$my_exam;


header("Location: edit_exam2.php");
?>
