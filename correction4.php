
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
        <a href="enroll.php">Εγγραφή σε μάθημα</a>
        <a href="st_exam.php">Εξετάσεις μαθημάτων</a>
        <a href="#">Διόρθωση διαγωνισμάτων</a>
    </div>

</aside>
<main>
    <button class="openbtn" onclick="openNav()">☰ Βασικές επιλογές</button>

    <div id="myform" style="margin-left:25%;padding:10px 50px;height:1000px;">
        <h3>Διόρθωση εξέτασης</h3>




        <?php
        $id_exam=$_SESSION["correction_id_exam"];
        $query=mysqli_query($conn,"SELECT * FROM gives WHERE id_exam='$id_exam'");

        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $id_student=$row["id_student"];

            $querys=mysqli_query($conn,"SELECT * FROM user_student WHERE id_student='$id_student' ");

            while ($rows = mysqli_fetch_array($querys, MYSQLI_ASSOC)) {
                $name=$rows["name"];
                $surname=$rows["surname"];

                echo "<form action='correction3.php'  method='post' >";
                echo "<button type = 'submit' name='id_student' class='wbtn' value='$id_student'>";
                echo "Διόρθωση εξέτασης φοιτητή";
                echo "</button>";
                echo "</form>";
                echo "$name $surname";
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

