<?php 
session_start();	
include 'config.php';

$id_exam=$_SESSION["id_exam"];
$id_lesson=$_SESSION["id_lesson"];
$number_questionsft=$_POST['number_questionsft'];
$number_questionstf=$_POST['number_questionstf'];
$number_questionsmc=$_POST['number_questionsmc'];
$number_questionsmcp=$_POST['number_questionsmcp'];

     $arrft = array();
     $arrtf = array();
     $arrmc = array();
     $arrmcp = array();
     $query=mysqli_query($conn,"SELECT * FROM includes WHERE id_lesson='$id_lesson'");
		while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$id_question=$row["id_question"];	
            $queryft=mysqli_query($conn,"SELECT * FROM question WHERE type='Ελευθέρου κειμένου' AND id_question='$id_question'");
            while ($rowft = mysqli_fetch_array($queryft, MYSQLI_ASSOC)) {
                $idquestion=$rowft["id_question"];
			    array_push($arrft,$idquestion);
            }
            $querytf=mysqli_query($conn,"SELECT * FROM question WHERE type='True-False' AND id_question='$id_question'");
            while ($rowtf = mysqli_fetch_array($querytf, MYSQLI_ASSOC)) {
                $idquestion=$rowtf["id_question"];
			    array_push($arrtf,$idquestion);
            }
            $querymc=mysqli_query($conn,"SELECT * FROM question WHERE type='Multiple Choice' AND id_question='$id_question'");
            while ($rowmc = mysqli_fetch_array($querymc, MYSQLI_ASSOC)) {
                $idquestion=$rowmc["id_question"];
			    array_push($arrmc,$idquestion);
            }
            $querymcp=mysqli_query($conn,"SELECT * FROM question WHERE type='Multiple Choice More' AND id_question='$id_question'");
            while ($rowmcp = mysqli_fetch_array($querymcp, MYSQLI_ASSOC)) {
                $idquestion=$rowmcp["id_question"];
			    array_push($arrmcp,$idquestion);
            }
        }

        for($i=0;$i<$number_questionsft;$i++){
        $max=sizeof($arrft)-1;
        $toexam=rand ( 0 ,$max);
        $q=$arrft[$toexam];
        $sql = "INSERT INTO contains (id_exam,id_question)
			VALUES ('$id_exam','$q')";
        mysqli_query($conn,$sql);
        //echo $arr[$toexam] ;
        unset($arrft[$toexam]); 
        $arrft=array_values($arrft);
        }
        for($i=0;$i<$number_questionstf;$i++){
            $max=sizeof($arrtf)-1;
            $toexam=rand ( 0 ,$max);
            $q=$arrtf[$toexam];
            $sql = "INSERT INTO contains (id_exam,id_question)
                VALUES ('$id_exam','$q')";
            mysqli_query($conn,$sql);
            //echo $arr[$toexam] ;
            unset($arrtf[$toexam]); 
            $arrtf=array_values($arrtf);
        }
        for($i=0;$i<$number_questionsmc;$i++){
            $max=sizeof($arrmc)-1;
            $toexam=rand ( 0 ,$max);
            $q=$arrmc[$toexam];
            $sql = "INSERT INTO contains (id_exam,id_question)
                VALUES ('$id_exam','$q')";
            mysqli_query($conn,$sql);
            //echo $arr[$toexam] ;
            unset($arrmc[$toexam]); 
            $arrmc=array_values($arrmc);
        }
        for($i=0;$i<$number_questionsmcp;$i++){
            $max=sizeof($arrmcp)-1;
            $toexam=rand ( 0 ,$max);
            $q=$arrmcp[$toexam];
            $sql = "INSERT INTO contains (id_exam,id_question)
                VALUES ('$id_exam','$q')";
            mysqli_query($conn,$sql);
            //echo $arr[$toexam] ;
            unset($arrmcp[$toexam]); 
            $arrmcp=array_values($arrmcp);
        }

        // Redirecting To Other Page
			$location="/Ptuxiaki/show_exam.php?msg=rtest";
		    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		
?>