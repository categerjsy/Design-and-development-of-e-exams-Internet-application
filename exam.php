<?php

session_start();
date_default_timezone_set('Europe/Athens') ;


include 'config.php';
	$id_p=$_SESSION["id_professor"];

	$date=$_POST["tdate"];
	$time=$_POST["ttime"];

  
	$lesson=$_POST['course'];
	$s = mysqli_query($conn,"select * from lesson where name='$lesson'");
		 while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
			 $my_lesson=$row["id_lesson"];
		  }



    $date_old="$date $time:00";

	$date_for_database = date ('Y-m-d H:i:s', strtotime($date_old));
	$now =  date ('Y-m-d H:i:s');

		if($date_for_database< $now) {

			$location="/Ptuxiaki/create_exam.php?msg=past";
		    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		}
		elseif($date_for_database> $now) {
		//question
		mysqli_query($conn, "INSERT INTO exam (date_time,final_grade)
				VALUES ('$date_for_database',10)");
		$id_exam = mysqli_insert_id($conn);

		//question
		mysqli_query($conn, "INSERT INTO belongs_to (id_lesson,id_exam)
				VALUES (' $my_lesson','$id_exam')");

		//create_exam
		//question
		mysqli_query($conn, "INSERT INTO create_exam (id_professor,id_exam)
				VALUES ('$id_p','$id_exam')");
			echo "Make in database final!!!";
			// Redirecting To Other Page
			$_SESSION["id_exam"]=$id_exam;

			$location="/Ptuxiaki/create_exam2.php";
		    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		}
?>