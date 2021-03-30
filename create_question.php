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
		<link rel="stylesheet" href="assets/css/assidenav.css">
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
		    <li><br><br><a href="create_lesson.php">Δημιουργία μαθήματος εξέτασης</a></li>
			<br>
		    <li><a href="#">Εισαγωγή ερώτησης σε μάθημα</a></li>
			<br>
            <li><a href="#section-3">Δημιουργία εξέτασης</a></li>
			<br>
		  </ul>
		</nav>
		</aside>
		
		<main>
            <div id="myform">
    			<h3>Δημιουργία Ερώτησης</h3>
    			<h4>Παρακαλώ επιλέξετε μια κατηγορία ερώτηση</h4>
    			 
    			  <div class="box-2">
                  <div class="btn btn-two">
                    <span onclick="document.getElementById('id01').style.display='block'" >True-False</span>
                  </div>
                </div>
                <br>
    	        <div class="box-2">
                  <div class="btn btn-two">
                 	 <span>Multiple Choice</span>
                  </div>
                </div>
                <br>
    		    <div class="box-2">
                  <div class="btn btn-two">
                 	  <span>Multiple Choice με πάνω απο μια σωστή απάντηση</span>
                  </div>
                </div>
                <br>
    	        <div class="box-2">
                  <div class="btn btn-two">
                     <span>Ελευθέρου κειμένου</span>
                  </div>
                </div>

			</div>
           
		<div id="id01" class="modal">
  
  <form class="modal-content animate" action="check_user_pass.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

  
                     
		</main>
        
		<footer>
		</footer>
		<script ></script>
	</body>
</html>