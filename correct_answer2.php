<?php

session_start();	

	
include 'config.php';
	
    $id_q=$_SESSION["id_question"];


if(isset($_POST['pa'])) {
    $pa=$_POST['pa'];
    for ($i = 0; $i < sizeof($pa); $i++) {
        //question
        mysqli_query($conn, "UPDATE possible_answer SET is_correct=1 WHERE text='" . $pa[$i] . "'");
    }

    for ($i = 0; $i < sizeof($pa); $i++) {
        $sql = "SELECT id_possibleAnswer  FROM  possible_answer WHERE text='" . $pa[$i] . "'";

    }
    echo "Record is inserted";

    // Redirecting To Other Page
    header("Location:edit_questions.php?msg=ch");
}
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Πρέπει να εισάγετε τις σωστές απαντήσεις.');
    window.location.href='change_correct.php';
    </script>";


?>