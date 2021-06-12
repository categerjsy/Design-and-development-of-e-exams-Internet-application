
<?php
session_start();	
include 'config.php';
?>
	


<!DOCTYPE HTML>

<html>
	<head>
	<?php 
        if ((isset($_SESSION["id_student"])==NULL)&&(isset($_SESSION["id_professor"])==NULL)) {
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
    <link rel="stylesheet" href="assets/css/st.css">
		<link rel="stylesheet" href="assets/css/button.css">
    <link rel="stylesheet" href="assets/css/pass.css">
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
				  <?php 
        			if (isset($_SESSION["id_student"])==NULL){
					echo "<a  href='profilek.php'>$username</a>";
					}
					if (isset($_SESSION["id_professor"])==NULL){
					echo "<a  href='profilef.php'>$username</a>";
					}
					?>
					<a href="logout.php">Αποσύνδεση</a>
				  </div>
			</div>
		
		</header>
		<aside>
			
		<!-- Sidebar -->
		<div id="mySidebar" class="sidebar">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
			<a href="edit_prof.php">Επεξεργασία προφίλ</a>
			<a href="#">Αλλαγή κωδικού</a>
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
        if (isset($_GET["msg"]) && $_GET["msg"] == 'plen') {
          print "<p style='color:red'> Ο κωδικός σας πρέπει να έχει μέγεθος 7 έως 15 χαρακτήρων. Παρακαλώ προσπαθήστε ξανά.</p>";
        }
		else if (isset($_GET["msg"]) && $_GET["msg"] == 'cp') {
          print "<p style='color:red'> Οι κωδικοί σας δεν ταίριαζαν. Παρακαλώ προσπαθήστε ξανά.</p>";
        }
		else if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
          print "<p style='color:red'> Ο παλιός κωδικός σας δεν είναι σωστός. Παρακαλώ προσπαθήστε ξανά.</p>";
        }
      
      ?>
			<h3>Αλλαγή κωδικού</h3>
	
			  <form  action="changepass.php" method="post">
			
			  <label for="psw"><b>Παλιός Κωδικός</b></label>
		<input type="password" placeholder="Παλιός Κωδικός" id="old_password" name="old_password" required>
		 
        <br>
        <br>
        <div name="frmCheckPassword" id="frmCheckPassword">  
        <label for="p1"><b>Κωδικός</b></label> 
        <input name="password" id="password" type="password" placeholder="Κωδικός" class="demoInputBox" onKeyUp="checkPasswordStrength();" onkeyup='checkP();'  required>
        <div id="password-strength-status"></div>
        <button onclick="toggler(this)" type="button" class="cleanbtn" style="color:white">Εμφάνιση κωδικού</button>
        </div>
		<br>
		
        <label for="p2"><b>Επιβεβαίωση Κωδικού</b></label>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Επιβεβαίωση Κωδικού"  onkeyup='checkP();' required>
        <br><span id='message'></span>
        

        <br>
       
        <button type="submit" class="cleanbtn">Αλλαγή</button>
     
     <button type="button" class="cancelbtn" onclick="goBack()">Πίσω</button>
     <script>
     function goBack() {
       window.history.back();
     }
     </script>
     <button type="reset" class="cleanbtn">Καθαρισμός</button>

			  </form>
			</div>
                     
		</main>
		<footer>
		</footer>
		<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets\js\bootstrap-number-input.js" ></script>
    <script src="assets\js\bootstrapSwitch.js" ></script>
		<script src="assets/js/aside.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<script src="assets/js/PcheckLength.js"></script>
<script src="assets/js/emailcheck.js"></script>
<script src="assets/js/passwordcheck.js"></script>
<script src="assets/js/index.js"></script>
    <script>
function toggler(e) {
  if( e.innerHTML == 'Εμφάνιση κωδικού' ) {
      e.innerHTML = 'Απόκρυψη κωδικού'
      document.getElementById('password').type="text";
  } else {
      e.innerHTML = 'Εμφάνιση κωδικού'
      document.getElementById('password').type="password";
  }
}
</script>
	</body>
</html>