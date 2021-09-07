<?php
include 'config.php';
session_start ();
$oldusername=$_SESSION["username"];
$oldemail=$_SESSION["oldemail"];

if (isset($_SESSION["id_student"])!=NULL){
	if (isset($_POST['e-mail'])){ 
		$email=$_POST['email'];
		$query = mysqli_query($conn,"select * from user_professor where email='$email'");
		$re = mysqli_num_rows($query);
		$query = mysqli_query($conn,"select * from user_student where email='$email'");
		$res = mysqli_num_rows($query);
		if($re==1||$res==1){
			$error = "E-mail taken";
			echo "$error";
			
			
			if($oldemail!=$email){
				// Redirecting To this Page
			header("Location: edit_prof.php?msg=failed_mail");
			}
			else{
			header("Location: edit_prof.php");
			}
		}
		else{
		$sql = "UPDATE user_student
				SET email='$email'
				WHERE username='$oldusername';";

				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$oldusername;
					header("Location: edit_prof.php");
					
				}
		}
		

	}
	
	if (isset($_POST['telephone'])){ 
		$telephone=$_POST['tel'];

		
		$sql = "UPDATE user_student
					SET phone_number='$telephone'
							WHERE username='$oldusername';";

				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$oldusername;
					echo "Profile changed!!";
					// Redirecting To Other Page
					header("Location: edit_prof.php");
						
				}
		

	}
	if (isset($_POST['usename'])){ 

		$username=$_POST['uname'];
		$query = mysqli_query($conn,"select * from user_professor where username='$username'");
		$ru = mysqli_num_rows($query);
		$query = mysqli_query($conn,"select * from user_student where username='$username'");
		$rus = mysqli_num_rows($query);
		
		if($ru==1||$rus==1){
			$error = "Username taken";
			echo "$error";
			
			if($oldusername!=$username){
			header("Location: edit_prof.php?msg=failed_username");
			}
			else{
			header("Location: edit_prof.php");
			}
		}
		else{
		$sql = "UPDATE user_student
				SET username='$username'
				WHERE username='$oldusername';";

				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$username;
					header("Location: edit_prof.php");
					
				}
		}
		

	}
							
}
else if (isset($_SESSION["id_professor"])!=NULL){
	if (isset($_POST['e-mail'])){ 
		$email=$_POST['email'];
		$query = mysqli_query($conn,"select * from user_professor where email='$email'");
		$re = mysqli_num_rows($query);
		$query = mysqli_query($conn,"select * from user_student where email='$email'");
		$res = mysqli_num_rows($query);
		if($re==1||$res==1){
			$error = "E-mail taken";
			echo "$error";
			
			if($oldemail!=$email){
			header("Location: edit_prof.php?msg=failed_mail");
			}
			else{
			header("Location: edit_prof.php");
			}
		}
		else{
		$sql = "UPDATE user_professor
				SET email='$email'
				WHERE username='$oldusername';";

				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$oldusername;

					header("Location: edit_prof.php");
					
					
				}
		}
		

	}
	
	if (isset($_POST['telephone'])){ 
		$telephone=$_POST['tel'];

		
		$sql = "UPDATE user_professor
					SET phone_number='$telephone'
							WHERE username='$oldusername';";

				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$oldusername;
					echo "Profile changed!!";
					// Redirecting To Other Page
					header("Location: edit_prof.php");
						
				}
		

	}
	if (isset($_POST['usename'])){ 

		$username=$_POST['uname'];
		$query = mysqli_query($conn,"select * from user_professor where username='$username'");
		$ru = mysqli_num_rows($query);
		$query = mysqli_query($conn,"select * from user_student where username='$username'");
		$rus = mysqli_num_rows($query);
		
		if($ru==1||$rus==1){
			$error = "Username taken";
			echo "$error";
			if($oldusername!=$username){
			// Redirecting To this Page
			header("Location: edit_prof.php?msg=failed_username");
			}
			else{
			header("Location: edit_prof.php" );
			}
		}
		else{
		$sql = "UPDATE user_professor
				SET username='$username'
				WHERE username='$oldusername';";

				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$username;
					header("Location: edit_prof.php");
				}
		}
	}					
}
	
?>