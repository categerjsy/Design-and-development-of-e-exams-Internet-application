<?php

session_start();


include 'config.php';
$id_st=$_SESSION["cor_id_student"];
$id_exam=$_SESSION["correction_id_exam"];
if(isset($_POST['gradeID'])&&isset($_POST['ofgrades'])&&isset($_POST['grade'])) {
    $gradeID = $_POST['gradeID'];
    $ofgrade = $_POST['ofgrades'];
    $grade = $_POST['grade'];
    $flag = 0;
    for ($j = 0; $j < sizeof($grade); $j++) {
        if (!preg_match("/[0-9]{1}.[0-9]{2}/", ".$grade[$j].")) {
            $flag = 1;
        }
    }
    for ($i = 0; $i < sizeof($grade); $i++) {
        if ($grade[$i] > $ofgrade[$i]) {
            $flag = 1;
        }
    }

    if ($flag == 0) {
        for ($i = 0; $i < sizeof($gradeID); $i++) {
            mysqli_query($conn, "INSERT INTO correction  (id_exam,id_student,id_question,st_grade)
                                VALUES ('$id_exam','$id_st', '" . $gradeID[$i] . "','" . $grade[$i] . "')");
        }


        header("Location: cal_result.php");
    } else if ($flag == 1) {

        header("Location:correction4.php?msg=w");
    }
}
else{

    header("Location:cal_result.php");
}
?>