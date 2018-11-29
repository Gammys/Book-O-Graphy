<?php
	session_start();
	include "database.php";
?>

<!DOCTYPE HTML>
<html>

	<head>
		<title>Book-O-Graphy: Admin Login</title>
		<link rel="shortcut icon" href="css/final-logo-cropped.jpg" />
		<link rel = "stylesheet" type = "text/css" href = "css/adminLogin.css" />
		<link href='https://fonts.googleapis.com/css?family=Luckiest Guy' rel = 'stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Acme' rel = 'stylesheet'>
		<style>
			body, pre, button{
				font-family: 'Acme';
			}
		</style>
	</head>
	<body>
		<center><h1 style = "font-family: 'Luckiest Guy'; height: 1.6; font-size: 50pt; color: beige; text-shadow: 3px 3px #C2C2C2; letter-spacing: 3px;"> Book-O-Graphy</h1></center>
		<div class = "loginbox">
			<h1 style = "font-family: 'Acme'; color: wheat;">Login</h1>
			<?php
				if(isset($_POST["submit"])) {
					if($_POST["aname"]==101 && $_POST["apass"]=="bog")
						echo "<script>window.open('adminHome.php','_self')</script>";
					else
						echo "<p class='error'>Invalid Librarian ID or Password.</p>";
				}
			?>
			<form name = "loginform" action = "<?php echo $_SERVER["PHP_SELF"]; ?>" method = "post">
				<div class="textbox">
					<i class="fa fa-id-badge" aria-hidden="true"></i>
					<input type = "text" name = "aname" required placeholder="Librarian ID" style = "font-family: 'Acme'; color: wheat;"><br>
				</div>
				<div class="textbox">
					<i class="fa fa-lock" aria-hidden="true"></i> 
					<input type = "password" name = "apass" required placeholder="Password" style = "font-family: 'Acme'; color: wheat;"> <br><br>
				</div>
				<button type = "submit" name = "submit">Login</button>
			</form>
		</div>
		<footer>
					<pre>
BHARGAVI N A    1RN15CS035
GOUTHAMI S          1RN15CS044
					</pre>
				</footer>
	</body>
</html>
