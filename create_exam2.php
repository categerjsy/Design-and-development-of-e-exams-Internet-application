
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

	</aside>
	<main>  
		<button class="openbtn" onclick="openNav()">☰ Βασικές επιλογές</button> 
			
        <div id="myform" style="margin-left:25%;padding:10px 50px;height:1000px;">
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
			
	
			  <!--<form  action=""  onsubmit="return time()" method="post">-->
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
								echo "Αφαίρεση ερώτησης απο το διαγώνισμα";
								echo "</button>";
								}
								else{
								echo "<form name='like' method='post' action='contains.php'>";
								echo "<button type = 'submit' name='btn' class='wbtn' value='$id_question'>";
								echo "Προσθήκη ερώτησης στο διαγώνισμα";
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
								echo "Αφαίρεση ερώτησης απο το διαγώνισμα";
								echo "</button>";
								}
								else{
								echo "<form name='like' method='post' action='contains.php'>";
								echo "<button type = 'submit' name='btn' class='wbtn' value='$id_question'>";
								echo "Προσθήκη ερώτησης στο διαγώνισμα";
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
								echo "Αφαίρεση ερώτησης απο το διαγώνισμα";
								echo "</button>";
								}
								else{
								echo "<form name='like' method='post' action='contains.php'>";
								echo "<button type = 'submit' name='btn' class='wbtn' value='$id_question'>";
								echo "Προσθήκη ερώτησης στο διαγώνισμα";
								echo "</button>";
								}
							}
							echo " $qtext <br>";
									$findpa=mysqli_query($conn,"select * from possible_answer where  id_question='$id_question'");
								while ($row = mysqli_fetch_array($findpa, MYSQLI_ASSOC)) {
									$pa=$row["text"];
									echo "<p style='margin-left:30%;'><input type='radio' id='$pa' name='pa' value='$pa'>
											<label for='$pa'>$pa</label><p>";
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
								echo "Αφαίρεση ερώτησης απο το διαγώνισμα";
								echo "</button>";
								}
								else{
								echo "<form name='like' method='post' action='contains.php'>";
								echo "<button type = 'submit' name='btn' class='wbtn' value='$id_question'>";
								echo "Προσθήκη ερώτησης στο διαγώνισμα";
								echo "</button>";
								}
							}
							echo " $qtext<br> ";
							$findpa=mysqli_query($conn,"select * from possible_answer where  id_question='$id_question'");
							while ($row = mysqli_fetch_array($findpa, MYSQLI_ASSOC)) {
								$pa=$row["text"];
								echo "<p style='margin-left:30%;'><input type='checkbox' id='$pa' name='pa[]' value='$pa'>
								<label for='$pa'>$pa</label><p>";
							}
							echo "<hr>";
                   		}
						   
						   
					}
					
					
				 ?>
				
    			<a href="profilek.php?msg=exam"><button class="but" type="button">Ολοκλήρωση διαγωνίσματος.</button></a>
					
				<button class="cancelbtn" type="reset"><a href="create_question.php">Έξοδος</a></button>
            
    	        <button type="reset" class="cleanbtn">Καθαρισμός</button>
                <br>

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