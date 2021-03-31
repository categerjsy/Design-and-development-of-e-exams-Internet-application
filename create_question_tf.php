
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
		<link rel="stylesheet" href="assets/css/assidenav.css">
		<link rel='shortcut icon' type='image/x-icon' href="photos/uop_logo4_navigation.gif"/><meta name="description" content="UOP Logo"/>		
		<link rel="stylesheet" href="assets/css/lf.css">
	
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
					<a  href="profile.php"> <?php echo "$username"; ?></a>
					<a href="create_lesson.php">Δημιουργία μαθήματος εξέτασης</a>
					<a href="create_question.php">Εισαγωγή ερώτησης σε μάθημα</a>
					<a href="#section-3">Δημιουργία εξέτασης</a>
					<a href="logout.php">Aποσύνδεση</a>
				  </div>
			</div>
		
		</header>
		
		<main>
		<div id="myform">
			<h3>Εκχώρηση True-False ερώτησης</h3>
			
	
			  <form action="" method="post">
			  <label for="course">Παρακαλώ επιλέξτε μάθημα</label> <br>
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
			    <label for="qtext">Κείμενο True-False ερώτησης</label> <br>
			    <input type="text" id="qtext" name="qtext" placeholder="Κείμενο True-False ερώτησης">
				<br> 
				<label for="difficulty_level">Κατηγορία Μαθήματος</label> <br>
			    <select id="difficulty_level" name="difficulty_level">
			      <option value="easy">Εύκολη</option>
			      <option value="medium">Μέτρια</option>
			      <option value="difficult">Δύσκολη</option>
				</select>
                <br> 
				<label for="chapter">Chapter</label>
				<input type="number" id="chapter" name="chapter" min="1" value="1" >
				<br> 
				<label for="grade">Bαθμόλογηση</label> <br>
			    <input type="text" id="grade" name="grade" placeholder="Bαθμόλογηση" pattern="[0-9]*.[0-9]*" >
				<br> 
				<label for="ngrade">Αρνητική βαθμόλογηση</label> <br>
			    <input type="text" id="ngrade" name="ngrade" placeholder="Αρνητική βαθμόλογηση" pattern="[0-9]*.[0-9]*" >
				<br> 
				<label for="answer">Σωστή Απάντηση</label> <br>
			    <select id="answe" name="answer">
			      <option value="T">True</option>
			      <option value="F">False</option>
				</select>
                <br> 
				<!--ΤΙΜΕ??????!-->
			    <input type="submit" value="Εισαγωγή True-False ερώτησης">
			  </form>
			</div>
                     
		</main>
		<footer>
		</footer>
		<script ></script>
	</body>
</html>