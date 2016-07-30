<?php
session_start();
if($_SESSION['uname']=='')
{
 header('Location:login.php');
}
include('includes/db.php');
$revQuery1=mysql_query("select count(*) as uc from customer where custStatus='0'");
$countReview1=mysql_fetch_array($revQuery1)['uc']; 
echo $countReview1;
?>