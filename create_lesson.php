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
					<a href="logout.php">Έξοδος</a>
				  </div>
			</div>
		
		</header>
		<aside>
		<nav>
		  <ul>
		    <li><a href="#top">Δημιουργία μαθήματος</a></li>
			<li><a href="create_question.php">Εισαγωγή ερώτησης</a></li>
			<li><a href="#section-3">Δημιουργία εξέτασης</a></li>
		  </ul>
		</nav>
		</aside>
		<main>
            <div id="myform" style="margin-left:25%;padding:10px 50px;height:1000px;">
			<h3>Δημιουργία Μαθήματος</h3>
			
	
			  <form action="check_lesson.php" method="post">
			    <label for="fname">Όνομα μαθήματος</label> <br>
			    <input type="text" id="lessonname" name="lessonname" placeholder="Όνομα μαθήματος" required>
				 <br> <br>
				
				  <label for="semester">Εξάμηνο μαθήματος</label>
				  <input type="number" id="quantity" name="semester" min="1" max="8" required>
				  <br> <br>
				
			    <label for="category">Κατηγορία Μαθήματος</label> <br>
			   <select id="category" name="category">
			      <option value="kormou">Κορμού</option>
			      <option value="bkp">Βασικό Κατεύθυνσης Πληροφορικής</option>
			      <option value="bkt">Βασικό Κατεύθυνσης Τηλεπικοινωνιών</option>
				  <option value="ekp">Επιλογής Κατεύθυνσης  Πληροφορικής</option>
			      <option value="ekt">Επιλογής Κατεύθυνσης  Τηλεπικοινωνιών</option>
			      <option value="ekpt">Επιλογής Κατεύθυνσης  Τηλεπικοινωνιών-Πληροφορικής</option>
				</select>
			    <input type="submit" value="Δημιουργία Μαθήματος">
			  </form>
			</div>
           
		
                     
		</main>
		<footer>
		</footer>
		<script ></script>
	</body>
</html>