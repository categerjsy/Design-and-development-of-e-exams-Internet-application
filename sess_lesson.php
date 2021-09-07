<?php
session_start();	
include 'config.php';
$prof=$_SESSION["id_professor"];
$id_lesson=$_POST['course'];
$_SESSION["idl"]=$id_lesson;
// Redirecting To Other Page
header("Location: edit_questions.php");

?>