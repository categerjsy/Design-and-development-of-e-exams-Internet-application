
<?php
session_start();	
include 'config.php';
?>
	


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
		<link rel="stylesheet" href="assets/css/button.css">
		<link rel="stylesheet" href="assets/css/checkbox.css">
		<link rel="stylesheet" href="assets/css/radiobutton.css">
		<link rel="stylesheet" href="assets/css/filter.css">
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
				  <div class="nav-btn" onclick="myHide()">
					<label for="nav-check">
					  <span></span>
					  <span></span>
					  <span></span>
					</label>
				  </div>
				  
				  <div class="nav-links">
					<a  href="profilek.php"> <?php echo "$username"; ?></a>
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
		</div>
		<button class="openbtn" onclick="openNav()">☰ Βασικές επιλογές</button> 
		<br>
		
	</aside>
	<main>  
	

	<div class="float-container">
	
  	<div class="float-child"  id="myHIDE">
	  	<h2>Φίλτρα ερωτήσεων</h2>
		<form action="f1.php" method="post">
		<h4>Δυσκολία ερώτησης</h4>
		<label class="container">Όλες οι δυσκολίες
		<input type="checkbox" class="checked_alld" name="all_diff" value="all_diff" checked>
		<span class="checkmark"></span>
		</label>
		<label class="container">Εύκολη
		<input type="checkbox" class="checkboxd" name="easy" value="easy">
		<span class="checkmark"></span>
		</label>
		<label class="container">Μέτρια
		<input type="checkbox" class="checkboxd" name="medium" value="medium">
		<span class="checkmark"></span>
		</label>
		<label class="container">Δύσκολη
		<input type="checkbox" class="checkboxd" name="difficult" value="difficult">
		<span class="checkmark"></span>
		</label>
		
		<br>
		<h4>Κατηγορίες Ερωτήσεων</h4>

		<label class="container">Όλες οι κατηγορίες
		<input type="checkbox" class="checked_all" name="all_categ" value="all_categ" checked>
		<span class="checkmark"></span>
		</label>
		<label class="container">Ελευθέρου κειμένου
		<input type="checkbox" class="checkbox" name="Text" value="Text" >
		<span class="checkmark"></span>
		</label>
		
		<label class="container">True-False
		<input type="checkbox" class="checkbox" name="True-False" value="True-False">
		<span class="checkmark"></span>
		</label>
		<label class="container">Multiple Choice
		<input type="checkbox" class="checkbox" name="Multiple-Choice" value="Multiple-Choice">
		<span class="checkmark"></span>
		</label>
		<label class="container">Multiple Choice με πολλές σωστές απάντησεις
		<input type="checkbox" class="checkbox" name="Multiple-Choice-More" value="Multiple-Choice-More">
		<span class="checkmark"></span>
		</label>
		<input type="submit" value="Εφαρμογή φίλτρων">
		</form>
		
		<a href="r1.php"><button class="wbtn" style="width:100%">Τυχαίο Διαγώνισμα</button></a>
		<br>
	</div>
		
 	   <div class="float-child2">
		<?php
		if (isset($_GET["msg"]) && $_GET["msg"] == 'minus') {
			print "<p style='color:red'>Η ερώτηση σας, αφαιρέθηκε.</p>";
		}
		if (isset($_GET["msg"]) && $_GET["msg"] == 'plus') {
			print "<p style='color:green'>Η ερώτηση σας, εισάγθηκε.</p>";//προσωρινο
		}
		?>
        <div id="myform" >
		<?php
		$exam=$_SESSION["id_exam"];
		$query=mysqli_query($conn,"SELECT * FROM exam WHERE id_exam='$exam'");
		while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$final_grade=$row["final_grade"];
		}
		if($final_grade==10){
		echo "<form action='bonus.php' method='post' >
		<label class='container'>Βοnus βαθμολογία
		<input type='checkbox' id='myCheck' onclick='negGrade()'>
		<span class='checkmark'></span>
		</label>
		<br>
		<p id='text' style='display:none'>Παρακαλώ ορίστε Βοnus βαθμολογία
		<input type='text' id='ngrade' name='ngrade' placeholder='Βοnus βαθμολογία' onblur='validateNGrade(this);' pattern='[0-9]{1}.[0-9]{2}'>
		<br> <span id='messageNGrade'></span>
		<input type='submit' value='Ορισμός Bonus βαθμολογίας' /></p>";
		}
		?>

			<?php
			$exam=$_SESSION["id_exam"];
			$query=mysqli_query($conn,"SELECT * FROM exam WHERE id_exam='$exam'");
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$exam_datetime=$row["date_time"];
				$findlesson=mysqli_query($conn,"select * from belongs_to where id_exam='$exam'");
					while ($row = mysqli_fetch_array($findlesson, MYSQLI_ASSOC)) {
					$l=$row["id_lesson"];
					$_SESSION["id_lesson"]=$l;
					$namelesson=mysqli_query($conn,"select * from lesson where id_lesson='$l'");
						while ($row = mysqli_fetch_array($namelesson, MYSQLI_ASSOC)) {
							$lesson=$row["name"];
							$_SESSION["lesson"]=$lesson;
						}
					}
			}
			echo "<h3>Εισαγωγή ερωτήσεων στο διαγώνισμα του μαθήματος $lesson.</h3><p>Το διαγώνισμα σας είναι προγραμματισμένο στις $exam_datetime </p>";
			?>
			
	
		
			 	<?php
				 
				 $exam=$_SESSION["id_exam"];
				 $id_lesson=$_SESSION["id_lesson"];
				 $lesson=$_SESSION["lesson"];
					$query=mysqli_query($conn,"SELECT * FROM includes WHERE id_lesson='$id_lesson'");
					echo "<h3>Ερωτήσεις ελευθέρου κειμένου </h3>";
					while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
						$id_question=$row["id_question"];	
						
						$question=mysqli_query($conn,"select * from question where id_question='$id_question' and type='Ελευθέρου κειμένου'");
						while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
							$qtext=$row["text"];
							$q = "select * from contains where id_question='$id_question' and id_exam='$exam'"; 
								
								// Execute the query and store the result set 
							$result = mysqli_query($conn, $q); 
								
							if ($result) { 
									// it return number of rows in the table. 
								$row = mysqli_num_rows($result); 
								if ($row) { 
								echo "<form method='post' action='contains.php'>";
								echo "<button type ='submit' name='remove_enemy' class='wbtn' value='$id_question'>";
								echo "Αφαίρεση ερώτησης";
								echo "</button>";
								}
								else{
								echo "<form method='post' action='contains.php'>";
								echo "<button type = 'submit' name='add_enemy' class='wbtn' value='$id_question'>";
								echo "Προσθήκη ερώτησης";
								echo "</button>";
								}
							}
							echo " $qtext<br> <br>";
							echo "</form>";
							echo "<hr>";
						}
					
								
					}
				?>
				<?php
				 
				 $exam=$_SESSION["id_exam"];
				 $id_lesson=$_SESSION["id_lesson"];
				 $lesson=$_SESSION["lesson"];
					$query=mysqli_query($conn,"SELECT * FROM includes WHERE id_lesson='$id_lesson'");
					echo "<h3>Ερωτήσεις True-False </h3>";
					while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
						$id_question=$row["id_question"];	
						$question=mysqli_query($conn,"select * from question where id_question='$id_question' and type='True-False'");
						while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
							$qtext=$row["text"];
							$q = "select * from contains where id_question='$id_question' and id_exam='$exam'"; 
								
								// Execute the query and store the result set 
							$result1 = mysqli_query($conn, $q); 
								
							if ($result1) { 
								// it return number of rows in the table. 
							$row = mysqli_num_rows($result1); 
								if ($row) { 
								echo "<form method='post' action='contains.php'>";
								echo "<button type ='submit' name='remove_enemy' class='wbtn' value='$id_question'>";
								echo "Αφαίρεση ερώτησης";
								echo "</button>";
								}
								else{
								echo "<form method='post' action='contains.php'>";
								echo "<button type = 'submit' name='add_enemy' class='wbtn' value='$id_question'>";
								echo "Προσθήκη ερώτησης";
								echo "</button>";
								}
							}
							echo "$qtext<br><br>";
							echo " <select id='answer' name='answer'>
							<option value='T'>True</option>
							<option value='F'>False</option>
						 	 </select>";
							 echo "</form>";
							echo "<hr>";
						}
						
					}
					?>
					<?php
				 
				 $exam=$_SESSION["id_exam"];
				 $id_lesson=$_SESSION["id_lesson"];
				 $lesson=$_SESSION["lesson"];
					$query=mysqli_query($conn,"SELECT * FROM includes WHERE id_lesson='$id_lesson'");
					echo "<h3>Ερωτήσεις Multiple Choice </h3>";
					while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
						$id_question=$row["id_question"];	
						$question=mysqli_query($conn,"select * from question where id_question='$id_question' and type='Multiple Choice'");
						while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
							$qtext=$row["text"];
							$q = "select * from contains where id_question='$id_question' and id_exam='$exam'"; 
								
								// Execute the query and store the result set 
							$result2 = mysqli_query($conn, $q); 
								
							if ($result2) { 
									// it return number of rows in the table. 
								$row = mysqli_num_rows($result2); 
								if ($row) { 
									echo "<form method='post' action='contains.php'>";
									echo "<button type ='submit' name='remove_enemy' class='wbtn' value='$id_question'>";
									echo "Αφαίρεση ερώτησης";
									echo "</button>";
									}
									else{
									echo "<form method='post' action='contains.php'>";
									echo "<button type = 'submit' name='add_enemy' class='wbtn' value='$id_question'>";
									echo "Προσθήκη ερώτησης";
									echo "</button>";
									}
							}
							echo " $qtext <br>";
							$findidpa=mysqli_query($conn,"select * from has where  id_question='$id_question'");
							while ($row = mysqli_fetch_array($findidpa, MYSQLI_ASSOC)) {
								$id_pa=$row["id_possibleAnswer"];
								$findpa=mysqli_query($conn,"select * from possible_answer where id_possibleAnswer='$id_pa'");
								while ($row = mysqli_fetch_array($findpa, MYSQLI_ASSOC)) {
									$pa=$row["text"];
									
									echo "<p style='margin-left:30%;'><label class='containerr' for='$pa'> $pa
									<input type='radio' id='$pa' name='pa' value='$pa'>
									<span class='checkmarkr'></span>
								  	</label><p>";
								}
							}	
							echo "</form>";
								echo "<hr>";		
						}
					}
				?>
				<?php
				 
				 $exam=$_SESSION["id_exam"];
				 $id_lesson=$_SESSION["id_lesson"];
				 $lesson=$_SESSION["lesson"];
					$query=mysqli_query($conn,"SELECT * FROM includes WHERE id_lesson='$id_lesson'");
					echo "<h3>Ερωτήσεις Multiple Choice με πολλές σωστές απαντήσεις </h3>";
					while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
						$id_question=$row["id_question"];	
						$question=mysqli_query($conn,"select * from question where id_question='$id_question' and type='Multiple Choice More'");
						while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
							$qtext=$row["text"];
							$q = "select * from contains where id_question='$id_question' and id_exam='$exam'"; 
								
								// Execute the query and store the result set 
							$result3 = mysqli_query($conn, $q); 
								
							if ($result3) { 
									// it return number of rows in the table. 
								$row = mysqli_num_rows($result3); 
								if ($row) { 
									echo "<form method='post' action='contains.php'>";
									echo "<button type ='submit' name='remove_enemy' class='wbtn' value='$id_question'>";
									echo "Αφαίρεση ερώτησης";
									echo "</button>";
									}
									else{
									echo "<form method='post' action='contains.php'>";
									echo "<button type = 'submit' name='add_enemy' class='wbtn' value='$id_question'>";
									echo "Προσθήκη ερώτησης";
									echo "</button>";
									}
							}
							echo " $qtext<br> ";
							$findidpa=mysqli_query($conn,"select * from has where  id_question='$id_question'");
							while ($row = mysqli_fetch_array($findidpa, MYSQLI_ASSOC)) {
								$id_pa=$row["id_possibleAnswer"];
								$findpa=mysqli_query($conn,"select * from possible_answer where id_possibleAnswer='$id_pa'");
								while ($row = mysqli_fetch_array($findpa, MYSQLI_ASSOC)) {
									$pa=$row["text"];
								echo "<p style='margin-left:30%;'><label class='container' for='$pa'>$pa
								<input type='checkbox' id='$pa' name='pa[]' value='$pa'>
								<span class='checkmark'></span>
								</label><p>";
								}
							}
							echo "<hr>";
                   		}
						   
						   
					} 
					
					
				 ?>
					
				
    			<a href="s_exam.php"><button class="but" type="button">Ολοκλήρωση</button></a>
					
				<button class="cancelbtn" type="reset"><a href="profilek.php">Έξοδος</a></button>
            
    	        <button type="reset" class="cleanbtn">Καθαρισμός</button>
                <br>
				</div>
	
	</div>
			 
			</div>
                     
		</main>
		<footer>
		</footer>
		<script src="assets/js/hide.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js" ></script>
        <script src="assets\js\bootstrap-number-input.js" ></script>
        <script src="assets\js\bootstrapSwitch.js" ></script>
		<script src="assets/js/aside.js"></script>
		<script src="assets/js/celall.js"></script>
		<script src="assets/js/ngrade.js"></script>
		<script src="assets/js/negGrade.js"></script>
		

	</body>
</html>