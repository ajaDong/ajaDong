<script>
window.setInterval(function(){ $("#time").load("hh.php");}, 1000);
window.setInterval(function(){ $("#newmsg").load("msg.php");}, 1000);
window.setInterval(function(){ $("#newmsg1").load("msg1.php");}, 1000);
window.setInterval(function(){ $("#newmsg2").load("msg2.php");}, 1000);
</script>

<?php

 $adminsQuery=mysql_query("select * from  admin where usernameAdmin='".$_SESSION['uname']."'");

 $adminsRes=mysql_fetch_object($adminsQuery);

 //print_r($adminsRes);exit;

?>

<style>

#time{ font-size:14px; color:#fff; margin-top:15px;}

</style>
<link href="dist/css/header-top.css" rel="stylesheet">
<nav role="navigation" class="navbar-top">

            <!-- begin BRAND HEADING -->
            <div class="navbar-header">
                <button data-target=".sidebar-collapse" data-toggle="collapse" class="navbar-toggle pull-right" type="button">
                    <i class="fa fa-bars"></i> Menu
                </button>
                <div class="navbar-brand">
                   <a href="index.php" class="logo">

          <!-- mini logo for sidebar mini 50x50 pixels -->

         

          <!-- logo for regular state and mobile devices -->

          <span class="logo-lg" style=" color:#fff;"><b>AjarinDong</b></span>

        </a>
                </div>
            </div>
            <!-- end BRAND HEADING -->

            <div class="nav-top">

                <!-- begin LEFT SIDE WIDGETS -->
                <ul class="nav navbar-left">
                    <li class="tooltip-sidebar-toggle">
                      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> 
    <i class="fa fa-bars"></i>
    <!--<span class="sr-only">Toggle navigation</span>--> 
    
    </a>
                       
                    </li>
                    <li><div  align="center" id="time"></div></li>
                    <!-- You may add more widgets here using <li> -->
                </ul>
                <!-- end LEFT SIDE WIDGETS -->

                <!-- begin MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->

                <ul class="nav navbar-right">

                    <!-- begin MESSAGES DROPDOWN -->
                    <!--<li>
					
                        <a  class="messages2" href="newinbox.php">
                            <i class="fa fa-envelope"></i> 
                            <span class="number" id="newmsg">
								<?php //include('msg.php');?>
							</span>
                        </a>
                        
                        <!-- /.dropdown-menu -->
                    </li>-->
                   
                    <!--<li>
                        <a  class="messages-link " href="newusetrequest.php">
                            <i class="fa fa-tasks"></i>
							<span class="number" id="newmsg1">
								<?php //include('msg1.php');?>
							</span> 
                        </a>
                       

                       
                    </li>-->
					<!--<li>
					
                        <a  class="alerts-link" href="equipmentrequest.php">
                            <i class="fa fa-bell"></i>
							<span class="number" id="newmsg2">
								<?php //include('msg2.php');?>
							</span>
                        </a>
                       
                        <!-- /.dropdown-menu -->
                    </li>-->
                  
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-user"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="editprofile.php">
                                    <i class="fa fa-user"></i> My Profile
                                </a>
                            </li>
                                                        
                           
                            <!--<li>
                                <a href="#">
                                    <i class="fa fa-calendar"></i> My Calendar
                                </a>
                            </li>-->
                            <li class="divider"></li>
                            
                            <li>
                                <a href="logout.php" class="logout_open" data-popup-ordinal="0" id="open_61500915">
                                    <i class="fa fa-sign-out"></i> Logout
                                    <strong><?php echo $adminsRes->nameAdmin;?></strong>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-menu -->
                    </li>
                    <!-- /.dropdown -->
                    <!-- end USER ACTIONS DROPDOWN -->

                </ul>
                <!-- /.nav -->
                <!-- end MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->

            </div>
            <!-- /.nav-top -->
        </nav>