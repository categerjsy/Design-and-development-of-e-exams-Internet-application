<?php
include 'config.php';
session_start ();
date_default_timezone_set('Europe/Athens') ;

$exam=$_POST["id_exam"];


       
//mysqli_close($conn);
	if (isset($_POST["id_exam"])){
		$queryf=mysqli_query($conn,"SELECT * FROM exam WHERE id_exam='$exam' ");

		while ($row = mysqli_fetch_array($queryf, MYSQLI_ASSOC)) {
			$begintime=$row["date_time"];
			$endtime=$row["time"];
			$_SESSION["end_exam"]=$endtime;



            $now = new Datetime();
			$bt = new Datetime($begintime);
			$et = new Datetime($endtime);

            if($now >= $bt && $now <= $et){
                    $_SESSION["id_exam"]=$exam;
                    $location="/Ptuxiaki/examination.php";
                    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
            }
            else{
                    $msg="Η εξέταση σας ξεκινάει στις $begintime";
                    function_alert($msg);
                    echo '<script type="text/JavaScript">
                     history.back()
                     </script>';
            }



		}
	
		//header('Location: ' . $_SERVER['HTTP_REFERER']);


	}
    function function_alert($message) {   
           echo "<script type ='text/JavaScript'>";  
           echo "alert('$message')";  
           echo "</script>";   
       }

?>

