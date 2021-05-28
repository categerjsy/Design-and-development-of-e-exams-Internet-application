<?php
session_start();	
include 'config.php';

$username=$_SESSION["username"];
$id_question=$_POST['idq'];
$question=$_POST['txt'];

//ελεγχος για όλες τις αλλαγές παράλληλα, επισης πρέπει να πηγαίνει το χρήστη στην επιλογή της σωστής απάντησης

$s = mysqli_query($conn,"select * from question");
while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
	$txt=$row["text"];
	$question_type=$row["type"];
	$findquestion=mysqli_query($conn,"select * from question where id_question='$id_question'");
	while ($row = mysqli_fetch_array($findquestion, MYSQLI_ASSOC)) {
		$oldquestion=$row["text"];
		$qtype=$row["type"];
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

if($qtype=="True-False"){
	$truefalse=$_POST['tf'];
	if($truefalse=="true"){
		$truefalse=1;
	}
	else{
		$truefalse=0;
	}
	$idpa=$_POST['idpa'];
	$s = mysqli_query($conn,"select * from possible_answer");
	while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
		$iscorrect=$row["is_correct"];
		$findanswer=mysqli_query($conn,"select * from possible_answer where id_possibleAnswer='$idpa'");
		while ($row = mysqli_fetch_array($findanswer, MYSQLI_ASSOC)) {
			$iscorr=$row["is_correct"];
		}
	}
	if($iscorr!=$truefalse){
		$sql = "UPDATE possible_answer
			SET is_correct='$truefalse'
			WHERE id_possibleAnswer='$idpa';";
		$qry = mysqli_query($conn, $sql);
		if($qry){
			$_SESSION["username"]=$username;
			echo "Question changed!!";
			// Redirecting To Other Page
			$location="/Ptuxiaki/select_lesson.php";
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
					
		}
	}
}
else if(($qtype=="Multiple Choice")||($qtype=="Multiple Choice More")){
		$idpa=$_POST['idpa'];
		$number = count($_POST["pa"]);
		for($i=0; $i<$number; $i++){
			$findpa=mysqli_query($conn,"select * from possible_answer where id_possibleAnswer='$idpa'-'$number'+1+'$i'");
			while ($row = mysqli_fetch_array($findpa, MYSQLI_ASSOC)) {
				$pa=$row["text"];
			}
			if(trim($_POST["pa"][$i] != '')){
				$p_a=trim($_POST['pa'][$i]);
				if($p_a!=$pa){
					$sql = "UPDATE possible_answer
						SET text='$p_a'
						WHERE id_possibleAnswer='$idpa'-'$number'+1+'$i';";
					$qry = mysqli_query($conn, $sql);
				}
				$sql = "UPDATE possible_answer
						SET is_correct='0'
						WHERE id_possibleAnswer='$idpa'-'$number'+1+'$i';";
					$qry = mysqli_query($conn, $sql);
					$_SESSION["id_question"]=$id_question;
					echo "Question changed!!";
					// Redirecting To Other Page
					$location="/Ptuxiaki/change_correct.php";
					header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			}
		}
}
	

///////////////////////////
//mysqli_close($conn);
?>