
<?php
session_start();
include 'config.php';
?>



<!DOCTYPE HTML>

<html>
<head>
    <?php
    if (isset($_SESSION["id_professor"])==NULL) {
        header("Location: index.php");

    }else if(isset($_SESSION["id_student"])!=NULL){
        header("Location:profilef.php");
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
    <link rel="stylesheet" href="assets/css/footer.css">
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

    <div id="myform" style="margin-left:25%;padding:10px 50px;">
        <h3>Διόρθωση εξέτασης</h3>




        <?php
        $id_exam=$_SESSION["correction_id_exam"];
        $query=mysqli_query($conn,"SELECT * FROM gives WHERE id_exam='$id_exam'");
        $statistics=0;
        $student=0;
        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $id_student=$row["id_student"];

            $querys=mysqli_query($conn,"SELECT * FROM user_student WHERE id_student='$id_student' ");

            while ($rows = mysqli_fetch_array($querys, MYSQLI_ASSOC)) {
                $student=1;
                $name=$rows["name"];
                $surname=$rows["surname"];
                $query1=mysqli_query($conn,"SELECT * FROM get WHERE id_student='$id_student' ");
                $flag=0;
                while ($row1 = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
                    $id_result=$row1["id_results"];
                    $query2=mysqli_query($conn,"SELECT * FROM results WHERE id_results='$id_result' and exam='$id_exam'");

                    while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
                        echo "<form action='cal_resultp.php'  method='post' >";
                        echo "<button type = 'submit' name='id_student' class='wbtn' value='$id_result'>";
                        echo "Αναλυτική βαθμολογία εξέτασης";
                        echo "</button>";
                        echo "</form>";
                        echo "$name $surname";
                        echo "<hr>";
                        $flag=1;
                    }

                }
                            if($flag==0) {
                                $statistics=1;
                                echo "<form action='correction3.php'  method='post' >";
                                echo "<button type = 'submit' name='id_student' class='wbtn' value='$id_student'>";
                                echo "Διόρθωση εξέτασης φοιτητή";
                                echo "</button>";
                                echo "</form>";
                                echo "$name $surname";
                                echo "<hr>";
                            }

            }




        }

        if($statistics==0){
            if($student==1) {
                echo "<button type='button' class='cleanbtn'><a href='statistics.php'>Προβολή στατιστικών</a></button>";
                echo "<button type='button' class='cleanbtn'><a href='analitiki.php'>Αναλυτική βαθμολογία</a></button>";
            }
            else{
                echo "<p>Δυστυχώς δεν υπήρξε καμία συμμετοχή σε αυτό το διαγώνισμα!</p>";
            }
        }





        ?>

    </div>

</main>

</main>
<footer>Copyright Gerakianaki Vlachou © 2021</footer>
<script ></script>
<script src="assets/js/aside.js"></script>
</body>
</html>
