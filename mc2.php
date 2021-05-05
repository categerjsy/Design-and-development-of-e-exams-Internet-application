<?php

session_start();	

	
include 'config.php';
	
    $id_q=$_SESSION["id_question"];
	$pa=$_POST['pa'];
	

		//question
		mysqli_query($conn, "UPDATE possible_answer SET is_correct=1 WHERE id_question='$id_q' AND text='$pa'");
		
		
			echo "Make in database final!!!";
			// Redirecting To Other Page
			$location="/Ptuxiaki/create_question.php?msg=done";
		    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		
?>