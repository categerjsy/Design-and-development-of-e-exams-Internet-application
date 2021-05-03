<?php

session_start();	

	
include 'config.php';
	$id_p=$_SESSION["id_professor"];

	$month=$_POST['month'];
	$dt=$_POST['dt'];
	$year=$_POST['year'];

    $hours=$_POST['hours'];
	$minutes=$_POST['minutes'];
    $seconds=$_POST['seconds'];
   
    $hourse=$_POST['hourse'];
	$minutese=$_POST['minutese'];
    $secondse=$_POST['secondse'];
   
	$id_lesson=$_POST['course'];

    $date_old="$year-$month-$dt $hours:$minutes:$seconds";
    $time="$hourse:$minutese:$secondse";
    
	$date_for_database = date ('Y-m-d H:i:s', strtotime($date_old));

		//question
		mysqli_query($conn, "INSERT INTO exam (date_time)
				VALUES ('$date_for_database')");
		$id_exam = mysqli_insert_id($conn);
		
			echo "Make in database final!!!";
			// Redirecting To Other Page
			$location="/Ptuxiaki/profilek.php";
		    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		
?>