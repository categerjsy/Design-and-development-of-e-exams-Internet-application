<?php
session_start();	
include 'config.php';

$username=$_SESSION["username"];

$username=$_SESSION["username"];
$id_question=$_POST['idq'];
$question=$_POST['txt'];

$sql1 = "DELETE FROM question WHERE id_question=$id_question";
$qry1 = mysqli_query($conn, $sql1);

	
$sql2 = "DELETE FROM contains WHERE id_question=$id_question";
$qry2 = mysqli_query($conn, $sql2);


$sql3 = "DELETE FROM includes WHERE id_question=$id_question";
$qry3 = mysqli_query($conn, $sql3);

	
$sql4 = "DELETE FROM make WHERE id_question=$id_question";
$qry4 = mysqli_query($conn, $sql4);

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

$sql6 = "DELETE FROM has WHERE id_question=$id_question";
$qry6 = mysqli_query($conn, $sql6);

		if($qry1&&$qry3&&$qry4&&$qry6){
		$_SESSION["username"]=$username;
		echo "Question deleted!!";
		header("Location: select_lesson.php");
				
	    }


?>