

<!DOCTYPE html>
<html>
<head>
    
    
    <title>Σύστημα Εξέτασης</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style.css">
     <link rel="stylesheet" href="assets/css/pass.css">
     <link rel='shortcut icon' type='image/x-icon' href='photos/uop_new_logo.png'/><meta name="description" content="UOP Logo"/>
    <div class="nav">
				  <input type="checkbox" id="nav-check">
				  <div class="nav-header">
					<div class="nav-title">
					 
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
					<a  href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Εισαγωγή</a>
					<a href="#" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Εγγραφή Φοιτητή</a>
					
				  </div>
				</div>
     
    
</head>
<body>




<div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="photos/img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Εισαγωγή</button>
     
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Έξοδος</button>
      <span class="psw"><a href="#">Forgot password?</a></span>
    </div>
  </form>
</div>
    
<div id="id02" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="photos/img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
       <label for="uname"><b>Όνομα</b></label>
      <input type="text" placeholder="Όνομα" name="name" required>

       <label for="surname"><b>Επώνυμο</b></label>
      <input type="text" placeholder="Επώνυμο" name="surname" required>
        
         <label for="email"><b>E-mail σχολής</b></label>
      <input  type="text" placeholder="E-mail σχολής" id="email" name="email" onblur="validateEmail(this);"  required >
      <span id='messageEmail'></span>

        <br>
      <label for="usname"><b>Username</b></label>
      <input type="text" placeholder="Username" name="uname" required>
         
           <label for="am"><b>Αριθμός μητρώου</b></label>
      <input type="text" placeholder="Αριθμός μητρώου" name="ΑΜ" required>
        
        <label for="telephone"><b>Αριθμός τηλεφώνου</b></label>
      <input type="text" placeholder="Αριθμός τηλεφώνου" name="telephone" required>
        
  <div name="frmCheckPassword" id="frmCheckPassword">  
 <label for="p1"><b>Κωδικός</b></label>
  <input name="password" id="password" type="password" placeholder="Κωδικός" class="demoInputBox" onKeyUp="checkPasswordStrength();" onkeyup='check();'  required>
 <div id="password-strength-status"></div>
        </div>
        
        
 <label for="p2"><b>Επιβεβαίωση Κωδικού</b></label>
  <input type="password" name="confirm_password" id="confirm_password" placeholder="Επιβεβαίωση Κωδικού"  onkeyup='check();' required>
  <span id='message'></span>

       
      <button type="submit">Εγγραφή</button>
     
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Έξοδος</button>

    </div>
  </form>
</div>
    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<script src="assets/js/PcheckLength.js"></script>
<script src="assets/js/emailcheck.js"></script>
<script src="assets/js/passwordcheck.js"></script>
<script src="assets/js/index.js"></script>



</body>
</html>
