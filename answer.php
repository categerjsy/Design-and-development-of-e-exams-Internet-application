<?php
include 'config.php';
session_start ();
$exam=$_SESSION["id_exam"];


       
//mysqli_close($conn);
	if (isset($_POST['ek'])){
			$textarea=htmlspecialchars($_POST['text']);
			$sql = "INSERT INTO answer (id_exam,id_question,student_answer)
			VALUES ('$exam', ".$_POST["ek"].",'$textarea')";

		mysqli_query($conn,$sql);
		$location="/Ptuxiaki/examination2.php";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);	

	}
	
	 
	
	if (isset($_POST['tf'])){
		$answer=$_POST['answer'];
		if($answer=='F'){
			$sql = "INSERT INTO answer (id_exam,id_question,student_answer)
			VALUES ('$exam', ".$_POST["tf"].",'0')";
		}
		if($answer=='T'){
			$sql = "INSERT INTO answer (id_exam,id_question,student_answer)
			VALUES ('$exam', ".$_POST["tf"].",'1')";
		}
		
		mysqli_query($conn,$sql);
		$location="/Ptuxiaki/examination2.php";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);	
	
	}

	if (isset($_POST['mc'])){
		$paf=$_POST['paf'];
		$sql = "INSERT INTO answer (id_exam,id_question,student_answer)
			VALUES ('$exam', ".$_POST["mc"].",'$paf')";


		mysqli_query($conn,$sql);
		$location="/Ptuxiaki/examination2.php";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);	
	}

 

	if (isset($_POST['mcm'])){
		$pa=$_POST['pa'];

    for ($i=0; $i<sizeof ($pa);$i++) {  
        //question
		$sql = "INSERT INTO answer (id_exam,id_question,student_answer)
				VALUES ('$exam', ".$_POST["mcm"].",".$pa[$i]. ")";
				mysqli_query($conn,$sql);
     } 

	

		

			
			$location="/Ptuxiaki/examination2.php";
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);	

	}
	
	 
	
?>