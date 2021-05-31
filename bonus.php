<?php
include 'config.php';
session_start ();
$exam=$_SESSION["id_exam"];
$grade=$_POST['ngrade'];
$sql = "UPDATE exam
SET final_grade=10+'$grade'
WHERE id_exam='$exam';";
$qry = mysqli_query($conn, $sql);


header('Location: ' . $_SERVER['HTTP_REFERER']);
	
?>