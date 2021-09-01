<?php
include 'config.php';
session_start ();


$_SESSION["cor_id_student"]=$_POST["id_student"];
$id_st=$_SESSION["cor_id_student"];
$id_exam=$_SESSION["correction_id_exam"];

$query=mysqli_query($conn,"SELECT * FROM contains WHERE id_exam='$id_exam'");

while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    $id_question=$row["id_question"];
    //TRUE/FALSE
    $query1=mysqli_query($conn,"SELECT * FROM question WHERE id_question='$id_question' and type='True-False'");
    while ($row1 = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
        $grade=$row1["grade"];
        $neg_grade=$row1["negative_grade"];
        //Τhis is for correction !! false 0 true 1
        $query2=mysqli_query($conn,"SELECT * FROM has WHERE id_question='$id_question'");
        while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
            $id_pa = $row2["id_possibleAnswer"];
            $query3 = mysqli_query($conn, "SELECT * FROM possible_answer WHERE id_possibleAnswer='$id_pa'");
            while ($row3 = mysqli_fetch_array($query3, MYSQLI_ASSOC)) {
                $is_correct = $row3["is_correct"];
            }
        }
        $tf=0;
        //This is for answer
        $query5=mysqli_query($conn,"SELECT * FROM answer WHERE id_question='$id_question' AND id_exam='$id_exam' AND id_student='$id_st'");
        while ($row5 = mysqli_fetch_array($query5, MYSQLI_ASSOC)) {
            $student_answer=$row5["student_answer"];
            $tf=1;
        }
        if($tf==1) {
            if ($student_answer == "True") {
                if ($is_correct == 0) {
                    mysqli_query($conn, "INSERT INTO correction (id_exam,id_student,id_question,st_grade)
			                VALUES ('$id_exam','$id_st', '$id_question','-$neg_grade')");
                }
                if ($is_correct == 1) {
                    mysqli_query($conn, "INSERT INTO correction  (id_exam,id_student,id_question,st_grade)
			                VALUES ('$id_exam','$id_st', '$id_question','$grade')");
                }
            }
            if ($student_answer == "False") {
                if ($is_correct == 0) {
                    mysqli_query($conn, "INSERT INTO correction  (id_exam,id_student,id_question,st_grade)
			                VALUES ('$id_exam','$id_st', '$id_question','$grade')");
                }
                if ($is_correct == 1) {

                    mysqli_query($conn, "INSERT INTO correction (id_exam,id_student,id_question,st_grade)
			                VALUES ('$id_exam','$id_st', '$id_question','-$neg_grade')");
                }
            }
        }
    }

    //This is for answer ΜC
    $query6=mysqli_query($conn,"SELECT * FROM question WHERE id_question='$id_question' and type='Multiple Choice'");
    while ($row6 = mysqli_fetch_array($query6, MYSQLI_ASSOC)) {
        $grade=$row6["grade"];
        $neg_grade=$row6["negative_grade"];
        //Τhis is for correction !! epilegmeno - 1
        $query7=mysqli_query($conn,"SELECT * FROM has WHERE id_question='$id_question'");
        while ($row7 = mysqli_fetch_array($query7, MYSQLI_ASSOC)) {
            $id_pa = $row7["id_possibleAnswer"];
            $query8 = mysqli_query($conn, "SELECT * FROM possible_answer WHERE id_possibleAnswer='$id_pa'");
            while ($row8 = mysqli_fetch_array($query8, MYSQLI_ASSOC)) {
                $is_correct = $row8["is_correct"];
                if($is_correct==1){
                    $correct=$id_pa;
                }
            }
        }

        $query9=mysqli_query($conn,"SELECT * FROM answer WHERE id_question='$id_question' AND id_exam='$id_exam' AND id_student='$id_st'");
        while ($row9 = mysqli_fetch_array($query9, MYSQLI_ASSOC)) {
            $student_answer=$row9["student_answer"];
        }
        if(isset($student_answer)) {
            if ($student_answer == $correct) {
                mysqli_query($conn, "INSERT INTO correction  (id_exam,id_student,id_question,st_grade)
			                VALUES ('$id_exam','$id_st', '$id_question','$grade')");
            } else {
                mysqli_query($conn, "INSERT INTO correction (id_exam,id_student,id_question,st_grade)
			                VALUES ('$id_exam','$id_st', '$id_question','-$neg_grade')");

            }
        }

    }




    //This is for answer ΜCM

    $query10=mysqli_query($conn,"SELECT * FROM question WHERE id_question='$id_question' and type='Multiple Choice More'");
    while ($row10 = mysqli_fetch_array($query10, MYSQLI_ASSOC)) {
        $arr_correct = array();
        $arr_false = array();
        $mcm=0;
        $f=0;
        $grade=$row10["grade"];
        $neg_grade=$row10["negative_grade"];
        //Τhis is for correction !! epilegmeno - 1
        $nump_idpa=0;
        $num_idpa=0;
        $query11=mysqli_query($conn,"SELECT * FROM has WHERE id_question='$id_question'");
        while ($row11 = mysqli_fetch_array($query11, MYSQLI_ASSOC)) {
            $id_pa = $row11["id_possibleAnswer"];


            $query12 = mysqli_query($conn, "SELECT * FROM possible_answer WHERE id_possibleAnswer='$id_pa'");
            while ($row12 = mysqli_fetch_array($query12, MYSQLI_ASSOC)) {
                $is_correct = $row12["is_correct"];
                if($is_correct==1){
                    $nump_idpa++;
                    array_push($arr_correct,$id_pa);
                } else {
                    $num_idpa++;
                    array_push($arr_false,$id_pa);
                }
            }
            $sg=$grade/$nump_idpa;
            if($num_idpa!=0) {
                $sng = $neg_grade/$num_idpa;
            } else {
                $sng=0;
            }
        }




        $query13=mysqli_query($conn,"SELECT * FROM answer WHERE id_question='$id_question' AND id_exam='$id_exam' AND id_student='$id_st'");
        while ($row13 = mysqli_fetch_array($query13, MYSQLI_ASSOC)) {
            $student_answer=$row13["student_answer"];
            if (in_array( $student_answer, $arr_correct,true))
            {
                $mcm=$mcm+$sg;
            }
            if (in_array( $student_answer, $arr_false,true))
            {
                $mcm=$mcm-$sng;
            }
        $f=1;
        }

        if($f==1){
                mysqli_query($conn, "INSERT INTO correction  (id_exam,id_student,id_question,st_grade)
                                    VALUES ('$id_exam','$id_st', '$id_question','$mcm')");
        }

    }

    //ftext
    $flag=0;
    $query14=mysqli_query($conn,"SELECT * FROM question WHERE id_question='$id_question' and type='Ελευθέρου κειμένου'");
    while ($row14 = mysqli_fetch_array($query10, MYSQLI_ASSOC)) {
        $flag=1;
    }

}
if($flag==1){
    $location = "/Ptuxiaki/correction4.php";
    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
}else {
    $location = "/Ptuxiaki/cal_result.php";
    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
}

?>