<?php
include('includes/db.php');
if(isset($_POST['val']) && !empty($_POST['val']))
{
$q=$_POST['val'];
$sql_res=mysql_query("select * from university where universityName like '%$q%' LIMIT 6");
if(mysql_num_rows($sql_res)>0)
{
while($row=mysql_fetch_array($sql_res))
{
?>
<tr>
<td onclick="resultShow('<?php echo $row['universityName'];?>')"><?php echo $row['universityName'];?></td>
<td><?php echo $row['countryName'];?></td>
</tr>

<?php }}
else
{
?>
<?php echo 'No match found';?>
<?php
}
}
else
{
?>
<tr class="display_box" align="left" style="margin-top:2%;">
<td>
<?php echo 'No match found';?>
</td>
</tr>
<?php

}
?>