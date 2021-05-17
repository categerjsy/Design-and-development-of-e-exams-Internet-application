<?php
session_start();	
include 'config.php';
$prof=$_SESSION["id_professor"];
$id_lesson=$_POST['course'];
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
		<link rel="stylesheet" href="assets/css/button.css">
		<link rel="stylesheet" href="assets/css/checkbox.css">
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
		<a href="create_exam.php">Δημιουργία εξέτασης</a>
		</div>
		<button class="openbtn" onclick="openNav()">☰ Βασικές επιλογές</button> 
		
	</aside>
	<main>
        <div id="myform" style="margin-left:25%;padding:10px 50px;height:1000px;">
		<?php
			$query=mysqli_query($conn,"SELECT * FROM includes WHERE id_lesson='$id_lesson'");
			echo "<h3>Ερωτήσεις ελευθέρου κειμένου </h3>";
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$id_question=$row["id_question"];	
				$question=mysqli_query($conn,"select * from question where id_question='$id_question' and type='Ελευθέρου κειμένου'");
					while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
						$qtext=$row["text"];
						echo "<form method='post' action='change_questions.php'>";
						echo "<button type = 'submit' name='id_question' class='wbtn' value='$id_question'>";
						echo "Επεξεργασία";
						echo "</button>";
					echo " $qtext<br> <br>";
					}
			}
			echo "<hr>";
			$query=mysqli_query($conn,"SELECT * FROM includes WHERE id_lesson='$id_lesson'");
			echo "<h3>Ερωτήσεις True-False </h3>";
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$id_question=$row["id_question"];	
				$question=mysqli_query($conn,"select * from question where id_question='$id_question' and type='True-False'");
				while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
					$qtext=$row["text"];
					echo "<form method='post' action='change_questions.php'>";
					echo "<button type = 'submit' name='id_question' class='wbtn' value='$id_question'>";
					echo "Επεξεργασία";
					echo "</button>";
					echo "$qtext<br><br>";
				}
			}
			echo "<hr>";
			$query=mysqli_query($conn,"SELECT * FROM includes WHERE id_lesson='$id_lesson'");
			echo "<h3>Ερωτήσεις Multiple Choice </h3>";
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$id_question=$row["id_question"];	
				$question=mysqli_query($conn,"select * from question where id_question='$id_question' and type='Multiple Choice'");
				while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
					$qtext=$row["text"];
					echo "<form method='post' action='change_questions.php'>";
					echo "<button type = 'submit' name='id_question' class='wbtn' value='$id_question'>";
					echo "Επεξεργασία";
					echo "</button>";
					echo " $qtext <br>";
				}
			}
			echo "<hr>";		
			$query=mysqli_query($conn,"SELECT * FROM includes WHERE id_lesson='$id_lesson'");
			echo "<h3>Ερωτήσεις Multiple Choice με πολλές σωστές απαντήσεις </h3>";
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$id_question=$row["id_question"];	
				$question=mysqli_query($conn,"select * from question where id_question='$id_question' and type='Multiple Choice More'");
				while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
					$qtext=$row["text"];
					echo "<form method='post' action='change_questions.php'>";
					echo "<button type = 'submit' name='id_question' class='wbtn' value='$id_question'>";
					echo "Επεξεργασία";
					echo "</button>";
					echo " $qtext<br> ";
                }
			}
			echo "<hr>";
		?>
		<button type="button" class="cancelbtn" onclick="goBack()">Πίσω</button>
        <button type="reset" class="cleanbtn">Καθαρισμός</button>
        <br>
		</div>
                     
		</main>
		<footer>
		</footer>
		
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js" ></script>
        <script src="assets\js\bootstrap-number-input.js" ></script>
        <script src="assets\js\bootstrapSwitch.js" ></script>
		<script src="assets/js/aside.js"></script>
		<script>
			function goBack() {
			  window.history.back();
			}
		</script>


	</body>
</html>