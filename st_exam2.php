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
                    $st=$_SESSION["id_student"];
                    $f=0;
                $querys=mysqli_query($conn,"SELECT * FROM gives WHERE id_exam='$exam' and id_student='$st'");

                while ($rows = mysqli_fetch_array($querys, MYSQLI_ASSOC)) {
                    $f=1;
                    $msg="Δεν γίνεται να συμμετάσχετε δεύτερη φορά.";
                    function_alert($msg);
                    echo '<script type="text/JavaScript">
                     history.back()
                     </script>';
                }
                if($f==0) {
                    header("Location: examination.php");
                }
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

