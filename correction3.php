<?php
include 'config.php';
session_start ();


$_SESSION["cor_id_student"]=$_POST["id_student"];
$id_st=$_SESSION["cor_id_student"];
$id_exam=$_SESSION["correction_id_exam"];

$location="/Ptuxiaki/correction4.php";
header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);


?>