
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
            <a href="correction.php">Διόρθωση διαγωνισμάτων</a>
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

<div id="myform" >
    <div  id="myHIDE">
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
  	
	$time= new DateTime($exam_datetime);
	$d=$date->format("H:i:s");
	list($h, $m, $s) = explode(":", $d);
	$inter = new DateInterval("PT" . $h . "H" . $m . "M" . $s . "S");
	$time->add($inter);

	$time_for_database = $time->format('Y-m-d H:i:s');
	
	$sql = "UPDATE exam SET time='$time_for_database' WHERE id_exam='$exam'";
    $conn->query($sql);

   	//$endtime=$datime+" "+$time;
	//$end = new DateTime($endtime);
    echo "<p>Το διαγώνισμα σας υπολογίζεται να έχει χρονική διάρκεια ";
    echo $date->format("H:i:s");
	echo "</p>";
	echo "<p>Το διαγώνισμα σας υπολογίζεται σε βαθμολογία  ";
    echo $gradefornow;
	echo "</p>";
	echo "<p>Το διαγώνισμα σας υπολογίζεται να λήγει  ";
    echo $time_for_database;
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
							echo " <select id='answer' name='answer' disabled>
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
									<input type='radio' id='$pa' name='pa' value='$pa' disabled>
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
								<input type='checkbox' id='$pa' name='pa[]' value='$pa' disabled>
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
				<button class="wbtn" style="width: 38%;" ><a href="create_exam2.php">Επεξεργασία διαγωνίσματος</a></button>    	        
                <br><br>
				</div>
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

	</body>
</html>