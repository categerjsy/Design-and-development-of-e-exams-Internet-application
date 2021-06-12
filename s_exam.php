
<?php
session_start();	
include 'config.php';

$exam=$_SESSION["id_exam"];
$id_lesson=$_SESSION["id_lesson"];
$lesson=$_SESSION["lesson"];
   $query=mysqli_query($conn,"SELECT * FROM contains WHERE id_exam='$exam'");
   $gradefornow=0;
   while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
	   $id_question=$row["id_question"];	
	   
	   $question=mysqli_query($conn,"select * from question where id_question='$id_question'");
	   while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
		   $grade=$row["grade"];
			$gradefornow+=$grade;
	   }
       $question=mysqli_query($conn,"select * from exam where id_exam='$exam'");
	   while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
		   $final_grade=$row["final_grade"];
			
	   }
   }
   if($final_grade>$gradefornow){
    echo '<script type="text/javascript">'; 
    echo 'alert("To άρθοισμα των εισαχθέντων ερωτήσεων δεν φτάνει την ορισμένη τελική βαθμολογία.Παρακαλούμε προσθέστε και άλλες ερωτήσεις");'; 
    echo 'window.location.href = "create_exam2.php";';
    echo '</script>';
    }
    if($final_grade<$gradefornow){
        echo '<script type="text/javascript">'; 
        echo 'alert("To άρθοισμα των εισαγθέντων ερωτήσεων είναι μεγαλύτερο της τελικής βαθμολογίας, οι επιπλέον μονάδες αυτοματοποιούνται ως bonus βαθμολογία.");'; 
        echo 'window.location.href = "show_exam.php?msg=exam";';
        echo '</script>';
        $sql = "UPDATE exam
        SET final_grade='$gradefornow'
        WHERE id_exam='$exam';";
        $qry = mysqli_query($conn, $sql);
    }
    if($final_grade==$gradefornow){
        echo '<script type="text/javascript">'; 
        echo 'window.location.href = "show_exam.php?msg=exam";';
        echo '</script>';
    }
?>
	
