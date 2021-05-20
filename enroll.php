
<?php
session_start();	
include 'config.php';
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
		<link rel="stylesheet" href="assets/css/asidenav.css">
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
					<a  href="profilef.php"> <?php echo "$username"; ?></a>
					<a href="change_passwordf.php">Αλλαγή κωδικού</a>
					<a href="logout.php">Αποσύνδεση</a>
				  </div>
			</div>
		
		</header>
		<aside>
			
			<!-- Sidebar -->
			<div id="mySidebar" class="sidebar">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
			<a href="edit_prof.php">Επεξεργασία προφίλ</a>
			<a href="enroll.php">Εγγραφή σε μάθημα</a>
			</div>
	
		</aside>
		<main>  
			<button class="openbtn" onclick="openNav()">☰ Βασικές επιλογές</button>   
                       
		<div id="myform" style="margin-left:25%;padding:10px 50px;height:1000px;">
			<h3>Εγγραφή σε μάθημα</h3>
			
	
			  <form action="" method="post">
			  <label for="course">Παρακαλώ επιλέξτε μάθημα</label> <br>
			 <!--php για τα μαθηματα απο τη βαση-->
                  <?php
					$ids=$_SESSION["id_student"];
				   echo "<select id='course' name='course'>";
				   
				   $s = mysqli_query($conn,"select * from create_lesson");
				   while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
					   $my_lesson=$row["id_lesson"];
					   $findlesson=mysqli_query($conn,"select * from lesson where id_lesson='$my_lesson'");
					   while ($row = mysqli_fetch_array($findlesson, MYSQLI_ASSOC)) {
						$my_l=$row["name"];
						$cat=$row["category"];
						$sem=$row["semester"];
						echo "<option value='$my_l'>$my_l, $cat, $sem εξάμηνο</option>";  
					   }
				  }
				  echo "</select>";	 
			 	   				
				?>
				<br>
			    <input type="submit" value="Εγγραφή">
			  </form>
			</div>
                     
		</main>
                     
		</main>
		<footer>
		</footer>
		<script ></script>
		<script src="assets/js/aside.js"></script>
	</body>
</html>