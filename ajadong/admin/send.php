<?php
session_start();
global $msg;
if($_SESSION['userid']=='')
{
 header('Location:login');
}
include_once('includes/db.php');
if(isset($_POST['submit']))
{
if($_POST['subject'] && $_POST['message'] && $_POST['receiveID'])
{
$admin='admin';
$res=mysql_query("INSERT INTO `mail_auction`(`receiveID`, `sendID`, `mailbcc`, `messege`) VALUES ('".addslashes($_POST['receiveID'])."','".$admin."','".addslashes($_POST['subject'])."','".addslashes($_POST['message'])."')");
}
if($res){
	$msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> Succesfully Sent</div>';
}
else{
$msg= '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Something worng happend !!</div>';
}	
}
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
	<link href="jquerydatepick/jquery.datepick.css" rel="stylesheet">
	<link href="php/ckeditor/_samples/sample.css" rel="stylesheet" type="text/css"/>
     <script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="plugins/ckfinder/ckfinder.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<?php include_once("functions/tutors.php");?>

<script type="text/javascript">
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blash')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }</script>
</head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <?php include_once('includes/header.php');?>
      <!-- Left side column. contains the logo and sidebar -->
      
 		<?php include_once('includes/left.php');?>
      <!-- Content Wrapper. Contains page content -->
      
	  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		
        <section class="content-header">
          <h1>
           Send Message
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Send Message</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Enter Details</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
              </div>
            </div>
            <div class="box-body">
			<?php if(isset($msg)){echo $msg;}?>
              <form role="form" method="post" enctype="multipart/form-data" id="uploadForm">
			  
					  			<!--<div class="form-group">
                      			<!--<label for="exampleInputPassword1">From<span>*</span></label>-->
								<!--<input type="hidden" class="form-control" id="userName" name="userName" style="width:50%;" value="houseofbidmail@houseofbid.com"  required>
					  			</div>-->
					  
					  <div class="form-group">
                      <label for="exampleInputPassword1">Employer</label><br/>
					<select name="receiveID" class="form-control" style="width: 50%">
					  			<option value="">Select Employee</option>
					  			<?php 
					 			$mediaQuery=mysql_query("select * from usertable");
					  			$mediaQueryno=mysql_num_rows($mediaQuery);
					  			if($mediaQueryno>0)
					  			{
					 	 		while($mediaRes=mysql_fetch_object($mediaQuery))
					  			{
					  			?>
					  			<option value="<?php echo $mediaRes->userID;?>"><?php echo $mediaRes->regiaterUserName;?></option>
								<?php 
					  			}
					  			}
					  			?>
					  			</select>
                      </div>
					  
					  <div class="form-group">
			<label for="exampleInputPassword1">Subject<span>*</span></label>
			<input type="text" class="form-control" id="userPassword" style="width:50%;" name="subject" placeholder=" Enter Your  Subject." required>
			</div>
			
  			<div class="form-group">
    		<label for="exampleInputPassword1">Message</label>
    		<textarea class="form-control" rows="3" name="message" style="width:50%;" id="editor1"></textarea>
			<script type="text/javascript">
CKEDITOR.replace('editor1',
{
filebrowserBrowseUrl:'plugins/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl:'plugins/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl:'plugins/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl:'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserFlashUploadUrl:'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
}
);
//]]>
		</script>
  			</div>
                     <div class="box-footer">
                    <input type="submit" class="btn btn-primary"  id="btnSubmit" value="Submit" name="submit">
					&nbsp;&nbsp;&nbsp;<a href="send.php"><input type="button" class="btn btn-default" value="back"></a>
                  </div>
                </form>
            </div><!-- /.box-body -->
            <!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div>
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
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    
    <!-- Demo -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
  	
<script src="jquerydatepick/jquery.plugin.js"></script>
<script src="jquerydatepick/jquery.datepick.js"></script>
<script>
$(function() {
	$('#popupDatepicker').datepick({dateFormat:'dd-mm-yyyy'});
	
});
/*
function showDate(date) {
	alert('The date chosen is ' + date);
}
*/
</script>

  
  </body>
</html>