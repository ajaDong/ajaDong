<?php 
session_start();
include_once("includes/db.php");
if($_SESSION['userid']=='')
{
header('Location:login.php');
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
	 //echo "SELECT ts.*,u.universityName FROM tutorhighschool ts,university u WHERE tutorId='".$_SESSION['userid']."' and ts.universityID=u.universityId and type='tutor'";exit;
			  $queryTut=mysql_query("SELECT ts.*,u.universityName FROM tutorhighschool ts,university u WHERE tutorId='".$_SESSION['userid']."' and ts.universityID=u.universityId and type='tutor'");
			  $resTut=mysql_fetch_object($queryTut);
			  $ui=$resTut->universityID;
			 $ci=$resTut->courseTutor;
			$tarr1=explode(",", $ci);
			
			 
			
			 ?>

    <!-- subject contain (subject details, videos, tutor details) -->
    <section class="my-profile-content no-padding container" id="my-profile">
      <div class="content-inside col-md-12">
        <!--<div class="user-header col-md-12"style="background-image: url('images/student.jpg');">
		 <?php if($resTut->pictureTutor==''){ ?>
          <div class="user-img" style="background-image: url('images/no_image_available.png');"></div>
		  <?php } else {?>
		   <div class="user-img" style="background-image: url('images/<?php echo $resTut->pictureTutor;?>');"></div>
		   <?php }?>
          <div class="user-name"><?php echo $resTut->firstnameTutor;?> - Tutor</div>
          <div class="university-name"><?php echo $resTut->universityName;?></div>
          <div class="jurusan-name"><?php echo $resTut->degreeTutor;?></div>
        </div>-->
        <div class="user-detail col-md-12">
          <div class="user-detail-bg grey-bg-wrapper">
            <div>

              <!-- Nav tabs -->
              <ul class="user-detail-nav nav nav-tabs" role="tablist">
                <li role="presentation" class="active col-xs-6"><a href="#daftar-pelajaran" aria-controls="home" role="tab" data-toggle="tab"><h4>Chapter List</h4></a></li>
                
              </ul>

              <!-- Tab panes -->
			 <!--<div class="col-lg-2 col-md-offset-10 text-right"><br>
				  <a href="ebook.php"><button class="go-red-button">Create Chapter</button></a>
				  </div>-->
              <div class="user-detail-content tab-content">
                
                <div role="tabpanel" class="tab-pane active daftar-pelajaran" id="daftar-pelajaran">
				   <?php 
				  //echo "SELECT cv.*,s.*,c.* FROM courseVideo cv,subjecthighschool s,chapterSubject c WHERE cv.userID='".$_SESSION['userid']."' and cv.chapterID=c.chapterId and cv.courseID=s.subjectId";
				  $subjectQuery=mysql_query("SELECT cv.*,s.*,c.* FROM courseVideo cv,subjecthighschool s,chapterSubject c WHERE cv.userID='".$_SESSION['userid']."' and cv.chapterID=c.chapterId and cv.courseID=s.subjectId");
				  $subjectCount=mysql_num_rows($subjectQuery);
				  if($subjectCount>0)
					{
					 	while($ressubject=mysql_fetch_object($subjectQuery))
					{
					
				  ?>
                  <div class="daftar-pelajaran-content">
                    <div class="col-lg-10"><?php echo $ressubject->subjectCode;?> - <?php echo $ressubject->chapterName;?></div>
					<div class="col-lg-2"><a href="editvideo.php?videoid=<?php echo $ressubject->videoId;?>"><button class="go-red-button">Edit</button></a></div>
                    <div class="clearfix"></div>
                  </div>
				  <?php }}else{ echo "No Video";}?>

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
.go-red-button{margin:0;}
</style>

  </body>
</html>