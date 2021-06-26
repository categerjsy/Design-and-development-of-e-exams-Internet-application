
<?php
session_start();	
include 'config.php';
?>
	


<!DOCTYPE HTML>

<html>
	<head>
	
		<?php 
        if (isset($_SESSION["id_student"])==NULL) {
						
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
					<a  href="profilef.php"> <?php echo "$username"; ?></a>
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
			<a href="enroll.php">Εγγραφή σε μάθημα</a>
			</div>
	
		</aside>
		<main>  
			<button class="openbtn" onclick="openNav()">☰ Βασικές επιλογές</button>   
                       
		<div id="myform" style="margin-left:25%;padding:10px 50px;height:1000px;">
			<h3>Εγγραφή σε μάθημα</h3>
			
	
			  
			  <label for="course">Παρακαλώ επιλέξτε μάθημα</label> <br>
                 <!-- <?php
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
			    <input type="submit" value="Εγγραφή">-->
				<?php
		
					$query=mysqli_query($conn,"SELECT * FROM lesson ORDER BY semester ");
					
					while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
						$lesson_name=$row["name"];
						$semester=$row["semester"];	
						$ids=$_SESSION["id_student"];
						$idl=$row["id_lesson"];
						$categ=$row["category"];
						switch ($categ) {
							case "kormou":
								$categ="Κορμού";
								break;
							case "bkp":
								$categ="Βασικό Κατεύθυνσης Πληροφορικής";
								break;
							case "bkt":
								$categ="Βασικό Κατεύθυνσης Τηλεπικοινωνιών";
								break;
							case "ekp":
								$categ="Επιλογής Κατεύθυνσης  Πληροφορικής";
								break;
							case "ekt":
								$categ="Επιλογής Κατεύθυνσης  Τηλεπικοινωνιών";
								break;
							case "ekpt":
								$categ="Επιλογής Κατεύθυνσης  Τηλεπικοινωνιών-Πληροφορικής";
								break;
						}
			
			
							$q = "select * from enroll_on where id_student='$ids' and id_lesson='$idl'"; 
								
								// Execute the query and store the result set 
							$result = mysqli_query($conn, $q); 
								
							if ($result) { 
									// it returns number of rows in the table. 
								$row = mysqli_num_rows($result); 
								if ($row) { 
								echo "<form  action='enroll_on.php#form-anchor' id='form-anchor' method='post'>";
								echo "<button type ='submit' name='remove_lesson' class='wbtn' value='$idl'>";
								echo "Απεγγραφή";
								echo "</button>";
								echo "<br><br>";
								}
								else{
								echo "<form action='enroll_on.php#form-anchor' id='form-anchor' method='post' >";
								echo "<button type = 'submit' name='add_lesson' class='wbtn' value='$idl'>";
								echo "Εγγραφή";
								echo "</button>";
								echo "<br><br>";
								}
								echo "</form>";
							}
							echo " $lesson_name Εξάμηνο: $semester Κατηγορία: $categ<br> <br>";
							
							echo "<hr>";
					
					
								
					}
				?>
			 
			</div>
                     
		</main>
                     
		</main>
		<footer>
		</footer>
		<script ></script>
		<script src="assets/js/aside.js"></script>
	</body>
</html>