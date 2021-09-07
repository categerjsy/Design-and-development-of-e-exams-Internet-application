<?php
session_start();	
include 'config.php';
$prof=$_SESSION["id_professor"];
$id_lesson=$_SESSION["idl"];

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
		<link rel="stylesheet" href="assets/css/radiobutton.css">
        <link rel="stylesheet" href="assets/css/footer.css">
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
            <a href="correction.php">Διόρθωση διαγωνισμάτων</a>
		</div>
		<button class="openbtn" onclick="openNav()">☰ Βασικές επιλογές</button> 
		
	</aside>
	<main>
        <div id="myform" style="margin-left:25%;padding:10px 50px;">
		<?php
			if (isset($_GET["msg"]) && $_GET["msg"] == 'ch') {
				print "<p style='color:green'>Η ερώτηση σας άλλαξε.<p>";
			}
			else if (isset($_GET["msg"]) && $_GET["msg"] == 'samequestion') {
				print "<p style='color:red'>Το κείμενο δεν είχε αλλαγή.<p>";
			}
			else if (isset($_GET["msg"]) && $_GET["msg"] == 'deleted') {
				print "<p style='color:red'>Η ερώτηση έχει διαγραφεί.<p>";
			}
			$query=mysqli_query($conn,"SELECT * FROM includes WHERE id_lesson='$id_lesson'");
			echo "<h2>Ερωτήσεις ελευθέρου κειμένου </h2>";
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$id_question=$row["id_question"];	
				$question=mysqli_query($conn,"select * from question where id_question='$id_question' and type='Ελευθέρου κειμένου'");
					while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
						$qtext=$row["text"];
						echo "<form method='post' action='change_questions.php'>";
						echo "<h4>$qtext</h4>";
						echo "<button class='but' style='width:60%;' type='submit' name='id_question' value='$id_question'>Επεξεργασία</button>";
						echo "</form>";
						echo "<hr>";
					}
			}
			$query=mysqli_query($conn,"SELECT * FROM includes WHERE id_lesson='$id_lesson'");
			echo "<h2>Ερωτήσεις True-False </h2>";
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$id_question=$row["id_question"];	
				$question=mysqli_query($conn,"select * from question where id_question='$id_question' and type='True-False'");
				while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
					$qtext=$row["text"];
					echo "<form method='post' action='change_questions.php'>";
					echo "<h4>$qtext</h4>";
					$findidpa=mysqli_query($conn,"select * from has where  id_question='$id_question'");
						while ($row = mysqli_fetch_array($findidpa, MYSQLI_ASSOC)) {
							$id_pa=$row["id_possibleAnswer"];
							$findpa=mysqli_query($conn,"select * from possible_answer where id_possibleAnswer='$id_pa'");
							while ($row = mysqli_fetch_array($findpa, MYSQLI_ASSOC)) {
								$pa=$row["text"];
								$iscorrect=$row["is_correct"];
								if($iscorrect=="0"){
									echo "<p style='margin-left:10%;'><label class='container' for='true'>True
									<input type='checkbox' id='true' name='true' value='true' disabled>
									<span class='checkmark'></span>
									</label><p>";
									echo "<p style='margin-left:10%;'><label class='container' for='false'>False
									<input type='checkbox' id='false' name='false' value='false' checked disabled>
									<span class='checkmark'></span>
									</label><p>";
								}
								else{
									echo "<p style='margin-left:10%;'><label class='container' for='true'>True
									<input type='checkbox' id='true' name='true' value='true' checked disabled>
									<span class='checkmark'></span>
									</label><p>";
									echo "<p style='margin-left:10%;'><label class='container' for='false'>False
									<input type='checkbox' id='false' name='false' value='false' disabled>
									<span class='checkmark'></span>
									</label><p>";
								}
							}
						}
						echo "<button class='but' style='width:60%;' type='submit' name='id_question' value='$id_question'>Επεξεργασία</button>";
						echo "</form>";
						echo "<hr>";
				}
			}
			$query=mysqli_query($conn,"SELECT * FROM includes WHERE id_lesson='$id_lesson'");
			echo "<h2>Ερωτήσεις Multiple Choice </h2>";
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$id_question=$row["id_question"];	
				$question=mysqli_query($conn,"select * from question where id_question='$id_question' and type='Multiple Choice'");
				while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
					$qtext=$row["text"];
					echo "<form method='post' action='change_questions.php'>";
					echo "<h4>$qtext</h4>";
					$findidpa=mysqli_query($conn,"select * from has where  id_question='$id_question'");
						while ($row = mysqli_fetch_array($findidpa, MYSQLI_ASSOC)) {
							$id_pa=$row["id_possibleAnswer"];
							$findpa=mysqli_query($conn,"select * from possible_answer where id_possibleAnswer='$id_pa'");
							while ($row = mysqli_fetch_array($findpa, MYSQLI_ASSOC)) {
								$pa=$row["text"];
								$iscorrect=$row["is_correct"];
								if($iscorrect=="0"){
									echo "<p style='margin-left:10%;'><label class='containerr' for='$pa'> $pa
									<input type='radio' id='$pa' name='pa' value='$pa' disabled>
									<span class='checkmarkr'></span>
								  	</label><p>";
								}
								else{
									echo "<p style='margin-left:10%;'><label class='containerr' for='$pa'> $pa
									<input type='radio' id='$pa' name='pa' value='$pa' checked disabled>
									<span class='checkmarkr'></span>
								  	</label><p>";
								}
							}
						}
					echo "<button class='but' style='width:60%;' type='submit' name='id_question' value='$id_question'>Επεξεργασία</button>";
					echo "</form>";
					echo "<hr>";
				}
			}		
			$query=mysqli_query($conn,"SELECT * FROM includes WHERE id_lesson='$id_lesson'");
			echo "<h2>Ερωτήσεις Multiple Choice με πολλές σωστές απαντήσεις </h2>";
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$id_question=$row["id_question"];	
				$question=mysqli_query($conn,"select * from question where id_question='$id_question' and type='Multiple Choice More'");
				while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
					$qtext=$row["text"];
					echo "<form method='post' action='change_questions.php'>";
					echo "<h4>$qtext</h4> ";
					$findidpa=mysqli_query($conn,"select * from has where  id_question='$id_question'");
						while ($row = mysqli_fetch_array($findidpa, MYSQLI_ASSOC)) {
							$id_pa=$row["id_possibleAnswer"];
							$findpa=mysqli_query($conn,"select * from possible_answer where id_possibleAnswer='$id_pa'");
							while ($row = mysqli_fetch_array($findpa, MYSQLI_ASSOC)) {
								$pa=$row["text"];
								$iscorrect=$row["is_correct"];
								if($iscorrect=="0"){
									echo "<p style='margin-left:10%;'><label class='container' for='$pa'>$pa
									<input type='checkbox' id='$pa' name='pa[]' value='$pa' disabled>
									<span class='checkmark'></span>
									</label><p>";
								}
								else{
									echo "<p style='margin-left:10%;'><label class='container' for='$pa'>$pa
									<input type='checkbox' id='$pa' name='pa[]' value='$pa' checked disabled>
									<span class='checkmark'></span>
									</label><p>";
								}	
							}
						}
					echo "<button class='but' style='width:60%;' type='submit' name='id_question' value='$id_question'>Επεξεργασία</button>";
					echo "</form>";
					echo "<hr>";
                }
			}
		?>
		<br>
		<button type="button" class="cancelbtn" onclick="goBack()">Πίσω</button>
        <br>
        <br>
            <footer>Copyright Gerakianaki Vlachou © 2021</footer>
		</div>
                     
		</main>

		
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js" ></script>
        <script src="assets\js\bootstrap-number-input.js" ></script>
        <script src="assets\js\bootstrapSwitch.js" ></script>
		<script src="assets/js/aside.js"></script>
		<script>
			function goBack() {
			  window.history.back();
			}
		</script>


	</body>

</html>