<?php
session_start();
global $res;
if($_SESSION['uname']=='')
{
 header('Location:login');
}
include('includes/db.php');
	if(isset($_POST['submit']))
	{
	  if($_POST['questionId']<>'' && $_POST['answer']<>'')
	  {	
		
	$res=mysql_query("INSERT INTO `answera`(`questionId`,`answer`) VALUES('".addslashes($_POST['questionId'])."','".addslashes($_POST['answer'])."')");
		}			  
		if($res)
		{
		$msg='<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> succesfully Saved</div>';
	  }
	  
	   else
		{
		 $msg='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Failed to save Please try again.</div>';
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
	<link href="php/ckeditor/_samples/sample.css" rel="stylesheet" type="text/css"/>
     <script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="plugins/ckfinder/ckfinder.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
           Add a New Answer
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Add Answer</li>
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
              <form role="form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
				  <div class="form-group">
                  <label for="exampleInputEmail1">Question</label>
					  <select name="questionId" class="form-control" id="cat" style="width:50%" required>
					  <option value="">Select Question</option>
                       <?php 
					  $state=mysql_query("select * from question");
					  $stateno=mysql_num_rows($state);
					  if($stateno>0)
					  {
					  while($stateRes=mysql_fetch_object($state))
					  {
					  ?>
					  <option value="<?php echo $stateRes->questionId;?>"><?php echo $stateRes->question;?></option>
					<?php 
					  }
					  }
					  ?>
					   </select>
                    </div>
				  <div class="form-group">
                  <label for="exampleInputEmail1">Answer</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="answer" placeholder="Enter Answer Name" style="width:50%" required>
                    </div>
                   
				    </div><!-- /.box-body -->

                  <div class="box-footer">
                  <input type="submit" class="btn btn-primary" value="Save" name="submit">
			     &nbsp;&nbsp;&nbsp;<input type="reset" class="btn btn-default" value="Reset">
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
