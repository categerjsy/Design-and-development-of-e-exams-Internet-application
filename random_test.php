<?php 
session_start();	
include 'config.php';

$id_exam=$_SESSION["id_exam"];
$id_lesson=$_SESSION["id_lesson"];
     
     $arr = array();

array_push($arr, "ArrayValue1"); 
print_r($arr);
?>