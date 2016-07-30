<?php 
include_once('includes/db.php');
$email = $_REQUEST['email'];
if($_REQUEST['email']!=""){
    	$result = mysql_query("SELECT * FROM  chapterSubject WHERE shortOrder='$email'");
   		if(mysql_num_rows($result)!='')
		{  
		echo "already";
		}
		else
		{
		echo "available";	
		}
		}

?>