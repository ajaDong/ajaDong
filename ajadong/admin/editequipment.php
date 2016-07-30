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
			$image_file=time().rand(1111,9999).'.'.$ifileext1;
			$itarget2 = "images/";
			$itarget2 = $itarget2.$image_file;
			move_uploaded_file($_FILES['image']['tmp_name'], $itarget2);
			$target_file = $itarget2.basename($_FILES["image"]["name"]);


$res=mysql_query("UPDATE `equipment` SET `equipmentname`='".addslashes($_POST['equipmentname'])."',`equipmentPrice`='".addslashes($_POST['equipmentPrice'])."',`equipment_serialnumber`='".addslashes($_POST['equipment_serialnumber'])."',`equipment_Description`='".addslashes($_POST['equipment_Description'])."',`equipment_image`='".$image_file."',`equipment_Manufacturer`='".addslashes($_POST['equipment_Manufacturer'])."',`equipment_quantity`='".addslashes($_POST['equipment_quantity'])."' WHERE equipmentid='$id'");
		
	    if($res)
		{
		$msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> Succesfully Saved</div>';
		}
		}
		
	else if($_POST['equipmentname']<>'' && $_POST['equipment_serialnumber']<>'')

		{
	
		
		
		$res=mysql_query("UPDATE `equipment` SET `equipmentname`='".addslashes($_POST['equipmentname'])."',`equipmentPrice`='".addslashes($_POST['equipmentPrice'])."',`equipment_serialnumber`='".addslashes($_POST['equipment_serialnumber'])."',`equipment_Description`='".addslashes($_POST['equipment_Description'])."',`equipment_Manufacturer`='".addslashes($_POST['equipment_Manufacturer'])."',`equipment_quantity`='".addslashes($_POST['equipment_quantity'])."' WHERE equipmentid='$id'");
			
			if($res)
		{
		$msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> Succesfully Saved</div>';
		}
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

	<link href="jquerydatepick/jquery.datepick.css" rel="stylesheet">

	

<link href="php/ckeditor/_samples/sample.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="plugins/ckfinder/ckfinder.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

 <script type="text/javascript">

function readURL(input,id) {

//alert(id);

            if (input.files && input.files[0]) {

                var reader = new FileReader();



                reader.onload = function (e) {

                    $('#blah'+id)

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

           Edit an Equipment

          </h1>

          <ol class="breadcrumb">

            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Edit an Equipment</li>

          </ol>

        </section>



        <!-- Main content -->

        <section class="content">



          <!-- Default box -->

          <div class="box">

            <div class="box-header with-border">

              <h3 class="box-title">Edit Details</h3>

              <div class="box-tools pull-right">

                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>

                <!--<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->

              </div>

            </div>

			<?php
				$prices_query=mysql_query("select * from equipment where equipmentid='$id'");

			   $key=mysql_fetch_object($prices_query);
			  ?>

            <div class="box-body">

              <form class="form-horizontal" method="post" enctype="multipart/form-data">

			  

			  					<div class="control-group">

  								<label class="control-label">Equipment Name</label><br/>

  								<input type="text" class="form-control" value="<?php echo $key->equipmentname?>" style="width:50%" name="equipmentname" >

  								</div>

								<div class="control-group">

  								<label class="control-label">Serial Number</label><br/>
  								<input type="text" class="form-control" style="width:50%" name="equipment_serialnumber" value="<?php echo $key->equipment_serialnumber?>">
  								</div>

								<div class="control-group">
  								<label class="control-label">Manufacturer Name</label><br/>
  								<input type="text" class="form-control" style="width:50%" name="equipment_Manufacturer" value="<?php echo $key->equipment_Manufacturer?>" >
  								</div>


								<div class="control-group">
  								<label class="control-label">Product Description</label><br/>
<textarea class="form-control" id="editor" name="equipment_Description"  style="width:50%"><?php echo $key->equipment_Description?></textarea>
  								</div>

								<label class="control-label">Image</label><br/>
								<div class="controls">
								<input type="file" name="image" onChange="readURL(this,1);"/>
								</div>
								 <div class="controls">
			<img id="blah1" style="height:200px;width:200px;" src="images/<?php echo $key->equipment_image;?>"/>
								</div>
								
								<div class="control-group">
  								<label class="control-label">Equipment Price</label><br/>
  								$<input type="text" class="form-control" style="width:50%" name="equipmentPrice" value="<?php echo $key->equipmentPrice?>" >
  								</div>
								
									<div class="control-group">
  								<label class="control-label">Equipment Quantity</label><br/>
  								<input type="text" class="form-control" style="width:50%" name="equipment_quantity" value="<?php echo $key->equipment_quantity?>" >
  								</div>
								
						<div class="form-actions">
						<button type="submit" class="btn btn-primary" name="submit">Save changes</button>
						<a href="equipment.php" class="btn btn-primary">Cancel</a>
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

		

		<script src="jquerydatepick/jquery.plugin.js"></script>

<script src="jquerydatepick/jquery.datepick.js"></script>
<script src="jquerydatepick/jquery.timeentry.js"></script>

<script>

$(function() {

	$('#popupDatepicker').datepick({minDate: 0,dateFormat:'yyyy-mm-dd'});

	

});

/*

function showDate(date) {

	alert('The date chosen is ' + date);

}

*/
$('#show24').timeEntry({show24Hours: true});
$('#show24n').timeEntry({show24Hours: true});

</script>

<script>

$(function() {

	$('#popupDatepicker1').datepick({minDate: 0,dateFormat:'yyyy-mm-dd'});

	

});

/*

function showDate(date) {

	alert('The date chosen is ' + date);

}

*/

</script>

  

  

  </body>

</html>