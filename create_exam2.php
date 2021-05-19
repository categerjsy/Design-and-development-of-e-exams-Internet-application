
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
		<a href="create_exam.php">Δημιουργία εξέτασης</a>
		</div>
		<button class="openbtn" onclick="openNav()">☰ Βασικές επιλογές</button> 
		<br>
		
	</aside>
	<main>  
	<div class="float-container">

  	<div class="float-child">
	  	<h2>Φίλτρα ερωτήσεων</h2>
		<h4>Δυσκολία ερώτησης</h4>
		
		<input type="checkbox" value="easy">
		<label for="easy">Εύκολη</label>
		<br>
		<input type="checkbox" value="medium">
		<label for="medium">Μέτρια</label>
		<br>
		<input type="checkbox" value="difficult">
		<label for="difficult">Δύσκολη</label>
		<br>
		<br>
		<h4>Κατηγορίες Ερωτήσεων</h4>
		<input type="checkbox" value="True-False">
		<label for="True-False">True-False</label>
		<br>
		<input type="checkbox" value="Multiple Choice">
		<label for="Multiple Choice">Multiple Choice</label>
		<br>
		<input type="checkbox" value="Multiple Choice More">
		<label for="Multiple Choice More">Multiple Choice με πολλές σωστές απάντησεις</label>
		<br>
		<input type="checkbox" value="Ελευθέρου κειμένου">
		<label for="Ελευθέρου κειμένου">Ελευθέρου κειμένου</label>
		<br>
		<!--<label class="container">True-False
		<input type="checkbox" value="True-False">
		<span class="checkmark"></span>
		</label>
		<label class="container">Multiple Choice
		<input type="checkbox" value="Multiple Choice">
		<span class="checkmark"></span>
		</label>
		<label class="container">Multiple Choice με πολλές σωστές απάντησεις
		<input type="checkbox" value="Multiple Choice More">
		<span class="checkmark"></span>
		</label>
		<label class="container">Ελευθέρου κειμένου
		<input type="checkbox" value="Ελευθέρου κειμένου">
		<span class="checkmark"></span>
		</label>-->
		<br>
		</div>
  
 	   <div class="float-child2">
			
        <div id="myform" ><!--style="margin-left:35%;padding:10px 50px;height:1000px;">

			<?php
			$exam=$_SESSION["id_exam"];
			$query=mysqli_query($conn,"SELECT * FROM exam WHERE id_exam='$exam'");
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$exam_datetime=$row["date_time"];
				$findlesson=mysqli_query($conn,"select * from belongs_to where id_exam='$exam'");
					while ($row = mysqli_fetch_array($findlesson, MYSQLI_ASSOC)) {
					$l=$row["id_lesson"];
					$SESSION["id_lesson"]=$l;
					$namelesson=mysqli_query($conn,"select * from lesson where id_lesson='$l'");
						while ($row = mysqli_fetch_array($namelesson, MYSQLI_ASSOC)) {
							$lesson=$row["name"];
							$SESSION["lesson"]=$lesson;
						}
					}
			}
			echo "<h3>Εισαγωγή ερωτήσεων στο διαγώνισμα του μαθήματος $lesson.</h3><p>Το διαγώνισμα σας είναι προγραμματισμένο στις $exam_datetime </p>";
			?>
			
	
			  <!-<form  action=""  onsubmit="return time()" method="post">-->
			 	<?php
				 
				 $exam=$_SESSION["id_exam"];
				 $id_lesson=$SESSION["id_lesson"];
				 $lesson=$SESSION["lesson"];
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
								echo "<form name='like' method='post' action='delete_contains.php'>";
								echo "<button type = 'submit' name='btn' class='wbtn' value='$id_question'>";
								echo "Αφαίρεση ερώτησης";
								echo "</button>";
								}
								else{
								echo "<form name='like' method='post' action='contains.php'>";
								echo "<button type = 'submit' name='btn' class='wbtn' value='$id_question'>";
								echo "Προσθήκη ερώτησης";
								echo "</button>";
								}
							}
							echo " $qtext<br> <br>";
							echo "<hr>";
						}
					
								
					}
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
								echo "<form name='like' method='post' action='delete_contains.php'>";
								echo "<button type = 'submit' name='btn' class='wbtn' value='$id_question'>";
								echo "Αφαίρεση ερώτησης";
								echo "</button>";
								}
								else{
								echo "<form name='like' method='post' action='contains.php'>";
								echo "<button type = 'submit' name='btn' class='wbtn' value='$id_question'>";
								echo "Προσθήκη ερώτησης";
								echo "</button>";
								}
							}
							echo "$qtext<br><br>";
							echo "<hr>";
						}
						
					}
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
								echo "<form name='like' method='post' action='delete_contains.php'>";
								echo "<button type = 'submit' name='btn' class='wbtn' value='$id_question'>";
								echo "Αφαίρεση ερώτησης";
								echo "</button>";
								}
								else{
								echo "<form name='like' method='post' action='contains.php'>";
								echo "<button type = 'submit' name='btn' class='wbtn' value='$id_question'>";
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
									
									echo "<p style='margin-left:30%;'><input type='radio' id='$pa' name='pa' value='$pa'>
											<label for='$pa'>$pa</label><p>";
								}
							}	
								echo "<hr>";		
						}
					}
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
								echo "<form name='like' method='post' action='delete_contains.php'>";
								echo "<button type = 'submit' name='btn' class='wbtn' value='$id_question'>";
								echo "Αφαίρεση ερώτησης";
								echo "</button>";
								}
								else{
								echo "<form name='like' method='post' action='contains.php'>";
								echo "<button type = 'submit' name='btn' class='wbtn' value='$id_question'>";
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
								echo "<p style='margin-left:30%;'><input type='checkbox' id='$pa' name='pa[]' value='$pa'>
								<label for='$pa'>$pa</label><p>";
								}
							}
							echo "<hr>";
                   		}
						   
						   
					}
					
					
				 ?>
					
				
    			<a href="profilek.php?msg=exam"><button class="but" type="button">Ολοκλήρωση</button></a>
					
				<button class="cancelbtn" type="reset"><a href="create_question.php">Έξοδος</a></button>
            
    	        <button type="reset" class="cleanbtn">Καθαρισμός</button>
                <br>
				</div>
	
	</div>
			 <!-- </form>-->
			</div>
                     
		</main>
		<footer>
		</footer>
		
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js" ></script>
        <script src="assets\js\bootstrap-number-input.js" ></script>
        <script src="assets\js\bootstrapSwitch.js" ></script>
		<script src="assets/js/aside.js"></script>
		


	</body>
</html>