
<?php
session_start();	
include 'config.php';
?>

<!DOCTYPE HTML>

<html>
	<head>
        <?php
        if (isset($_SESSION["id_professor"])==NULL) {
            header("Location: index.php");

        }else if(isset($_SESSION["id_student"])!=NULL){
            header("Location: profilef.php");
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
		<link rel="stylesheet" href="assets/css/button.css">
		<link rel="stylesheet" href="assets/css/checkbox.css">
        <link rel="stylesheet" href="assets/css/footer.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

        <link rel='shortcut icon' type='image/x-icon' href="photos/uop_logo4_navigation.gif"/><meta name="description" content="UOP Logo"/>
	
	
	</head>
	
	
	<body>
		<header>
			<div class="nav">
				  <input type="checkbox" id="nav-check">
				  <div class="nav-header">
					<div class="nav-title">
					 <img src="photos/uop_logo4_navigation.gif" width="60" height="40"/> 
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
					<a  href="profilek.php"> <?php  if (isset($_SESSION["id_professor"])){
                            echo "$username";
                        }?></a>
					<a href="logout.php">Αποσύνδεση</a>
				  </div>
			</div>
		
		</header>
		<aside>
		
		<!-- Sidebar -->
		<div id="mySidebar" class="sidebar">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
			<a href="edit_prof.php">Επεξεργασία προφίλ</a>
			<a href="change_password.php">Αλλαγή κωδικού</a>
			<a href="create_lesson.php">Δημιουργία μαθήματος</a>
			<a href="create_question.php">Εισαγωγή ερώτησης</a>
			<a href="select_lesson.php">Επεξεργασία ερωτήσεων</a>
			<a href="create_exam.php">Δημιουργία εξέτασης</a>
			<a href="edit_exam.php">Επεξεργασία διαγωνίσματος</a>
            <a href='correction.php'>Διόρθωση διαγωνισμάτων</a>
		</div>
	
		</aside>
		<main>  
			<button class="openbtn" onclick="openNav()">☰ Βασικές επιλογές</button>     
        <div id="myform" style="margin-left:25%;padding:10px 50px;">
			<h3>Εκχώρηση Multiple Choice με πολλές σωστές απαντήσεις</h3>
			
	
			  <form action="mcp2.php" method="post">
			  <label for="course">Παρακαλώ ορίστε την σωστή απάντηση.</label> <br>
			  <?php
			 
			   	   $id_q=$_SESSION["id_question"];
                   $s = mysqli_query($conn,"select * from question where id_question='$id_q'");
                   while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
					$my_question=$row["text"];
					echo "<p>$my_question</p>";
					$findidpa=mysqli_query($conn,"select * from has where  id_question='$id_q'");
					while ($row = mysqli_fetch_array($findidpa, MYSQLI_ASSOC)) {
						$id_pa=$row["id_possibleAnswer"];
						$findpa=mysqli_query($conn,"select * from possible_answer where id_possibleAnswer='$id_pa'");
						while ($row = mysqli_fetch_array($findpa, MYSQLI_ASSOC)) {
							$pa=$row["text"];
							echo "<label class='container' for='$pa'>$pa
							<input type='checkbox' id='$pa' name='pa[]' value='$pa'>
							<span class='checkmark'></span>
							</label>";
						}
					}
				  	}

				?>
                <br> 
			   
				
			    <input type="submit" value="Ορισμός απάντησης">
				<button class="cancelbtn" type="reset"><a href="create_question.php">Έξοδος</a></button>
    	        <button type="reset" class="cleanbtn">Καθαρισμός</button>
                <br>


			  </form>
			</div>
                     
		</main>
        <footer>Copyright Gerakianaki Vlachou © 2021</footer>
		
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js" ></script>
        <script src="assets\js\bootstrap-number-input.js" ></script>
        <script src="assets\js\bootstrapSwitch.js" ></script>
		<script src="assets/js/aside.js"></script>
		<script src="assets/js/addmore.js"></script>
		<script src="assets/js/grade.js"></script>
		<script src="assets/js/ngrade.js"></script>
		<script src="assets/js/inserttime.js"></script>
	</body>
</html>