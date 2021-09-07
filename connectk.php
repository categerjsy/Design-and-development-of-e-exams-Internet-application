<?php
include 'config.php';

$firstname=$_POST['name'];
$lastname=$_POST['surname'];
$email=$_POST['email'];
$username=$_POST['uname'];
$telephone=$_POST['telephone'];
$pass=$_POST['password'];
$cpass=$_POST['confirm_password'];

     

$username = stripslashes($username);
$email = stripslashes($email);
$query = mysqli_query($conn,"select * from user_professor where username='$username'");
$ru = mysqli_num_rows($query);
$query = mysqli_query($conn,"select * from user_professor where email='$email'");
$re = mysqli_num_rows($query);
$query = mysqli_query($conn,"select * from user_student where username='$username'");
$rus = mysqli_num_rows($query);
$query = mysqli_query($conn,"select * from user_student where email='$email'");
$res = mysqli_num_rows($query);

if((strlen($pass)<7)||(strlen($pass)>16)){

	header("Location: sign_upk.php?msg=plen");

}  
else{
    if($pass==$cpass) {
		  if($ru==1||$rus==1){
				$error = "Username taken";
				echo "$error";
				// Redirecting To this Page
				header("Location: sign_upk.php?msg=failed_username");
			}
            else if($re==1||$res==1){
				$error = "E-mail taken";
				echo "$error";
				// Redirecting To this Page
				header("Location:sign_upk.php?msg=failed_mail");
			}
			else{
					$sql = "INSERT INTO user_professor (name, surname, email, phone_number, username,password)
				VALUES ('$firstname','$lastname', '$email', '$telephone','$username', '$pass')";

				$qry = mysqli_query($conn, $sql);

				if($qry){
					// Redirecting To Other Page
				header("Location: sign_in.php?msg=okay");
				}
				
				
			}
		
		}else{

			header("Location: sign_upk.php?msg=cp");
		
			
		}
	
	}

?>