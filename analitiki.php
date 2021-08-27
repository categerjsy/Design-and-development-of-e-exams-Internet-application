
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

    }else if(isset($_SESSION["id_student"])!=NULL){
        $location="/Ptuxiaki/profilef.php";
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
    <link rel="stylesheet" href="assets/css/table.css">
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
            <a  href="profilef.php"><?php  if (isset($_SESSION["id_professor"])){
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
        <h3>Αναλυτική βαθμολογία φοιτητών3</h3>




        <?php
        $id_exam=$_SESSION["correction_id_exam"];
        $query=mysqli_query($conn,"SELECT * FROM gives WHERE id_exam='$id_exam'");
        echo "<table id='c'>
                          <tr>
                            <th>Φοιτητής/Φοιτήτρια</th>
                            <th>e-mail</th>
                            <th>Βαθμολογία</th>
                            <th>Κατάσταση</th>
                          </tr>";
        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $id_student=$row["id_student"];

            $querys=mysqli_query($conn,"SELECT * FROM user_student WHERE id_student='$id_student' ");

            while ($rows = mysqli_fetch_array($querys, MYSQLI_ASSOC)) {
                $name=$rows["name"];
                $surname=$rows["surname"];
                $email=$rows["email"];
                $query1=mysqli_query($conn,"SELECT * FROM get WHERE id_student='$id_student' ");
                $flag=0;
                while ($row1 = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
                    $id_result=$row1["id_results"];
                    $query2=mysqli_query($conn,"SELECT * FROM results WHERE id_results='$id_result' and exam='$id_exam'");

                    while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
                        $gr=$row2['final_grade'];
                        echo "<tr> <td>$name $surname</td>";
                        echo "<td>$email</td>";
                        echo "<td>$gr</td>";
                        if($gr>=5){
                            echo "<td>Επιτυχής</td> </tr>";
                        }
                        else{
                            echo "<td>Ανεπιτυχής</td> </tr>";
                        }


                    }

                }


            }




        }


        ?>

        </table>
    </div>

</main>

</main>
<footer>
</footer>
<script ></script>
<script src="assets/js/aside.js"></script>
</body>
</html>
