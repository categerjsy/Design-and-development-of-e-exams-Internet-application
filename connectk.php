<?php
include 'config.php';

$firstname=$_POST['name'];
$lastname=$_POST['surname'];
$email=$_POST['email'];
$username=$_POST['uname'];
$telephone=$_POST['telephone'];
$pass=$_POST['password'];
$cpass=$_POST['confirm_password'];

     
////////////////////////
$username = stripslashes($username);
$email = stripslashes($email);
$query = mysqli_query($conn,"select * from user_professor where username='$username'");
$ru = mysqli_num_rows($query);
$query = mysqli_query($conn,"select * from user_professor where email='$email'");
$re = mysqli_num_rows($query);
////////////////////////////////////    
    if($pass==$cpass) {
		  if($ru==1){
				echo '<script type="text/javascript">'; 
                echo 'alert("Username taken!");'; 
                echo 'window.location.href = "sign_upk.php";';
                echo '</script>';
			}
            else if($re==1){
				echo '<script type="text/javascript">'; 
                echo 'alert("E-mail taken!");'; 
                echo 'window.location.href = "sign_upk.php";';
                echo '</script>';
			}
			else{
					$sql = "INSERT INTO user_professor (name, surname, email, phone_number, username,password)
				VALUES ('$firstname','$lastname', '$email', '$telephone','$username', '$pass')";

			$qry = mysqli_query($conn, $sql);

			if($qry){
				echo "Profile in database!!!";
				// Redirecting To Other Page
				$location="/Ptuxiaki/index.php";
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			}
			
				
			}
		
    }else{
			echo '<script type="text/javascript">'; 
                echo 'alert("Unmatched passwords!");'; 
                echo 'window.location.href = "sign_upk.php";';
                echo '</script>';
		
	}



///////////////////////////
//mysqli_close($conn);
?>