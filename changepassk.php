<?php 
include 'config.php';

$old=$_POST['old_password'];
$new=$_POST['new_password'];
$conf=$_POST['confirm_password'];
//if(old==passwordfrombase)
	if($new=$conf){
			$sql = "UPDATE user_professor SET password = '$new';";//WHERE username='$username'
			$qry = mysqli_query($conn, $sql);
			
			if($qry){
				echo "New password in database!!!";
				// Redirecting To Other Page
				header("location:index.php"); 
			}
	}
?>