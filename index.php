

<!DOCTYPE html>
<html>
<head>

    
    <title>Σύστημα Εξέτασης</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
					<a  href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Εισαγωγή</a>
					<a href="sign_upf.php">Εγγραφή Φοιτητή</a>
					<a href="sign_upk.php">Εγγραφή Καθηγητή</a>
				  </div>
				</div>
     
    
</head>
<body>




<div id="id01" class="modal">
  
  <form class="modal-content animate" action="check_user_pass.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
	
		<br>
			  
		<br>	  
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Εισάγετε Username" name="username" required>

      <label for="psw"><b>Κωδικός</b></label>
      <input type="password" placeholder="Εισάγετε κωδικό" name="password" required>
        
      <button type="submit">Εισαγωγή</button>
     
    </div>

    <div class="container" >
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Έξοδος</button>
      <span onclick="document.getElementById('id01').style.display='none'" class="psw"><a href="#" onclick="document.getElementById('id02').style.display='block'">Ξεχάσατε τον κωδικό σας;</a></span>
    </div>
  </form>
</div>
    
	


<div id="id02" class="modal">
  
  <form class="modal-content animate"  method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      
      <label for="email"><b>E-mail </b></label>
      <input  type="text" placeholder="E-mail σχολής με το οποίο έχετε εγγραφεί" id="email" name="email" onblur="validateEmail(this);"  required >
      <span id='messageEmail'></span>
        
        <button type="submit" onclick="document.getElementById('id03').style.display='block'">Αποστολή προσωρινού κωδικού </button>

<!--<a onsubmit="document.getElementById('id03').style.display='block'" >   </a>-->
	  
    </div>

    <div class="container" >
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Έξοδος</button>
    </div>
  </form>
</div>


<div id="id03" class="modal">
  
  <form class="modal-content animate" action="/index.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03).style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      
		<label for="psw"><b>Password</b></label>
		<input type="password" placeholder="Enter Password" name="psw" required>
        
		<button type="submit">Εισαγωγή</button>
	  
	 
    </div>

    <div class="container" >
      <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Έξοδος</button>
    </div>
  </form>
</div>

   

<script src="assets/js/emailcheck.js"></script>
<script src="assets/js/index.js"></script>



</body>
</html>
