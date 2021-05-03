<?php

session_start();	

	
include 'config.php';
	
    $id_q=$_SESSION["id_question"];
	$pa=$_POST['pa'];

    for ($i=0; $i<sizeof ($pa);$i++) {  
        //question
		mysqli_query($conn, "UPDATE possible_answer SET is_correct=1 WHERE id_question='$id_q' AND text='".$pa[$i]. "'");

     } 

echo "Record is inserted";  
 
			// Redirecting To Other Page
			$location="/Ptuxiaki/create_question.php";
		    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		
?>