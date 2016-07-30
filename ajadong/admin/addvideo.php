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
	
if($_POST['videoName']<>'' && $_POST['videoDesc']<>'' && $_POST['videoPrice']<>'' && $_FILES['system']['name']<>'' && $_FILES['system']['size']>0)

		{
			$vfileext=explode('.',$_FILES['system']['name']);
			$vfileext1=$vfileext[count($vfileext)-1];
			if($vfileext1=='mp4' or $vfileext1=='m4v' or $vfileext1=='wmv')
   			{
			$video_file=time().rand(1111,9999).'.'.$vfileext1;
			$path="../videos/";
			$vtarget = $path.$video_file;
			move_uploaded_file($_FILES['system']['tmp_name'], $vtarget);
			$v_video = $video_file;
			
			$res=mysql_query("INSERT INTO `courseVideo`(`uiversityID`,`userID`,`courseID`,`videoName`, `video`, `videoType`, `videoDesc`,`videoPrice`,`videoStatus`) VALUES('".addslashes($_POST['uiversityID'])."','".addslashes($_POST['userID'])."','".addslashes($_POST['courseID'])."','".addslashes($_POST['videoName'])."','".$v_video."','".$vfileext1."','".addslashes($_POST['videoDesc'])."','".addslashes($_POST['videoPrice'])."','1')");

			if($res){

				$msg='<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> succesfully Saved</div>';

			}

			else

   			{

   				$msg='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Something worng happend.</div>';   

          }

		}else

   			{

   				$msg='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> You can only upload mp4,m4v or wmv files.</div>';   

          }

			 }

			 else
		{

			$msg='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Something worng happend.</div>';   

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
		   
		   $("#subcategory").html(msgs);
	   	   
	   	}
	   });
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

		

        <section class="content-header">

          <h1>

           Add an Video 

          </h1>

          <ol class="breadcrumb">

            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Add an Video </li>

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

                      <label for="exampleInputPassword1">Video Name<span>*</span></label><br/>
 					
					   <input type="text" class="form-control" id="videoName" name="videoName" style="width:50%;"   placeholder=" Enter Video  Name ."required>

					  </div>
					  <div class="form-group">

			<label for="exampleInputPassword1">Tutor<span>*</span></label>

			
			<select name="userID" class="form-control" style="width:50%;" required>
                        	<option value="">Select</option>
							 <?php 
					  $mediaQuery2=mysql_query("select * from tutorhighschool");
					  $mediaQueryno2=mysql_num_rows($mediaQuery2);
					  if($mediaQueryno2>0)
					  {
					  while($mediaRes2=mysql_fetch_object($mediaQuery2))
					  {
					  ?>
					  	<option value="<?php echo $mediaRes2->tutorId;?>"><?php echo $mediaRes2->firstnameTutor;?></option>
						<?php 
					  }
					  }
					  ?>
                        </select>

			</div>
					  
			<div class="form-group">

			<label for="exampleInputPassword1">University<span>*</span></label>

			
			<select name="uiversityID" class="form-control" style="width:50%;" onChange="getsubCat(this.value)" required>
                        	<option value="">Select</option>
							 <?php 
					  $mediaQuery=mysql_query("select * from university");
					  $mediaQueryno=mysql_num_rows($mediaQuery);
					  if($mediaQueryno>0)
					  {
					  while($mediaRes=mysql_fetch_object($mediaQuery))
					  {
					  ?>
					  	<option value="<?php echo $mediaRes->universityId;?>"><?php echo $mediaRes->universityName;?></option>
						<?php 
					  }
					  }
					  ?>
                        </select>

			</div>
			
			<div class="form-group">

			<label for="exampleInputPassword1">Course<span>*</span></label>

			
			<select name="courseID" id="subcategory" class="form-control" style="width:50%;" required>
                        	<option value="">Select</option>
							 <?php 
					  $mediaQuery1=mysql_query("select * from subjecthighschool");
					  $mediaQueryno1=mysql_num_rows($mediaQuery1);
					  if($mediaQueryno1>0)
					  {
					  while($mediaRes1=mysql_fetch_object($mediaQuery1))
					  {
					  ?>
					  	<option value="<?php echo $mediaRes1->subjectId;?>"><?php echo $mediaRes1->subjectName;?></option>
						<?php 
					  }
					  }
					  ?>
                        </select>

			</div>
			
			
			
			<div class="form-group">

			<label for="exampleInputPassword1">Video Price<span>*</span></label>
			 
			 
			  <input type="text" class="form-control" style="width:50%;" name="videoPrice" pattern="[0-9]+"  placeholder="Video Price" required>
			 

			</div>
			
			<div class="form-group">

			<label for="exampleInputPassword1">Video Desccrption<span>*</span></label>
			 
			   <textarea type="text" class="form-control" style="width:50%;" name="videoDesc" placeholder="Video Desccrption" required></textarea>
			 

			</div>

			
						<div class="form-group">
							  <label for="control-label">Video Image</label>
								
								<input type="file" name="system"/>
					
								</div>

                     <div class="box-footer">

                    <input type="submit" class="btn btn-primary"  id="btnSubmit" value="Submit" name="add">

					&nbsp;&nbsp;&nbsp;<a href="coursevideo.php"><input type="button" class="btn btn-default" value="back"></a>

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