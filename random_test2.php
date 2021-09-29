<?php 
session_start();	
include 'config.php';

$id_exam=$_SESSION["id_exam"];
$id_lesson=$_SESSION["id_lesson"];
$number_questionse=$_POST['number_questionse'];
$number_questionsm=$_POST['number_questionsm'];
$number_questionsd=$_POST['number_questionsd'];

     $arre = array();
     $arrm = array();
     $arrd = array();
     $query=mysqli_query($conn,"SELECT * FROM includes WHERE id_lesson='$id_lesson'");
		while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$id_question=$row["id_question"];	
            $querye=mysqli_query($conn,"SELECT * FROM question WHERE difficulty_level='easy' AND id_question='$id_question'");
            while ($rowe = mysqli_fetch_array($querye, MYSQLI_ASSOC)) {
                $idquestion=$rowe["id_question"];
			    array_push($arre,$idquestion);
            }
            $querym=mysqli_query($conn,"SELECT * FROM question WHERE difficulty_level='medium' AND id_question='$id_question'");
            while ($rowm = mysqli_fetch_array($querym, MYSQLI_ASSOC)) {
                $idquestion=$rowm["id_question"];
			    array_push($arrm,$idquestion);
            }
            $queryd=mysqli_query($conn,"SELECT * FROM question WHERE difficulty_level='difficult' AND id_question='$id_question'");
            while ($rowd = mysqli_fetch_array($queryd, MYSQLI_ASSOC)) {
                $idquestion=$rowd["id_question"];
			    array_push($arrd,$idquestion);
            }
        }

        for($i=0;$i<$number_questionse;$i++){
        $max=sizeof($arre)-1;
        $toexam=rand ( 0 ,$max);
        $q=$arre[$toexam];
        $sql = "INSERT INTO contains (id_exam,id_question)
			VALUES ('$id_exam','$q')";
        mysqli_query($conn,$sql);
        unset($arre[$toexam]); 
        $arre=array_values($arre);
        }
        for($i=0;$i<$number_questionsm;$i++){
            $max=sizeof($arrm)-1;
            $toexam=rand ( 0 ,$max);
            $q=$arrm[$toexam];
            $sql = "INSERT INTO contains (id_exam,id_question)
                VALUES ('$id_exam','$q')";
            mysqli_query($conn,$sql);
            unset($arrm[$toexam]); 
            $arrm=array_values($arrm);
        }
        for($i=0;$i<$number_questionsd;$i++){
            $max=sizeof($arrd)-1;
            $toexam=rand ( 0 ,$max);
            $q=$arrd[$toexam];
            $sql = "INSERT INTO contains (id_exam,id_question)
                VALUES ('$id_exam','$q')";
            mysqli_query($conn,$sql);
            unset($arrd[$toexam]); 
            $arrd=array_values($arrd);
        }


        $lesson=$_SESSION["lesson"];
        $query=mysqli_query($conn,"SELECT * FROM contains WHERE id_exam='$id_exam'");
        $gradefornow=0;
        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $id_question=$row["id_question"];	
            
            $question=mysqli_query($conn,"select * from question where id_question='$id_question'");
            while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
                $grade=$row["grade"];
                 $gradefornow+=$grade;
            }
            $question=mysqli_query($conn,"select * from exam where id_exam='$id_exam'");
            while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
                $final_grade=$row["final_grade"];
                 
            }
        }
        if($final_grade>$gradefornow){
         echo '<script type="text/javascript">'; 
         echo 'alert("To άρθοισμα των εισαχθεισών ερωτήσεων δεν φτάνει την ορισμένη τελική βαθμολογία.Παρακαλούμε προσθέστε και άλλες ερωτήσεις");';
         echo 'window.location.href = "create_exam2.php";';
         echo '</script>';
         }
         if($final_grade<$gradefornow){
             echo '<script type="text/javascript">'; 
             echo 'alert("To άρθοισμα των εισαχθεισών ερωτήσεων είναι μεγαλύτερο της τελικής βαθμολογίας, οι επιπλέον μονάδες αυτοματοποιούνται ως bonus βαθμολογία.");';
             echo 'window.location.href = "show_exam.php?msg=rtest";';
             echo '</script>';
             $sql = "UPDATE exam
             SET final_grade='$gradefornow'
             WHERE id_exam='$id_exam';";
             $qry = mysqli_query($conn, $sql);
         }
         if($final_grade==$gradefornow){
             echo '<script type="text/javascript">'; 
             echo 'window.location.href = "show_exam.php?msg=rtest";';
             echo '</script>';
         }
?>