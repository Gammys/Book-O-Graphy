<?php
	include "database.php";
	session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Book-O-Graphy: Lend a Book</title>
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
				<a href=# class="disabled"><i class="fa fa-plus" aria-hidden="true"></i> Lend a Book</a>
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
				<h3 id="heading">Lend a New Book</h3>
				<div class="add">
					<form action="" method="post">
						<label>Card No</label>
						<input type="text" name="cardno" required>
							<i class="fa fa-search" aria-hidden="true" class="search"></i>
							<button type="submit" name="loadBooks" stye="border: none;" class="search">Search Books</button> 
							<br> <br>
					</form>	 				
					<?php
						if(isset($_GET["mes"])) {
							echo "<p class='success'>".$_GET["mes"]."</p>";
							echo "<p class='success'>Return Book by ".$_GET["duedate"]."</p>";
						}
						if(isset($_POST["loadBooks"])) {
							$cardno=$_POST["cardno"];
							$sql="SELECT * FROM subscription where card_no='{$cardno}'";
							$res=$db->query($sql);
							if($res->num_rows>0) {
								$sql1="SELECT bc.book_id as BookID, b.name as Name, b.a_name as author, c.genre as genre from book_copies bc, books b, category c where bc.isbn = b.isbn and bc.book_id = c.book_id and bc.avbl=1";				
								$res1=$db->query($sql1);
								if($res1->num_rows>0) {
									echo "<table>";
									echo "<tr>";
									echo "<th>Book ID</th>";
									echo "<th>Name</th>";
									echo "<th>Author</th>";
									echo "<th>Genre</th>";
									echo "<th>Lend</th>";
									echo "</tr>";
									while($row=$res1->fetch_assoc()) {
										echo "<tr>";
										echo "<td>{$row["BookID"]}</td>";
										echo "<td>{$row["Name"]}</td>";
										echo "<td>{$row["author"]}</td>";
										echo "<td>{$row["genre"]}</td>";
										echo "<td><a href='lend.php?id={$row["BookID"]}&cardno={$_POST["cardno"]}'>Lend</a></td>";
										echo "</tr>";
									}
									echo "</table>";
								}
								else
									echo "<p class='error'>Lending failed.</p>";
							}
							else
								echo "<p class='error'>No Record Found. Card number does not exist.</p>";
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>
