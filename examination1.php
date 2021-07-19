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
			
			<!-- Sidebar -->
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
                       
		<div id="myform" style="margin-left:25%;padding:10px 50px;height:1000px;">
			<h3>Εξέταση</h3>
			
	
			  
			
				<?php
				$exam_array= $_SESSION["ex_array"];
					$max_questions=sizeof($exam_array)-1;

               //for($i=0;$i<sizeof($exam_array);$i++){
				$i=0;
				$now = new DateTime();
				
				   $qu=$exam_array[$i];
				   $_SESSION["qu"]=$qu;
                  $query=mysqli_query($conn,"SELECT * FROM question WHERE id_question='$qu'");
                  while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					 $qt=$row["time"]; 
					 $qtime=new DateTime($qt);
					 list($hours, $minutes, $seconds) = explode(":", $qt);
					 $interval = new DateInterval("PT" . $hours . "H" . $minutes . "M" . $seconds . "S");
					 $end =$now->add($interval);
					 
                     echo $row["text"];
					

					 if(strcmp($row["type"],"Ελευθέρου κειμένου")==0){
						echo "<br><textarea id='$qu' name='$qu' rows='4' cols='150' placeholder='Παρακαλώ εισάγετε την  απάντηση σας.'></textarea>";
					 }
					 if(strcmp($row["type"],"True-False")==0){
						echo " <select id='answer' name='answer'>
						<option value='T'>True</option>
						<option value='F'>False</option>
						</select>";
					 }
					if($row["type"]=="Multiple Choice More"){
						$findidpa=mysqli_query($conn,"select * from has where  id_question='$qu'");
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
		 			}
					if($row["type"]=="Multiple Choice"){
						$findidpaf=mysqli_query($conn,"select * from has where  id_question='$qu'");
						while ($row = mysqli_fetch_array($findidpaf, MYSQLI_ASSOC)) {
							$id_paf=$row["id_possibleAnswer"];
							$findpaf=mysqli_query($conn,"select * from possible_answer where id_possibleAnswer='$id_paf'");
							while ($row = mysqli_fetch_array($findpaf, MYSQLI_ASSOC)) {
								$paf=$row["text"];
								
								echo "<p style='margin-left:30%;'><label class='containerr' for='$paf'> $paf
								<input type='radio' id='$paf' name='paf' value='$paf' disabled>
								<span class='checkmarkr'></span>
								</label><p>";
							}
						}
					}

                 }

				//   unset($exam_array[$i]); 
        		//   $exam_array=array_values($exam_array);
				  echo "<hr>";
				  if($end<$now){
				  $i++;
				  }


				?>
				<div id="clockdiv">
				<div>
					<span class="days"></span>
					<div class="smalltext">Days</div>
				</div>
				<div>
					<span class="hours"></span>
					<div class="smalltext">Hours</div>
				</div>
				<div>
					<span class="minutes"></span>
					<div class="smalltext">Minutes</div>
				</div>
				<div>
					<span class="seconds"></span>
					<div class="smalltext">Seconds</div>
				</div>
				</div>
			 
			</div>
                     
		</main>
                     
		</main>
		<footer>
		</footer>
		<script >
		function getTimeRemaining(endtime) {
		const total = Date.parse(endtime) - Date.parse(new Date());
		const seconds = Math.floor((total / 1000) % 60);
		const minutes = Math.floor((total / 1000 / 60) % 60);
		const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
		const days = Math.floor(total / (1000 * 60 * 60 * 24));
		
		return {
			total,
			days,
			hours,
			minutes,
			seconds
		};
		}

		function initializeClock(id, endtime) {
		const clock = document.getElementById(id);
		const daysSpan = clock.querySelector('.days');
		const hoursSpan = clock.querySelector('.hours');
		const minutesSpan = clock.querySelector('.minutes');
		const secondsSpan = clock.querySelector('.seconds');

		function updateClock() {
			const t = getTimeRemaining(endtime);

			daysSpan.innerHTML = t.days;
			hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
			minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
			secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

			if (t.total <= 0) {
			clearInterval(timeinterval);
			}
		}

		updateClock();
		const timeinterval = setInterval(updateClock, 1000);
		}

		const deadline = new Date(Date.parse(new Date()) +6 * 60 * 1000);
		initializeClock('clockdiv', deadline);
		</script>

		<script src="assets/js/aside.js"></script>
	</body>
</html>