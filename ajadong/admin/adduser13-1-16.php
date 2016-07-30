<?php
session_start();
global $msg;
if($_SESSION['uname']=='')
{
 header('Location:login');
}
include_once('includes/db.php');
	if(isset($_POST['add']))
	{
$chackmail=mysql_query("SELECT * FROM `usertable` WHERE `userEmail`='".$_POST['userEmail']."'");
$chackno=mysql_num_rows($chackmail);
if($chackno==''){
	
if($_POST['userName']<> '')
		{	
		
		
$insertQuery=mysql_query("INSERT INTO `usertable`(`userName`,`userLastName`,`userEmail`,`regiaterUserName`,`userPassword`,`userTelephone`) VALUES ('".addslashes($_POST['userName'])."','".addslashes($_POST['userLastName'])."','".addslashes($_POST['userEmail'])."','".addslashes($_POST['regiaterUserName'])."','".addslashes($_POST['userPassword'])."','".addslashes($_POST['userTelephone'])."')" );				
			}	
			if($insertQuery>0)
			{
		 $msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> Succesfully Saved</div>';
			}
		else
		{
			$msg= '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Something worng happend !!</div>';
   	
		}
		}
		
		else
		{
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
           Add a User
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add a User</li>
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
			  
					  <div class="form-group">
                      <label for="exampleInputPassword1">First Name<span>*</span></label><br/>
					   <input type="text" class="form-control" id="userName" name="userName" style="width:50%;"   placeholder=" Enter Your Frist Name ."required>
					  </div>
					  
					  <div class="form-group">
                      <label for="exampleInputPassword1">Last Name</label><br/>
					 <input type="text" class="form-control" id="userLastName"  name="userLastName" style="width:50%;"  placeholder=" Enter Your Last Name .">
                      </div>
					  
					  
		  <div class="form-group">
			<label for="exampleInputPassword1">E-mail id<span>*</span></label><br>
			<input name="userEmail" class="form-control" type="email" placeholder="Enter your Email Id" style="width:50%;"  id="emailTutor" value="" onBlur="emailvalidate(this.value)" onFocus="if (this.value != ' ') {this.value = '';}"  required><img src="images/wrong.jpg" title="Email-Id alrady exist." id="msgem" class="emailmsg" style="display:none;height:20px;width:20px"/><img src="images/correct.png" id="msgem1" class="emailmsg" style="display:none;height:20px;width:20px"/>
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">User Name<span>*</span></label><br>
			<input name="regiaterUserName" class="form-control" type="text" placeholder="Enter your Email Id" style="width:50%;"  id="emailTutor1" value="" onBlur="emailvalidate1(this.value)" onFocus="if (this.value != ' ') {this.value = '';}"  required><img src="images/wrong.jpg" title="Username-Id alrady exist." id="msgemu" class="emailmsg" style="display:none;height:20px;width:20px"/><img src="images/correct.png" id="msgem1u" class="emailmsg" style="display:none;height:20px;width:20px"/>
		  </div>
		  
			<div class="form-group">
			<label for="exampleInputPassword1">Password<span>*</span></label>
			<input type="password" class="form-control" id="userPassword" style="width:50%;" name="userPassword" placeholder=" Enter Your  Password" required>
			</div>
			
					<div class="form-group">
				<label for="exampleInputPassword1">Contact Number</label><br>
			<input type="text"  class="form-control" id="telephoneUser" placeholder="Please enter the  telephone number" value="" style="width:50%;" name="userTelephone" onBlur="mobilevalidate(this.value)" onFocus="if (this.value != ' ') {this.value = '';}" required><img src="images/wrong.jpg" title="Phone number worng." id="mw" class="emailmsg" style="display:none;height:20px;width:20px"/><img src="images/correct.png" id="mc" class="emailmsg" style="display:none;height:20px;width:20px"/>
					 </div>
        
    
                      

  
  				  
                     <div class="box-footer">
                    <input type="submit" class="btn btn-primary"  id="btnSubmit" value="Submit" name="add">
					&nbsp;&nbsp;&nbsp;<a href="user.php"><input type="button" class="btn btn-default" value="back"></a>
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