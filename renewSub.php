<?php
	include "database.php";
	include "function.php";
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Book-O-Graphy: Renew Subscription</title>
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
		<script type="text/javascript">
			function calc() {
				var dur=parseInt(document.getElementById("duration").value);
				var amt = dur * 100;
				document.getElementById("amount").value = amt;
			}
		</script>
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
				<a href="lendBook.php"><i class="fa fa-plus" aria-hidden="true"></i> Lend a Book</a>
				<a href=# class = "disabled"><i class="fa fa-repeat" aria-hidden="true"></i> Renew Subscription</a>
				<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
				<a href="details.php"><i class="fa fa-info" aria-hidden="true"></i> Project Details</a>
				<footer>
					<pre>
BHARGAVI N A    1RN15CS035
GOUTHAMI S          1RN15CS044
					</pre>
				</footer>
			</div>
			<?php
				if(isset($_POST["submit"])) {
					$cardno=$_POST["cardno"];
					$subdur=$_POST["subdur"];
					$subamt=$_POST["subamt"];
					$sql= "UPDATE subscription SET sub_dur='{$subdur}', sub_amt='{$subamt}' WHERE card_no='{$cardno}'";
					if($db->query($sql))
						echo "<p class='success'>Subscription Renewed!</p>";
					else
						echo "<p class='error'>Could not renew subscription.</p>";
			
				}
			?>
			<div class="main">
				<h3>Renew Subscription</h3>
				<div class="add">
					<form action="" method="post">
						<label>Card No</label>
						<input type="text" name="cardno" required><br>
						<label>Subscription Duration</label>
						<input type="text" name="subdur" id="duration" required>
						<button type="button" name="calcamt" onClick="calc()">Calculate Amount</button><br>
						<label>Amount</label>
						<input type="text" name="subamt" id="amount" readonly><br><br>
						<button type="submit" name="submit">Renew</button>
	  				</form>
				</div>
			</div>
		</div>
	</body>
</html>
