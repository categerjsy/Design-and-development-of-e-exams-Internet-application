<?php
session_start();	

include 'config.php';

$oldusername=$_SESSION["username"];

$email=$_POST['email'];
$username=$_POST['uname'];
$telephone=$_POST['telephone'];

     
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
		if (isset($_SESSION["id_student"])!=NULL){
			$s = mysqli_query($conn,"select * from user_student");
		    while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
				$mail=$row["email"];
				$findmail=mysqli_query($conn,"select * from user_student where username='$username'");
				while ($row = mysqli_fetch_array($findmail, MYSQLI_ASSOC)) {
					$my_m=$row["email"];
					$tel=$row["phone_number"];
				}
			}
			 	   				
		}
		else if (isset($_SESSION["id_professor"])!=NULL){
			$s = mysqli_query($conn,"select * from user_professor");
			while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
			    $mail=$row["email"];
			    $findmail=mysqli_query($conn,"select * from user_professor where username='$username'");
			    while ($row = mysqli_fetch_array($findmail, MYSQLI_ASSOC)) {
					$my_m=$row["email"];
					$tel=$row["phone_number"];
			    }
			}
			 	   				
		}	
						
		if(($ru==1||$rup==1)&&($username!=$oldusername)){
			$error = "Username taken";
			echo "$error";
			// Redirecting To this Page
			$location="/Ptuxiaki/edit_prof.php?msg=failed_username";
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		}
            else if(($re==1||$rep==1)&&($email!=$my_m)){
				$error = "E-mail taken";
				echo "$error";
				// Redirecting To this Page
				$location="/Ptuxiaki/edit_prof.php?msg=failed_mail";
				header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			}
			else{
					//$sql = "INSERT INTO user_student (name, surname, email, phone_number, AM, username,password)
				//VALUES ('$firstname','$lastname', '$email', '$telephone','$am','$username', '$pass')";

			//$qry = mysqli_query($conn, $sql);
				echo 'Δεν γινεται ακομα αλλαγη φιλε, αλλα ειμαι σε καλο δρομο';
			/*if($qry){
				echo "Profile changed!!";
				// Redirecting To Other Page
				$location="/Ptuxiaki/index.php";
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			}*/
			
				
			}
		



///////////////////////////
//mysqli_close($conn);
?>