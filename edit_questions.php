
<?php
session_start();	
include 'config.php';
$prof=$_SESSION["id_professor"];
$id_lesson=$_POST['course'];
?>
	

  <!--εδω πρεπει να εμφανίζονται οι ερωτήσεις του μαθήματος-->

<!DOCTYPE HTML>

<html>
	<head>
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
		<link rel="stylesheet" href="assets/css/asidenav.css">
		<link rel="stylesheet" href="assets/css/lf.css">
		<!--<link rel="stylesheet" href="assets/css/button.css">-->
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
		<aside>
		
		<!-- Sidebar -->
		<div id="mySidebar" class="sidebar">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
		<a href="edit_prof.php">Επεξεργασία προφίλ</a>
		<a href="create_lesson.php">Δημιουργία μαθήματος</a>
		<a href="create_question.php">Εισαγωγή ερώτησης</a>
		<a href="select_lesson.php">Επεξεργασία ερωτήσεων</a>
		<a href="create_exam.php">Δημιουργία εξέτασης</a>
		</div>
	
		</aside>
		<main>  
			<button class="openbtn" onclick="openNav()">☰ Βασικές επιλογές</button>     
        <div id="myform" style="margin-left:25%;padding:10px 50px;height:1000px;">
			<h3>Επεξεργασία ερωτήσεων</h3>
			
			  <form action="edit_questions.php" method="post">
			  <?php
	//από το id_lesson μέσω της includes βρίσκω το id_question σε πίνακα
				
				
				$sql1 = "SELECT id_question FROM includes WHERE id_lesson='$id_lesson'";
				$result = $conn->query($sql1);

				if ($result->num_rows > 0) {
				  // output data of each row
				  while($row = $result->fetch_assoc()) {
					echo "id: " . $row["id_question"]. "<br>";
					$quest=$row["id_question"];
					
					$sql2 = "SELECT text FROM question WHERE id_question='$quest'";
					$res = $conn->query($sql2);
					if ($res->num_rows > 0) {
				  // output data of each row
						while($r = $res->fetch_assoc()) {
							echo "Q: " . $r["text"]. "<br>";
						}
					}
					
				  }
				} else {
				  echo "0 results";
				}
				//από το id_question, μέσω της question θα εμφανίζονται οι ερωτήσεις 
				?>
				
				<br>
				
				<button type="submit" class="cleanbtn" style="color:white">Επιλογή</button>
				<br> <br>
    	        <button type="reset" class="cleanbtn">Καθαρισμός</button>
                <br> <br>
				<button class="cancelbtn" type="reset"><a href="create_question.php">Έξοδος</a></button>
                <br> <br>


			  </form>
			</div>
                     
		</main>
		<footer>
		</footer>
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js" ></script>
        <script src="assets\js\bootstrap-number-input.js" ></script>
        <script src="assets\js\bootstrapSwitch.js" ></script>
		<script src="assets/js/aside.js"></script>
		<script src="assets/js/grade.js"></script>
		<script src="assets/js/ngrade.js"></script>
		<script src="assets/js/inserttime.js"></script>
		<script src="assets/js/negGrade.js"></script>
	</body>
</html>