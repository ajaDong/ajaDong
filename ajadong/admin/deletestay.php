<?php
session_start();
if($_SESSION['uname']=='')
{
	header('Location:login.php');
}
include('includes/db.php');
$did=$_POST['id'];
$query=mysql_query("SELECT * FROM `stayupdate` WHERE `stayupdateId`='$did'");
if(mysql_num_rows($query)>0)
{
	$query1=mysql_query("delete FROM `stayupdate` WHERE `stayupdateId`='$did'");
	$ret='yes';
}else
{
	$ret='no';
}
echo $ret;
?>