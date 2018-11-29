<?php
	include "database.php";
	$sql="DELETE from book_lending where book_id=".$_GET["id"];
	$updateCard = "UPDATE card SET no_of_books = no_of_books-1 WHERE card_no =".$_GET["cardno"];
	$setAvbl = "UPDATE book_copies SET avbl = 1 WHERE book_id=".$_GET["id"];
	$cardno=$_GET["cardno"];
	if(($db->query($sql))&&($db->query($updateCard))&&($db->query($setAvbl)))
	{
		echo "<script>window.open('subDetails.php?mes=Book Returned&cardno=$cardno','_self')</script>";
	}
	else
	{
		echo "<script>window.open('subDetails.php','_self')</script>";
	}
?>
