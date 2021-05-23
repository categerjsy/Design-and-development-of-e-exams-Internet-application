<?php
session_start();	
include 'config.php';

$username=$_SESSION["username"];

$username=$_SESSION["username"];
$id_question=$_POST['idq'];
$question=$_POST['txt'];

//πρέπει να διαγραφούν όλες οι εγγραφές που περιέχουν το id_question

$sql = "DELETE FROM question WHERE id_question=$id_question";
	$qry = mysqli_query($conn, $sql);
	if($qry){
		$_SESSION["username"]=$username;
		echo "Profile changed!!";
		// Redirecting To Other Page
		$location="/Ptuxiaki/select_lesson.php";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
				
	}
//mysqli_close($conn);
?>