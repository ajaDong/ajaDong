<?php 
include_once('includes/db.php');
session_start();
if($_SESSION['uname']=='')
{
 header('Location:login.php');
}
set_time_limit(3000);
ini_set("memory_limit","620M");
ini_set("upload_max_filesize","600M");
ini_set("post_max_size","600M");
global $res;
if(isset($_POST['add']))
	{
	 
        $uploadDir = 'uploads/';
	     $image='';
		$youtube='';
		$v_video='';

	  if($_FILES['Filedata']['name']<>'' && $_POST['title']<>''  && isset($_POST['media1']) && $_POST['media1']<>'')
	  {
	   
      // Set the allowed file extensions
      $fileTypes = array('jpg', 'jpeg', 'gif', 'png', 'zip', 'xlsx', 'cad', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'pps', 'ppsx', 'odt', 'xls', 'xlsx', '.mp3', 'm4a', 'ogg', 'wav', 'mp4', 'm4v', 'mov', 'wmv'); // Allowed file extensions

    

    if (!empty($_FILES)) 
	{
		
		$tempFile   = $_FILES['Filedata']['tmp_name'];
		//echo $tempFile;
		
		$targetFile = $uploadDir.$_FILES['Filedata']['name'];
		//echo $targetFile;exit;
		
	// Validate the filetype
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	if (in_array(strtolower($fileParts['extension']), $fileTypes)) 
	{
		// Save the file
    	move_uploaded_file($tempFile, $targetFile);
		
		$target_file = $targetFile.basename($_FILES["Filedata"]["name"]);
	    //echo "INSERT INTO `file`(files) VALUES('".$_FILES["Filedata"]["name"]."')";exit;
		$res=mysql_query("INSERT INTO `file`(files) VALUES('".$_FILES["Filedata"]["name"]."')");
  	} 
	
	if($res)
	{
		$msg='<div class="alert alert-success alert-dismissable"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">X</button><h4>
Well Done!! Successfully Saved</div>';
	 }
  
  else {
	  $msg='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> You can upload only jpg,jpeg,gif,png,zip,xlsx,cad,pdf,doc,docx,ppt,pptx,pps,ppsx,odt,xls,xlsx,.mp3,m4a,ogg,wav,mp4,m4v,mov,wmv</div>';
	  }
	 }
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
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
	<style>
#progress-bar {background-color: #12CC1A;height:20px;color: #FFFFFF;width:0%;-webkit-transition: width .3s;-moz-transition: width .3s;transition: width .3s;}
#progress-div {border:#0FA015 1px solid;padding: 5px 0px;margin:30px 0px;border-radius:4px;text-align:center;}
#targetLayer{width:100%;text-align:center;}
</style>
</style>
<link href="ckeditor/_samples/sample.css"  rel="stylesheet" type="text/css" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.form.min.js"></script>

	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.form.min.js"></script>

<script type="text/javascript">
$(document).ready(function() { 
	 $('#uploadForm').submit(function(e) {	
		if($('#userImage').val()) {
			e.preventDefault();
			$('#loader-icon').show();
			$(this).ajaxSubmit({ 
				target:   '#targetLayer', 
				beforeSubmit: function() {
				  $("#progress-bar").width('0%');
				},
				uploadProgress: function (event, position, total, percentComplete){	
					$("#progress-bar").width(percentComplete + '%');
					$("#progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>')
				},
				success:function (){
					$('#loader-icon').hide();
				},
				resetForm: true 
			}); 
			return false; 
		}
	});
}); 

</script>
<script type="text/javascript">
function readURL(input,id) {
//alert(id);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#images'+id)
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }</script>
		<script type="text/javascript" language="javascript">
/*var id=2;
function addmore(){
$('#addmorediv').append('<div id="div'+id+'"><div class="control-group"><label class="control-label">Media</label><div class="controls"><input type="radio" name="media1" value="image" onClick="media(this.value,'+id+')"/>Image &nbsp;<input type="radio" name="media1" value="youtube" onClick="media(this.value,'+id+')"/>Youtube &nbsp;<input type="radio" name="media1" value="system" onClick="media(this.value,'+id+')"/>System Video</div></div><div id="image'+id+'" class="control-group" style="display:none"><label class="control-label">Image File</label><div class="controls"><input type="file" name="image[]"/></div></div><div class="control-group" id="youtube'+id+'" style="display:none"><label class="control-label">Youtube Url</label><div class="controls"><input type="text" name="youtube[]"/></div></div><div class="control-group" id="system'+id+'" style="display:none"><label class="control-label">Video Image</label><div class="controls"><input type="file" name="vid_image[]"/></div><label class="control-label">System file</label><div class="controls"><input type="file" name="system[]"/></div></div><div class="control-group"><div class="controls"><a onClick="removediv('+id+');" class="btn">Remove</a></div></div></div>');
id++;
}
function removediv(id){
$('#youtube'+id).hide();
$('#system'+id).hide();
$('#image'+id).hide();
$('#div'+id).hide();
}*/
function media(nm,id){
if(nm=='image')
{
$('#youtube'+id).hide();
$('#system'+id).hide();
$('#image'+id).show();
}
if(nm=='youtube')
{
$('#image'+id).hide();
$('#system'+id).hide();
$('#youtube'+id).show();
}
if(nm=='system')
{
$('#image'+id).hide();
$('#youtube'+id).hide();
$('#system'+id).show();
}
}
</script>
  </head>
  <body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      
       <?php include_once('includes/header.php');?>
      <!-- Left side column. contains the logo and sidebar -->
      
 		<?php include_once('includes/left.php');?>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<?php if(isset($msg)){echo $msg;}?>
        <section class="content-header">
          <h1>
           Add File Type
		  
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add File Type</li>
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
              <form role="form" method="post" enctype="multipart/form-data" id="uploadForm">
			   <div class="control-group">
			   <label class="control-label">Title</label>
			   <div class="control">
			   <select name="title">
			   <option value="" selected="selected">Select ONE</option>
			   <?php 
			   $cat=mysql_query("select * from filecat");
			   while($catres=mysql_fetch_object($cat))
			   {
			   ?>
			   <option value="<?php echo $catres->filecatname;?>"><?php echo $catres->filecatname;?></option>
			   <?php }?>
			   </select>
			   </div>
			   </div> 
               <div id="div1">
								<div class="control-group">
								<label class="control-label">Media</label>
								<div class="controls">
								<input type="radio" name="media1" value="image" onClick="media(this.value,1)"/>Image &nbsp;
								<input type="radio" name="media1" value="youtube" onClick="media(this.value,1)"/>Youtube &nbsp;
								<input type="radio" name="media1" value="system" onClick="media(this.value,1)"/>System Video
								</div>
								</div>
								<div id="image1" class="control-group" style="display:none">
								<label class="control-label">Image File</label>
								<div class="controls">
								<input type="file" name="image1" onChange="readURL(this,1);"/>
								</div>
								 <div class="controls">
						<img id="images1" style="height:200px;width:200px;"/>
								</div>
								<br/>
								<!--<label class="control-label">Image File</label>
								<div class="controls">
								<input type="file" name="image2" onChange="readURL(this,2);"/>
								</div>
								 <div class="controls">
						<img id="images2" style="height:200px;width:200px;"/>
								</div>
								<br/>
								<label class="control-label">Image File</label>
								<div class="controls">
								<input type="file" name="image3" onChange="readURL(this,3);"/>
								</div>
								 <div class="controls">
						<img id="images3" style="height:200px;width:200px;"/>
								</div>
								<br/>
								<label class="control-label">Image File</label>
								<div class="controls">
								<input type="file" name="image4" onChange="readURL(this,4);"/>
								</div>
								 <div class="controls">
						<img id="images4" style="height:200px;width:200px;"/>
								</div>
								<br/>
								<label class="control-label">Image File</label>
								<div class="controls">
								<input type="file" name="image5" onChange="readURL(this,5);"/>
								</div>
								 <div class="controls">
						<img id="images5" style="height:200px;width:200px;"/>
								</div>
								<br/>
								<label class="control-label">Image File</label>
								<div class="controls">
								<input type="file" name="image6" onChange="readURL(this,6);"/>
								</div>
								 <div class="controls">
						<img id="images6" style="height:200px;width:200px;"/>
								</div>
								<br/>
								<label class="control-label">Image File</label>
								<div class="controls">
								<input type="file" name="image7" onChange="readURL(this,7);"/>
								</div>
								 <div class="controls">
						<img id="images7" style="height:200px;width:200px;"/>
								</div>
								<br/>
								<label class="control-label">Image File</label>
								<div class="controls">
								<input type="file" name="image8" onChange="readURL(this,8);"/>
								</div>
								 <div class="controls">
						<img id="images8" style="height:200px;width:200px;"/>
								</div>
								<br/>
								<label class="control-label">Image File</label>
								<div class="controls">
								<input type="file" name="image9" onChange="readURL(this,9);"/>
								</div>
								 <div class="controls">
						<img id="images9" style="height:200px;width:200px;"/>
								</div>
								<br/>
								<label class="control-label">Image File</label>
								<div class="controls">
								<input type="file" name="image10" onChange="readURL(this,10);"/>
								</div>
								 <div class="controls">
						<img id="images10" style="height:200px;width:200px;"/>
								</div>-->
								<br/>
								</div>
								<div class="control-group" id="youtube1" style="display:none">
								<label class="control-label">Youtube Url</label>
								<div class="controls">
								<input type="text" name="youtube"/>
								</div>
								</div>
								<div class="control-group" id="system1" style="display:none">
								<!--<label class="control-label">Video Image</label>
								<div class="controls">
								<input type="file" name="vid_image"/>
								</div>-->
								<label class="control-label">System file</label>
								<div class="controls">
								<input type="file" name="system"/>
								</div>
								</div>
						
								</div>
                     <!-- /.box-body -->

                  <div class="box-footer">
                    <input type="submit" class="btn btn-primary"  id="btnSubmit" value="Submit" name="add">
					&nbsp;&nbsp;&nbsp;<a href="type.php"><input type="button" class="btn btn-default" value="Cancel" name="submit"></a>
                  </div>
                </form>
				</div>
				
            </div><!-- /.box-body -->
            <!-- /.box-footer-->
         <!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     <?php
	 include('includes/topfooter.php'); 
	 ?>
	 <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

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