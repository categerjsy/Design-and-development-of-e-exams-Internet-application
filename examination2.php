<?php
include 'config.php';
session_start ();
unset($seconds);
$h = $_COOKIE["hours"];
$m = $_COOKIE["minutes"];
$s = $_COOKIE["seconds"];

echo $h.":".$m.":".$s;

$seconds=($h*3600)+($m*60)+$s;

unset($_COOKIE["hours"]);
unset($_COOKIE["minutes"]);
unset($_COOKIE["seconds"]);
$end=$_SESSION["end_exam"];

$_SESSION["end_exam"]=date("Y-m-d H:i:s", (strtotime(date($end)) - $seconds));


      $_SESSION["number"]++;

      header("Location: examination1.php");


?>