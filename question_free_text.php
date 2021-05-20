<?php

session_start();	

	
include 'config.php';
	$id_p=$_SESSION["id_professor"];
	$qtext=$_POST['qtext'];
	$difficulty_level=$_POST['difficulty_level'];
	$chapter=$_POST['chapter'];
    $time=$_POST['time'];
    $id_lesson=$_POST['course'];
	$grade=$_POST['grade'];
    $ngrade="0";
    $type="Ελευθέρου κειμένου";

	

		//question
		mysqli_query($conn, "INSERT INTO question (text, type, difficulty_level, chapter,time, grade, negative_grade)
				VALUES ('$qtext','$type', '$difficulty_level', '$chapter','$time','$grade','$ngrade')");
		$id_q = mysqli_insert_id($conn);
		//make
		mysqli_query($conn,"INSERT INTO make (id_professor, id_question)
						VALUES ('$id_p','$id_q')");
		$sql = "INSERT INTO includes (id_lesson, id_question)
		VALUES ('$id_lesson','$id_q')";

		if ($conn->query($sql) === TRUE) {
		  echo "Record updated successfully";
		} else {
		  echo "Error updating record: " . $conn->error;
		}

			echo "Make in database final!!!";
			// Redirecting To Other Page
			$location="/Ptuxiaki/create_question.php?msg=done";
		    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		
?>