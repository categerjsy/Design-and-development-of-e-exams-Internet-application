<?php

session_start();


include 'config.php';
$id_st=$_SESSION["cor_id_student"];
$id_exam=$_SESSION["correction_id_exam"];

$gradeID=$_POST['gradeID'];
$grade=$_POST['grade'];
for ($i=0; $i<sizeof ($gradeID);$i++) {
    mysqli_query($conn, "INSERT INTO correction  (id_exam,id_student,id_question,st_grade)
			                VALUES ('$id_exam','$id_st', '".$gradeID[$i]."','".$grade[$i]."')");

}


$location="/Ptuxiaki/cal_result.php";
header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);

?>