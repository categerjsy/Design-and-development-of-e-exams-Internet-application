<?php
include 'config.php';
session_start ();
$student=$_SESSION["id_student"];


       

	if (isset($_POST['add_lesson'])){
			$sql = "INSERT INTO enroll_on (id_student,id_lesson)
			VALUES ('$student', ".$_POST["add_lesson"].")";

		mysqli_query($conn,$sql);

	
	
		echo '<script type="text/JavaScript"> 
		history.back()
				</script>';

	}
	
	 
	
	if (isset($_POST['remove_lesson'])){
	
		 
		$sql = "DELETE FROM enroll_on WHERE id_student='$student' AND id_lesson=".$_POST["remove_lesson"]."";
	
		mysqli_query($conn,$sql);
	

		echo '<script type="text/JavaScript"> 
		history.back()
			</script>';
	
	}
	
	 
	
?>