<?php
session_start();
include("includes/db.php");
$id=base64_decode($_GET['id']);
$cms_query=mysql_query("SELECT * FROM `courseVideo` WHERE `videoId`='$id'");
$obj=mysql_fetch_object($cms_query);
$var=$obj->pdfupload;
?>
<iframe style="height:100%; width:100%;" src="pdf/<?php echo $var; ?>"></iframe>