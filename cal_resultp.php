<?php

session_start();

include 'config.php';
$_SESSION["cor_id_result"]=$_POST["id_student"];
$id_exam=$_SESSION["correction_id_exam"];


header("Location: cal_result1.php" );

?>