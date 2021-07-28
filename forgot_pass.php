<?php

include 'config.php';
$email=$_POST['email'];

$us = mysqli_query($conn,"select * from user_student where email='$email'");
                while ($row = mysqli_fetch_array($us, MYSQLI_ASSOC)) {
                    mail("$email",'Αλλαγή κωδικού χρήστη',"Αγαπητέ χρήστη,
                    Ο προσωρινός κωδικος σας είναι:
                    ",'From: examinationsystemuop@gmail.com');
                  
                    $location="/Ptuxiaki/index.php";
                    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
                }
$up = mysqli_query($conn,"select * from user_professor where email='$email'");
                while ($row = mysqli_fetch_array($up, MYSQLI_ASSOC)) {
                    mail("$email",'Αλλαγή κωδικού χρήστη',"Αγαπητέ χρήστη,
                    Ο προσωρινός κωδικος σας είναι:
                    ",'From: examinationsystemuop@gmail.com');
                  
                    $location="/Ptuxiaki/index.php";
                    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
                }

               		
?>