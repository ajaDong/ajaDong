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
	{//print_r($_FILES);print_r($_POST);exit;
	  $res='';
	  if($_FILES['image']['name']<>'' && $_FILES['image']['size']>0)
	  {
	  	//print_r($_FILES);exit;
	    $ifileext=explode('.',$_FILES['image']['name']);
        $ifileext1=$ifileext[count($ifileext)-1];
		
        $image_file=time().rand(1111,9999).'.'.$ifileext1;
        $itarget2 = "images/";
        $itarget2 = $itarget2.$image_file;
        move_uploaded_file($_FILES['image']['tmp_name'], $itarget2);
        $target_file = $itarget2.basename($_FILES["image"]["name"]); 
       
	   $res=mysql_query("UPDATE `houseofbid` SET `heading`='".addslashes($_POST['heading'])."',`discription`='".addslashes($_POST['discription'])."',`image`='".$image_file."' where houseBID_ID='$id'");	
	    
	   }
		 else
	   {
	   	
	  	$res=mysql_query("UPDATE `houseofbid` SET `heading`='".addslashes($_POST['heading'])."',`discription`='".addslashes($_POST['discription'])."' where houseBID_ID='$id'");
		}
		if($res)
		{	
	    $msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> Succesfully Saved</div>';
	    	
	  	}
	  else
		{
	  		$msg= '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Failed to save Please try again.</div>';   
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
        <h1>Edit House Of Bid</h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit House Of Bid</li>
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
            </div>
          </div>
		  <?php
			$prices_query=mysql_query("select * from houseofbid where houseBID_ID='$id'");
			   $key=mysql_fetch_object($prices_query);
						  
			  ?>
          <div class="box-body">
            <form role="form" method="post" enctype="multipart/form-data">
				  
                <div class="form-group">
                    <label for="exampleInputFile">Image :</label>
                    <input type="file" id="image1" name="image" onChange="readURL(this);" >
                  </div>
				<div class="controls">
				<div><img id="image" height="200px" width="200px" src="images/<?php echo $key->image;?>">	<br><br></div>
				<div class="form-group">
                      <label for="exampleInputEmail1">Heading</label>
                      <input type="text" class="form-control" name="heading"  style="width:50%" value="<?php echo $key->heading;?>">
					  
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <textarea class="form-control" id="editor" name="discription"  style="width:50%"><?php echo $key->discription;?></textarea>
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
                    </div>
                <div class="box-footer">
                  <input type="submit" class="btn btn-primary" value="Save" name="submit">
                  &nbsp;&nbsp;
                  <a href="houseofbid"><input type="button" class="btn btn-default" value="Cancel"></a>                </div>
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
