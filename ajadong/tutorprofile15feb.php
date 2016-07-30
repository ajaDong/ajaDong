<?php 
session_start();
include_once("includes/db.php");
if($_SESSION['userid']=='')
{
header('Location:login.php');
}
if(isset($_POST['update1']))
{

if($_POST['firstnameTutor']<>'' && $_POST['courseTutor']<>'' && $_POST['degreeTutor']<>'')
	  {
	  if($_FILES['pictureTutor']['name']<>''){
	    $ifileext=explode('.',$_FILES['pictureTutor']['name']);
        $ifileext1=$ifileext[count($ifileext)-1];
		
        $image_file=time().rand(1111,9999).'.'.$ifileext1;
        $itarget2 = "images/";
        $itarget2 = $itarget2.$image_file;
        move_uploaded_file($_FILES['pictureTutor']['tmp_name'], $itarget2);
        $target_file = $itarget2.basename($_FILES["pictureTutor"]["name"]); 
		
					   
	   mysql_query("UPDATE `tutorhighschool` SET pictureTutor='".$image_file."' WHERE tutorId='".$_SESSION['userid']."'");
	    $msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> Succesfully Saved</div>';
	   }
	    $arr=$_POST['courseTutor'];
	                   $count=count($arr);
	                   $arr=implode(",",$arr);
					   if($count>'0' && $arr<>'')
					   {
						$courseTutor=$arr;
						
					   }
	   $res=mysql_query("UPDATE `tutorhighschool` SET `firstnameTutor`='".addslashes($_POST['firstnameTutor'])."',`courseTutor`='".$courseTutor."',`degreeTutor`='".addslashes($_POST['degreeTutor'])."' WHERE tutorId='".$_SESSION['userid']."'");
	   
	   $msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> Succesfully Saved</div>';

}
else
{
$msg= '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Failed to save Please try again.</div>';
}
}
if(isset($_POST['update2']))
{
if($_POST['passwordTutor']<>'')
{
$res=mysql_query("UPDATE `tutorhighschool` SET `passwordTutor`='".addslashes($_POST['passwordTutor'])."' WHERE tutorId='".$_SESSION['userid']."'");

$msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> Password Change!</div>';
}
else
{
$msg= '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Failed to save Please try again.</div>';
}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My Dashboard - Ajarin Dong Bro</title>

    <!-- favicon -->
    <link rel="icon" type="image/png" href="images/AjarinDongBroFav-Icon.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Linearicons -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <!-- Custom CSS -->
    <link href="Assets/css/main.css" rel="stylesheet">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,500,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php include_once("functions/tutors.php");?>
  </head>
  <body>
    <!-- navbar -->
    <?php include_once("includes/header.php"); ?>
	 <?php 
			  $queryTut=mysql_query("SELECT ts.*,u.universityName FROM tutorhighschool ts,university u WHERE tutorId='".$_SESSION['userid']."' and ts.universityID=u.universityId and type='tutor'");
			  $resTut=mysql_fetch_object($queryTut);
			  $ui=$resTut->universityID;
			 $ci=$resTut->courseTutor;
			$tarr1=explode(",", $ci);
			
			 
			
			 ?>

    <!-- subject contain (subject details, videos, tutor details) -->
    <section class="my-profile-content no-padding container" id="my-profile">
      <div class="content-inside col-md-12">
        <div class="user-header col-md-12"style="background-image: url('images/student.jpg');">
		 <?php if($resTut->pictureTutor==''){ ?>
          <div class="user-img" style="background-image: url('images/no_image_available.png');"></div>
		  <?php } else {?>
		   <div class="user-img" style="background-image: url('images/<?php echo $resTut->pictureTutor;?>');"></div>
		   <?php }?>
          <div class="user-name"><?php echo $resTut->firstnameTutor;?> - Tutor</div>
          <div class="university-name"><?php echo $resTut->universityName;?></div>
          <div class="jurusan-name"><?php echo $resTut->degreeTutor;?></div>
        </div>
        <div class="user-detail col-md-12">
          <div class="user-detail-bg grey-bg-wrapper">
            <div>

              <!-- Nav tabs -->
              <ul class="user-detail-nav nav nav-tabs" role="tablist">
                <li role="presentation" class="active col-xs-6"><a href="#daftar-pelajaran" aria-controls="home" role="tab" data-toggle="tab"><h4>Course List</h4></a></li>
                <li role="presentation" class="col-xs-6"><a href="#profile-setting" aria-controls="profile" role="tab" data-toggle="tab"><h4>Profile Settings</h4></a></li>
              </ul>

              <!-- Tab panes -->
			 <div class="col-lg-2 col-md-offset-10 text-right"><br>
				  <a href="ebook.php"><button class="go-red-button">Create Chapter</button></a>
				  </div>
              <div class="user-detail-content tab-content">
                <div role="tabpanel" class="tab-pane active daftar-pelajaran" id="daftar-pelajaran">
                  <!--<p>Wahab Lukman belum mendaftar mata kuliah apapun, <a><span>cari mata kuliah</span></a></p>-->
				  
				  <?php 
				 
				  $subjectQuery=mysql_query("SELECT * FROM subjecthighschool WHERE universityID='$ui' ");
				  $subjectCount=mysql_num_rows($subjectQuery);
				  if($subjectCount>0)
					{
					 	while($ressubject=mysql_fetch_object($subjectQuery))
					{
					if(in_array($ressubject->subjectId,$tarr1))
					 {
				  ?>
                  <div class="daftar-pelajaran-content">
                    <a href="MATH1005-terdaftar.php?sbid=<?php echo  base64_encode($ressubject->subjectId);?>"><?php echo $ressubject->subjectCode;?> - <?php echo $resTut->universityName;?></a>
                  </div>
				  <?php }}}?>
                </div>
                <div role="tabpanel" class="tab-pane profile-setting" id="profile-setting">
				 <form action="" method="post" enctype="multipart/form-data">
				 <?php if(isset($msg)){echo $msg;}?>
                  <div class="form-group">
				 <?php if($resTut->pictureTutor==''){ ?>
                    <div class="user-img" style="background-image: url('images/no_image_available.png');"></div>
					<?php } else {?>
					 <div class="user-img" style="background-image: url('images/<?php echo $resTut->pictureTutor;?>');"></div>
					 <?php }?>
                    <label for="profpic">Change profile picture</label>
                    <input type="file" name="pictureTutor" id="exampleInputFile">
                  </div>
                  <div class="form-group">
                    <label for="nama">Name</label>
                    <input type="text" class="form-control" name="firstnameTutor" pattern="[A-Za-z ]+" value="<?php echo $resTut->firstnameTutor;?>" placeholder="New Name">
                  </div>
                  <div class="form-group">
                    <label for="email">University</label>
					
                    <select name="universityID" class="form-control" disabled="disabled"  required>
                        	<option value="">University</option>
							 <?php 
					  $mediaQuery=mysql_query("select * from university");
					  $mediaQueryno=mysql_num_rows($mediaQuery);
					  if($mediaQueryno>0)
					  {
					  while($mediaRes=mysql_fetch_object($mediaQuery))
					  {
					  ?>
					  	<option value="<?php echo $mediaRes->universityId;?>" <?php if($mediaRes->universityId== $resTut->universityID){ echo 'selected="selected"';}?> ><?php echo $mediaRes->universityName;?></option>
						<?php 
					  }
					  }
					  ?>
                        </select>
                  </div>
				  
				  <div class="form-group">
                    <label for="email">Course</label>
                    <select name="courseTutor[]" class="form-control" multiple="multiple"  required>
                        	<option value="">Course</option>
							 <?php 
							
					  $mediaQuery1=mysql_query("select * from subjecthighschool where universityID='$ui'");
					  $mediaQueryno1=mysql_num_rows($mediaQuery1);
					  if($mediaQueryno1>0)
					  {
					  while($mediaRes1=mysql_fetch_object($mediaQuery1))
					  {
					  ?>
					  	<option value="<?php echo $mediaRes1->subjectId;?>" <?php if($mediaRes1->subjectId==$resTut->courseTutor){ echo 'selected="selected"';}?> <?php if(in_array($mediaRes1->subjectId,$tarr1)){ echo 'selected="selected"';}?> ><?php echo $mediaRes1->subjectName;?></option>
						<?php 
					  }
					  }
					  ?>
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="email">Degree</label>
                    <input type="text" class="form-control" name="degreeTutor" value="<?php echo $resTut->degreeTutor;?>" id="exampleInputEmail1" placeholder="New Degree">
                  </div>
                  <div class="go-red-button">
                   <button type="submit" name="update1">Save Changes</button>
                  </div>
				  </form>
				  
                  <div class="new-email">
                    <h4 class="center-text"> E-mail </h4>
                    <div class="form-group">
                      <label for="email">E-mail Address</label>
                      <input type="email" class="form-control" value="<?php echo $resTut->emailTutor;?>" id="exampleInputEmail1" readonly="readonly" >
                    </div>
                    <div class="go-red-button">
                      <a>Not Changes</a>
                    </div>
                  </div>
				  
                  <div class="form-group">
                    <div class="form-group">
                      <h4 class="center-text">Password</h4>
					  <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="password">New Password</label>
                        
						 <input type="password" class="form-control" name="passwordTutor" id="passworduser" placeholder="Password Min . 8 characters , one large, one number" onBlur="passvalidate(this.value)" required>
                        <label for="password">New Password Confirmation</label>
                        <input type="password" class="form-control"  name="cpasswordUser" id="cpasswordUser" placeholder="Password Confirmation" onBlur="conformval();" required>
                      </div>
                      <div class="go-red-button">
                        <button type="submit" name="update2">Save Changes</button>
                      </div>
					  </form>
                    <div class="form-group">
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
	  
    </section>

    <!-- footer -->
    <?php include_once("includes/footer.php"); ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="Assets/js/bootstrap.min.js"></script>

    <!-- Script to Activate colored navbar -->
    <script>
    
    var $document = $(document);

    $document.ready(function() {

        //right-menu sidebar
        $('.navbar-toggle').click(function() {
          $('.navbar-collapse-custom').removeClass('menu-right-push');
          $('.navbar-collapse-custom').addClass('menu-right-pull');
          $('body').addClass('overflow-hidden');
        });

        $('.close-button').click(function() {
          $('.navbar-collapse-custom').removeClass('menu-right-pull');
          $('body').removeClass('overflow-hidden');
          $('.navbar-collapse-custom').addClass('menu-right-push');
        });

    });
    /*
    
    //scroll down navbar script
    var $document = $(document),
        $element = $('header');

    $document.scroll(function() {
        if ($document.scrollTop() >= 1) {
        // user scrolled 50 pixels or more;
        // do stuff
        
        $element.addClass('navbar-default-colored')
        $element.children().children().find("img").addClass('img-colored')
        } else {
        $element.removeClass('navbar-default-colored');
        $element.children().children().find("img").removeClass('img-colored')
        }
    });
    */

    //accordion script
    function toggleChevron(e) {
    $(e.target)
            .prev('.panel-heading')
            .find("i.indicator")
            .toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
    }
    $('#accordion').on('hidden.bs.collapse', toggleChevron);
    $('#accordion').on('shown.bs.collapse', toggleChevron);
    $('#myTabs a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
    </script>
    



  </body>
</html>