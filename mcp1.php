<?php

session_start();	

	
include 'config.php';
	$id_p=$_SESSION["id_professor"];
	$qtext=$_POST['qtext'];
	$difficulty_level=$_POST['difficulty_level'];
	$chapter=$_POST['chapter'];
    $time=$_POST['time'];
	$grade=$_POST['grade'];
    if(empty($_POST['ngrade'])) {
		$ngrade=0;
	 } else {
		$ngrade=$_POST['ngrade'];
	 }
    $type="Multiple Choice More";
	$id_lesson=$_POST['course'];

	
		//question
		mysqli_query($conn, "INSERT INTO question (text, type, difficulty_level, chapter,time, grade, negative_grade)
				VALUES ('$qtext','$type', '$difficulty_level', '$chapter','$time','$grade','$ngrade')");
		$id_q = mysqli_insert_id($conn);
		//make
		mysqli_query($conn,"INSERT INTO make (id_professor, id_question)
						VALUES ('$id_p','$id_q')");
		
		$sql = "INSERT INTO includes (id_lesson, id_question)
		VALUES ('$id_lesson','$id_q')";

		if ($conn->query($sql) === TRUE) {
		  echo "Record updated successfully";
		} else {
		  echo "Error updating record: " . $conn->error;
		}

        $number = count($_POST["name"]);
        if($number > 1)
        {
            for($i=0; $i<$number; $i++)
            {
                if(trim($_POST["name"][$i] != ''))
                {
					$pa=trim($_POST['name'][$i]);
					echo $pa;
					//de leiourgei
					mysqli_query($conn,"INSERT INTO possible_answer (text,is_correct)
					VALUES ('$pa',0)");
					$id_pa = mysqli_insert_id($conn);		
					mysqli_query($conn,"INSERT INTO has ( id_question, id_possibleAnswer)
						VALUES ('$id_q','$id_pa')");
                    
                }
            }
            echo "Data Inserted";
			$_SESSION["id_question"]=$id_q;
        }
        else
        {
            echo "Something got wrong";
        }
			echo "Make in database final!!!";
			// Redirecting To Other Page
			$location="/Ptuxiaki/create_question_mcp_2.php";
		    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		
?>