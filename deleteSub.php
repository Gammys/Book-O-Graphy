<?php
	include "database.php";
	include "function.php";
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Book-O-Graphy: Delete Subscriber</title>
		<link rel="shortcut icon" href="css/final-logo-cropped.jpg" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href='https://fonts.googleapis.com/css?family=Luckiest Guy' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Acme' rel='stylesheet'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/styles.css" />
		<style>
			body, button, p, label, input {
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
			<a href="regSub.php"><i class="fa fa-user-plus" aria-hidden="true"></i> New Subscriber</a>
			<a href="adminAddBook.php"><i class="fa fa-book" aria-hidden="true"></i> Add New Book</a>
			<a href=# class="disabled"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete Subscriber</a>
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
			<h3>Delete Subscriber</h3>
			<div class="add">
				<form action="" method="post" class="add">
					<label>Card No</label>
					<input type="text" name="cardno" value="<?php if(isset($_POST["check"])){echo $_POST["cardno"];} else{echo "";} ?>" required>
					<button type="submit" name="check" >Check Issued Books</button>
					<?php
						if(isset($_POST["submit"])) {
							$cardno=$_POST["cardno"];
							$sql="DELETE from subscription where card_no='{$_POST["cardno"]}'";
							if($db->query($sql))
								echo "<p class='success'>Subscriber Deleted.</p>";
							else
								echo "<p class='error'>Could not delete subscriber</p>";
						}
						if(isset($_POST["check"])) {
							$sql = "SELECT * FROM subscription where card_no='{$_POST["cardno"]}'";
							$res=$db->query($sql);
							if($res->num_rows>0) {
							$sql1="SELECT bl.book_id as BookID, b.name as Name, issue_date as IssueDate, due_date as DueDate from book_lending bl, book_copies bc, books b where card_no='{$_POST["cardno"]}' and bl.book_id = bc.book_id and bc.isbn = b.isbn";
							$res1=$db->query($sql1);
								if($res1->num_rows>0){
									echo "<table>";
									echo "<tr>";
									echo "<th>Book ID</th>";
									echo "<th>Name</th>";
									echo "<th>Issue Date</th>";
									echo "<th>Due Date</th>";
									echo "</tr>";
									while($row=$res1->fetch_assoc()) {
										echo "<tr>";
										echo "<td>{$row["BookID"]}</td>";
										echo "<td>{$row["Name"]}</td>";
										echo "<td>{$row["IssueDate"]}</td>";
										echo "<td>{$row["DueDate"]}</td>";
										echo "</tr>";
									}
									echo "</table>";
								}
								else
									echo "<p class='error'>No books to be returned.</p>";
							}
							else
								echo "<p class='error'>No Record Found. Card number does not exist.</p>";
						}
					?>
					<br><br><button type="submit" name="submit">Delete Subscriber</button>
				</form>
			</div>
		</div>
	</body>
</html>
