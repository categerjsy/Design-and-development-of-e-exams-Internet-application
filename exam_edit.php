<?php

session_start();	

	
include 'config.php';

	$id_p=$_SESSION["id_professor"];
    $id_exam=$_SESSION["id_exam"];
	$month=$_POST['month'];
	$dt=$_POST['dt'];
	$year=$_POST['year'];

    $hours=$_POST['hours'];
	$minutes=$_POST['minutes'];
    $seconds=$_POST['seconds'];
  
	$lesson=$_SESSION["lesson"];
	$s = mysqli_query($conn,"select * from lesson where name='$lesson'");
		 while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
			 $my_lesson=$row["id_lesson"];
		  }

    $date_old="$year-$month-$dt $hours:$minutes:$seconds";
  
    
	$date_for_database = date ('Y-m-d H:i:s', strtotime($date_old));
	$now =  date ('Y-m-d H:i:s');
	
		if($date_for_database< $now) {
			
			$location="/Ptuxiaki/edit_exam2.php?msg=past";
		    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		}
		elseif($date_for_database> $now) {
		//question
        $sql ="UPDATE exam SET date_time='$date_for_database' WHERE id_exam='$id_exam' ";
		
		    if ($conn->query($sql) === TRUE) {
             echo "Record updated successfully";
             
                $location="/Ptuxiaki/create_exam2.php";
                header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
              } else {
             echo "Error updating record: " . $conn->error;
              }
		
	
		}
?>