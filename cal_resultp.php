<?php

session_start();

include 'config.php';
$_SESSION["cor_id_result"]=$_POST["id_student"];
$id_exam=$_SESSION["correction_id_exam"];
echo $_SESSION["cor_id_student"];
echo $id_exam;
$location="/Ptuxiaki/cal_result1.php";
header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);

?>