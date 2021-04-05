<?php

session_start();	

	
include 'config.php';
	
	$qtext=$_POST['qtext'];
	$difficulty_level=$_POST['difficulty_level'];
	$chapter=$_POST['chapter'];
    $time=$_POST['time'];
    $tt=strtotime($time);///THEMAAAAAAAAAAAAAAAAAA
	
	$grade=$_POST['grade'];
    $ngrade=$_POST['ngrade'];
    $type="True-False";
    
		$sql = "INSERT INTO question (text, type, difficulty_level, chapter,time, grade, negative_grade)
				VALUES ('$qtext','$type', '$difficulty_level', '$chapter','$grade','$tt','$ngrade')";
        $qry = mysqli_query($conn, $sql);

			if($qry){
				echo "Lesson in database final!!!";
				// Redirecting To Other Page
				$location="/Ptuxiaki/create_question.php";
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			}	
?>