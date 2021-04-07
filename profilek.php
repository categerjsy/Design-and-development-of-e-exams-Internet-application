
<?php
session_start();	

?>
	


<!DOCTYPE HTML>

<html>
	<head>
	<style>body { background-image: url("photos/uop_new_logo.png"); }</style>
	
		<?php 
        if (isset($_SESSION["id_professor"])==NULL) {
						
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
		<link rel="stylesheet" href="assets/css/lf.css">
		<link rel='shortcut icon' type='image/x-icon' href="photos/uop_logo4_navigation.gif"/><meta name="description" content="UOP Logo"/>		
		<style>
body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #14284B;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #cccccc;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color:#14284B;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
	background-color: #000033;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
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
					<a  href="#"> <?php echo "$username"; ?></a>
					<a href="change_passwordk.php">Αλλαγή κωδικού</a>
					<a href="logout.php">Έξοδος</a>
				  </div>
			</div>
		
		</header>
		<aside>
		<!--<nav>
		  <ul>
		    <li><a href="create_lesson.php">Δημιουργία μαθήματος</a></li>
			<li><a href="create_question.php">Εισαγωγή ερώτησης</a></li>
			<li><a href="create_exam.php">Δημιουργία εξέτασης</a></li>
		  </ul>
		</nav>-->
	<!-- Sidebar -->
	<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="create_lesson.php">Δημιουργία μαθήματος</a>
  <a href="create_question.php">Εισαγωγή ερώτησης</a>
  <a href="create_exam.php">Δημιουργία εξέτασης</a>
</div>

		</aside>
		<main>  
		<button class="openbtn" onclick="openNav()">☰ Οι ενέργειες μου</button>                     
		</main>
		<footer>
		</footer>
		<script ></script>
		
		<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
	</body>
</html>