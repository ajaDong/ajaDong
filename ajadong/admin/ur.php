<?php 
session_start();

if($_SESSION['uname']=='')

{

 header('Location:login.php');

}
include('includes/db.php');

$liveQuery=mysql_query("select * from customer where custStatus='0'");
$liveCount=mysql_num_rows($liveQuery);
?>

              
              
              
              <div class="circle-tile">
                            <a href="newusetrequest.php">
                                <div class="circle-tile-heading green">
                                    <i class="fa fa-calendar fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded">
                                    New Events<br><br>
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?php echo $liveCount;?>
                                </div>
                                <a class="circle-tile-footer" href="newusetrequest.php">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>