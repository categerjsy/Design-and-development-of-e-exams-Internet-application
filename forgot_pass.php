<?php

include 'config.php';
$email=$_POST['email'];

$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = '';

for ($i = 0; $i < 10; $i++) {
    $index = rand(0, strlen($characters) - 1);
    $randomString .= $characters[$index];
}
$t=0;
$us = mysqli_query($conn,"select * from user_student where email='$email'");
                while ($row = mysqli_fetch_array($us, MYSQLI_ASSOC)) {
                    $t=1;
                    $sql = "UPDATE user_student
						SET password='$randomString'
						WHERE email='$email';";
			        $qry = mysqli_query($conn, $sql);
                                mail("$email",'Change Password',"Dear user,
                    Your new password is:$randomString
                    Examination System Team ",'From: examinationsystemuop@gmail.com');

                    header("Location: index.php");
                }

$up = mysqli_query($conn,"select * from user_professor where email='$email'");
                while ($rows = mysqli_fetch_array($up, MYSQLI_ASSOC)) {
                    $t=1;
                    $sql = "UPDATE user_professor
						SET password='$randomString'
						WHERE email='$email';";
			        $qry = mysqli_query($conn, $sql);

                                mail("$email",'Change Password',"Dear user,
                    Your new password is:$randomString
                    Examination System Team ",'From: examinationsystemuop@gmail.com');
                  

                    header("Location:index.php");
                }
                
			if($t==0){
                header("Location: forgot_password.php?msg=nu");
            }
               		
?>