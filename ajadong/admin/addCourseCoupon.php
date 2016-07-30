<?php
session_start();
require_once('phpmail/class.phpmailer.php');
require_once('phpmail/class.smtp.php');
require_once('phpmail/PHPMailerAutoload.php');
global $res;
if($_SESSION['uname']==''){ header('Location:login.php');}include('includes/db.php');

	if(isset($_POST['submit']))
	{
if($_POST['universityId']<>'' && $_POST['courseId']<>'' && $_POST['CouponsNumber']<>'' && $_POST['percentAmount']<>'' )
	  {	
		
	$res=mysql_query("INSERT INTO `courseCoupon`(`universityId`,`courseId`,`CouponsNumber`,`percentAmount`) VALUES('".addslashes($_POST['universityId'])."','".addslashes($_POST['courseId'])."','".addslashes($_POST['CouponsNumber'])."',
	'".addslashes($_POST['percentAmount'])."')");
//---------------------Code dection for mail services while adding course coupon---------------------------	
$site='http://hazmattechnology.com/ajadong';  
 $url="admin@hazmattechnology.com";
 $subject2 ="Account Registered";
 $message3 ='<table width="600" border="0" align="center" cellpadding="0" cellspacing="5" style="border:solid 1px #ccc; padding:6px 20px 20px; background:#eee;"><tr><td align="center"><img src="'.$site.'images/email-logo.png"/></td></tr><tr><td><strong style="font-family:helvetica; font-size:20px; font-weight:lighter;">Dear User,  </strong></td></tr><tr><td><p style="font-family:helvetica; font-size:15px; line-height:24px;"><strong>Congratulation !</strong>  you will get Discounted using coupan no. '.$_POST['CouponsNumber'].'<br><br>You can immediately begin to transact business .</p></td></tr><tr><td align="center"><a href="'.$site.'login.php" style="background:#000; padding:10px; color:#fff; font-size:13px; font-family:arial; text-decoration:none;">log in</a></td></tr></table>';   
 
 $headers2 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 $headers2 .= "From:".' '.$url;
$EmilQuery=mysql_query("SELECT * FROM tutorhighschool WHERE universityID='".$_POST['universityId']."' AND  type='student'");
$EmailCount=mysql_num_rows($EmilQuery);

	if($EmailCount>0)
	{
	while($result=mysql_fetch_object($EmilQuery))
	{
	$mail=$result->emailTutor;
    $res=mail($mail,$subject2,$message3,$headers2);
	 }   
}
//--------------------------------------------------End-----------------------------------------------------		
	
					  
if($res)
{
		$msg='<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> Coupon add succesfully Saved</div>';
		}
		}
		else{
	  		$msg='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Failed to save Please try again.</div>';    } }
			

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
     <script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="plugins/ckfinder/ckfinder.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript">
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		function getsubCat(id)
		{
		//alert(id);
   		$.ajax({
	  	url: "choosecource.php",
	   	data:{cat: id},
	   	type:'POST',
	   	success:function(msgs)
	   	{
		   
		   $("#courseId").html(msgs);
	   	   
	   	}
	   });
  		} 
		
		</script>
		<?php include_once("functions/tutors.php");?>
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
           Add  Course  Coupons        </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add Course  Coupons</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
		  <?php if(isset($msg)){echo $msg;}?>
            <div class="box-header with-border">
              <h3 class="box-title">Enter Details</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
              </div>
            </div>
            <div class="box-body">
              <form role="form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
					<div class="form-group">
                  <label for="exampleInputEmail1">University Name</label>
	  <select name="universityId" id="universityId" class="form-control" onChange="getsubCat(this.value)" style="width:50%;" required>
                        	<option value="">Select</option>
							 <?php 
					  $mediaQuery2=mysql_query("select * from university");
					  $mediaQueryno2=mysql_num_rows($mediaQuery2);
					  if($mediaQueryno2>0)
					  {
					  while($mediaRes2=mysql_fetch_object($mediaQuery2))
					  {
					  ?>
		<option value="<?php echo $mediaRes2->universityId;?>"><?php echo $mediaRes2->universityName;?></option>
						<?php 
					  }
					  }
					  ?>
                        </select>
                    </div>
					
					<div class="form-group">
                  <label for="exampleInputEmail1">course Name</label>
                  <select name="courseId" id="courseId" class="form-control" style="width:50%;" required>
                        	<option value="">Select</option>
							 
                        </select>
                    </div>
					
					<div class="form-group">
                  <label for="exampleInputEmail1">Coupons Number*&nbsp;(Alphabets and numbers only)</label>
                  <input type="text" class="form-control" name="CouponsNumber" id="CouponsNumber" placeholder="Enter Coupons Name" style="width:50%" id="emailTutor111" value="" onBlur="coursecoupon(this.value)" onFocus="if (this.value != ' ') {this.value = '';}"  required  ><img src="images/wrong.jpg" title="Coupone already used ! try another." id="msgem" class="emailmsg" style="display:none;height:20px;width:20px"/><img src="images/correct.png" id="msgem1" class="emailmsg" style="display:none;height:20px;width:20px"/>
				  
				 
                    </div>
					
					<div class="form-group">
                  <label for="exampleInputEmail1">percent amount*&nbsp;(Numeric value only)</label> <br>
                  <input type="text"  id="percentAmount" name="percentAmount" placeholder="ex:20" style="width:50%" required class="numeric" pattern="[0-9]*" placeholder="Numeric value only,ex:25">
                    </div>
					
				
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                  <input type="submit" class="btn btn-primary" value="Save" name="submit">
	 &nbsp;&nbsp;&nbsp;<a href=""><input type="button" class="btn btn-default" name="back" value="Cancel"></a> 
				 </div>
              </form>
            </div><!-- /.box-body -->
            <!-- /.box-footer-->
          </div>
          <!-- /.box -->

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
  
  
  </body>
</html>