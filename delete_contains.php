<?php
include 'config.php';
session_start ();
$exam=$_SESSION["id_exam"];


        $sql = "DELETE FROM contains WHERE id_exam='$exam' AND id_question=".$_POST["btn"]."";
	
	     mysqli_query($conn,$sql);
         
	header("location: create_exam2.php");
    
//mysqli_close($conn);
?>