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
        $grade = $row10["grade"];
        $neg_grade = $row10["negative_grade"];

        $correct = array();
        $all = array();
        $stud = array();
        $query11 = mysqli_query($conn, "SELECT * FROM has WHERE id_question='$id_question'");
        while ($row11 = mysqli_fetch_array($query11, MYSQLI_ASSOC)) {
            $id_pa = $row11["id_possibleAnswer"];

            $query12 = mysqli_query($conn, "SELECT * FROM possible_answer WHERE id_possibleAnswer='$id_pa'");
            while ($row12 = mysqli_fetch_array($query12, MYSQLI_ASSOC)) {
                $is_correct = $row12["is_correct"];
                if ($is_correct == 1) {
                    array_push($correct, $id_pa);
                }
                array_push($all, $id_pa);
            }

        }


        $query13 = mysqli_query($conn, "SELECT * FROM answer WHERE id_question='$id_question' AND id_exam='$id_exam' AND id_student='$id_st'");
        while ($row13 = mysqli_fetch_array($query13, MYSQLI_ASSOC)) {
            $student_answer = $row13["student_answer"];
            array_push($stud, $student_answer);
        }

        $pgrade = round(bcdiv($grade, sizeof($correct), 5),2);
        if ($neg_grade == 0) {
            $ngrade = -$pgrade;
        } else {
            $ngrade = -$pgrade - round(bcdiv($neg_grade, (sizeof($all) - sizeof($correct)), 5),2);
        }

        $grade_array = array();

        foreach ($stud as &$st) {
                if (in_array($st, $correct)) {
                    echo "Add ".$pgrade;
                    array_push($grade_array, $pgrade);
                } else {
                    echo "Minus ".$ngrade;
                    array_push($grade_array,$ngrade);
                }

        }



       $fgrade= array_sum($grade_array);
       if($stud===$correct){
           $fgrade=$grade;
       }

//       else{
//
//       }
        mysqli_query($conn, "INSERT INTO correction  (id_exam,id_student,id_question,st_grade)
                                    VALUES ('$id_exam','$id_st', '$id_question','$fgrade')");






    }


        header("Location:correction4.php");


}



?>