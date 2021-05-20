<?php
include 'config.php';
session_start ();
$exam=$_SESSION["id_exam"];


       
//mysqli_close($conn);
	if (isset($_POST['add_enemy'])){
			$sql = "INSERT INTO contains (id_exam,id_question)
			VALUES ('$exam', ".$_POST["add_enemy"].")";

		mysqli_query($conn,$sql);

		$location="/Ptuxiaki/create_exam2.php?msg=plus";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);

	}
	
	 
	
	if (isset($_POST['remove_enemy'])){
	
		 
		$sql = "DELETE FROM contains WHERE id_exam='$exam' AND id_question=".$_POST["remove_enemy"]."";
	
		mysqli_query($conn,$sql);
	   
	  // $id = $_POST['delete_id'];
	  // $query = mysqli_query($conn,"DELETE FROM contains WHERE id_exam='$exam' AND id_question=$id'");
   
	   
  	$location="/Ptuxiaki/create_exam2.php?msg=minus";
		   header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
	
	}
	
	 
	
?>