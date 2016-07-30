<?php
	include('includes/db.php');
	$id=$_GET['id'];
	if($id<>'')
	{
	  	mysql_query("delete from contacts where contactId='$id'");
		header("Location:contacts.php");
	  }
	  else
	  {
	  	header("Location:error.php");
	  }
?>
