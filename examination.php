<?php
include 'config.php';
session_start ();
$id_exam=$_SESSION["id_exam"];
$st=$_SESSION["id_student"];
        mysqli_query($conn, "INSERT INTO gives (id_exam,id_student)
                VALUES ('$id_exam','$st')");
     $arr = array();
     $exam_array=array();
     $number_questions=0;
     $query=mysqli_query($conn,"SELECT * FROM contains WHERE id_exam='$id_exam'");
		while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$id_question=$row["id_question"];	
			array_push($arr,$id_question);
         $number_questions++;
      }
      for($i=0;$i<$number_questions;$i++){
        $max=sizeof($arr)-1;
        $toexam=rand ( 0 ,$max);
        $q=$arr[$toexam];
        array_push($exam_array,$q);
        unset($arr[$toexam]); 
        $arr=array_values($arr);
      }

      $_SESSION["ex_array"]=$exam_array;
      $_SESSION["number"]=0;

      header("Location: examination1.php");

 
?>