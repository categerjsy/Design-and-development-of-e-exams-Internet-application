<?php 
session_start();	
include 'config.php';

$id_exam=$_SESSION["id_exam"];
$id_lesson=$_SESSION["id_lesson"];
$number_questions=$_POST['number_questions'];

     $arr = array();
     $query=mysqli_query($conn,"SELECT * FROM includes WHERE id_lesson='$id_lesson'");
		while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$id_question=$row["id_question"];	
			array_push($arr,$id_question);
        }
        for($i=0;$i<$number_questions;$i++){
        $max=sizeof($arr)-1;
        $toexam=rand ( 0 ,$max);
        $q=$arr[$toexam];
        $sql = "INSERT INTO contains (id_exam,id_question)
			VALUES ('$id_exam','$q')";
        mysqli_query($conn,$sql);
        //echo $arr[$toexam] ;
        unset($arr[$toexam]); 
        $arr=array_values($arr);
        }


        // Redirecting To Other Page
			$location="/Ptuxiaki/show_exam.php?msg=rtest";
		    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		
?>