<?php 
session_start();
if($_SESSION['uname']=='')
{
 header('Location:login.php');
}
include('includes/db.php');
$msgQuery1=mysql_query("select count(*) as m from mail_auction where viewStatus='0' and receiveID='0'");
$msgReview1=mysql_fetch_array($msgQuery1)['m'];
echo $msgReview1;
?>
