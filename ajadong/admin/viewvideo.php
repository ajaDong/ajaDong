<?php 
session_start();
global $msg;
include('includes/db.php');
if($_SESSION['uname']=='')
{
 header('Location:login.php');
}
$id=$_GET['id'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<link href="php/ckeditor/_samples/sample.css" rel="stylesheet" type="text/css"/>
<link href="plugins/ckeditor/_samples/sample.css"  rel="stylesheet" type="text/css" />
<script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="plugins/ckfinder/ckfinder.js"></script>
<!--<script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="plugins/ckfinder/ckfinder.js"></script>-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <?php include_once('includes/header.php');?>
      <!-- Left side column. contains the logo and sidebar -->
      
 		<?php include_once('includes/left.php');?>
      <!-- Content Wrapper. Contains page content -->
      
	  
	  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<?php if(isset($msg)){echo $msg;}?>
        <section class="content-header">
          <h1>
        View Course Video Detail
          </h1> 
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">View Course Video Detail</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">View Details</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
              </div>
            </div>
			  <?php
				$prices_query=mysql_query("SELECT cv.*,u.universityName,s.subjectName,t.firstnameTutor FROM courseVideo cv,university u,subjecthighschool s,tutorhighschool t where cv.uiversityID=u.universityId and cv.courseID=s.subjectId and cv.userID=t.tutorId and cv.videoId='$id'");
			   $key=mysql_fetch_object($prices_query);
			  ?>
			  <form role="form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
				<div class="form-group">
                      <label for="exampleInputEmail1">Course Video</label> <br>
                     
					

											<?php 

											$v_video=$key->video;

											//print_r($BannRes->videoName);

											if(isset($v_video) && $v_video<>''){?>
	 	<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="550" height="300"

      poster=""

      data-setup="{}">

     	<source src="../videos/<?php echo $v_video;?>" type='video/<?php echo $key->videoType;?>' />
  </video>
	   								<?php }else{?>
										NO File
										<?php }?>
												
					
                    </div>
       				<div class="form-group">
					
                      <label for="exampleInputEmail1">Video Name :</label>
                      <?php echo $key->videoName;?>
                    </div>
					
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tutor Name :</label>
                      <?php echo $key->firstnameTutor;?>
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Course Name:</label>
                      <?php echo $key->subjectName;?>
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputEmail1">University Name:</label>
                      <?php echo $key->universityName;?>
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputEmail1">Video Price:</label>
					  
                      <?php if($key->videoPrice<>''){ echo $key->videoPrice;}else { echo "Free";}?>
                    </div> 
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Video Desccrption:</label>
                      <?php echo $key->videoDesc;?>
                    </div>
                  <div class="box-footer">
                  
                   <a href="coursevideo.php"><input type="button" class="btn btn-default" value="back"></a>
                  </div>
                </form>
            
            </div><!-- /.box-body -->
            <!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div>
	  
	  <!-- /.content-wrapper -->
      <?php include_once('includes/footer.php');?>
      
      <!-- Control Sidebar -->      
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>    
    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>    
    
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
	<script type="text/javascript">
//<![CDATA[

CKEDITOR.replace( 'editor',
{
filebrowserBrowseUrl : 'plugins/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : 'plugins/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : 'plugins/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : 'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserFlashUploadUrl : 'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
}
);
//]]>
		</script>
  </body>
</html>