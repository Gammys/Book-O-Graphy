<?php
	include "database.php";
	include "function.php";
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Book-O-Graphy: New Subscriber</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="css/final-logo-cropped.jpg" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href='https://fonts.googleapis.com/css?family=Luckiest Guy' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Acme' rel='stylesheet'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/styles.css">
		<script>
			function calc() {
			var dur = parseInt(document.getElementById("duration").value);
			var amt = dur * 100;
			document.getElementById("amount").value = amt;
			}
		</script>
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
			<a href="existSub.php"><i class="fa fa-user" aria-hidden="true"></i> Existing Subscriber</a>
			<a href=# class = "disabled"><i class="fa fa-user-plus" aria-hidden="true"></i> New Subscriber</a>
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
			<h3>Add a New Subscriber</h3>
			<?php
				if(isset($_POST["submit"])) {
					$cardno=$_POST["cardno"];
					$name=$_POST["name"];
					$adrs=$_POST["adrs"];
					$phno=$_POST["phno"];
					$subdur=$_POST["subdur"];
					$subamt=$_POST["subamt"];
					$sql = "INSERT INTO subscription (card_no, name, address, phno, sub_dur, sub_amt) VALUES ('{$cardno}','{$name}','{$adrs}','{$phno}','{$subdur}','{$subamt}')";
					$sql1 = "INSERT INTO card (card_no, no_of_books) VALUES ('{$cardno}','0')";
					if($db->query($sql)&&$db->query($sql1))
						echo "<p class='success'>New Subscriber added!</p>";
					else
						echo "<p class='error'>Registration Failed.</p>";
				}
			?>
			<div class="add">
				<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
					<label>Card No</label>
					<input type="text" name="cardno" value="<?php echo getMax("SELECT max(card_no) AS maxno FROM subscription",$db);?>" readonly>
					<label>Name</label>
					<input type="text" name="name" required> <br>
					<label>Address</label>
					<input type="text" name="adrs" required>
					<label>Phone No</label>
					<input type="text" name="phno" required><br>
					<label>Subscription Duration</label><input type="text" name="subdur" id="duration" required>
					<button type="button" name="calcamt" onClick="calc()">Calculate Amount</button> <br>
					<label>Amount</label>
					<input type="text" name="subamt" id="amount" readonly><br><br>
					<button type="submit" name="submit">Add New Subscriber</button>
				</form>
			</div>
		</div>
	</body>
</html>