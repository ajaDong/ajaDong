<?php 
include_once("includes/db.php");
?>
<header class="navbar navbar-default navbar-default-colored navbar-fixed-top">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed">
          <span class="sr-only">Toggle navigation</span>
          <span class="first-icon-bar icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="third-icon-bar icon-bar"></span>
          <span class="fourth-icon-bar icon-bar"></span>
        </button>
		<?php 
		$logo=mysql_query("SELECT * FROM `logo`");
		$reslogo=mysql_fetch_object($logo);
		?>
        <a href="index.php"><img src="admin/images/<?php echo $reslogo->logoImage;?>" class="navbar-brand" href="#"></a>
      </div>
	  
      <div id="navbar" class="navbar-collapse-custom menu-right-push">
	  <?php if($_SESSION['userid']==''){ ?>
        <ul class="nav navbar-nav navbar-right">
          <span class="mobile-visibility close-button lnr lnr-arrow-right-circle"></span>
		  
		<li><a href="course-index.php"><span class="lnr lnr-pencil"></span>Course</a></li>
          <li><a href="login.php"><span class="lnr lnr-user"></span>Log In</a></li>
          <li><a href="signup.php"><span class="lnr lnr-enter"></span>Sign Up</a></li>
          <li><a href="signup-tutor.php"><span class="lnr lnr-star"></span>Become A Tutor</a></li>
        </ul>
		<?php } else {
		
		$query=mysql_query("SELECT * FROM `tutorhighschool` WHERE tutorId='".$_SESSION['userid']."'");
		$res=mysql_fetch_object($query);
		
		?>
		  
		  <ul class="nav navbar-nav navbar-right">
          <li class="dropdown navbar-border-white container">
            <span class="mobile-visibility close-button lnr lnr-arrow-right-circle"></span>
            <a class="dropdown-toggle">
			<?php if($res->pictureTutor==''){ ?>
			<div class="user-img-nav" style="background-image:url('images/no_image_available.png');"></div>
			<?php }else{?>
			<div class="user-img-nav" style="background-image:url('images/<?php echo $res->pictureTutor;?>');"></div>
			<?php }?>
			<h6><?php echo $res->firstnameTutor;?><span class="caret"></span></h6>
			</a>
            <ul class="dropdown-menu">
			<?php if($res->type=='tutor'){ ?>
              <li><a href="tutorprofile.php"><span class="mobile-visibility lnr lnr-pie-chart"></span>Dashboard</a></li>
			  <!--<li><a href="chaptershow.php"><span class="mobile-visibility lnr lnr-pie-chart"></span>All Chapter</a></li>-->
			  <li><a href="ebook.php"><span class="mobile-visibility lnr lnr-pie-chart"></span>Create Chapter</a></li>
			   <?php }else {?>
			   <li><a href="studentprofile.php"><span class="mobile-visibility lnr lnr-pie-chart"></span>Dashboard</a></li>
			   <?php }?>
              
              <li role="separator" class="divider"></li>
              <li><a href="logout.php"><span class="mobile-visibility lnr lnr-exit"></span>Log Out</a></li>
            </ul>
            <li><a href="course-index.php"><span class="lnr lnr-pencil"></span>Course</a></li>
          </li>
        </ul>
		  
		  
		  <?php }?>
      </div><!--/.nav-collapse -->
	 
    </header>