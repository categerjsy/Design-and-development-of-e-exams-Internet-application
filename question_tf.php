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
    $answer=true;
	

		//question
		mysqli_query($conn, "INSERT INTO question (text, type, difficulty_level, chapter,time, grade, negative_grade)
				VALUES ('$qtext','$type', '$difficulty_level', '$chapter','$time','$grade','$ngrade')");
		$id_q = mysqli_insert_id($conn);
		//make
		mysqli_query($conn,"INSERT INTO make (id_professor, id_question)
						VALUES ('$id_p','$id_q')");
		mysqli_query($conn,"INSERT INTO make (id_professor, id_question)
		VALUES ('$id_p','$id_q')");
		//includes
		mysqli_query($conn,"INSERT INTO includes (id_lesson, id_question)
		VALUES ('$id_lesson','$id_q')");
		//pos_ans PROBLEM
		mysqli_query($conn, "INSERT INTO possible_answer (is_correct)
				VALUES ('0')");
	
			echo "Make in database final!!!";
			// Redirecting To Other Page
			$location="/Ptuxiaki/create_question.php";
		    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		
?>