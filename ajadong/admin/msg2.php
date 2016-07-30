<?php 
session_start();
if($_SESSION['uname']=='')
{
 header('Location:login.php');
}
include('includes/db.php');
$revQuery=mysql_query("select count(*) as ur from useequipment where viewStatus='0' and status='0'");
$countReview=mysql_fetch_array($revQuery)['ur']; 
echo $countReview;
?> 