<?php
include 'config.php';
session_start ();


$_SESSION["correction_id_exam"]=$_POST["id_exam"];
$location="/Ptuxiaki/correction2.php";
header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);


?>