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

$lesson=$_SESSION["lesson"];
   $query=mysqli_query($conn,"SELECT * FROM contains WHERE id_exam='$id_exam'");
   $gradefornow=0;
   while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
	   $id_question=$row["id_question"];	
	   
	   $question=mysqli_query($conn,"select * from question where id_question='$id_question'");
	   while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
		   $grade=$row["grade"];
			$gradefornow+=$grade;
	   }
       $question=mysqli_query($conn,"select * from exam where id_exam='$id_exam'");
	   while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
		   $final_grade=$row["final_grade"];
			
	   }
   }
   if($final_grade>$gradefornow){
    echo '<script type="text/javascript">'; 
    echo 'alert("To άρθοισμα των εισαγθέντων ερωτήσεων δεν φτάνει την ορισμένη τελική βαθμολογία.Παρακαλούμε προσθέστε και άλλες ερωτήσεις");'; 
    echo 'window.location.href = "create_exam2.php";';
    echo '</script>';
    }
    if($final_grade<$gradefornow){
        echo '<script type="text/javascript">'; 
        echo 'alert("To άρθοισμα των εισαγθέντων ερωτήσεων είναι μεγαλύτερο της τελικής βαθμολογίας, οι επιπλέον μονάδες αυτοματοποιούνται ως bonus βαθμολογία.");'; 
        echo 'window.location.href = "show_exam.php?msg=rtest";';
        echo '</script>';
        $sql = "UPDATE exam
        SET final_grade='$gradefornow'
        WHERE id_exam='$id_exam';";
        $qry = mysqli_query($conn, $sql);
    }
    if($final_grade==$gradefornow){
        echo '<script type="text/javascript">'; 
        echo 'window.location.href = "show_exam.php?msg=rtest";';
        echo '</script>';
    }



        // Redirecting To Other Page
		//	$location="/Ptuxiaki/show_exam.php?msg=rtest";
		//    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		
?>