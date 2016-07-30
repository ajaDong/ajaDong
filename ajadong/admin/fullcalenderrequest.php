<?php 
session_start();

if($_SESSION['uname']=='')

{

 header('Location:login.php');

}
include('includes/db.php');

?>

              
              
              <div class="circle-tile">
                            <a href="fullcalender.php">
                                <div class="circle-tile-heading orange">
                                    <i class="fa fa-calendar fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content orange">
                                <div class="circle-tile-description text-faded">
                                    All Events<br> and <br>Trade Show
                                </div>
                                <div class="circle-tile-number text-faded">
                                    
                                </div>
                                <a class="circle-tile-footer" href="fullcalender.php">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>