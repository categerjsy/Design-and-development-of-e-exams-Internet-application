
<?php
session_start();	
include 'config.php';
?>
	


<!DOCTYPE HTML>

<html>
	<head>
	
		<?php 
        if ((isset($_SESSION["id_student"])==NULL)&&(isset($_SESSION["id_professor"])==NULL)) {
						
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
		<link rel="stylesheet" href="assets/css/st.css">
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
					<a href="logout.php">Έξοδος</a>
				  </div>
			</div>
		
		</header>
		<aside>
			
			<!-- Sidebar -->
			<?php 
				if (isset($_SESSION["id_student"])!=NULL){
					echo '<div id="mySidebar" class="sidebar">';
					echo '<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>';
					echo '<a href="#">Επεξεργασία προφίλ</a>';
					echo '<a href="enroll.php">Εγγραφή σε μάθημα</a>';
					echo '</div>';
				}
				else if (isset($_SESSION["id_professor"])!=NULL){
					echo '<div id="mySidebar" class="sidebar">';
					echo '<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>';
					echo '<a href="edit_prof.php">Επεξεργασία προφίλ</a>';
					echo '<a href="create_lesson.php">Δημιουργία μαθήματος</a>';
					echo '<a href="create_question.php">Εισαγωγή ερώτησης</a>';
					echo '<a href="create_exam.php">Δημιουργία εξέτασης</a>';
					echo '</div>';
				}
			?>
		</aside>
		<main>  
			<button class="openbtn" onclick="openNav()">☰ Βασικές επιλογές</button>   
                       
		<div id="myform" style="margin-left:25%;padding:10px 50px;height:1000px;">
			<h3>Επεξεργασία προφίλ</h3>
			
			<h4>Γειά σας <?php echo "$username"; ?>!</h4>
		
			<?php 
				if (isset($_SESSION["id_student"])!=NULL){
				   $s = mysqli_query($conn,"select * from user_student");
				   while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
					   $mail=$row["email"];
					   $findmail=mysqli_query($conn,"select * from user_student where username='$username'");
					   while ($row = mysqli_fetch_array($findmail, MYSQLI_ASSOC)) {
						$my_m=$row["email"];
						$tel=$row["phone_number"];
					   }
				  }
			 	   				
				}
				else if (isset($_SESSION["id_professor"])!=NULL){
				   $s = mysqli_query($conn,"select * from user_professor");
				   while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
					   $mail=$row["email"];
					   $findmail=mysqli_query($conn,"select * from user_professor where username='$username'");
					   while ($row = mysqli_fetch_array($findmail, MYSQLI_ASSOC)) {
						$my_m=$row["email"];
						$tel=$row["phone_number"];
					   }
				  }
			 	   				
				}
				
			?>
			
			<label for="email"><b>E-mail σχολής</b></label> 
			<input  type="email" value="<?php echo "$my_m"; ?>" id="email" name="email" onblur="validateEmail(this);"  pattern="[a-zA-z0-9]*@uop.gr|[a-zA-z0-9]*@go.uop.gr" required >
			<br> <span id='messageEmail'></span>
			<br>
			
			<label for="telephone"><b>Αριθμός τηλεφώνου</b></label> 
			<input type="tel" value="<?php echo "$tel"; ?>" name="telephone" pattern="[0-9]{10}"  required>
			<br>
			
			<br>
			<label for="usname"><b>Username</b></label> 
			<input type="text" value="<?php echo "$username"; ?>" name="uname" required>
			<br>
					
			<button type="submit" class="cleanbtn" style="color:white">Αλλαγή</button>
			<button type="button" class="cancelbtn" onclick="goBack()">Πίσω</button>
			<script>
			function goBack() {
			  window.history.back();
			}
			</script>
			<button type="reset" class="cleanbtn"  style="color:white">Καθαρισμός</button>
			
			<button type="button" class="cleanbtn"><a href="change_password.php">Αλλαγή κωδικού</a></button>
			
		</div>
		</main>
                     
		</main>
		<footer>
		</footer>
		<script ></script>
		<script src="assets/js/aside.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
		<script src="assets/js/PcheckLength.js"></script>
		<script src="assets/js/emailcheck.js"></script>
		<script src="assets/js/passwordcheck.js"></script>
		<script src="assets/js/index.js"></script>
	</body>
</html>