<!DOCTYPE html>
<html>
<head>
    
    
    <title>Εγγραφή Καθηγητή</title>
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
					<a  href="index.php">Αρχική Σελίδα</a>
					<a  href="#">Εισαγωγή</a>
					<a href="sign_upf.php">Εγγραφή Φοιτητή</a>
                    <a href="#">Εγγραφή Καθηγητή</a>
				  </div>
    </div>
     
    
</head>
<body>

  
  <form class="signup" action="/action_page.php" method="post">
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
        <input  type="text" placeholder="E-mail σχολής" id="email" name="email" onblur="validateEmail(this);"  required >
        <br> <span id='messageEmail'></span>
		<br>
        		
        <label for="usname"><b>Username</b></label> 
        <input type="text" placeholder="Username" name="uname" required>
        <br>  
        
		<br>
        <label for="telephone"><b>Αριθμός τηλεφώνου</b></label> 
        <input type="text" placeholder="Αριθμός τηλεφώνου" name="telephone" required>
        <br> 
        
		<br>
        <div name="frmCheckPassword" id="frmCheckPassword">  
        <label for="p1"><b>Κωδικός</b></label> 
        <input name="password" id="password" type="password" placeholder="Κωδικός" class="demoInputBox" onKeyUp="checkPasswordStrength();" onkeyup='check();'  required>
        <div id="password-strength-status"></div>
        </div>
     
        
        <label for="p2"><b>Επιβεβαίωση Κωδικού</b></label>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Επιβεβαίωση Κωδικού"  onkeyup='check();' required>
        <br><span id='message'></span>
        <br>
        

        
      <button type="submit">Εγγραφή</button>
     
    </div>

    <div class="btn-group">
      
      <button type="button" class="cancelbtn"><a href="index.php">Έξοδος</a></button>
      <button type="button" class="cleanbtn"><a href="#">Καθαρισμός</a></button>
      </div>

  </form>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<script src="assets/js/PcheckLength.js"></script>
<script src="assets/js/emailcheck.js"></script>
<script src="assets/js/passwordcheck.js"></script>
<script src="assets/js/index.js"></script>



</body>
</html>

