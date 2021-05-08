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
  
	$lesson=$_POST['course'];
	$s = mysqli_query($conn,"select * from lesson where name='$lesson'");
		 while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
			 $my_lesson=$row["id_lesson"];
		  }

    $date_old="$year-$month-$dt $hours:$minutes:$seconds";
  
    
	$date_for_database = date ('Y-m-d H:i:s', strtotime($date_old));
	
		//question
		mysqli_query($conn, "INSERT INTO exam (date_time)
				VALUES ('$date_for_database')");
		$id_exam = mysqli_insert_id($conn);
		//question
		mysqli_query($conn, "INSERT INTO belongs_to (id_lesson,id_exam)
				VALUES (' $my_lesson','$id_exam')");
			echo "Make in database final!!!";
			// Redirecting To Other Page
			$location="/Ptuxiaki/create_exam2.php";
		    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		
?>