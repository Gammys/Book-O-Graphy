<?php
	include "database.php";
	date_default_timezone_set("Asia/Calcutta");
	$date = date('Y-m-d');
	$dueDate=date('Y-m-d', strtotime($date. ' + 7 days'));
	$sql="INSERT INTO book_lending(book_id, card_no, issue_date, due_date) VALUES('{$_GET["id"]}', '{$_GET["cardno"]}', '{$date}','{$dueDate}')";
	$updateCard = "UPDATE card SET no_of_books = no_of_books+1 WHERE card_no =".$_GET["cardno"];
	$setAvbl = "UPDATE book_copies SET avbl = 0 WHERE book_id=".$_GET["id"];
	$cardno=$_GET["cardno"];
	if(($db->query($sql))&&($db->query($updateCard))&&($db->query($setAvbl)))
		echo "<script>window.open('lendBook.php?mes=Book lent&duedate=$dueDate','_self')</script>";
	else
		echo "<script>window.open('lendBook.php','_self')</script>";
?>
