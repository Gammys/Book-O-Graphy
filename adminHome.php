<?php
	include "database.php";
	include "function.php";
	session_start();
	/*if(!isset($_SESSION["AID"]))
	{
		echo "<script>window.open('user_login.php','_self')</script>";
	} */
?>

<html lang="en">
	<head>
		<title>Book-O-Graphy: Home</title>
		<link rel="shortcut icon" href="css/final-logo-cropped.jpg" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href='https://fonts.googleapis.com/css?family=Luckiest Guy' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Acme' rel='stylesheet'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/styles.css" />
		<style>
			body, button, p {
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
		<div class=row>
			<div id="side-menu" class="side-nav">
				<p>
					<img src="css/final-logo-cropped.jpg" alt="Logo">
					<br> <br>
					Welcome Admin!
				</p>
				<a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
				<a href="existSub.php"><i class="fa fa-user" aria-hidden="true"></i> Existing Subscriber</a>
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
				<ul>
					<li>Number of different books in the library: <?php echo countRecord("SELECT * FROM book_copies", $db); ?>
					<li>Number of subscribers: <?php echo countRecord("SELECT * FROM subscription", $db); ?>
					<li>Return date is 7 days after the Issue date.
				</ul>
			</div>
		</div>
	</body>
</html>
