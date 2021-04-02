
<?php
session_start();	

?>
	


<!DOCTYPE HTML>

<html>
	<head>
	
		<?php 
        if (isset($_SESSION["id_student"])==NULL) {
						
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
					<a  href="#"> <?php echo "$username"; ?></a>
					<a href="logout.php">Aποσύνδεση</a>
				  </div>
			</div>
		
		</header>
		<aside>
		<nav>
		  <ul>
		    <li><a href="#">Εγγραφή σε μάθημα</a></li>
		  </ul>
		</nav>
		</aside>
		<main>
                       
		<div id="myform" style="margin-left:25%;padding:10px 50px;height:1000px;">
			<h3>Εγγραφή σε μάθημα</h3>
			
	
			  <form action="" method="post">
			  <label for="course">Παρακαλώ επιλέξτε μάθημα</label> <br>
			 <!--php για τα μαθηματα απο τη βαση-->
                
			    <input type="submit" value="Εγγραφή">
			  </form>
			</div>
                     
		</main>
                     
		</main>
		<footer>
		</footer>
		<script ></script>
	</body>
</html>