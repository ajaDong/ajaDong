<?php
session_start();
if($_SESSION['uname']=='')
{
 header('Location:login');
}
include('includes/db.php');
$did=$_POST['id'];
$query=mysql_query("SELECT * FROM `houseofbid` WHERE `houseBID_ID`='$did'");
if(mysql_num_rows($query)>0)
{
$query1=mysql_query("delete FROM `houseofbid` WHERE `houseBID_ID`='$did'");
$ret="yes";
}
else
{
$ret="no";
}
echo $ret;
 ?>