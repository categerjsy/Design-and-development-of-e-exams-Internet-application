
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
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel='shortcut icon' type='image/x-icon' href="photos/uop_logo4_navigation.gif"/><meta name="description" content="UOP Logo"/>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
            <a  href="profilek.php"> <?php  if (isset($_SESSION["id_professor"])){
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
        <h3>Ποσοστά εξέτασης</h3>
        <?php
        $id_exam=$_SESSION["correction_id_exam"];
        $id_pr=$_SESSION["id_professor"];

        $a = 0;
        $k = 0;
        $m = 0;
        $an = 0;


        $queryex=mysqli_query($conn,"SELECT * FROM wants WHERE id_professor='$id_pr'");
        while ($rowex = mysqli_fetch_array($queryex, MYSQLI_ASSOC)) {
            $res=$rowex["id_results"];
            $query = mysqli_query($conn, "SELECT * FROM results WHERE exam='$id_exam' and id_results='$res'");
            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                $gr = $row["final_grade"];

                if ($gr >= 9) {
                    $a = $a + 1;
                } else if (($gr < 9) && ($gr >= 7)) {
                    $k = $k + 1;
                } else if (($gr <= 7) && ($gr >= 5)) {
                    $m = $m + 1;
                } else {
                    $an = $an + 1;
                }
            }
        }

        ?>
        <div
                id="myChart" style="width:100%; max-width:600px; height:500px;">
        </div>

    </div>

</main>

</main>
<footer>Copyright Gerakianaki Vlachou © 2021</footer>
<script ></script>
<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var a=<?php Print($a); ?>;
        var k=<?php Print($k); ?>;
        var m=<?php Print($m); ?>;
        var an=<?php Print($an); ?>;
        var data = google.visualization.arrayToDataTable([
            ['Βαθμολογία', 'Mhl'],
            ['Άριστη',a],
            ['Καλή',k],
            ['Μέτρια',m],
            ['Άνεπαρκής',an],
        ]);

        var options = {
            title:'Επιδόσεις φοιτητών',
            is3D:true
        };

        var chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }
</script>
<script src="assets/js/grade.js"></script>
<script src="assets/js/aside.js"></script>
</body>
</html>

