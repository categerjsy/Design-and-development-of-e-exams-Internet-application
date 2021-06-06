<?php
session_start();	
include 'config.php';

$username=$_SESSION["username"];

$username=$_SESSION["username"];
$id_question=$_POST['idq'];
$question=$_POST['txt'];

//πρέπει να διαγραφούν όλες οι εγγραφές που περιέχουν το id_question

$sql1 = "DELETE FROM question WHERE id_question=$id_question";
$qry1 = mysqli_query($conn, $sql1);
if($qry1){
		$_SESSION["username"]=$username;
		echo "Question deleted!!";
		// Redirecting To Other Page
		$location="/Ptuxiaki/select_lesson.php";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
}
	
$sql2 = "DELETE FROM contains WHERE id_question=$id_question";
$qry2 = mysqli_query($conn, $sql2);
if($qry2){
		$_SESSION["username"]=$username;
		echo "Question deleted!!";
		// Redirecting To Other Page
		$location="/Ptuxiaki/select_lesson.php";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
}

$sql3 = "DELETE FROM includes WHERE id_question=$id_question";
$qry3 = mysqli_query($conn, $sql3);
if($qry3){
		$_SESSION["username"]=$username;
		echo "Question deleted!!";
		// Redirecting To Other Page
		$location="/Ptuxiaki/select_lesson.php";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
}
	
$sql4 = "DELETE FROM make WHERE id_question=$id_question";
$qry4 = mysqli_query($conn, $sql4);

if($qry4){
		$_SESSION["username"]=$username;
		echo "Question deleted!!";
		// Redirecting To Other Page
		$location="/Ptuxiaki/select_lesson.php";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
}
$s = mysqli_query($conn,"select * from has");
while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
	$pa=$row["id_possibleAnswer"];
	$findanswer=mysqli_query($conn,"select * from has where id_question='$id_question'");
	while ($row = mysqli_fetch_array($findanswer, MYSQLI_ASSOC)) {
		$answer=$row["id_possibleAnswer"];
		$sql5 = "DELETE FROM possible_answer WHERE id_possibleAnswer=$answer";
		$qry5 = mysqli_query($conn, $sql5);
	}
}
if($qry5){
		$_SESSION["username"]=$username;
		echo "Question deleted!!";
		// Redirecting To Other Page
		$location="/Ptuxiaki/select_lesson.php";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
}
$sql6 = "DELETE FROM has WHERE id_question=$id_question";
$qry6 = mysqli_query($conn, $sql6);

		if($qry6){
		$_SESSION["username"]=$username;
		echo "Question deleted!!";
		// Redirecting To Other Page
		$location="/Ptuxiaki/select_lesson.php";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
				
	}	

//mysqli_close($conn);
?>