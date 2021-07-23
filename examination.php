<?php
include 'config.php';
session_start ();
$id_exam=$_SESSION["id_exam"];

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
      $location="/Ptuxiaki/examination1.php";
      header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);

 
?>