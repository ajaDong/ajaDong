<?php
session_start();
global $res;
if($_SESSION['uname']=='')
{
 header('Location:login.php');
}
include('includes/db.php');
$id=$_GET['id'];
if(isset($_POST['submit']))
{ 
	
	
	  if($_FILES['image']['name']<>'')
	  {	 	
	  	$ifileext=explode('.',$_FILES['image']['name']);
		$ifileext1=$ifileext[count($ifileext)-1];
		if($ifileext1=='jpg' or $ifileext1=='jpeg' or $ifileext1=='png')
		{
		    $image_file=time().rand(1111,9999).'.'.$ifileext1;
			$itarget2 = "images/";
			$itarget2 = $itarget2.$image_file;
			$query=mysql_query("SELECT * FROM `slider` WHERE `slider_id`='$id'");
			if(mysql_num_rows($query)>0)
			{
				$res=mysql_fetch_object($query);
				$img=$res->image;
				if($img!='')
				{
					$path="images/";
					unlink("$path"."$img");
				}
			}
			move_uploaded_file($_FILES['image']['tmp_name'], $itarget2);
			$target_file = $itarget2.basename($_FILES["image"]["name"]);
		//echo "UPDATE `slider` SET `image`='".$image_file."',`heading`='".$_POST['heading']."',`text`='".$_POST['text']."' WHERE slider_id='$id'";exit;
			$res=mysql_query("UPDATE `slider` SET `image`='".$image_file."',`heading`='".$_POST['heading']."',`text`='".$_POST['text']."' WHERE slider_id='$id'");
			$msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> Succesfully Saved</div>';
		}
		else
			{
				$msg='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> You can upload only Image File in Logo</div>';
			}	
		
	  }
	  else  if($_POST['heading']<>'' && $_POST['text']<>'')
	  {	 	
	  	
			
			$res=mysql_query("UPDATE `slider` SET `heading`='".$_POST['heading']."',`text`='".$_POST['text']."' WHERE slider_id='$id'");
			$msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> Succesfully Saved</div>';
		}
	  else{
	  	$msg='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> something worng happend !!</div>';
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link href="php/ckeditor/_samples/sample.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="plugins/ckfinder/ckfinder.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

 
   <script type="text/javascript">
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image')
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
	  <?php if(isset($msg)){echo $msg;}?>
      <section class="content-header">
        <h1>Edit Slider</h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
Slider        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Enter Details</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
		  <?php
				$prices_query=mysql_query("SELECT * FROM `slider` WHERE `slider_id`='$id'");
			   $key=mysql_fetch_object($prices_query);
						  
			  ?>
          <div class="box-body">
            <form action="" role="form" method="post" enctype="multipart/form-data">
				   <!--<div class="form-group">
                    <label for="exampleInputFile">Logo Title :</label><br>
                    <input type="text" id="logotext" name="logotitle" value="<?php //echo $key->logotitle;?>"/>
                  </div>-->
                <div class="form-group">
                    <label for="exampleInputFile">Slider Image :</label>
                    <input type="file" id="image1" name="image"  onChange="readURL(this);" >
                  </div>
				<div class="controls">
				<div><img  id="image" height="200px" width="200px" src="images/<?php echo $key->image;?>">	<br><br></div>			 <label for="exampleInputFile">Heading</label> </br>
                    <input type="text" id="heading" class="form-control" name="heading" value="<?php echo $key->heading;?>" required> </br>
					
					<label for="exampleInputFile">Text</label> </br>
					<input type="text" id="slider_text" class="form-control"  name="text" value="<?php echo $key->text;?>" required>
                    </div> 
					             
					</div>	  
                <div class="box-footer">
                  <input type="submit" class="btn btn-primary" value="Save" name="submit">
                  &nbsp;&nbsp;
                  <a href="slider"><input type="button" class="btn btn-default" value="Cancel"></a>                </div>
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
  </div>
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
</body>
</html>
