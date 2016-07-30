<?php 
session_start();

if($_SESSION['uname']=='')

{

 header('Location:login.php');

}
include('includes/db.php');
$num=0; 
$liveQuery1=mysql_query("select * from useequipment where status='$num'");
$liveCount1=mysql_num_rows($liveQuery1);
?>

              
              
              <div class="circle-tile">
                            <a href="equipmentrequest.php">
                                <div class="circle-tile-heading orange">
                                    <i class="fa fa-bell fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content orange">
                                <div class="circle-tile-description text-faded">
                                    Equipments <br>Request
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?php echo $liveCount1;?>
                                </div>
                                <a class="circle-tile-footer" href="equipmentrequest.php">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>