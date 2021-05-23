<?php
session_start();	
include 'config.php';

$username=$_SESSION["username"];
$id_question=$_POST['idq'];
$question=$_POST['txt'];

$s = mysqli_query($conn,"select * from question");
while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
	$txt=$row["text"];
	$findquestion=mysqli_query($conn,"select * from question where id_question='$id_question'");
	while ($row = mysqli_fetch_array($findquestion, MYSQLI_ASSOC)) {
		$oldquestion=$row["text"];
	}
}

if($question!=$oldquestion){
	$sql = "UPDATE question
			SET text='$question'
			WHERE id_question='$id_question';";
	$qry = mysqli_query($conn, $sql);
	if($qry){
		$_SESSION["username"]=$username;
		echo "Question changed!!";
		// Redirecting To Other Page
		$location="/Ptuxiaki/select_lesson.php";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
				
	}
}

///////////////////////////
//mysqli_close($conn);
?>