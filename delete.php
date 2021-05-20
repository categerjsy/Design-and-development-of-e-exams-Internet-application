<?php
include 'config.php';
session_start ();
$exam=$_SESSION["id_exam"];


        $sql = "DELETE FROM contains WHERE id_exam='$exam' AND id_question=".$_POST["btn"]."";
	
	     mysqli_query($conn,$sql);
        
       // $id = $_POST['delete_id'];
       // $query = mysqli_query($conn,"DELETE FROM contains WHERE id_exam='$exam' AND id_question=$id'");
    
        
   $location="/Ptuxiaki/create_exam2.php?msg=minus";
		    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
//mysqli_close($conn);
?>