<?php
include('includes/db.php');
$did=$_POST['id'];
$query=mysql_query("SELECT * FROM `slider` WHERE `slider_id`='$did'");
if(mysql_num_rows($query)>0)
{
$query1=mysql_query("delete FROM `slider` WHERE `slider_id`='$did'");
$ret="yes";
}
else
{
$ret="no";
}
echo $ret;
 ?>