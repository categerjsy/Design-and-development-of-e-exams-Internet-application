<?php

session_start();

include 'config.php';
$id_st=$_SESSION["cor_id_student"];
$id_exam=$_SESSION["correction_id_exam"];
$final_grade=0;
$query=mysqli_query($conn,"SELECT * FROM correction WHERE id_exam='$id_exam' and id_student='$id_st'");

while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    $st_grade= $row["st_grade"];
    $final_grade=$final_grade+$st_grade;
}
mysqli_query($conn, "INSERT INTO results  (exam,final_grade)
			                VALUES ('$id_exam','$final_grade')");
$id_result = mysqli_insert_id($conn);
mysqli_query($conn, "INSERT INTO get  (id_student,id_results)
			                VALUES ('$id_st','$id_result')");
$id_prof=$_SESSION["id_professor"];

mysqli_query($conn, "INSERT INTO wants  (id_professor,id_results)
			                VALUES ('$id_prof','$id_result')");

$location="/Ptuxiaki/cal_result1.php";
header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);

?>