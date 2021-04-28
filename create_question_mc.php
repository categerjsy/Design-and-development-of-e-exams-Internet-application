
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

		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
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
					<a href="change_passwordk.php">Αλλαγή κωδικού</a>
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
        <div id="myform" style="margin-left:25%;padding:10px 50px;height:1000px;">
			<h3>Εκχώρηση Multiple Choice ερώτησης</h3>
			
	
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
			    <label for="qtext">Κείμενο Multiple Choice ερώτησης</label> <br>
			    <input type="text" id="qtext" name="qtext" placeholder="Κείμενο Multiple Choice ερώτησης" required>
				<br> 
				<label for="patext">Παρακαλώ εισάγετε πιθανή απάντηση</label> <br>
				<table class="table table-bordered" id="dynamic_field">
				<tr>
					<td><input type="text" name="name[]" placeholder="Eισάγετε απάντηση" class="form-control name_list" /></td>
					<td>&nbsp;<button type="button" name="add" id="add" class="cleanbtn">Προσθέστε απάντηση </button></td>
				</tr>
				</table>

				<label for="difficulty_level">Κατηγορία Μαθήματος</label> <br>
			    <select id="difficulty_level" name="difficulty_level">
			      <option value="easy">Εύκολη</option>
			      <option value="medium">Μέτρια</option>
			      <option value="difficult">Δύσκολη</option>
				</select>
                <br> 
				<label for="chapter">Κεφάλαιο</label>
				<input type="number" id="chapter" name="chapter" min="1"  required>
				<br> 
				<label for="grade">Bαθμόλογηση</label> <br>
			    <input type="text" id="grade" name="grade" placeholder="Bαθμόλογηση" pattern="[0-9]*.[0-9]*"required>
				<br> 
				<label for="ngrade">Αρνητική βαθμόλογηση</label> <br>
			    <input type="text" id="ngrade" name="ngrade" placeholder="Αρνητική βαθμόλογηση" pattern="[0-9]*.[0-9]*" required>
				<br> 
                <label for="time">Παρακαλώ εισάγετε τον χρόνο απάντησης</label> <br>
			    <input type="text" id="time" name="time" placeholder="Χρόνος Απάντησης"required>
				<br> 
				
			   <!--Σωστή απάντηση;;;--> 
				<!--ΤΙΜΕ??????!-->
			    <input type="submit" value="Εισαγωγή Multiple Choice ερώτησης">
				<button class="cancelbtn" type="reset"><a href="create_question.php">Έξοδος</a></button>
                <br>
    	        <button type="reset" class="cleanbtn">Καθαρισμός</button>
                <br>


			  </form>
			</div>
                     
		</main>
		<footer>
		</footer>
		<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Εισάγετε νέα πιθανή απάντηση" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove cancelbtn">Αφαίρεση</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	$('#submit').click(function(){		
		$.ajax({
			url:"name.php",
			method:"POST",
			data:$('#add_name').serialize(),
			success:function(data)
			{
				alert(data);
				$('#add_name')[0].reset();
			}
		});
	});
	
});
</script>
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js" ></script>
        <script src="assets\js\bootstrap-number-input.js" ></script>
        <script src="assets\js\bootstrapSwitch.js" ></script>
		<script src="assets/js/aside.js"></script>
	</body>
</html>