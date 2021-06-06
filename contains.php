<?php
include 'config.php';
session_start ();
$exam=$_SESSION["id_exam"];


       
//mysqli_close($conn);
	if (isset($_POST['add_enemy'])){
			$sql = "INSERT INTO contains (id_exam,id_question)
			VALUES ('$exam', ".$_POST["add_enemy"].")";

		mysqli_query($conn,$sql);

	
		//header('Location: ' . $_SERVER['HTTP_REFERER']);
		echo '<script type="text/JavaScript"> 
		history.back()
				</script>';

	}
	
	 
	
	if (isset($_POST['remove_enemy'])){
	
		 
		$sql = "DELETE FROM contains WHERE id_exam='$exam' AND id_question=".$_POST["remove_enemy"]."";
	
		mysqli_query($conn,$sql);
	
	//header('Location: ' . $_SERVER['HTTP_REFERER']);
		echo '<script type="text/JavaScript"> 
		history.back()
			</script>';
	
	}
	
	 
	
?>