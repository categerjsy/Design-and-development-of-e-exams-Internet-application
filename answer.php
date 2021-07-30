<?php
include 'config.php';
session_start ();
$st=$_SESSION["id_student"];


       
//mysqli_close($conn);
	if (isset($_POST['ek'])){
			$textarea=htmlspecialchars($_POST['text']);
			$sql = "INSERT INTO answer (id_student,id_question,student_answer)
			VALUES ('$st', ".$_POST["ek"].",'$textarea')";

		mysqli_query($conn,$sql);
		$location="/Ptuxiaki/examination2.php";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);	

	}
	
	 
	
	if (isset($_POST['tf'])){
		$answer=$_POST['answer'];
		if($answer=='F'){
			$sql = "INSERT INTO answer (id_student,id_question,student_answer)
			VALUES ('$st', ".$_POST["tf"].",'False')";
		}
		if($answer=='T'){
			$sql = "INSERT INTO answer (id_student,id_question,student_answer)
			VALUES ('$st', ".$_POST["tf"].",'True')";
		}
		
		mysqli_query($conn,$sql);
		$location="/Ptuxiaki/examination2.php";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);	
	
	}

	if (isset($_POST['mc'])){
		$paf=$_POST['paf'];
		$sql = "INSERT INTO answer (id_student,id_question,student_answer)
			VALUES ('$st', ".$_POST["mc"].",'$paf')";


		mysqli_query($conn,$sql);
		$location="/Ptuxiaki/examination2.php";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);	
	}

 

	if (isset($_POST['mcm'])){
		$pa=$_POST['pa'];

		if(!empty($_POST['pa'])) {

			foreach($_POST['pa'] as $value){
					mysqli_query($conn, "INSERT INTO answer (id_student,id_question,student_answer)
			VALUES ('$st', ".$_POST["mcm"].",'".$value. "')");
			}
		}
		// for ($i=0; $i<sizeof ($pa);$i++) {  
		// 	//question
		// 	mysqli_query($conn, "INSERT INTO answer (id_student,id_question,student_answer)
		// 	VALUES ('$st', ".$_POST["mcm"].",'".$pa[$i]. "')");
		
		// } 

			
			$location="/Ptuxiaki/examination2.php";
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);	

	}
	
	 
	
?>