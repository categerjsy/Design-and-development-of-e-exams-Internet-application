<?php


session_start();	
include 'config.php';
$_SESSION["Text"]=isset($_POST['Text']);
$_SESSION["True-False"]=isset($_POST['True-False']);
$_SESSION["Multiple-Choice"]=isset($_POST['Multiple-Choice']);
$_SESSION["Multiple-Choice-More"]=isset($_POST['Multiple-Choice-More']);
$_SESSION["easy"]=isset($_POST['easy']);
$_SESSION["medium"]=isset($_POST['medium']);
$_SESSION["difficult"]=isset($_POST['difficult']);
$_SESSION["all_diff"]=isset($_POST['all_diff']);
$_SESSION["all_categ"]=isset($_POST['all_categ']);
$_SESSION["DIF"]=(!$_SESSION["Text"]&&!$_SESSION["True-False"]&&!$_SESSION["Multiple-Choice"]&&!$_SESSION["Multiple-Choice-More"]&&!$_SESSION["all_categ"]);
$_SESSION["DIFF"]=(!$_SESSION["easy"]&&!$_SESSION["medium"]&&!$_SESSION["Multiple-Choice"]);

if(($_SESSION["all_diff"])&&($_SESSION["all_categ"])){
    // Redirecting To Other Page
		    header("Location: create_exam2.php");
}
    // Redirecting To Other Page
	header("Location:f1.php");
?>