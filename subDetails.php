<?php
	include "database.php";
	session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
		<title>Book-O-Graphy: Subscriber Details</title>
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
		<div class = row>
			<div id = "side-menu" class = "side-nav">
				<p>
					<img src="css/final-logo-cropped.jpg" alt="Logo">
						<br> <br>
						Welcome Admin!
				</p>
				<a href="adminHome.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
				<a href="lendBook.php"><i class="fa fa-plus" aria-hidden="true"></i> Lend a Book</a>
				<a href="renewSub.php"><i class="fa fa-repeat" aria-hidden="true"></i> Renew Subscription</a>
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
				<h3>Subscriber Details</h3>
				<?php
					if(isset($_GET["mes"])) {
						echo "<p class='success'>".$_GET["mes"]."</p>";
						$_POST["cardno"]=$_GET["cardno"];
					}
					$sql="SELECT * FROM subscription where card_no='{$_POST["cardno"]}'";
					$res=$db->query($sql);
					if($res->num_rows > 0) {
						$sql1="SELECT bl.book_id as BookID, bl.card_no as cardno, b.name as Name, issue_date as IssueDate, due_date as DueDate from book_lending bl, book_copies bc, books b where card_no='{$_POST["cardno"]}' and bl.book_id = bc.book_id and bc.isbn = b.isbn";
						$res1=$db->query($sql1);
						if($res1->num_rows > 0) {
							echo "<table>";
							echo "<tr>";
							echo "<th>Book ID</th>";
							echo "<th>Name</th>";
							echo "<th>Issue Date</th>";
							echo "<th>Due Date</th>";
							echo "<th>Return</th>";
							echo "</tr>";
							while($row=$res1->fetch_assoc()) {
								echo "<tr>";
								echo "<td>{$row["BookID"]}</td>";
								echo "<td>{$row["Name"]}</td>";
								echo "<td>{$row["IssueDate"]}</td>";
								echo "<td>{$row["DueDate"]}</td>";
								echo "<td><a href='returnBook.php?id={$row["BookID"]}&cardno={$row["cardno"]}'>Return</a></td>";
								echo "</tr>";
							}
							echo "</table>";
						}
						else
							echo "<p class='error'>No books to be returned.</p>";
					}
					else
						echo "<script>window.open('existSub.php?mes=No Record Found. Card number does not exist.','_self')</script>";
				?>
			</div>
		</div>
	</body>
</html>
