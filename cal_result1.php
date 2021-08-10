
<?php
session_start();
include 'config.php';
?>



<!DOCTYPE HTML>

<html>
<head>

    <?php
    if (isset($_SESSION["id_professor"])==NULL) {

        $location="/Ptuxiaki/index.php";
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);

    }
    else{
        $username=$_SESSION["username"];
        echo "<title>$username</title>";
    }
    ?>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/responsiveness.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/asidenav.css">
    <link rel="stylesheet" href="assets/css/lf.css">
    <link rel="stylesheet" href="assets/css/button.css">
    <link rel="stylesheet" href="assets/css/radiobutton.css">
    <link rel="stylesheet" href="assets/css/checkbox.css">
    <link rel='shortcut icon' type='image/x-icon' href="photos/uop_logo4_navigation.gif"/><meta name="description" content="UOP Logo"/>
    <style>
        input[type="text"] {

            width: 25%;

        }
    </style>
</head>


<body>
<header>
    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-title">
                <img src="photos/uop_logo4_navigation.gif" width="60" height="40"/>
            </div>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>

        <div class="nav-links">
            <a  href="profilef.php"> <?php echo "$username"; ?></a>
            <a href="logout.php">Αποσύνδεση</a>
        </div>
    </div>

</header>
<aside>

    <!-- Sidebar -->
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="edit_prof.php">Επεξεργασία προφίλ</a>
        <a href="change_password.php">Αλλαγή κωδικού</a>
        <a href="create_lesson.php">Δημιουργία μαθήματος</a>
        <a href="create_question.php">Εισαγωγή ερώτησης</a>
        <a href="select_lesson.php">Επεξεργασία ερωτήσεων</a>
        <a href="create_exam.php">Δημιουργία εξέτασης</a>
        <a href="edit_exam.php">Επεξεργασία διαγωνίσματος</a>
        <a href='correction.php'>Διόρθωση διαγωνισμάτων</a>
    </div>

</aside>
<main>
    <button class="openbtn" onclick="openNav()">☰ Βασικές επιλογές</button>

    <div id="myform" style="margin-left:25%;padding:10px 50px;height:1000px;">
        <h3>Προβολή Διόρθωσης Εξέτασης</h3>




            <?php
            $id_st=$_SESSION["cor_id_student"];
            $id_exam=$_SESSION["correction_id_exam"];
            $query=mysqli_query($conn,"SELECT * FROM get WHERE id_student='$id_st'");

            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                $id_re=$row["id_results"];
            }

            $query=mysqli_query($conn,"SELECT * FROM results WHERE exam='$id_exam' and id_results='$id_re'");

            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                $final_grade=$row["final_grade"];
                $query1=mysqli_query($conn,"SELECT * FROM exam WHERE id_exam='$id_exam'");

                while ($row1 = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
                    $date_time=$row1["date_time"];
                    $exam_final=$row1["final_grade"];
                    $query2=mysqli_query($conn,"SELECT * FROM belongs_to WHERE id_exam='$id_exam'");

                    while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
                        $id_lesson=$row2["id_lesson"];
                        $query3=mysqli_query($conn,"SELECT * FROM lesson WHERE id_lesson='$id_lesson'");

                        while ($row3 = mysqli_fetch_array($query3, MYSQLI_ASSOC)) {
                            $name=$row3["name"];
                            echo "<p>Εξέταση μαθήματος $name</p>";
                            echo "<p>Ημερομηνία Εξέτασης $date_time</p>";
                        }
                    }

                }

            }
            $query=mysqli_query($conn,"SELECT * FROM user_student WHERE id_student='$id_st'");
            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                echo "<p>Εξεταζόμενος φοιτητής/φοιτήτρια : ".$row['name']." ". $row['surname']."</p>";
            }
            echo "<p>Βαθμολογία : ". $final_grade."/$exam_final</p>";
            if($final_grade>5){
                echo "<b style='color:green;'>Επιτυχής</b><br><br>";
            }else{
                echo "<b style='color:red;'>Αποτυχής</b><br><br>";
            }



            $query=mysqli_query($conn,"SELECT * FROM contains WHERE id_exam='$id_exam'");

            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                $id_question = $row["id_question"];
                //TRUE/FALSE
                $query1 = mysqli_query($conn, "SELECT * FROM question WHERE id_question='$id_question' and type='True-False'");
                while ($row1 = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
                echo $row1["text"];

                    $query2=mysqli_query($conn,"SELECT * FROM answer WHERE id_question='$id_question' AND id_exam='$id_exam' AND id_student='$id_st'");
                    while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
                        echo "<br>Απάντηση φοιτητή: ";
                        echo "<b>".$row2['student_answer']."</b>";
                    }
                    $query3=mysqli_query($conn,"SELECT * FROM correction WHERE id_question='$id_question' AND id_exam='$id_exam' AND id_student='$id_st'");
                    while ($row3 = mysqli_fetch_array($query3, MYSQLI_ASSOC)) {
                        echo "<br>Βαθμολογία φοιτητή: ";
                        echo $row3['st_grade'];
                    }
                    echo "<hr>";
                }
                //end TRUE/FALSE
                //MULTIPLE CHOICE
                $query1 = mysqli_query($conn, "SELECT * FROM question WHERE id_question='$id_question' and type='Multiple Choice'");
                while ($row1 = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
                    echo $row1["text"];
                    $query2=mysqli_query($conn,"SELECT * FROM answer WHERE id_question='$id_question' AND id_exam='$id_exam' AND id_student='$id_st'");
                    while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
                        echo "<br>Απάντηση φοιτητή: ";
                        $st_a=$row2['student_answer'];
                    }
                    $query4=mysqli_query($conn,"SELECT * FROM has WHERE id_question='$id_question'");
                    while ($row4 = mysqli_fetch_array($query4, MYSQLI_ASSOC)) {
                        $id_pa = $row4["id_possibleAnswer"];
                        echo "<form>";
                        $query5 = mysqli_query($conn, "SELECT * FROM possible_answer WHERE id_possibleAnswer='$id_pa'");
                        while ($row5 = mysqli_fetch_array($query5, MYSQLI_ASSOC)) {
                            $pa=$row5["text"];
                            if($id_pa!=$st_a) {
                                echo "<h1 style='margin-left:30%;'><label class='containerr' for='$pa'> $pa
									<input type='radio'  id='$pa' name='pa' value='$pa' disabled>
									<span class='checkmarkr'></span>
								  	</label></h1>";
                            }
                            if($id_pa==$st_a) {
                                echo "<h1 style='margin-left:30%;'><label class='containerr' for='$pa'> $pa
									<input type='radio'  id='$pa' name='pa' value='$pa' checked disabled>
									<span class='checkmarkr'></span>
								  	</label></h1>";
                            }

                        }
                        echo "</form>";
                    }

                    $query3=mysqli_query($conn,"SELECT * FROM correction WHERE id_question='$id_question' AND id_exam='$id_exam' AND id_student='$id_st'");
                    while ($row3 = mysqli_fetch_array($query3, MYSQLI_ASSOC)) {
                        echo "<br>Βαθμολογία φοιτητή: ";
                        echo $row3['st_grade'];
                    }
                    echo "<hr>";
                }
                //end MULTIPLE CHOICE
                //MULTIPLE CHOICE MORE
                $query1 = mysqli_query($conn, "SELECT * FROM question WHERE id_question='$id_question' and type='Multiple Choice More'");
                while ($row1 = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
                    echo $row1["text"];
                    $st_a = array();
                    $query2=mysqli_query($conn,"SELECT * FROM answer WHERE id_question='$id_question' AND id_exam='$id_exam' AND id_student='$id_st'");
                    while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
                        echo "<br>Απάντηση φοιτητή: ";
                        array_push( $st_a,$row2['student_answer']);
                    }
                    $query4=mysqli_query($conn,"SELECT * FROM has WHERE id_question='$id_question'");
                    while ($row4 = mysqli_fetch_array($query4, MYSQLI_ASSOC)) {
                        $id_pa = $row4["id_possibleAnswer"];
                        echo "<form>";
                        $query5 = mysqli_query($conn, "SELECT * FROM possible_answer WHERE id_possibleAnswer='$id_pa'");
                        while ($row5 = mysqli_fetch_array($query5, MYSQLI_ASSOC)) {
                            $pa=$row5["text"];

                            if (in_array( $id_pa, $st_a))
                            {
                                    echo "<h1 style='margin-left:30%;'><label class='container' for='$pa'>$pa
                                        <input type='checkbox' id='$pa' name='pa[]' value='$pa' disabled>
                                        <span class='checkmark'></span>
                                        </label></h1>";
                            }
                            else {
                                    echo "<h1 style='margin-left:30%;'><label class='container' for='$pa'>$pa
                                     <input type='checkbox' id='$pa' name='pa[]' value='$pa' checked disabled>
									 <span class='checkmark'></span>
								  	</label></h1>";
                                }


                        }
                        echo "</form>";
                    }

                    $query3=mysqli_query($conn,"SELECT * FROM correction WHERE id_question='$id_question' AND id_exam='$id_exam' AND id_student='$id_st'");
                    while ($row3 = mysqli_fetch_array($query3, MYSQLI_ASSOC)) {
                        echo "<br>Βαθμολογία φοιτητή: ";
                        echo $row3['st_grade'];
                    }
                    echo "<hr>";
                }
                //end MULTIPLE CHOICE ΜΟRE
                //Eleftero keimeno
                $query1=mysqli_query($conn,"SELECT * FROM question WHERE id_question='$id_question' and type='Ελευθέρου κειμένου'");
                while ($row1 = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
                    $text=$row1["text"];
                    $grade=$row1["grade"];
                    $neq_grade=$row1["negative_grade"];
                    echo "<h4> $text </h4>";
                    $query2=mysqli_query($conn,"SELECT * FROM answer WHERE id_question='$id_question' AND id_exam='$id_exam' AND id_student='$id_st'");
                    while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
                        $student_answer=$row2["student_answer"];
                        echo " Απάντήση φοιτητή:";
                        echo "$student_answer";
                    }
                    $query3=mysqli_query($conn,"SELECT * FROM correction WHERE id_question='$id_question' AND id_exam='$id_exam' AND id_student='$id_st'");
                    while ($row3 = mysqli_fetch_array($query3, MYSQLI_ASSOC)) {
                        echo "<br>Βαθμολογία φοιτητή: ";
                        echo $row3['st_grade'];
                    }
                    echo "<hr>";
                }
            }
            ?>

    </div>

</main>

</main>
<footer>
</footer>
<script ></script>
<script src="assets/js/aside.js"></script>
</body>
</html>

