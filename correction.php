
<?php
session_start();
include 'config.php';
date_default_timezone_set('Europe/Athens') ;
?>



<!DOCTYPE HTML>

<html>
<head>

    <?php
    if (isset($_SESSION["id_professor"])==NULL) {
        $location="/Ptuxiaki/index.php";
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);

    }else if(isset($_SESSION["id_student"])!=NULL){
        $location="/Ptuxiaki/profilef.php";
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
    }
    else{
        $username=$_SESSION["username"];
        echo "<title>Εισαγωγή  ερώτησης</title>";
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
            <a  href="profilef.php"> <?php  if (isset($_SESSION["id_professor"])){
                    echo "$username";
                }?></a>
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




        <?php
        $idf=$_SESSION["id_professor"];
        $query=mysqli_query($conn,"SELECT * FROM create_lesson WHERE id_professor='$idf' ");

        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $id_lesson=$row["id_lesson"];

            $querys=mysqli_query($conn,"SELECT * FROM lesson WHERE id_lesson='$id_lesson' ");

            while ($rows = mysqli_fetch_array($querys, MYSQLI_ASSOC)) {
                $lesson=$rows["name"];
                $queryt=mysqli_query($conn,"SELECT * FROM belongs_to WHERE id_lesson='$id_lesson' ");

                while ($row = mysqli_fetch_array($queryt, MYSQLI_ASSOC)) {
                    $id_exam=$row["id_exam"];
                    $queryf=mysqli_query($conn,"SELECT * FROM exam WHERE id_exam='$id_exam' ");

                    while ($row = mysqli_fetch_array($queryf, MYSQLI_ASSOC)) {
                        $start_time=$row["date_time"];
                        $end_time=$row["time"];
                        $date = new DateTime($end_time);
                        $now = new DateTime();

                        if($date < $now) {
                            echo "<form action='correction1.php'  method='post' >";
                            echo "<button type = 'submit' name='id_exam' class='wbtn' value='$id_exam'>";
                            echo "Διόρθωση εξέτασης";
                            echo "</button>";
                            echo "</form>";
                            echo "$lesson Έναρξη:  $start_time Λήξη:  $end_time";
                            echo "<hr>";
                        }
                    }


                }
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