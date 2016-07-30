<?php
session_start();
set_time_limit(1000);
ini_set("memory_limit","320M");
ini_set("upload_max_filesize","100M");
ini_set("post_max_size","200M");
global $msg;
if($_SESSION['uname']=='')
{
 header('Location:login');
}
	include('include/db.php');
 	if(isset($_POST['submit']))
	{
	//echo "<pre>";print_r($_POST);print_r($_FILES);exit;
		$path="videos/";
		$image='';
		$youtube='';
		$v_image='';
		$v_video='';
		if(isset($_POST['title']) && $_POST['title']<>''  && isset($_POST['media1']) && $_POST['media1']<>'')
		{

	if($_POST['media1']=='system' && $_FILES['system']['name']<>'')
	{
		$vfileext=explode('.',$_FILES['system']['name']);
		$vfileext1=$vfileext[count($vfileext)-1];
		$video_file=time().rand(1111,9999).'.'.$vfileext1;
		$vtarget = $path.$video_file;
		move_uploaded_file($_FILES['system']['tmp_name'], $vtarget);
		$v_video = $video_file;
		
		$ifileext=explode('.',$_FILES['vid_image']['name']);
		$ifileext1=$ifileext[count($ifileext)-1];
		$image_file=time().rand(1111,9999).'.'.$ifileext1;
		$itarget = $path.$image_file;
		move_uploaded_file($_FILES['vid_image']['tmp_name'], $itarget);
		$v_image=$image_file;
	}elseif($_POST['media1']=='youtube' && $_POST['youtube']<>'')
	{
		$url=$_POST['youtube'];
		parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars ); 
		$youtube=$my_array_of_vars['v'];
	}elseif($_POST['media1']=='image' && $_FILES['image']['name']<>'')
	{
		$ifileext=explode('.',$_FILES['image']['name']);
		$ifileext1=$ifileext[count($ifileext)-1];
		$image_file=time().rand(1111,9999).'.'.$ifileext1;
		$itarget = $path.$image_file;
		move_uploaded_file($_FILES['image']['tmp_name'], $itarget);
		$image=$image_file;
	}else
	{
	}
	//echo "INSERT INTO `designimage`(`did`, `title`, `image`, `youtube_url`, `vid_image`, `vid_video`) VALUES ('".addslashes($_POST['designer'])."', '".addslashes($_POST['title'])."', '".$image."', '".$youtube."', '".$v_image."', '".$v_video."'"; exit;
	
//echo $image.' i '.$youtube.' y '.$v_image.'  vi '.$v_video.' vv ';exit;
	    $res=mysql_query("INSERT INTO `gallery`(`title`, `gimage`, `youtube_url`, `vid_image`, `vid_video`) VALUES ('".addslashes($_POST['title'])."', '".$image."', '".$youtube."', '".$v_image."', '".$v_video."')");		
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
        <title>Admin</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
		<script type="text/javascript">
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(150)
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
    <body>
        <div class="navbar navbar-fixed-top">
              <?php include('include/header.php');?>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                 <?php include('include/left.php');?>
                <!--/span-->
                <div class="span9" id="content">
                      <!-- morris stacked chart -->
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
						<?php echo $msg;?>
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Gallery</div>
                            </div>
                            <div class="block-content collapse in">
                            <div class="span12">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">									
                                <fieldset>
                                <legend>Add Gallery</legend>
								<div class="control-group">
  								<label class="control-label">Title<span class="required"></span></label>
  								<div class="controls">
  									<select name="title" required="required">
									<option value="" selected="selected">Select One</option>
									<?php 
									$designerquery=mysql_query("SELECT * FROM `events`");
									while($designerres=mysql_fetch_object($designerquery)){
									?>
									<option value="<?php echo $designerres->eventId;?>"><?php echo $designerres->eventName;?></option>
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
								<input type="file" name="image"/>
								</div>
								</div>
								<div class="control-group" id="youtube1" style="display:none">
								<label class="control-label">Youtube Url</label>
								<div class="controls">
								<input type="text" name="youtube"/>
								</div>
								</div>
								<div class="control-group" id="system1" style="display:none">
								<label class="control-label">Video Image</label>
								<div class="controls">
								<input type="file" name="vid_image"/>
								</div>
								<label class="control-label">System file</label>
								<div class="controls">
								<input type="file" name="system"/>
								</div>
								</div>
								<!--<div class="control-group"><div class="controls"><a onClick="removediv(1);" class="btn">Remove</a></div></div>-->
								</div>
								<!--<div id="addmorediv">
								</div>
								<div class="control-group">
								<div class="controls">
								<a class="btn" onClick="addmore()">Add More</a>
								</div>
								</div> -->
							 	<div class="form-actions">
								
                                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                                <a href="gallery.php" class="btn">Cancel</a>
                             	</div>
                            	</fieldset>
							</form>
                            </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
            <hr>
            <footer>
                 <?php include('include/footer.php');?>
            </footer>
        </div>
        <!--/.fluid-container-->       
    </body>
</html>