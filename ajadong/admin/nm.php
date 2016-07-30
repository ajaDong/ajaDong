<?php 
session_start();

if($_SESSION['uname']=='')

{

 header('Location:login.php');

}
include('includes/db.php');
$num=0; 
$liveQuery2=mysql_query("select * from mail_auction where receiveID='$num' and viewStatus='0'");
$liveCount2=mysql_num_rows($liveQuery2);
?>

              
              
              <div class="circle-tile">
                            <a href="newinbox.php">
                                <div class="circle-tile-heading purple">
                                    <i class="fa fa-comments fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content purple">
                                <div class="circle-tile-description text-faded">
                                   New Messege<br><br>
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?php echo $liveCount2;?>
                                    <span id="sparklineB"><canvas style="display: inline-block; width: 24px; height: 24px; vertical-align: top;" width="24" height="24"></canvas></span>
                                </div>
                                <a class="circle-tile-footer" href="newinbox.php">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>