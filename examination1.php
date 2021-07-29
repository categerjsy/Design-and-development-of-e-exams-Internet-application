<?php
include 'config.php';
session_start ();

 
?>


<!DOCTYPE HTML>

<html>
	<head>
	
		<?php 
        if (isset($_SESSION["id_student"])==NULL) {
						
			$location="/Ptuxiaki/index.php";
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);			
						
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
					<a  href="profilef.php"> <?php echo "$username"; ?></a>
					<a href="logout.php">Αποσύνδεση</a>
				  </div>
			</div>
		
		</header>
		<aside>
			

			<div id="mySidebar" class="sidebar">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
			<a href="edit_prof.php">Επεξεργασία προφίλ</a>
			<a href="change_password.php">Αλλαγή κωδικού</a>
			<a href="enroll.php">Εγγραφή σε μάθημα</a>
			<a href="st_exam.php">Εξετάσεις μαθημάτων</a>
			</div>
	
		</aside>
		<main>  
			<button class="openbtn" onclick="openNav()">☰ Βασικές επιλογές</button>   
                       
		<div id="myform" style="margin-left:15%;padding:10px 50px;height:1000px;">
			<h3>Εξέταση</h3>
			
	
			<div class="countdown-container" style="width:55%;">
					
					<div class="hours-container">
						<div class="hours"></div>
						<div class="hours-label">Ώρες</div>
					</div>
					
					<div class="minutes-container">
						<div class="minutes"></div>
						<div class="minutes-label">Λεπτά</div>
					</div>
					
					<div class="seconds-container">
						<div class="seconds"></div>
						<div class="seconds-label">Δευτερόλεπτα</div>
					</div>
					
			</div>
			
				<?php
				$exam_array= $_SESSION["ex_array"];
				$max_question=sizeof($exam_array)-1;
				

				$i=$_SESSION["number"];
				if($i==$max_question){
					$location="/Ptuxiaki/profilef.php";
					header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);		
				}

				   $qu=$exam_array[$i];
				   $_SESSION["qu"]=$qu;
                  $query=mysqli_query($conn,"SELECT * FROM question WHERE id_question='$qu'");
                  while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					 $qt=$row["time"]; 
					 $qtime=new DateTime($qt);
					 list($hours, $minutes, $seconds) = explode(":", $qt);
					 $interval = new DateInterval("PT" . $hours . "H" . $minutes . "M" . $seconds . "S");
					 $total=$seconds+(60*$minutes)+(3600*$hours);
                     echo $row["text"];
					

					 if(strcmp($row["type"],"Ελευθέρου κειμένου")==0){
						echo "<form  action='answer.php'  method='post'>";
						echo "<br><textarea id='text' name='text' placeholder='Παρακαλώ εισάγετε την  απάντηση σας.'></textarea>";
						echo "<br>";
						echo "<button type ='submit' name='ek' class='clbtn' value='$qu'>";
						echo "Ορισμός απάντησης";
						echo "</button>";
						echo "</form>";
					 }
					 if(strcmp($row["type"],"True-False")==0){
						echo "<form  action='answer.php'  method='post'>";
						echo " <select id='answer' name='answer'>
						<option value='T'>True</option>
						<option value='F'>False</option>
						</select>";
						echo "<br>";
						echo "<button type ='submit' name='tf' class='clbtn' value='$qu'>";
						echo "Ορισμός απάντησης";
						echo "</button>";
						echo "</form>";
					 }
					 $try=0;
					 if($try==0){
						if($row["type"]=="Multiple Choice"){
							$findidpaf=mysqli_query($conn,"select * from has where  id_question='$qu'");
							while ($row = mysqli_fetch_array($findidpaf, MYSQLI_ASSOC)) {
								$id_paf=$row["id_possibleAnswer"];
								echo "<form  action='answer.php'  method='post'>";
								$findpaf=mysqli_query($conn,"select * from possible_answer where id_possibleAnswer='$id_paf'");
								while ($row = mysqli_fetch_array($findpaf, MYSQLI_ASSOC)) {
									$paf=$row["text"];
									
									echo "<p style='margin-left:30%;'><label class='containerr' for='$paf'> $paf
									<input type='radio' id='$paf' name='paf' value='$paf' disabled>
									<span class='checkmarkr'></span>
									</label><p>";
								}
									
							}
							echo "<br>";
							echo "<button type ='submit' name='mc' class='clbtn' value='$qu'>";
							echo "Ορισμός απάντησης";
							echo "</button>";
							echo "</form>";
							$try=1;
						}
					}
					if($try==0){
						if($row["type"]=="Multiple Choice More"){
							$findidpa=mysqli_query($conn,"select * from has where  id_question='$qu'");
								while ($row = mysqli_fetch_array($findidpa, MYSQLI_ASSOC)) {
									$id_pa=$row["id_possibleAnswer"];
									echo "<form  action='answer.php'  method='post'>";
									$findpa=mysqli_query($conn,"select * from possible_answer where id_possibleAnswer='$id_pa'");
												while ($row = mysqli_fetch_array($findpa, MYSQLI_ASSOC)) {
													$pa=$row["text"];
													echo "<p style='margin-left:30%;'><label class='container' for='$pa'>$pa
													<input type='checkbox' id='$pa' name='pa[]' value='$pa'>
													<span class='checkmark'></span>
													</label><p>";
												
												}
												
								}
								echo "<br>";
								echo "<button type ='submit' name='mcm' class='clbtn' value='$qu'>";
								echo "Ορισμός απάντησης";
								echo "</button>";
								echo "</form>";
								$try=1;
						}
					}
					
                 }

				?>
				
				<a href="examination2.php"><button class="cancelbtn" type="reset">Επόμενη ερώτηση</button></a>
    	        <button type="reset" class="cleanbtn">Καθαρισμός</button>
                <br>


			  </form>
				
			<hr>
			</div>
                     
		</main>
                     
		</main>
		<footer>
		</footer>
	
		<script>
		const countDownClock = (number = 100, format = 'seconds') => {
		
		const d = document;
		
		const hoursElement = d.querySelector('.hours');
		const minutesElement = d.querySelector('.minutes');
		const secondsElement = d.querySelector('.seconds');
		let countdown;
		convertFormat(format);
		
		
		function convertFormat(format) {
			switch(format) {
			case 'seconds':
				return timer(number);
			case 'minutes':
				return timer(number * 60);
				case 'hours':
				return timer(number * 60 * 60);
					
			}
		}

		function timer(seconds) {
			const now = Date.now();
			const then = now + seconds * 1000;

			countdown = setInterval(() => {
			const secondsLeft = Math.round((then - Date.now()) / 1000);

			if(secondsLeft <= 0) {
				clearInterval(countdown);
				window.location.href = "examination2.php";
				return;
			};

			displayTimeLeft(secondsLeft);

			},1000);
		}

		function displayTimeLeft(seconds) {
		
			hoursElement.textContent = Math.floor((seconds % 86400) / 3600);
			minutesElement.textContent = Math.floor((seconds % 86400) % 3600 / 60);
			secondsElement.textContent = seconds % 60 < 10 ? `0${seconds % 60}` : seconds % 60;
		
		}
		}


		/*
		start countdown
		enter number and format
		days, hours, minutes or seconds
		*/
		var total = '<?=$total?>';
		
		countDownClock(total,'seconds');
		</script>
		<script src="assets/js/aside.js"></script>
	</body>
</html>