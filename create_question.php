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
		  echo "<title>Δημιουργία ερώτησης</title>";
        }
		?>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/responsiveness.css">
		<link rel="stylesheet" href="assets/css/nav.css">
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
		    <li><a href="create_lesson.php">Δημιουργία μαθήματος</a></li>
			<li><a href="#top">Εισαγωγή ερώτησης</a></li>
			<li><a href="#section-3">Δημιουργία εξέτασης</a></li>
		  </ul>
		</nav>
		</aside>
		<main>
           <div id="myform" style="margin-left:25%;padding:10px 50px;height:1000px;">
    			<h3>Δημιουργία Ερώτησης</h3>
    			<h4>Παρακαλώ επιλέξετε μια κατηγορία ερώτηση</h4>
    			  <div class="w3-container">
    			  <button type="reset"><a href="create_question_tf.php">True-False</a></button>
                	<br>
    	        	<button type="reset">Multiple Choice</button>
                	<br>
    		    	<button type="reset">Multiple Choice με πολλές σωστές απάντησεις</button>
               		<br>
    	        	<button type="reset">Ελευθέρου κειμένου</button>
            </div>
	    </div>
      

	  


		</main>
        
		<footer>
		</footer>
		<script ></script>
	</body>
</html>