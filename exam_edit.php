<?php

session_start();
date_default_timezone_set('Europe/Athens') ;

	
include 'config.php';

	$id_p=$_SESSION["id_professor"];
    $id_exam=$_SESSION["id_exam"];

$date=$_POST["tdate"];
$time=$_POST["ttime"];


$lesson=$_SESSION["lesson"];
	$s = mysqli_query($conn,"select * from lesson where name='$lesson'");
		 while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
			 $my_lesson=$row["id_lesson"];
		  }

$date_old="$date $time:00";
  
    
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
                $query=mysqli_query($conn,"SELECT * FROM exam WHERE id_exam='$id_exam'");
                while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                    $exam_datetime = $row["date_time"];
                }
                $query=mysqli_query($conn,"SELECT * FROM contains WHERE id_exam='$id_exam'");
                $var1 = "00:00:00";
                $date = new DateTime($var1);

                while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                    $id_question=$row["id_question"];
                    $question=mysqli_query($conn,"select * from question where id_question='$id_question'");
                    while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {

                        $var2=$row["time"];
                        list($hours, $minutes, $seconds) = explode(":", $var2);
                        $interval = new DateInterval("PT" . $hours . "H" . $minutes . "M" . $seconds . "S");
                        $date->add($interval);

                    }
                }

                $time= new DateTime($exam_datetime);
                $d=$date->format("H:i:s");
                list($h, $m, $s) = explode(":", $d);
                $inter = new DateInterval("PT" . $h . "H" . $m . "M" . $s . "S");
                $time->add($inter);

                $time_for_database = $time->format('Y-m-d H:i:s');

                $sql = "UPDATE exam SET time='$time_for_database' WHERE id_exam='$id_exam'";
                $conn->query($sql);
                $location="/Ptuxiaki/create_exam2.php";
                header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
              } else {
             echo "Error updating record: " . $conn->error;
              }
		
	
		}
?>