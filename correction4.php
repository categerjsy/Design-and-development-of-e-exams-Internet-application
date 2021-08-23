
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
        <h3>Διόρθωση εξέτασης</h3>



        <form action="result.php" method="post">
        <?php

        if (isset($_GET["msg"]) && $_GET["msg"] == 'w') {
            print "<p style='color:red'>H μορφή κάποιας βαθμολογίας δεν ήταν σωστή.</p>";
        }

        $id_st=$_SESSION["cor_id_student"];
        $id_exam=$_SESSION["correction_id_exam"];

        $query=mysqli_query($conn,"SELECT * FROM contains WHERE id_exam='$id_exam'");
        $flag=0;
        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $flag=1;
            $id_question=$row["id_question"];
            //ftext
            $query1=mysqli_query($conn,"SELECT * FROM question WHERE id_question='$id_question' and type='Ελευθέρου κειμένου'");
            while ($row1 = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
            $text=$row1["text"];
            $grade=$row1["grade"];
            $neq_grade=$row1["negative_grade"];
            echo "<h4> $text </h4>";
                $query2=mysqli_query($conn,"SELECT * FROM answer WHERE id_question='$id_question' AND id_exam='$id_exam' AND id_student='$id_st'");
                while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
                    $student_answer=$row2["student_answer"];
                    echo "<h4> Απάντήση φοιτητή:</h4>";
                    echo "$student_answer";
                }
                echo "<br><label for='grade'>Βαθμολογία ερώτησης</label> <br>
                <input id='$id_question' name='gradeID[]' type='hidden' value='$id_question'>
                <input id='$grade' name='ofgrades[]' type='hidden' value='$grade'>
			    <input type='text' id='$id_question' name='grade[]' pattern='[0-9]{1}.[0-9]{2}'  required> &nbsp;/$grade
				<br> ";
                echo "<hr>";
            }



        }
        if($flag==0){
            $location = "/Ptuxiaki/cal_result.php";
            header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
        }
        ?>
            <input type="submit" value="Εισαγωγή βαθμολογιών">
            <br>


        </form>

    </div>

</main>

</main>
<footer>
</footer>
<script ></script>
<script src="assets/js/grade.js"></script>
<script src="assets/js/aside.js"></script>
</body>
</html>

