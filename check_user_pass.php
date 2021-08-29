<?php
include 'config.php';
 
session_start();// start session 
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	if($username && $password){

		
		$username = stripslashes($username);
		$password = stripslashes($password);
        $queryp = mysqli_query($conn,"select * from user_professor where password='$password' AND username='$username'");
        $querys = mysqli_query($conn,"select * from user_student where password='$password' AND username='$username'");
		$rowsp = mysqli_num_rows($queryp);
        $rowss = mysqli_num_rows($querys);
        
        if($rowsp == 1) {
		 
				$_SESSION["username"] = $username;
            
				echo "Session variables are set.";
				
				$id_professor = mysqli_query($conn,"select id_professor from user_professor where password='$password' AND username='$username'");
				 while ($row = mysqli_fetch_array($id_professor, MYSQLI_ASSOC)) {
					printf ("ID: %s ", $row["id_professor"]);
					 $my_id_professor=$row["id_professor"];
				}
				$_SESSION["id_professor"] = $my_id_professor;
				// Redirecting To Other Page
				header("location:profilek.php"); 
				
			} else if($rowss == 1) {
			 
				$_SESSION["username"] = $username;
				
				echo "Session variables are set.";
				
				$id_student = mysqli_query($conn,"select id_student from user_student where password='$password' AND username='$username'");
				 while ($row = mysqli_fetch_array($id_student, MYSQLI_ASSOC)) {
					printf ("ID: %s ", $row["id_student"]);
					 $my_id_student=$row["id_student"];
				}
				$_SESSION["id_student"] = $my_id_student;
				// Redirecting To Other Page
				header("location:profilef.php"); 
			
			}else{
				$error = "Username or Password is invalid";
				echo "$error";
				// Redirecting To this Page
				$location="/Ptuxiaki/sign_in.php?msg=failed";
				header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			
			}
      }
        
		
 


 ?>