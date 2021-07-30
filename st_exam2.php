<?php
include 'config.php';
session_start ();
$exam=$_POST["id_exam"];


       
//mysqli_close($conn);
	if (isset($_POST["id_exam"])){
		$queryf=mysqli_query($conn,"SELECT * FROM exam WHERE id_exam='$exam' ");
						
		while ($row = mysqli_fetch_array($queryf, MYSQLI_ASSOC)) {
			$start_time=$row["date_time"];
			$end_time=$row["time"];
			$_SESSION["end_exam"]=$end_time;
			$date_start = new DateTime($start_time);
			$date_end = new DateTime($end_time);
			$now = new DateTime();

			if($now>$date_start) {
                $_SESSION["id_exam"]=$exam;
				$location="/Ptuxiaki/examination.php";
				header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			}
			if($now<$date_start){
                $msg="Η εξέταση σας ξεκινάει στις $start_time";
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