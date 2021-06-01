
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
	<?php
					if (isset($_GET["msg"]) && $_GET["msg"] == 'exam') {
						print "<p style='color:green'>Το διαγώνισμα σας, ολοκληρώθηκε.</p>";
					}
					if (isset($_GET["msg"]) && $_GET["msg"] == 'rtest') {
						print "<p style='color:green'>Το τυχαίο διαγώνισμα σας, ολοκληρώθηκε.</p>";
					}
		?>    

<button class="wbtn" style="width: 38%;float: right;" ><a href="create_exam2.php">Επεξεργασία διαγωνίσματος</a></button>
<div id="myform" >

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
echo "<h3>Προβολή ερωτήσεων στο διαγώνισμα του μαθήματος $lesson.</h3><p>Το διαγώνισμα σας είναι προγραμματισμένο στις $exam_datetime </p>";


$exam=$_SESSION["id_exam"];
$id_lesson=$_SESSION["id_lesson"];
$lesson=$_SESSION["lesson"];
   $query=mysqli_query($conn,"SELECT * FROM contains WHERE id_exam='$exam'");
   $var1 = "00:00:00";
   $date = new DateTime($var1);
   $gradefornow=0;
   while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
	   $id_question=$row["id_question"];	
	   
	   $question=mysqli_query($conn,"select * from question where id_question='$id_question'");
	   while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
		   $grade=$row["grade"];
		   $var2=$row["time"];
		   list($hours, $minutes, $seconds) = explode(":", $var2);
			$interval = new DateInterval("PT" . $hours . "H" . $minutes . "M" . $seconds . "S");

			$date->add($interval);
			$gradefornow+=$grade;
	   }
   }   
  	 
    echo "<p>Το διαγώνισμα σας υπολογίζεται να έχει χρονική διάρκεια ";
    echo $date->format("H:i:s");
	echo "</p>";
	echo "<p>Το διαγώνισμα σας υπολογίζεται σε βαθμολογία  ";
    echo $gradefornow;
	echo "</p>";

?>
<?php 
				 $exam=$_SESSION["id_exam"];
				 $id_lesson=$_SESSION["id_lesson"];
				 $lesson=$_SESSION["lesson"];
					$query=mysqli_query($conn,"SELECT * FROM contains WHERE id_exam='$exam'");
					echo "<h3>Ερωτήσεις ελευθέρου κειμένου </h3>";
					while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
						$id_question=$row["id_question"];	
						
						$question=mysqli_query($conn,"select * from question where id_question='$id_question' and type='Ελευθέρου κειμένου'");
						while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
							$qtext=$row["text"];
							$grade=$row["grade"];
							echo " $qtext<br> <br>";
							echo "Βαθμοί: $grade<br> <br>";
							echo "<hr>";
						}
					
								
					}
?>
<?php
				 
				 $exam=$_SESSION["id_exam"];
				 $id_lesson=$_SESSION["id_lesson"];
				 $lesson=$_SESSION["lesson"];
				 $query=mysqli_query($conn,"SELECT * FROM contains WHERE id_exam='$exam'");
					echo "<h3>Ερωτήσεις True-False </h3>";
					while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
						$id_question=$row["id_question"];	
						$question=mysqli_query($conn,"select * from question where id_question='$id_question' and type='True-False'");
						while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
							$qtext=$row["text"];
							$grade=$row["grade"];
							$ngrade=$row["negative_grade"];
							echo "$qtext<br><br>";
							echo " <select id='answer' name='answer'>
							<option value='T'>True</option>
							<option value='F'>False</option>
						 	 </select>";
							 
							echo "Βαθμοί: $grade <br> Αρνητική βαθμολογία: $ngrade <br> <br>";  
							echo "<hr>";
						}
						
					}
					?>
					<?php
				 
				 $exam=$_SESSION["id_exam"];
				 $id_lesson=$_SESSION["id_lesson"];
				 $lesson=$_SESSION["lesson"];
				 $query=mysqli_query($conn,"SELECT * FROM contains WHERE id_exam='$exam'");
					echo "<h3>Ερωτήσεις Multiple Choice </h3>";
					while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
						$id_question=$row["id_question"];	
						$question=mysqli_query($conn,"select * from question where id_question='$id_question' and type='Multiple Choice'");
						while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
							$qtext=$row["text"];
							$grade=$row["grade"];
							$ngrade=$row["negative_grade"];
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
								echo "Βαθμοί: $grade <br> Αρνητική βαθμολογία: $ngrade <br> <br>";  
								echo "<hr>";		
						}
					}
				?>
				<?php
				 
				 $exam=$_SESSION["id_exam"];
				 $id_lesson=$_SESSION["id_lesson"];
				 $lesson=$_SESSION["lesson"];
				 $query=mysqli_query($conn,"SELECT * FROM contains WHERE id_exam='$exam'");
					echo "<h3>Ερωτήσεις Multiple Choice με πολλές σωστές απαντήσεις </h3>";
					while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
						$id_question=$row["id_question"];	
						$question=mysqli_query($conn,"select * from question where id_question='$id_question' and type='Multiple Choice More'");
						while ($row = mysqli_fetch_array($question, MYSQLI_ASSOC)) {
							$qtext=$row["text"];
							$grade=$row["grade"];
							$ngrade=$row["negative_grade"];
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
							echo "Βαθμοί: $grade <br>  Αρνητική βαθμολογία: $ngrade <br> <br>";  
							echo "<hr>";
                   		}
						   
						   
					} 
					
					
				 ?>
					
				
    			
					
				<button class="cancelbtn" type="reset"><a href="profilek.php">Έξοδος</a></button>
            
    	        
                <br>
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

	</body>
</html>