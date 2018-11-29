<?php
	include "database.php";
	include "function.php";
	session_start();
?>

<!DOCTYPE HTML>
<html>

	<head>
		<title>Book-O-Graphy: Add New Book</title>
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
				<a href="existSub.php"><i class="fa fa-user" aria-hidden="true"></i> Existing Subscriber</a>
				<a href="regSub.php"><i class="fa fa-user-plus" aria-hidden="true"></i> New Subscriber</a>
				<a href=# class = "disabled"><i class="fa fa-book" aria-hidden="true"></i> Add New Book</a>
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
				<h3>Add a New Book</h3>
				<?php
					if(isset($_POST["submit"])) {
						$isbn=$_POST["isbn"];
						$bookid=$_POST["bookid"];
						$bname=$_POST["bname"];
						$author=$_POST["author"];
						$genre=$_POST["genre"];
						$pname=$_POST["pname"];
						$pyear=$_POST["pyear"];
						$sql1="INSERT INTO books(isbn, name, a_name, pb_name, pb_year) VALUES ('{$isbn}', '{$bname}', '{$author}','{$pname}','{$pyear}')";
						$sql2="INSERT INTO book_copies(book_id, isbn) VALUES('{$bookid}', '{$isbn}')";
						$db->query($sql1);
						$db->query($sql2);
						if($genre=="") {
							$genreQuery="SELECT c.genre as genre FROM category c, book_copies bc WHERE isbn ='{$_POST["isbn"]}' AND bc.book_id = c.book_id";
							$res=$db->query($genreQuery);
							if($res->num_rows > 0)
								while($row=$res->fetch_assoc()){
									$insertGenre="INSERT INTO category(book_id, genre) VALUES('{$_POST["bookid"]}', '{$row["genre"]}')";
									$db->query($insertGenre);
								}
						}
						else {
							$sql3="INSERT INTO category(book_id, genre) VALUES('{$bookid}', '{$genre}')";
							$db->query($sql3);
						}
						echo "<p class='success'>Book added successfully.</p>";
					}
					if(isset($_POST["check"])) {
						$sql="SELECT * FROM books where isbn='{$_POST["isbn"]}'";
						$res=$db->query($sql);
						if($res->num_rows > 0)
							echo"<p class='success'>ISBN already exists. Click Add Book.</p>";
						else
							echo"<p class='success'>ISBN does not exist. Enter all the details.</p>";
					}	
				?>
				<div class="add">
					<form action="" method="post" enctype="multipart/form-data">
						<label>ISBN</label> 
						<input type="text" name="isbn" value="<?php if(isset($_POST["check"])){echo $_POST["isbn"];} else{echo "";} ?>"required>
						<button type="submit" name="check">Check</button><br>
						<label>Book ID</label>
						<input type="text" name="bookid" value="<?php echo getMax("SELECT max(book_id) AS maxno FROM book_copies",$db);?>" readonly><br>
						<label>Name</label>
						<input type="text" name="bname">
						<label>Author</label>
						<input type="text" name="author"><br>
						<label>Genre</label>
						<input type="text" name="genre"><br>
						<label>Publisher Name</label>
						<input type="text" name="pname"><br>
						<label>Publisher Year</label>
						<input type="text" name="pyear"><br><br>
						<button type="submit" name="submit">Add Book</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
