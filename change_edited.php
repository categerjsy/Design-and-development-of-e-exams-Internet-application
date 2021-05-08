<?php
session_start();	

include 'config.php';

$oldusername=$_SESSION["username"];

$email=$_POST['email'];
$username=$_POST['uname'];
$telephone=$_POST['telephone'];

     
////////////////////////

////////////////////////////////////  
		if (isset($_SESSION["id_student"])!=NULL){
			$s = mysqli_query($conn,"select * from user_student");
			$var=1;//is student
		    while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
				$mail=$row["email"];
				$findmail=mysqli_query($conn,"select * from user_student where username='$oldusername'");
				while ($row = mysqli_fetch_array($findmail, MYSQLI_ASSOC)) {
					$oldemail=$row["email"];
					$tel=$row["phone_number"];
				}
			}
			 	   				
		}
		else if (isset($_SESSION["id_professor"])!=NULL){
			$s = mysqli_query($conn,"select * from user_professor");
			$var=2;//is professor
			while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
			    $mail=$row["email"];
			    $findmail=mysqli_query($conn,"select * from user_professor where username='$oldusername'");
			    while ($row = mysqli_fetch_array($findmail, MYSQLI_ASSOC)) {
					$oldemail=$row["email"];
					$tel=$row["phone_number"];
			    }
			}
			 	   				
		}	
	
	if(($username!=$oldusername)&&($email!=$oldemail)){
		$username = stripslashes($username);
		$query = mysqli_query($conn,"select * from user_student where username='$username'");
		$ru = mysqli_num_rows($query);
		$query = mysqli_query($conn,"select * from user_professor where username='$username'");
		$rup = mysqli_num_rows($query);
		
		$email = stripslashes($email);
		$query = mysqli_query($conn,"select * from user_student where email='$email'");
		$re = mysqli_num_rows($query);
		$query = mysqli_query($conn,"select * from user_professor where email='$email'");
		$rep = mysqli_num_rows($query);
		
		
		if($ru==1||$rup==1){
			$error = "Username taken";
			echo "$error";
			// Redirecting To this Page
			$location="/Ptuxiaki/edit_prof.php?msg=failed_username";
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		}
		
		if($re==1||$rep==1){
				$error = "E-mail taken";
				echo "$error";
				// Redirecting To this Page
				$location="/Ptuxiaki/edit_prof.php?msg=failed_mail";
				header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		}
		if($telephone!=$tel){
			if($var==1){
				
				$sql = "UPDATE user_student
							SET email='$email', phone_number='$telephone', username='$username'
							WHERE username='$oldusername';";

				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$username;
					echo "Profile changed!!";
					// Redirecting To Other Page
		
					$location="/Ptuxiaki/profilef.php";
					header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
				
				}
			
			}
			else{
				$sql = "UPDATE user_professor
							SET email='$email', phone_number='$telephone', username='$username'
							WHERE username='$oldusername';";

				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$username;
					echo "Profile changed!!";
					// Redirecting To Other Page
						
					$location="/Ptuxiaki/profilek.php";
					header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
						
				}
			
			}
		}
		else{
			if($var==1){
				
				$sql = "UPDATE user_student
							SET email='$email', username='$username'
							WHERE username='$oldusername';";
				
				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$username;
					echo "Profile changed!!";
					// Redirecting To Other Page
				
					$location="/Ptuxiaki/profilef.php";
					header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
					
				}
			
			}
			else{
				$sql = "UPDATE user_professor
							SET email='$email', username='$username'
							WHERE username='$oldusername';";
				
				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$username;
					echo "Profile changed!!";
					
					$location="/Ptuxiaki/profilek.php";
					header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
						
				}
			
			}
		}
		
	}
	else if($username!=$oldusername){
		$username = stripslashes($username);
		$query = mysqli_query($conn,"select * from user_student where username='$username'");
		$ru = mysqli_num_rows($query);
		$query = mysqli_query($conn,"select * from user_professor where username='$username'");
		$rup = mysqli_num_rows($query);
			
		if($ru==1||$rup==1){
			$error = "Username taken";
			echo "$error";
			// Redirecting To this Page
			$location="/Ptuxiaki/edit_prof.php?msg=failed_username";
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		}
		
		if($telephone!=$tel){
			if($var==1){
				
				$sql = "UPDATE user_student
							SET phone_number='$telephone', username='$username'
							WHERE username='$oldusername';";
				
				$qry = mysqli_query($conn, $sql);
				if($qry){
					echo "Profile changed!!";
					$_SESSION["username"]=$username;
					// Redirecting To Other Page
					
					$location="/Ptuxiaki/profilef.php";
					header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
						
				}
			
			}
			else{
				$sql = "UPDATE user_professor
							SET phone_number='$telephone', username='$username'
							WHERE username='$oldusername';";
				
				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$username;
					echo "Profile changed!!";
					// Redirecting To Other Page
					
					$location="/Ptuxiaki/profilek.php";
					header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
					
				}
			
			}
		}
		else{
			if($var==1){
				
				$sql = "UPDATE user_student
							SET username='$username'
							WHERE username='$oldusername';";
			
				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$username;
					echo "Profile changed!!";
					// Redirecting To Other Page
					
					$location="/Ptuxiaki/profilef.php";
					header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
				
				}
			
			}
			else{
				$sql = "UPDATE user_professor
							SET username='$username'
							WHERE username='$oldusername';";

				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$username;
					echo "Profile changed!!";
					// Redirecting To Other Page
					$location="/Ptuxiaki/profilek.php";
					header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
					
				}
			
			}
		}
	
	}
	else if($email!=$oldemail){
		$email = stripslashes($email);
		$query = mysqli_query($conn,"select * from user_student where email='$email'");
		$re = mysqli_num_rows($query);
		$query = mysqli_query($conn,"select * from user_professor where email='$email'");
		$rep = mysqli_num_rows($query);
			
		if($re==1||$rep==1){
				$error = "E-mail taken";
				echo "$error";
				// Redirecting To this Page
				$location="/Ptuxiaki/edit_prof.php?msg=failed_mail";
				header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			}
			
		if($telephone!=$tel){
			if($var==1){
				
				$sql = "UPDATE user_student
							SET email='$email', phone_number='$telephone'
							WHERE username='$oldusername';";

				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$oldusername;
					echo "Profile changed!!";
					// Redirecting To Other Page
					
					$location="/Ptuxiaki/profilef.php";
					header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
						
				}
			
			}
			else{
				$sql = "UPDATE user_professor
							SET email='$email', phone_number='$telephone'
							WHERE username='$oldusername';";

				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$oldusername;
					echo "Profile changed!!";
					// Redirecting To Other Page
					
					$location="/Ptuxiaki/profilek.php";
					header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
						
				}
			
			}
		}
		else{
			if($var==1){
				
				$sql = "UPDATE user_student
							SET email='$email'
							WHERE username='$oldusername';";

				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$oldusername;
					echo "Profile changed!!";
					// Redirecting To Other Page
					
					$location="/Ptuxiaki/profilef.php";
					header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
					
				}
			
			}
			else{
				$sql = "UPDATE user_professor
							SET email='$email'
							WHERE username='$oldusername';";

				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$oldusername;
					echo "Profile changed!!";
					// Redirecting To Other Page
					
					$location="/Ptuxiaki/profilek.php";
					header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
					
				}
			
			}
		}
	
	}
	else{
		if($telephone!=$tel){
			if($var==1){
				
				$sql = "UPDATE user_student
							SET phone_number='$telephone'
							WHERE username='$oldusername';";

				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$oldusername;
					echo "Profile changed!!";
					// Redirecting To Other Page
				
					$location="/Ptuxiaki/profilef.php";
					header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
						
				}
			
			}
			else{
				$sql = "UPDATE user_professor, username='$username'
							WHERE username='$oldusername';";

				$qry = mysqli_query($conn, $sql);
				if($qry){
					$_SESSION["username"]=$username;
					echo "Profile changed!!";
					// Redirecting To Other Page
					$location="/Ptuxiaki/profilek.php";
					header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
					
				}
			
			}
		}
		else{
			echo "Nothing changed!!";
					// Redirecting To Other Page
					$location="/Ptuxiaki/edit_prof.php";
				header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		}
	}		



///////////////////////////
//mysqli_close($conn);
?>