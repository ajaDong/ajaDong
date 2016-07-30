<?php 
include_once("includes/db.php");
$userCount=mysql_query("select count(*) as tu from tutorhighschool where statustutlogin='0'");
$userRes=mysql_fetch_array($userCount)['tu'];
//echo $userRes; 
?>
      <div class="circle-tile">
                            <a href="untutor.php">
                                <div class="circle-tile-heading blue">
                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue">
                                <div class="circle-tile-description text-faded">
                                    Total Decline Tutor<br><br>
                                </div>
								<?php echo $userRes;?>
                                <div class="circle-tile-number text-faded">
                                    
                                    <span id="sparklineA"><canvas style="display: inline-block; width: 29px; height: 24px; vertical-align: top;" width="29" height="24"></canvas></span>
                                </div>
                                <a class="circle-tile-footer" href="untutor.php">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>