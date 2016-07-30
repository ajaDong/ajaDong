 <?php
include_once('includes/db.php');
$query=mysql_query("select now() As ss");
$rrt=mysql_fetch_object($query);
?>
<div>Server Time :&nbsp;<?php echo $rrt->ss;?>
</div>
