
<?php
session_start();	
include 'config.php';
?>
	


<!DOCTYPE HTML>

<html>
	<head>
		<?php 
        if (isset($_SESSION["id_professor"])==NULL) {
						
            header("location: index.php");
						
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
		<!--<link rel="stylesheet" href="assets/css/button.css">-->
        <link rel='shortcut icon' type='image/x-icon' href="photos/uop_logo4_navigation.gif"/><meta name="description" content="UOP Logo"/>
	
	
	</head>
	
	
	<body>
		<header>
			<div class="nav">
				  <input type="checkbox" id="nav-check">
				  <div class="nav-header">
					<div class="nav-title">
					 <a href="index.php"> <img src="photos/uop_logo4_navigation.gif" width="60" height="40"/> </a>
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
					<a  href="profilek.php"> <?php echo "$username"; ?></a>
					<a href="logout.php">Έξοδος</a>
				  </div>
			</div>
		
		</header>
		<aside>
		
		<!-- Sidebar -->
		<div id="mySidebar" class="sidebar">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
			<a href="edit_prof.php">Επεξεργασία προφίλ</a>
			<a href="create_lesson.php">Δημιουργία μαθήματος</a>
			<a href="create_question.php">Εισαγωγή ερώτησης</a>
			<a href="select_lesson.php">Επεξεργασία ερωτήσεων</a>
			<a href="create_exam.php">Δημιουργία εξέτασης</a>
			<a href="edit_exam.php">Επεξεργασία διαγωνίσματος</a>

		</div>
	
		</aside>
		<main>  
			<button class="openbtn" onclick="openNav()">☰ Βασικές επιλογές</button>     
        <div id="myform" style="margin-left:25%;padding:10px 50px;height:1000px;">
			<h3>Επεξεργασία ερωτήσεων</h3>
			
	
			  <form action="create_exam2.php" method="post">
			  <label for="course">Παρακαλώ επιλέξτε διαγώνισμα για επεξεργασία</label> <br>
			  <?php
			   	$idp=$_SESSION["id_professor"];
				   echo "<select id='exam' name='exam'>";
				   
				   $s = mysqli_query($conn,"select * from create_exam where id_professor='$idp'");
				   while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
					   $my_exam=$row["id_exam"];

					   $findexam=mysqli_query($conn,"select * from exam where id_exam='$my_exam'");
					   while ($row = mysqli_fetch_array($findexam, MYSQLI_ASSOC)) {
						$ex_time=$row["date_time"];
                        $sa = mysqli_query($conn,"select * from belongs_to where id_exam='$my_exam'");
                        while ($row = mysqli_fetch_array($sa, MYSQLI_ASSOC)) {
                        $id_lesson=$row["id_lesson"];
                        $findlesson=mysqli_query($conn,"select * from lesson where id_lesson='$id_lesson'");
                            while ($row = mysqli_fetch_array($findlesson, MYSQLI_ASSOC)) {
                            $my_lesson=$row["name"];
                            echo "<option value='$my_exam'>$my_lesson, $ex_time</option>";  
                            }
                        }
					   }
				  }
				  $_SESSION["id_exam"]=$my_exam;
				  $SESSION["id_lesson"]=$id_lesson;
				 
				  echo "</select>";	 
			 	   
	
				
				?>
				<button type="submit" class="cleanbtn" style="color:white">Επιλογή</button>
                <br> <br>
				<button type="button" class="cancelbtn" onclick="goBack()">Πίσω</button>
                <br> <br>


			  </form>
			</div>
                     
		</main>
		<footer>
		</footer>
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js" ></script>
        <script src="assets\js\bootstrap-number-input.js" ></script>
        <script src="assets\js\bootstrapSwitch.js" ></script>
		<script src="assets/js/aside.js"></script>
		<script src="assets/js/grade.js"></script>
		<script src="assets/js/ngrade.js"></script>
		<script src="assets/js/inserttime.js"></script>
		<script src="assets/js/negGrade.js"></script>
		
	</body>
</html>