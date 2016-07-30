<?php
include('includes/db.php');
$did=$_POST['id'];
$query=mysql_query("SELECT * FROM `courseVideo` WHERE `videoId`='$did'");
if(mysql_num_rows($query)>0)
{
$res=mysql_fetch_object($query);
$video=$res->video;
if($video<>'')
{
$path="../videos/";
unlink("$path"."$video");
}
$query1=mysql_query("delete FROM `courseVideo` WHERE `videoId`='$did'");
$ret='yes';
}
else
{
$ret='no';
}
echo $ret;
 ?>