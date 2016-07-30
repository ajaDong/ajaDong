<?php 
session_start();
include_once("includes/db.php");
if($_SESSION['userid']=='')
{
header('Location:login.php');
}
//print_r($_SESSION);exit;
if(isset($_POST['update1']))
{

if($_POST['firstnameStd']<>'' && $_POST['stuuiversity']<>'' && $_POST['stuDegree']<>'' )
	  {
	  if($_FILES['imageStd']['name']<>''){
	    $ifileext=explode('.',$_FILES['imageStd']['name']);
        $ifileext1=$ifileext[count($ifileext)-1];
		
        $image_file=time().rand(1111,9999).'.'.$ifileext1;
        $itarget2 = "images/";
        $itarget2 = $itarget2.$image_file;
        move_uploaded_file($_FILES['imageStd']['tmp_name'], $itarget2);
        $target_file = $itarget2.basename($_FILES["imageStd"]["name"]); 
		
	   mysql_query("UPDATE `tutorhighschool` SET pictureTutor='".$image_file."' WHERE tutorId='".$_SESSION['userid']."'");
	    $msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> Succesfully Saved</div>';
	   }
	   
	   $res=mysql_query("UPDATE `tutorhighschool` SET `firstnameTutor`='".addslashes($_POST['firstnameStd'])."',`universityID`='".addslashes($_POST['stuuiversity'])."',`degreeTutor`='".addslashes($_POST['stuDegree'])."' WHERE tutorId='".$_SESSION['userid']."'");
	   
	   $msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> Succesfully Saved</div>';

}
else
{
$msg= '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Failed to save Please try again.</div>';
}
}

if(isset($_POST['update2']))
{
if($_POST['passwordStd']<>'')
{
$res=mysql_query("UPDATE `tutorhighschool` SET `passwordTutor`='".addslashes($_POST['passwordStd'])."' WHERE tutorId='".$_SESSION['userid']."'");

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
     <?php include_once("includes/header.php"); 
	 $queryStu=mysql_query("SELECT ut.*,u.universityName FROM tutorhighschool ut,university u WHERE tutorId='".$_SESSION['userid']."' and ut.universityID=u.universityId and type='student'");
	$resStu=mysql_fetch_object($queryStu);
	 
	 ?>

    <!-- subject contain (subject details, videos, tutor details) -->
    <section class="my-profile-content no-padding container" id="my-profile">
      <div class="content-inside col-md-12">
        <div class="user-header col-md-12"style="background-image: url('images/student.jpg');">
		<?php if($resStu->pictureTutor==''){ ?>
          <div class="user-img" style="background-image: url('images/no_image_available.png');"></div>
		  <?php } else{ ?>
		   <div class="user-img" style="background-image: url('images/<?php echo $resStu->pictureTutor;?>');"></div>
		   <?php }?>
          <div class="user-name"><?php echo $resStu->firstnameTutor;?> - Student</div>
          <div class="university-name"><?php echo $resStu->universityName;?></div>
          <div class="jurusan-name"><?php echo $resStu->degreeTutor;?></div>
        </div>
        <div class="user-detail col-md-12">
          <div class="user-detail-bg grey-bg-wrapper">
            <div>

              <!-- Nav tabs -->
              <ul class="user-detail-nav nav nav-tabs" role="tablist">
                <li role="presentation" class="active col-xs-6"><a href="#daftar-pelajaran" aria-controls="home" role="tab" data-toggle="tab"><h4>Your Enrolled Course</h4></a></li>
                <li role="presentation" class="col-xs-6"><a href="#profile-setting" aria-controls="profile" role="tab" data-toggle="tab"><h4>Profile Settings</h4></a></li>
              </ul>

              <!-- Tab panes -->
              <div class="user-detail-content tab-content">
                <div role="tabpanel" class="tab-pane active daftar-pelajaran" id="daftar-pelajaran">
                  <!--<p>Wahab Lukman belum mendaftar mata kuliah apapun, <a><span>cari mata kuliah</span></a></p>-->
				  <?php 
				  $videoQuery=mysql_query("SELECT * FROM paymentHistory WHERE userID='".$_SESSION['userid']."'");
				  $videoCount=mysql_num_rows($videoQuery);
				  if($videoCount>0)
					{
					 	while($resvideo=mysql_fetch_object($videoQuery))
					{
					$videoid=$resvideo->videoID;
					$videoQuery1=mysql_query("SELECT cv.*,s.*,c.* FROM courseVideo cv,subjecthighschool s,chapterSubject c WHERE videoId='$videoid' and cv.courseID=s.subjectId and cv.chapterID=c.chapterId");
					$resvideo1=mysql_fetch_object($videoQuery1);
					
				  ?>
                  <div class="daftar-pelajaran-content">
                    <a><?php echo $resvideo1->subjectName;?> - <?php echo $resvideo1->subjectCode;?></a>
					 <a><?php echo $resvideo1->chapterName;?></a>
                  </div>
				  
				  <div id="materi-1" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <div class="col-lg-8"><p><?php echo $resvideo1->videoName;?></p></div>
					<div class="col-lg-4 text-right">
					
					<a href="viewfile1.php?id=<?php echo base64_encode($resvideo1->videoId);?>" target="_blank" class="go-red-button">Cheat Sheet</a>
					
					
					</div>
					
					
                    <!--<iframe width="100%" height="360px" style="margin-top:20px;" src="https://www.youtube.com/embed/wfYsiJcVWy0?rel=0&amp;controls=0&amp;showinfo=0&amp;showInfo=0&amp;nologo=1&amp;modestbranding=1" frameborder="0" allowfullscreen></iframe>-->
					<?php 
											$v_video=$resvideo1->video;
											//print_r($BannRes->videoName);
											if(isset($v_video) && $v_video<>''){?>
	 	<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="550" height="300"

      poster=""

      data-setup="{}">

     	<source style="margin-top:20px; width:100%; height:365px;" src="videos/<?php echo $v_video;?>" type='video/<?php echo $resvideo1->videoType;?>' />
  </video>
	   								<?php }?>
                  </div>
                </div>
				  
				  <?php }}?>
                  
                </div>
                <div role="tabpanel" class="tab-pane profile-setting" id="profile-setting">
				 <?php if(isset($msg)){echo $msg;}?>
				 <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
				  <?php if($resStu->pictureTutor==''){ ?>
                    <div class="user-img" style="background-image: url('images/no_image_available.png');"></div>
					<?php } else {?>
					<div class="user-img" style="background-image: url('images/<?php echo $resStu->pictureTutor;?>');"></div>
					<?php }?>
					
                    <label for="profpic">Change profile picture</label>
					
                    <input type="file" name="imageStd" id="exampleInputFile">
                  </div>
                  <div class="form-group">
                    <label for="nama">Name</label>
                   
					 <input type="text" class="form-control" name="firstnameStd" pattern="[A-Za-z ]+" value="<?php echo $resStu->firstnameTutor;?>" placeholder="New Name">
                  </div>
                  <div class="form-group">
                    <label for="email">University</label>
                    <select name="stuuiversity" class="form-control" required>
                        	<option value="">University</option>
							 <?php 
					  $mediaQuery=mysql_query("select * from university");
					  $mediaQueryno=mysql_num_rows($mediaQuery);
					  if($mediaQueryno>0)
					  {
					  while($mediaRes=mysql_fetch_object($mediaQuery))
					  {
					  ?>
					  	<option value="<?php echo $mediaRes->universityId;?>" <?php if($mediaRes->universityId== $resStu->universityID){ echo 'selected="selected"';}?> ><?php echo $mediaRes->universityName;?></option>
						<?php 
					  }
					  }
					  ?>
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="email">Degree</label>
                    
					<input type="text" class="form-control" name="stuDegree" value="<?php echo $resStu->degreeTutor;?>" id="exampleInputEmail1" placeholder="New Degree">
                  </div>
                  <div class="go-red-button">
                    <button type="submit" name="update1">Save Changes</button>
                  </div>
				  </form>
                  <div class="new-email">
                    <h4 class="center-text"> E-mail </h4>
                    <div class="form-group">
                      <label for="email"> E-mail</label>
                       <input type="email" class="form-control" value="<?php echo $resStu->emailTutor;?>" id="exampleInputEmail1" readonly >
                     <!-- <label for="email">New E-mail Confirmation</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Jurusan Baru">-->
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
                       <input type="password" class="form-control" name="passwordStd" id="passworduser" placeholder="Password Min . 8 characters , one large, one number" onBlur="passvalidate(this.value)" required>
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
	<style>
.go-red-button{color:#fff;}
.go-red-button:hover{color:#fff;}
</style>
    



  </body>
</html>