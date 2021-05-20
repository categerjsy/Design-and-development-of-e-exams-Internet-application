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
					<a href="logout.php">Αποσύνδεση</a>
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
				<?php
					if (isset($_GET["msg"]) && $_GET["msg"] == 'done') {
						print "<p style='color:green'>Η ερώτηση σας, δημιουργήθηκε.</p>";//προσωρινο
					}
				?>
    			<h3>Δημιουργία Ερώτησης</h3>
    			<h4>Παρακαλώ επιλέξετε μια κατηγορία ερώτηση</h4>
    			  <div class="w3-container">
    			    <a href="create_question_tf.php"><button class="but" type="reset">True-False</button></a>
                	<br>
    	        	<a href="create_question_mc.php"><button class="but" type="reset">Multiple Choice</button></a>
                	<br>
    		    	<a href="create_question_mcp.php"><button class="but" type="reset">Multiple Choice με πολλές σωστές απάντησεις</button></a>
               		<br>
    	        	<a href="create_question_ft.php"><button class="but" type="reset">Ελευθέρου κειμένου</button></a>
            </div>
	    </div>
      

	  


		</main>
        
		<footer>
		</footer>
		<script src="assets/js/aside.js"></script>
	</body>
</html>