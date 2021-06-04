<?php 
include 'config.php';
session_start();

$username=$_SESSION["username"];
$old=$_POST['old_password'];
$new=$_POST['password'];
$conf=$_POST['confirm_password'];

		$queryp = mysqli_query($conn,"select * from user_professor where password='$old' AND username='$username'");
        $querys = mysqli_query($conn,"select * from user_student where password='$old' AND username='$username'");
		$rowsp = mysqli_num_rows($queryp);
        $rowss = mysqli_num_rows($querys);
if($new==$conf){
		
		
		if($rowsp == 1) {//prof
			if((strlen($new)<7)||(strlen($new)>16)){
				echo '<script type="text/javascript">'; 
                echo 'window.location.href = "change_password.php?msg=plen";';
                echo '</script>';

			}
			else{
				if (!empty($_POST['old_password'])){
					$sql = "UPDATE user_professor
							SET password='$new'
							WHERE username='$username';";
				$qry = mysqli_query($conn, $sql);

				if($qry){
					echo "New password in database!!!";
					// Redirecting To Other Page
					header("location:profilek.php"); 
				}

				}
			}
			
		} else if($rowss == 1) {//student
			if((strlen($new)<7)||(strlen($new)>16)){
				echo '<script type="text/javascript">'; 
                echo 'window.location.href = "change_password.php?msg=plen";';
                echo '</script>';
			}else{
				if (!empty($_POST['old_password'])){
					$sql = "UPDATE user_student
							SET password='$new'
							WHERE username='$username';";
				$qrys = mysqli_query($conn, $sql);

				if($qrys){
					echo "New password in database!!!";
					// Redirecting To Other Page
					header("location:profilef.php"); 
				}

				}
			}
		
		
		}else{
				$error = "Password is invalid";
				echo "$error";
				// Redirecting To this Page
				$location="/Ptuxiaki/change_password.php?msg=failed";
				header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			
			}
 
}else {
	$location="/Ptuxiaki/change_password.php?msg=cp";
	header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
}	

?>