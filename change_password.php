<?php
session_start();

?>

<!DOCTYPE html>
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
    
    <title>Αλλαγή Κωδικού</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="assets/css/nav.css">
     <link rel="stylesheet" href="assets/css/st.css">
     <link rel="stylesheet" href="assets/css/pass.css">
     <link rel='shortcut icon' type='image/x-icon' href="photos/uop_logo4_navigation.gif"/><meta name="description" content="UOP Logo"/>
         
    
</head>
<body>
	<?php
		if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
			print "<h4>Παρακαλώ προσπαθήστε ξανά, ο παλιός κωδικός σας είναι λανθασμένος.</h4>";//προσωρινο
		}
	?>
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
  
  <form class="signup" action="changepass.php" method="post">
    <div class="imgcontainer"> 
      <img src="photos/uop_new_logo.png" alt="Avatar" class="avatar">
    </div>
	
    <div class="container">
         
    <label for="psw"><b>Παλιός Κωδικός</b></label>
		<input type="password" placeholder="Παλιός Κωδικός" id="old_password" name="old_password" required>
		<button onclick="toggler(this)" type="button" class="cleanbtn" style="color:white">Εμφάνιση κωδικού</button>
		<br>		 
        <br>
        <div name="frmCheckPassword" id="frmCheckPassword">  
        <label for="p1"><b>Νέος Κωδικός</b></label> 
        <input name="new_password" id="new_password" type="password" placeholder="Νέος Κωδικός" class="demoInputBox" onKeyUp="checkPasswordStrength();" onkeyup='check();'  required>
		<button onclick="check(this)" type="button" class="cleanbtn" style="color:white">Εμφάνιση κωδικού</button>
        <div id="password-strength-status"></div>
        </div>
     
        
        <label for="p2"><b>Επιβεβαίωση Νέου Κωδικού</b></label>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Επιβεβαίωση Νέου Κωδικού"  onkeyup='check();' required>
		<button onclick="confirm(this)" type="button" class="cleanbtn" style="color:white">Εμφάνιση κωδικού</button>
        <br><span id='message'></span>
        <br>
        
		
    </div>
    <div class="btn-group">
      
      <button type="submit" class="cleanbtn">Αλλαγή</button>
     
      <button type="button" class="cancelbtn" onclick="goBack()">Πίσω</button>
			<script>
			function goBack() {
			  window.history.back();
			}
			</script>
      <button type="reset" class="cleanbtn">Καθαρισμός</button>
	  </div>
    </div>
  </form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<script src="assets/js/PcheckLength.js"></script>
<script src="assets/js/passwordcheck.js"></script>
<script src="assets/js/index.js"></script>
<script>
function toggler(e) {
  if( e.innerHTML == 'Εμφάνιση κωδικού' ) {
      e.innerHTML = 'Απόκρυψη κωδικού'
      document.getElementById('old_password').type="text";
  } else {
      e.innerHTML = 'Εμφάνιση κωδικού'
      document.getElementById('old_password').type="password";
  }
}
</script>
<script>
function check(e) {
  if( e.innerHTML == 'Εμφάνιση κωδικού' ) {
      e.innerHTML = 'Απόκρυψη κωδικού'
      document.getElementById('new_password').type="text";
  } else {
      e.innerHTML = 'Εμφάνιση κωδικού'
      document.getElementById('new_password').type="password";
  }
}
</script>
<script>
function confirm(e) {
  if( e.innerHTML == 'Εμφάνιση κωδικού' ) {
      e.innerHTML = 'Απόκρυψη κωδικού'
      document.getElementById('confirm_password').type="text";
  } else {
      e.innerHTML = 'Εμφάνιση κωδικού'
      document.getElementById('confirm_password').type="password";
  }
}
</script>

</body>
</html>