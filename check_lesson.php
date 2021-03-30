<?php
include 'config.php';
	
	$name=$_POST['lessonname'];
	$category=$_POST['category'];
	
		$sql = "INSERT INTO lesson (name, category)
				VALUES ('$name','$category')";
        $qry = mysqli_query($conn, $sql);

			if($qry){
				echo "Lesson in database!!!";
				// Redirecting To Other Page
				$location="/Ptuxiaki/index.php";
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			}			
?>