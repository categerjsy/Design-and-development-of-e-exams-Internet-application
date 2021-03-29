<?php
session_start();	

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
		  echo "<title>Δημιουργία μαθήματος</title>";
        }
		?>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/responsiveness.css">
		<link rel="stylesheet" href="assets/css/nav.css">
		<link rel="stylesheet" href="assets/css/assidenav.css">
		<link rel="stylesheet" href="assets/css/lf.css">
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
					<a href="logout.php">Aποσύνδεση</a>
				  </div>
			</div>
		
		</header>
		<aside>
		<nav>
		  <ul>
		    <li><br><br><a href="#">Δημιουργία μαθήματος εξέτασης</a></li>
			<br>
		    <li><a href="#section-2">Εισαγωγή ερώτησης σε μάθημα</a></li>
			<br>
		  </ul>
		</nav>
		</aside>
		
		<main>
            <div id="myform">
			<h3>Δημιουργία Μαθήματος</h3>
			
	
			  <form action="/action_page.php">
			    <label for="fname">Όνομα μαθήματος</label> <br>
			    <input type="text" id="lessonname" name="lessonname" placeholder="Όνομα μαθήματος">
				 <br> <br>
			    <label for="category">Κατηγορία Μαθήματος</label> <br>
			   <select id="category" name="category">
			      <option value="kormou">Κορμού</option>
			      <option value="bkp">Βασικό Κατεύθυνσης Πληροφορικής</option>
			      <option value="bkt">Βασικό Κατεύθυνσης Τηλεπικοινωνιών</option>
				  <option value="ekp">Επιλογής Κατεύθυνσης  Πληροφορικής</option>
			      <option value="ekt">Επιλογής Κατεύθυνσης  Τηλεπικοινωνιών</option>
			      <option value="ekpt">Επιλογής Κατεύθυνσης  Πληροφορικής και Τηλεπικοινωνιών</option>
				</select>
			  
			    <input type="submit" value="Submit">
			  </form>
			</div>
           
		
                     
		</main>
		<footer>
		</footer>
		<script ></script>
	</body>
</html>