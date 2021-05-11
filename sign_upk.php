<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    
    
    <title>Εγγραφή Καθηγητή</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="assets/css/nav.css">
     <link rel="stylesheet" href="assets/css/st.css">
     <link rel="stylesheet" href="assets/css/pass.css">
     <!--<link rel="stylesheet" href="assets/css/responsiveness.css">-->
     
     <link rel='shortcut icon' type='image/x-icon' href="photos/uop_logo4_navigation.gif"/><meta name="description" content="UOP Logo"/>
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
					<a  href="index.php">Αρχική Σελίδα</a>
					<a  href="sign_in.php">Εισαγωγή</a>
					<a href="sign_upf.php">Εγγραφή Φοιτητή</a>
                    <a href="#">Εγγραφή Καθηγητή</a>
				  </div>
    </div>
     
    
</head>
<body>
<?php
		if (isset($_GET["msg"]) && $_GET["msg"] == 'failed_username') {
			print "<p style='color:red'>Παρακαλώ προσπαθήστε ξανά, το username που επιλέξατε χρησιμοποιείται από άλλο χρήστη.<p>";//προσωρινο
		}
		else if (isset($_GET["msg"]) && $_GET["msg"] == 'failed_mail') {
			print "<p style='color:red'>Παρακαλώ προσπαθήστε ξανά, το email που επιλέξατε χρησιμοποιείται από άλλο χρήστη.<p>";//προσωρινο
		}
    else if (isset($_GET["msg"]) && $_GET["msg"] == 'plen') {
			print "<p style='color:red'> Ο κωδικός σας δεν ήταν αρκετά μεγάλος.Παρακαλώ προσπαθήστε ξανά.</p>";//προσωρινο
		}else if (isset($_GET["msg"]) && $_GET["msg"] == 'cp') {
			print "<p style='color:red'> Οι κωδικοί σας δεν ταίριαζαν.Παρακαλώ προσπαθήστε ξανά.</p>";//προσωρινο
		}
	?>
  
  <form class="signup" action="connectk.php" method="post">
    <div class="imgcontainer"> 
      <img src="photos/uop_new_logo.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label for="uname"><b>Όνομα</b></label>
        <input type="text" placeholder="Όνομα" name="name" required>
        <br>
        
		<br>
        <label for="surname"><b>Επώνυμο</b></label> 
        <input type="text" placeholder="Επώνυμο" name="surname" required>
        <br>
        
		<br>
        <label for="email"><b>E-mail σχολής</b></label> 
        <input  type="email" placeholder="E-mail σχολής" id="email" name="email" onblur="validateEmail(this);"  pattern="[a-zA-z0-9]*@uop.gr|[a-zA-z0-9]*@go.uop.gr" required >
        <br> <span id='messageEmail'></span>
		<br>
        		
        <label for="usname"><b>Όνομα χρήστη (username)</b></label> 
        <input type="text" placeholder="Όνομα χρήστη (username)" name="uname" required>
        <br>  
        
		<br>
        <label for="telephone"><b>Αριθμός τηλεφώνου</b></label> 
        <input type="tel" placeholder="Αριθμός τηλεφώνου" name="telephone" pattern="[0-9]{10}" required>
        <br> 
        
		<br>
        <div name="frmCheckPassword" id="frmCheckPassword">  
        <label for="p1"><b>Κωδικός</b></label> 
        <input name="password" id="password" type="password" placeholder="Κωδικός" class="demoInputBox" onKeyUp="checkPasswordStrength();" onkeyup='checkP();'  required>
        <button onclick="toggler(this)" type="button" class="cleanbtn" style="color:white">Εμφάνιση κωδικού</button>
        <div id="password-strength-status"></div>
        </div>
     
        
        <label for="p2"><b>Επιβεβαίωση Κωδικού</b></label>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Επιβεβαίωση Κωδικού"  onkeyup='checkP();' required>
		<button onclick="check(this)" type="button" class="cleanbtn" style="color:white">Εμφάνιση κωδικού</button>
        <br><span id='message'></span>
        <br>
      <button type="submit" class="cleanbtn" style="color:white">Εγγραφή</button>
      <button type="button" class="cancelbtn"><a href="index.php">Έξοδος</a></button>
      <button type="reset" class="cleanbtn"  style="color:white">Καθαρισμός</button>
     
    </div>

   

  </form>

<!--Do you have an account ?-->


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
<script>
function check(e) {
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