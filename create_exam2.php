
<?php
session_start();	
include 'config.php';
?>
	


<!DOCTYPE HTML>

<html>
	<head>
        <?php
        if (isset($_SESSION["id_professor"])==NULL) {

            header("Location:index.php");

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
		<link rel="stylesheet" href="assets/css/filter.css">
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
				  <div class="nav-btn" onclick="myHide()">
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
		<button class="openbtn" onclick="openNav()">☰ Βασικές επιλογές</button> 
		<br>
		
	</aside>
	<main>  
	

	<div class="float-container">
	
  	<div class="float-child"  id="myHIDE">
	  	<h2>Φίλτρα ερωτήσεων</h2>
		<form action="tof1.php" method="post">
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
			print "<p style='color:green'>Η ερώτηση σας, εισήχθη.</p>";
		}
		?>
        <div id="myform" >
            <div id="myHIDE" >
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
		<input type='submit' value='Ορισμός Bonus βαθμολογίας' /></p>
		</form>";
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
							$grade=$row["grade"];
							$ngrade=$row["negative_grade"];
							$dif=$row["difficulty_level"];
							$q = "select * from contains where id_question='$id_question' and id_exam='$exam'"; 
								
								// Execute the query and store the result set 
							$result = mysqli_query($conn, $q); 
								
							if ($result) { 
									// it returns number of rows in the table. 
								$row = mysqli_num_rows($result); 
								if ($row) { 
								echo "<form  action='contains.php#form-anchor' id='form-anchor' method='post'>";
								echo "<button type ='submit' name='remove_question'  class='wbtn' value='$id_question'>";
								echo "Αφαίρεση ερώτησης";
								echo "</button>";
								echo "<br><br>";
								}
								else{
								echo "<form action='contains.php#form-anchor' id='form-anchor' method='post' >";
								echo "<button type = 'submit' name='add_question' class='wbtn' value='$id_question'>";
								echo "Προσθήκη ερώτησης";
								echo "</button>";
								echo "<br><br>";
								}
								echo "</form>";
							}
							if($dif=="easy") {
                                echo "<b style='color:green'> $qtext</b><br> <br>";
                            }
                            if($dif=="medium") {
                                echo "<b style='color:orange'> $qtext</b><br> <br>";
                            }
                            if($dif=="difficult") {
                                echo "<b style='color:red'> $qtext</b><br> <br>";
                            }
							echo "Βαθμολογία: ";
							echo $grade;
                            echo "<br> <br>Αρνητική Βαθμολογία: ";
                            echo $ngrade;;
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
                            $grade=$row["grade"];
                            $ngrade=$row["negative_grade"];
                            $dif=$row["difficulty_level"];
							$q = "select * from contains where id_question='$id_question' and id_exam='$exam'"; 
								
								// Execute the query and store the result set 
							$result1 = mysqli_query($conn, $q); 
								
							if ($result1) { 
								// it returns number of rows in the table. 
							$row = mysqli_num_rows($result1); 
								if ($row) { 
								echo "<form method='post' action='contains.php#form-anchor' id='form-anchor'>";
								echo "<button type ='submit' name='remove_question'  class='wbtn' value='$id_question'>";
								echo "Αφαίρεση ερώτησης";
								echo "</button>";
								echo "<br><br>";
								echo "</form>";
								}
								else{
								echo "<form method='post' action='contains.php#form-anchor' id='form-anchor'>";
								echo "<button type = 'submit' name='add_question' class='wbtn' value='$id_question'>";
								echo "Προσθήκη ερώτησης";
								echo "</button>";
								echo "<br><br>";
								echo "</form>";
								}
							}
                            if($dif=="easy") {
                                echo "<b style='color:green'> $qtext</b><br> <br>";
                            }
                            if($dif=="medium") {
                                echo "<b style='color:orange'> $qtext</b><br> <br>";
                            }
                            if($dif=="difficult") {
                                echo "<b style='color:red'> $qtext</b><br> <br>";
                            }
							echo " <select id='answer' name='answer' disabled>
							<option value='T'>True</option>
							<option value='F'>False</option>
						 	 </select>";
                            echo "Βαθμολογία: ";
                            echo $grade;
                            echo "<br> <br>Αρνητική Βαθμολογία: ";
                            echo $ngrade;;
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
                            $grade=$row["grade"];
                            $ngrade=$row["negative_grade"];
                            $dif=$row["difficulty_level"];
							$q = "select * from contains where id_question='$id_question' and id_exam='$exam'"; 
								
								// Execute the query and store the result set 
							$result2 = mysqli_query($conn, $q); 
								
							if ($result2) { 
									// it returns number of rows in the table. 
								$row = mysqli_num_rows($result2); 
								if ($row) { 
									echo "<form method='post' action='contains.php#form-anchor' id='form-anchor'>";
									echo "<button type ='submit' name='remove_question'  class='wbtn' value='$id_question'>";
									echo "Αφαίρεση ερώτησης";
									echo "</button>";
									echo "<br><br>";
									echo "</form>";
									}
									else{
									echo "<form method='post' action='contains.php#form-anchor' id='form-anchor'>";
									echo "<button type = 'submit' name='add_question' class='wbtn' value='$id_question'>";
									echo "Προσθήκη ερώτησης";
									echo "</button>";
									echo "<br><br>";
									echo "</form>";
									}
							}
                            if($dif=="easy") {
                                echo "<b style='color:green'> $qtext</b><br> <br>";
                            }
                            if($dif=="medium") {
                                echo "<b style='color:orange'> $qtext</b><br> <br>";
                            }
                            if($dif=="difficult") {
                                echo "<b style='color:red'> $qtext</b><br> <br>";
                            }
							$findidpa=mysqli_query($conn,"select * from has where  id_question='$id_question'");
							while ($row = mysqli_fetch_array($findidpa, MYSQLI_ASSOC)) {
								$id_pa=$row["id_possibleAnswer"];
								$findpa=mysqli_query($conn,"select * from possible_answer where id_possibleAnswer='$id_pa'");
								while ($row = mysqli_fetch_array($findpa, MYSQLI_ASSOC)) {
									$pa=$row["text"];
									
									echo "<p style='margin-left:30%;'><label class='containerr' for='$pa'> $pa
									<input type='radio' id='$pa' name='pa' value='$pa' disabled>
									<span class='checkmarkr'></span>
								  	</label><p>";
								}
							}

                            echo "Βαθμολογία: ";
                            echo $grade;
                            echo "<br> <br>Αρνητική Βαθμολογία: ";
                            echo $ngrade;
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
                            $grade=$row["grade"];
                            $ngrade=$row["negative_grade"];
                            $dif=$row["difficulty_level"];
							$q = "select * from contains where id_question='$id_question' and id_exam='$exam'"; 
								
								// Execute the query and store the result set 
							$result3 = mysqli_query($conn, $q); 
								
							if ($result3) { 
									// it returns number of rows in the table. 
								$row = mysqli_num_rows($result3); 
								if ($row) { 
									echo "<form  action='contains.php#form-anchor' id='form-anchor' method='post'>";
									echo "<button type ='submit' name='remove_question' class='wbtn' value='$id_question'>";
									echo "Αφαίρεση ερώτησης";
									echo "</button>";
									echo "<br><br>";
									echo "</form>";
									}
									else{
									echo "<form method='post' action='contains.php#form-anchor' id='form-anchor'>";
									echo "<button type = 'submit' name='add_question' class='wbtn' value='$id_question'>";
									echo "Προσθήκη ερώτησης";
									echo "</button>";
									echo "<br><br>";
									echo "</form>";
									}
							}
                            if($dif=="easy") {
                                echo "<b style='color:green'> $qtext</b><br> <br>";
                            }
                            if($dif=="medium") {
                                echo "<b style='color:orange'> $qtext</b><br> <br>";
                            }
                            if($dif=="difficult") {
                                echo "<b style='color:red'> $qtext</b><br> <br>";
                            }
							$findidpa=mysqli_query($conn,"select * from has where  id_question='$id_question'");
							while ($row = mysqli_fetch_array($findidpa, MYSQLI_ASSOC)) {
								$id_pa=$row["id_possibleAnswer"];
								$findpa=mysqli_query($conn,"select * from possible_answer where id_possibleAnswer='$id_pa'");
								while ($row = mysqli_fetch_array($findpa, MYSQLI_ASSOC)) {
									$pa=$row["text"];
								echo "<p style='margin-left:30%;'><label class='container' for='$pa'>$pa
								<input type='checkbox' id='$pa' name='pa[]' value='$pa' disabled>
								<span class='checkmark'></span>
								</label><p>";
								}
							}
                            echo "Βαθμολογία: ";
                            echo $grade;
                            echo "<br> <br>Αρνητική Βαθμολογία: ";
                            echo $ngrade;;
                            echo "<hr>";
                   		}
						   
						   
					} 
					
					
				 ?>
					
				
    			<a href="s_exam.php"><button class="but" type="button">Ολοκλήρωση</button></a>

                <a href="profilek.php"><button class="cancelbtn" type="reset">Έξοδος</button></a>
            

                <br>
				</div></div>
	
	</div>
			 
			</div>
                     
		</main>
        <footer>Copyright Gerakianaki Vlachou © 2021</footer>
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