<?php
	include "database.php";
	session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Book-O-Graphy: Existing Subscriber</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="css/final-logo-cropped.jpg" />
		<link href='https://fonts.googleapis.com/css?family=Luckiest Guy' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Acme' rel='stylesheet'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/styles.css">
		<style>
			body, button, p, input, label {
				font-family: 'Acme';
				font-size: 20pt;
			}
			pre {
				font-family: 'Acme';
				font-size: 12pt;
			}
		</style>
	</head>
	<body>
		<div class = row>
			<div id = "side-menu" class = "side-nav">
				<p>
					<img src="css/final-logo-cropped.jpg" alt="Logo">
						<br> <br>
						Welcome Admin!
				</p>
				<a href="adminHome.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
				<a href=# class = "disabled"><i class="fa fa-user" aria-hidden="true"></i> Existing Subscriber</a>
				<a href="regSub.php"><i class="fa fa-user-plus" aria-hidden="true"></i> New Subscriber</a>
				<a href="adminAddBook.php"><i class="fa fa-book" aria-hidden="true"></i> Add New Book</a>
				<a href="deleteSub.php"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete Subscriber</a>
				<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
				<a href="details.php"><i class="fa fa-info" aria-hidden="true"></i> Project Details</a>
				<footer>
					<pre>
BHARGAVI N A    1RN15CS035
GOUTHAMI S          1RN15CS044
					</pre>
				</footer>
			</div>
			<div class="main">
				<h3 id="heading">Existing Subscriber</h3>
				<?php
					if(isset($_POST["loadDeatils"]))
						echo "<script>window.open('subDetails.php','_self')</script>";
					
					if(isset($_GET["mes"])) 
						echo "<p class='success'>".$_GET["mes"]."</p>";
		
				?>
				<div class = "add">
					<form action="subDetails.php" method="post" enctype="multipart/form-data">		
						<label>Card No</label> 
						<input type="text" name="cardno" required>
						<button type="submit" name="loadDeatils">Load Details</button>
	 				</form>
				</div>
  			</div>
		</div>
	</body>
</html>
