<?php
include 'config.php';
session_start ();


$_SESSION["cor_id_student"]=$_POST["id_student"];
$id_st=$_SESSION["cor_id_student"];
$id_exam=$_SESSION["correction_id_exam"];

$query=mysqli_query($conn,"SELECT * FROM contains WHERE id_exam='$id_exam'");

while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    $id_question=$row["id_question"];
    $query1=mysqli_query($conn,"SELECT * FROM question WHERE id_question='$id_question' and type='True-False'");
    while ($row1 = mysqli_fetch_array($query, MYSQLI_ASSOC)) {


    }
}
//$location="/Ptuxiaki/correction4.php";
//header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);


?>