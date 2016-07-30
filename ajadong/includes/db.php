<?php

mysql_connect("localhost","root","");

mysql_select_db("ajadong");

$query=mysql_query("select NOW() as aa");

$key=mysql_fetch_object($query);

$sdate=$key->aa;

?>