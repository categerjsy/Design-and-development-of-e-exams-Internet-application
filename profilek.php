
<?php
session_start();	

?>
	


<!DOCTYPE HTML>

<html>
	<head>
	<style>body { background-image: url("photos/uop_new_logo.png"); }</style>
	
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
		<link rel="stylesheet" href="assets/css/asidenav.css">
		<link rel="stylesheet" href="assets/css/nav.css">
		<link rel="stylesheet" href="assets/css/lf.css">
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
					<a  href="#"> <?php echo "$username"; ?></a>
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
        <a href="correction.php">Διόρθωση διαγωνισμάτων</a>
	</div>

		</aside>
		<main>  
		<button class="openbtn" onclick="openNav()">☰ Βασικές επιλογές</button>      
		           
		</main>
		<footer>
		</footer>
		<script src="assets/js/aside.js"></script>
		

	</body>
</html>