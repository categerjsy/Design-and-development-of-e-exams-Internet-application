<?php

session_start();	

	
include 'config.php';
	
	$name=$_POST['lessonname'];
	$category=$_POST['category'];
	
		$sql = "INSERT INTO lesson (name, category)
				VALUES ('$name','$category')";
        $qry = mysqli_query($conn, $sql);
			

    $idp=$_SESSION['id_professor'];

   $s = mysqli_query($conn,"select id_lesson from lesson where name='$name' AND category='$category'");
				 while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
					printf ("ID: %s ", $row["id_lesson"]);
					 $my_lesson=$row["id_lesson"];
				}
				

     $sqli = "INSERT INTO create_lesson (id_professor, id_lesson)
                    VALUES ('$idp','$my_lesson')";


        $qryi = mysqli_query($conn, $sqli);

			if($qryi){
				echo "Lesson in database final!!!";
				// Redirecting To Other Page
				$location="/Ptuxiaki/profilek.php";
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			}	
?>