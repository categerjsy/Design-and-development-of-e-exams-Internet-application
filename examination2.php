<?php
include 'config.php';
session_start ();

$h = $_COOKIE["hours"];
$m = $_COOKIE["minutes"];
$s = $_COOKIE["seconds"];

echo $h.":".$m.":".$s;
$time=$h.":".$m.":".$s;
$seconds=($h*3600)+($m*60)+$s;

$_SESSION["end_exam"]=date("Y-m-d H:i:s", (strtotime(date($_SESSION["end_exam"])) - $seconds));

      $_SESSION["number"]++;

      header("Location: examination1.php");


?>