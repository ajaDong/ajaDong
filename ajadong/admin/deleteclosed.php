<?php
session_start();
if($_SESSION['uname']=='')
{
	header('Location:login.php');
}
include('includes/db.php');
$did=$_POST['id'];

$freebid=mysql_query("SELECT distinct`userId` FROM `productbid` where `productId`='$did'");
$freenum=mysql_num_rows($freebid);
if($freenum>0){
while($freRes=mysql_fetch_object($freebid))
{
$obb1=mysql_query("SELECT * FROM `usertable` where `userId`='".$freRes->userId."'");
$obb1Res=mysql_fetch_object($obb1);
$bidamount=$obb1Res->bidcount;

$ob1=mysql_query("SELECT count(`userId`) as udd FROM `productbid` where `productId`='$did' and `userId`='".$freRes->userId."'");
$ob1Res=mysql_fetch_object($ob1);
$Gbid= $ob1Res->udd;
$total=round($Gbid*1.1)+$bidamount;
 //echo $total;
mysql_query("UPDATE `usertable` SET `bidcount`='".$total."' WHERE `userID`='".$freRes->userId."'");
mysql_query("UPDATE `auction_product_details` SET `relesebid`='0' WHERE `product_id`='$did'");

}$ret='yes';
}
else
{
	$ret='no';
}
echo $ret;

?>