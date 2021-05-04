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
	if($hours+$hourse<24){
		$h=$hours+$hourse;
	}else{
		$h=$hours+$hourse-24;
	}
	if($minutes+$minutese<60){
		$m=$minutes+$minutese;
	}else{
		$m=$minutes+$minutese-60;
		$h=$h+1;
	}
	if($seconds+$secondse<60){
		$s=$seconds+$secondse;
	}else{
		$s=$seconds+$secondse-60;
		$m=$m+1;
	}
	$d="$year-$month-$dt $h:$m:$s";
	$dd = date ('Y-m-d H:i:s', strtotime($d));
		//question
		mysqli_query($conn, "INSERT INTO exam (date_time,time)
				VALUES ('$date_for_database','$dd')");
		$id_exam = mysqli_insert_id($conn);
		
			echo "Make in database final!!!";
			// Redirecting To Other Page
			$location="/Ptuxiaki/profilek.php";
		    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		
?>