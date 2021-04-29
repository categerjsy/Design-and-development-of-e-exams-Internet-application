<!DOCTYPE html>
<html>
<head>
 
    
    <title>Ξεχασμένος Κωδικός</title>
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
					<a href="sign_in.php">Εισαγωγή</a>
					<a href="sign_upf.php">Εγγραφή Φοιτητή</a>
                    <a href="sign_upk.php">Εγγραφή Καθηγητή</a>
				  </div>
	</div>
     
    
</head>
<body>
	
  <form class="forgot_pass" action="#" method="post">
   <div class="imgcontainer"> 
      <img src="photos/uop_new_logo.png"  alt="Avatar" class="avatar">
    </div>
	
    <div class="container">
	
		<br>
		
		<br>
        <label for="email"><b>Εισάγετε το email με το οποίο εγγραφήκατε, ώστε να σας σταλεί προσωρινός κωδικός.</b></label> 
        <input  type="email" placeholder="E-mail σχολής" id="email" name="email" onblur="validateEmail(this);"  pattern="[a-zA-z0-9]*@uop.gr|[a-zA-z0-9]*@go.uop.gr" required >
        <br> <span id='messageEmail'></span>
		<br>
      
	  <button type="submit" class="cleanbtn" style="color:white">Αποστολή προσωρινού κωδικού</button>
	  
    </div>
	
  </form>

<script src="assets/js/index.js"></script>
</body>
</html>