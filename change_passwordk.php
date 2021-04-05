<?php
session_start();

?>

<!DOCTYPE html>
<html>
	<head>
	<?php 
        if (isset($_SESSION["id_professor"])==NULL){
						
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
					<a  href="profilek.php"> <?php echo "$username"; ?></a>
					<a href="logout.php">Έξοδος</a>
				  </div>
			</div>
		
		</header>
  
  <form class="signup" action="connectf.php" method="post">
    <div class="imgcontainer"> 
      <img src="photos/uop_new_logo.png" alt="Avatar" class="avatar">
    </div>
	
    <div class="container">
        
        <div name="frmCheckPassword" id="frmCheckPassword">  
        <label for="p1"><b>Παλιός Κωδικός</b></label> 
        <input name="password" id="password" type="password" placeholder="Κωδικός" class="demoInputBox" onKeyUp="checkPasswordStrength();" onkeyup='check();'  required>
        <div id="password-strength-status"></div>
        </div>
		
		<label for="p1"><b>Νέος Κωδικός</b></label> 
        <input name="password" id="password" type="password" placeholder="Κωδικός" class="demoInputBox" onKeyUp="checkPasswordStrength();" onkeyup='check();'  required>
        <div id="password-strength-status"></div>
        
             
        <label for="p1"><b>Επιβεβαίωση Κωδικού</b></label>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Επιβεβαίωση Κωδικού" class="demoInputBox"  onkeyup='check();' required>
        <br><span id='message'></span>
        <br>
        
      <button type="submit">Εγγραφή</button>
     
    </div>
    <div class="btn-group">
      
      <button type="button" class="cancelbtn"><a href="profilek.php">Έξοδος</a></button>
      <button type="reset" class="cleanbtn">Καθαρισμός</button>
	  </div>
    </div>
  </form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<script src="assets/js/PcheckLength.js"></script>
<script src="assets/js/passwordcheck.js"></script>
<script src="assets/js/index.js"></script>
</body>
</html>