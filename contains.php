<?php
include 'config.php';
session_start ();
$exam=$_SESSION["id_exam"];


        $sql = "INSERT INTO contains (id_exam,id_question)
				VALUES ('$exam', ".$_POST["btn"].")";
	
	     mysqli_query($conn,$sql);
         
	header("location: create_exam2.php");
    
//mysqli_close($conn);
?>