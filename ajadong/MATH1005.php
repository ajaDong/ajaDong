<?php 
session_start();
include_once("includes/db.php");
$id=base64_decode($_GET['id']);
$sbid=base64_decode($_GET['sbid']);
$viewcount=$_GET['viewcount'];
if(isset($viewcount) && $viewcount<>'')
{
mysql_query("UPDATE subjecthighschool SET videoCount=videoCount+1 WHERE subjectId='$sbid'");
header("Refresh: 0; MATH1005.php?id=".$_GET['id']."&sbid=".$_GET['sbid']);
exit;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ajarin Dong Bro</title>

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
  </head>
  <body id="subject">
    <!-- navbar -->
    <?php include_once("includes/header.php"); ?>
	 <?php
		$appQuery=mysql_query("SELECT cv.*,u.universityName,s.*,t.* FROM courseVideo cv,university u,subjecthighschool s,tutorhighschool t where cv.uiversityID=u.universityId and cv.courseID=s.subjectId and cv.userID=t.tutorId and cv.courseID='$sbid'");
		$appCount=mysql_num_rows($appQuery);
		$appRes=mysql_fetch_object($appQuery);
		$type=$appRes->type;
		?>

    <!-- subject contain (subject details, videos, tutor details) -->
    <section class="content-subject container">
      <div class="content-inside col-md-12">

        <div class="title-header header-padding grey-bg-wrapper col-md-12 container">
          <h1 class="course-name"><?php echo $appRes->subjectCode;?></h1>
          <h3 class="course-description"><?php echo $appRes->subjectName;?></h3>
          <h4 class="university-name"><?php echo $appRes->universityName;?></h4>
          <div class="subject-buttons col-xs-12">
            <div class="col-md-2"></div>
            <div class="daftar-button col-md-4">
			
			<?php 
			$querychapter=mysql_query("SELECT * FROM chapterSubject WHERE userID='".$appRes->tutorId."' and subjectID='$sbid' ORDER BY `chapterSubject`.`shortOrder` ASC");
			$reschapter=mysql_fetch_object($querychapter);
			$queryvideo=mysql_query("SELECT * FROM courseVideo WHERE userID='".$appRes->tutorId."' and courseID='$sbid' and chapterID='".$reschapter->chapterId."'");
			$resvideo=mysql_fetch_object($queryvideo);
			$ownerid=$resvideo->userID;
			$chackpayment=mysql_query("SELECT * FROM paymentHistory WHERE userID='".$_SESSION['userid']."' and subjectID='$sbid'");
			$payRes=mysql_fetch_object($chackpayment);
			$userid=$payRes->userID;
			$subjectid=$payRes->subjectID;
			?>
			<?php
			
			 if($_SESSION['userid']<>'' && $subjectid==$sbid){  ?>
			 <div class="btn-custom full-width succeed">
                  <i class="fa fa-check"></i><p>Already Enrolled</p>
                </div>
			
			<?php }else if($_SESSION['userid']<>'' ){ ?>
              <a href="varifypayvideo.php?videoid=<?php echo base64_encode($resvideo->videoId);?>&sbid=<?php echo base64_encode($sbid);?>">
                <div class="btn-custom full-width">
                  <i class="fa fa-plus"></i><p>Buy Course</p>
                </div>
              </a>
			  <?php } else {?>
			 <a href="login.php?videoid=<?php echo base64_encode($resvideo->videoId);?>">
                <div class="btn-custom full-width">
                  <i class="fa fa-plus"></i><p>Buy Course</p>
                </div>
              </a>
			  <?php }?>
            </div>
            <div class="forum-button col-md-4">
              <a>
                <div class="btn-custom full-width">
                  <i class="fa fa-newspaper-o"></i><p>MATH1005 forum</p>
                </div>
              </a>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>
       
        <div class="description-content-subject grey-bg-wrapper col-md-9">
          <div class="title-wrapper">
            <h4><span class="lnr lnr-highlight"></span>Material</h4>
          </div>
          <div class="course-long-description">
            <p><?php echo $appRes->subjectDesc;?></p>
          </div>
          <div class="accordion-weekly-material">
            <div class="panel-group" id="accordion">
			<?php 
			$querychapter=mysql_query("SELECT * FROM chapterSubject WHERE userID='".$appRes->tutorId."' and subjectID='$sbid' ORDER BY `chapterSubject`.`shortOrder` ASC");
			$countchapter=mysql_num_rows($querychapter);
			if($countchapter>0){
			while ($reschapter=mysql_fetch_object($querychapter))
			{
			$queryvideo=mysql_query("SELECT * FROM courseVideo WHERE userID='".$appRes->tutorId."' and courseID='$sbid' and chapterID='".$reschapter->chapterId."'");
			$resvideo=mysql_fetch_object($queryvideo);
			$ownerid=$resvideo->userID;
			$chackpayment=mysql_query("SELECT * FROM paymentHistory WHERE userID='".$_SESSION['userid']."' and subjectID='$sbid'");
			$payRes=mysql_fetch_object($chackpayment);
			$userid=$payRes->userID;
			$subjectid=$payRes->subjectID;
			
			?>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#materi-1">
                    <h4>
                      Chapter <?php echo $reschapter->shortOrder;?>. <?php echo $reschapter->chapterName;?>
                      
                    </h4>
                  </a>
                </div>
				<?php if($resvideo->priceStatus>0){ ?>
                <i class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>
                <div id="materi-1" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <div class="col-lg-8"><p><?php echo $resvideo->videoName;?></p></div>
					
                    
					<?php 
											$v_video=$resvideo->video;
											//print_r($BannRes->videoName);
											if(isset($v_video) && $v_video<>''){?>
	 	<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="550" height="300"

      poster=""

      data-setup="{}">

     	<source style="margin-top:20px; width:100%; height:365px;" src="videos/<?php echo $v_video;?>" type='video/<?php echo $resvideo->videoType;?>' />
  </video>
	   								<?php }?>
                                    <div class="col-lg-4 text-right">
					
					<a href="viewfile1.php?id=<?php echo base64_encode($resvideo->videoId);?>" target="_blank" class="go-red-button">Cheat Sheet</a>
					
					
					</div>
                  </div>
                </div>
				<?php } else if($_SESSION['userid']<>'' && $subjectid==$sbid){?>
				<div id="materi-1" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <div class="col-lg-6"><p><?php echo $resvideo->videoName;?></p></div>
					<div class="col-lg-6 text-right">
					
					<a href="viewfile1.php?id=<?php echo base64_encode($resvideo->videoId);?>" target="_blank" class="go-red-button">Cheat Sheet</a>
					
					<a class="go-red-button">You pay for Video</a>
					
					</div>
					
					
                    <!--<iframe width="100%" height="360px" style="margin-top:20px;" src="https://www.youtube.com/embed/wfYsiJcVWy0?rel=0&amp;controls=0&amp;showinfo=0&amp;showInfo=0&amp;nologo=1&amp;modestbranding=1" frameborder="0" allowfullscreen></iframe>-->
					<?php 
											$v_video=$resvideo->video;
											//print_r($BannRes->videoName);
											if(isset($v_video) && $v_video<>''){?>
	 	<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="550" height="300"

      poster=""

      data-setup="{}">

     	<source style="margin-top:20px; width:100%; height:365px;" src="videos/<?php echo $v_video;?>" type='video/<?php echo $resvideo->videoType;?>' />
  </video>
	   								<?php }?>
                  </div>
                </div>
				<?php } else if($_SESSION['userid']<>'' && $ownerid==$_SESSION['userid']){?>
				<div id="materi-1" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <div class="col-lg-6"><p><?php echo $resvideo->videoName;?></p></div>
					<div class="col-lg-6 text-right">
					
					<a href="viewfile1.php?id=<?php echo base64_encode($resvideo->videoId);?>" target="_blank" class="go-red-button">Cheat Sheet</a>
					
					<a class="go-red-button">Your Video</a>
					
					</div>
					
					
                    <!--<iframe width="100%" height="360px" style="margin-top:20px;" src="https://www.youtube.com/embed/wfYsiJcVWy0?rel=0&amp;controls=0&amp;showinfo=0&amp;showInfo=0&amp;nologo=1&amp;modestbranding=1" frameborder="0" allowfullscreen></iframe>-->
					<?php 
											$v_video=$resvideo->video;
											//print_r($BannRes->videoName);
											if(isset($v_video) && $v_video<>''){?>
	 	<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="550" height="300"

      poster=""

      data-setup="{}">

     	<source style="margin-top:20px; width:100%; height:365px;" src="videos/<?php echo $v_video;?>" type='video/<?php echo $resvideo->videoType;?>' />
  </video>
	   								<?php }?>
                  </div>
                </div>
				<?php }else if($_SESSION['userid']<>''){
				if($type =='student'){
				?>
				<a href="varifypayvideo.php?videoid=<?php echo base64_encode($resvideo->videoId);?>&sbid=<?php echo base64_encode($sbid);?>"  class="go-red-button">Buy the course to see all videos
and resources</a>
				
				
				
				<?php } }else{?>
                
				<a href="login.php?videoid=<?php echo base64_encode($resvideo->videoId);?>&sbid=<?php echo base64_encode($sbid);?>" class="go-red-button">Buy the course to see all videos
and resources</a>
<?php }?>
              </div>
			  <?php }}?>
             
            </div>
          </div>
        </div>
        
        <div class="tutor-detail brief-subject-detail-fee right-widget col-md-3 col-sm-12">
          <div class="content-inside grey-bg-wrapper col-md-12">
            <div class="title-wrapper">
              <h4><span class="lnr lnr-user"></span>Tutor</h4>
            </div>
            <div class="user-img" style="background-image: url('images/<?php echo $appRes->pictureTutor;?>');"></div>
            <h4><?php echo $appRes->firstnameTutor;?></h4>
            <p><?php echo $appRes->profileTutor;?></p>
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
   

    //accordion script
    function toggleChevron(e) {
    $(e.target)
            .prev('.panel-heading')
            .find("i.indicator")
            .toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
    }
    $('#accordion').on('hidden.bs.collapse', toggleChevron);
    $('#accordion').on('shown.bs.collapse', toggleChevron);
    </script>
    


<style>
.go-red-button{color:#fff;}
.go-red-button:hover{color:#fff;}
</style>
  </body>
</html>