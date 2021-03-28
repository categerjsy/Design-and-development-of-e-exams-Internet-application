<?php
include 'config.php';
 
  session_start();// start session 
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	
if($username && $password){
		echo "$username<br>";
		echo "$password<br>";
		
		$username = stripslashes($username);
		$password = stripslashes($password);
		
		
		
		
		$query = mysqli_query($conn,"select * from user_student where password='$password' AND username='$username'");
		
		$rows = mysqli_num_rows($query);
		
		if($rows == 1) {
		 
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
            $location="/Ptuxiaki/index.php";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		
	}
}
 
echo "Please enter both username and password";
// Redirecting To this Page
//$location="/sxediash2/sign_in.php";
//header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
//mysqli_close($conn);
 ?>