<!DOCTYPE html>
<html>
<head>
 
    
    <title>Είσοδος Χρήστη</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="assets/css/nav.css">
     <link rel="stylesheet" href="assets/css/st.css">
     <link rel="stylesheet" href="assets/css/pass.css">
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
					<a href="index.php">Αρχική Σελίδα</a>
					<a href="#">Εισαγωγή</a>
					<a href="sign_upf.php">Εγγραφή Φοιτητή</a>
                    <a href="sign_upk.php">Εγγραφή Καθηγητή</a>
				  </div>
	</div>
     
    
</head>
<body>
	
  <?php
		if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
			print "<h4>Παρακαλώ προσπαθήστε ξανά, λάθος username ή κωδικός.</h4>";//προσωρινο
		}
	?>
  <form class="sign_in" action="check_user_pass.php" method="post">
   <div class="imgcontainer"> 
      <img src="photos/uop_new_logo.png"  alt="Avatar" class="avatar">
    </div>
	
    <div class="container">
	
		<br>
			  
		<br>	  
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Εισάγετε Username" name="username" required>
	  <br>
      <label for="psw"><b>Κωδικός</b></label>
      <input type="password" placeholder="Εισάγετε κωδικό" name="password" id="password" required>
	  <button onclick="toggler(this)" type="button" class="cleanbtn" style="color:white">Εμφάνιση κωδικού</button>
      <br>  
	  <button type="submit" class="cleanbtn" style="color:white">Εισαγωγή</button>
	  
      <button type="reset" class="cleanbtn" style="color:white" >Καθαρισμός</button>
	  
	  <button type="button" class="cancelbtn"><a href="index.php">Έξοδος</a></button>
	 
	  <a href="forgot_password.php" style="color:#14284B">Ξεχάσατε τον κωδικό σας;</a>
	  <br> <br> 
    </div>
	
  </form>
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
<script src="assets/js/index.js"></script>
</body>
</html>