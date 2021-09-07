<?php
include 'config.php';
session_start ();


$_SESSION["correction_id_exam"]=$_POST["id_exam"];

header("Location: correction2.php");


?>