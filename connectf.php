<?php
session_start();
include 'config.php';


$firstname=$_POST['name'];
$lastname=$_POST['surname'];
$email=$_POST['email'];
$username=$_POST['uname'];
$am=$_POST['ΑΜ'];
$telephone=$_POST['telephone'];
$pass=$_POST['password'];
$cpass=$_POST['confirm_password'];

     
////////////////////////
$username = stripslashes($username);
$email = stripslashes($email);
$query = mysqli_query($conn,"select * from user_student where username='$username'");
$ru = mysqli_num_rows($query);
$query = mysqli_query($conn,"select * from user_student where email='$email'");
$re = mysqli_num_rows($query);
$query = mysqli_query($conn,"select * from user_professor where username='$username'");
$rup = mysqli_num_rows($query);
$query = mysqli_query($conn,"select * from user_professor where email='$email'");
$rep = mysqli_num_rows($query);
////////////////////////////////////  
if((strlen($pass)<7)||(strlen($pass)>16)){
	$location="/Ptuxiaki/sign_upf.php?msg=plen";
	header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);

}  
else{
    if($pass==$cpass) {
		  if($ru==1||$rup==1){
				$error = "Username taken";
				echo "$error";
				// Redirecting To this Page
				$location="/Ptuxiaki/sign_upf.php?msg=failed_username";
				header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			}
            else if($re==1||$rep==1){
				$error = "E-mail taken";
				echo "$error";
				// Redirecting To this Page
				$location="/Ptuxiaki/sign_upf.php?msg=failed_mail";
				header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			}
			else{
					$sql = "INSERT INTO user_student (name, surname, email, phone_number, AM, username,password)
				VALUES ('$firstname','$lastname', '$email', '$telephone','$am','$username', '$pass')";

			$qry = mysqli_query($conn, $sql);

			if($qry){
				echo "Profile in database!!!";
				// Redirecting To Other Page
				$location="/Ptuxiaki/sign_in.php?msg=okay";
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			}

			}
		
    }else{
		$location="/Ptuxiaki/sign_upf.php?msg=cp";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
	
		
	}

}

?>