<?php
include 'config.php';
session_start ();
$my_exam=$_POST["exam"];
$_SESSION["id_exam"]=$my_exam;

$location="/Ptuxiaki/edit_exam2.php";
header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
?>
