<?php

session_start();	

	
include 'config.php';
	$id_p=$_SESSION["id_professor"];
	$qtext=$_POST['qtext'];
	$difficulty_level=$_POST['difficulty_level'];
	$chapter=$_POST['chapter'];
    $time=$_POST['time'];
	$grade=$_POST['grade'];
    $ngrade=$_POST['ngrade'];
    $type="True-False";
	$id_lesson=$_POST['course'];
    $answer=$_POST['answer'];
	

		//question
		mysqli_query($conn, "INSERT INTO question (text, type, difficulty_level, chapter,time, grade, negative_grade)
				VALUES ('$qtext','$type', '$difficulty_level', '$chapter','$time','$grade','$ngrade')");
	
		//make
		mysqli_query($conn,"INSERT INTO make (id_professor, id_question)
						VALUES ('$id_p','$id_q')");
		//includes
		mysqli_query($conn,"INSERT INTO includes (id_lesson, id_question)
		VALUES ('$id_lesson','$id_q')");
		if($answer=='F'){
		mysqli_query($conn,"INSERT INTO possible_answer (text,id_question,is_correct)
					VALUES ('TrueFalse ερώτηση','$id_q',0)");
		}
		if($answer=='T'){
			mysqli_query($conn,"INSERT INTO possible_answer (text,id_question,is_correct)
						VALUES ('TrueFalse ερώτηση','$id_q',1)");
		}
		$id_pa = mysqli_insert_id($conn);
		//has
		mysqli_query($conn,"INSERT INTO has (id_question,id_possibleAnswer)
		VALUES ('$id_q','$id_pa')");
			echo "Make in database final!!!";
			// Redirecting To Other Page
			$location="/Ptuxiaki/create_question.php?msg=done";
		    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		
?>