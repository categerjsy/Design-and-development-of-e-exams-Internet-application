<?php

session_start();	

	
include 'config.php';
	
    $id_q=$_SESSION["id_question"];
	$pa=$_POST['pa'];
	

		//question
		mysqli_query($conn, "UPDATE possible_answer SET is_correct=1 WHERE id_question='$id_q' AND text='$pa'");
		
	
		$sql = "SELECT id_possibleAnswer  FROM  possible_answer WHERE id_question='$id_q' AND text='$pa'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$id_pa=$row['id_possibleAnswer'];
			mysqli_query($conn,"INSERT INTO has (id_question,id_possibleAnswer)
			VALUES ('$id_q','$id_pa')");
		}
		} 
		//has
		//mysqli_query($conn,"INSERT INTO has (id_question,id_possibleAnswer)
		//VALUES ('$id_q','$id_pa')");
			echo "Make in database final!!!";
			// Redirecting To Other Page
			$location="/Ptuxiaki/create_question.php?msg=done";
		    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		
?>