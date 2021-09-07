
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
			
        <div id="myform" style="margin-left:25%;padding:10px 50px;height:1000px;">
			<h3>Επεξεργασία Εξέτασης</h3>
			
	
			  <form name="RegForm" action="exam_edit.php"  onsubmit="return time()" method="post">
			  <?php
			  	if (isset($_GET["msg"]) && $_GET["msg"] == 'past') {
						print "<p style='color:red'>Το διαγώνισμα σας δεν μπορεί να προγραμματιστεί στο παρελθόν.</p>";
					}
			 ?>
			  <label for="course">Μάθημα εξέτασης</label> <br>
			  <?php
			   	   $idp=$_SESSION["id_professor"];
				   echo "<select id='course' name='course' disabled>";
				   $my_exam=$_SESSION["id_exam"];
                   $sa = mysqli_query($conn,"select * from belongs_to where id_exam='$my_exam'");
                   while ($row = mysqli_fetch_array($sa, MYSQLI_ASSOC)) {
                    $id_lesson=$row["id_lesson"];
                    $s = mysqli_query($conn,"select * from lesson where id_lesson='$id_lesson'");
                    while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
                            $my_l=$row["name"];
							$_SESSION["lesson"]=$my_l;
                            echo "<option value='$my_l'>$my_l</option>";  
                        }
                    }
				  echo "</select>";	 
		
	
				
				?>
                <br> 
                <?php 
				
				   $s = mysqli_query($conn,"select * from exam where id_exam=' $my_exam'");
				   while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
					   $date_time=$row["date_time"];
                       $arr=explode(" ", $date_time);
                       $arrdate=explode("-",$arr[0]);
                       $arrtime=explode(":",$arr[1]);
                    
				  }
			    ?>

                  <br>
                  <br>Ημερομηνία εξέτασης<br>
                  <input type="date" name="tdate" min="<?php $date?>" required>
                  <br>
                  <br>Ώρα εξέτασης<br>
                  <input type="time" id="ttime" name="ttime" required>

                  <br>
				
				
			    <input type="submit" value="Επεξεργασία των Ερωτήσεων">
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
		<script src="assets/js/timeexam.js"></script>
		<script src="assets/js/ngrade.js"></script>
		<script src="assets/js/negGrade.js"></script>

	</body>
</html>