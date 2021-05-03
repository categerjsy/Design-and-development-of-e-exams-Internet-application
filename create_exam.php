
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
	
		<link type="text/css" href="css/bootstrap.min.css" />
        <link type="text/css" href="css/bootstrap-timepicker.min.css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-timepicker.min.js"></script>
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
		<a href="create_lesson.php">Δημιουργία μαθήματος</a>
		<a href="create_question.php">Εισαγωγή ερώτησης</a>
		<a href="create_exam.php">Δημιουργία εξέτασης</a>
		</div>

	</aside>
	<main>  
		<button class="openbtn" onclick="openNav()">☰ Βασικές επιλογές</button> 
		<!--<div id="myform" style="margin-left:25%;">-->
        <div id="myform" style="margin-left:25%;padding:10px 50px;height:1000px;">
			<h3>Δημιουργία Εξέτασης</h3>
			
	
			  <form action="exam.php" method="post">
			  <label for="course">Παρακαλώ επιλέξτε μάθημα εξέτασης</label> <br>
			  <?php
			   	$idp=$_SESSION["id_professor"];
				   echo "<select id='course' name='course'>";
				   
				   $s = mysqli_query($conn,"select * from create_lesson where id_professor='$idp'");
				   while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
					   $my_lesson=$row["id_lesson"];
					   $findlesson=mysqli_query($conn,"select * from lesson where id_lesson='$my_lesson'");
					   while ($row = mysqli_fetch_array($findlesson, MYSQLI_ASSOC)) {
						$my_l=$row["name"];
						echo "<option value='$my_l'>$my_l</option>";  
					   }
				  }
				  echo "</select>";	 
		
	
				
				?>
                <br> 
					 	   <!--https://www.plus2net.com/php_tutorial/date-selection.php-->
				Ημερομηνία εξέτασης <br>
				<table border="0" cellspacing="0" >

				<tr><td  align=left  >   
				Μήνας
				<select name=month value=''>Select Month</option>
				<option value='01'>Ιανουάριος</option>
				<option value='02'>Φεβρουάριος</option>
				<option value='03'>Μάρτιος</option>
				<option value='04'>Απρίλιος</option>
				<option value='05'>Μάιος</option>
				<option value='06'>Ιούνιος</option>
				<option value='07'>Ιούλιος</option>
				<option value='08'>Αύγουστος</option>
				<option value='09'>Σεπτέμβριος</option>
				<option value='10'>Οκτώβριος</option>
				<option value='11'>Νοέμβριος</option>
				<option value='12'>Δεκέμβριος</option>
				</select>



				</td><td  align=left  >   

				Ημερομηνία<select name=dt >

				<option value='01'>01</option>
				<option value='02'>02</option>
				<option value='03'>03</option>
				<option value='04'>04</option>
				<option value='05'>05</option>
				<option value='06'>06</option>
				<option value='07'>07</option>
				<option value='08'>08</option>
				<option value='09'>09</option>
				<option value='10'>10</option>
				<option value='11'>11</option>
				<option value='12'>12</option>
				<option value='13'>13</option>
				<option value='14'>14</option>
				<option value='15'>15</option>
				<option value='16'>16</option>
				<option value='17'>17</option>
				<option value='18'>18</option>
				<option value='19'>19</option>
				<option value='20'>20</option>
				<option value='21'>21</option>
				<option value='22'>22</option>
				<option value='23'>23</option>
				<option value='24'>24</option>
				<option value='25'>25</option>
				<option value='26'>26</option>
				<option value='27'>27</option>
				<option value='28'>28</option>
				<option value='29'>29</option>
				<option value='30'>30</option>
				<option value='31'>31</option>
				</select>


				</td><td  align=left  >   
				Χρονιά<input type=text  name=year size=4 value=2021>
				</table>

				<br>
				Ώρα Εξέτασης &nbsp;&nbsp;&nbsp;&nbsp;
				<input type=text id="small" name=hours size=2 value=00>
				:
				<input type=text id="small" name=minutes size=2 value=00>
				:
				<input type=text id="small" name=seconds size=2 value=00>
				

				<br>
				Χρόνος Εξέτασης &nbsp;&nbsp;&nbsp;&nbsp;
				<input type=text id="small" name=hourse size=2 value=00>
				:
				<input type=text id="small" name=minutese size=2 value=00>
				:
				<input type=text id="small" name=secondse size=2 value=00>
				

				<br>
			    <input type="submit" value="Δημιουργία Εξέτασης">
				<button class="cancelbtn" type="reset"><a href="create_question.php">Έξοδος</a></button>
            
    	        <button type="reset" class="cleanbtn">Καθαρισμός</button>
                <br>


			  </form>
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