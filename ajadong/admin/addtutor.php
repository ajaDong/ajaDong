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
$chackmail=mysql_query("SELECT * FROM `tutorhighschool` WHERE `emailTutor`='".$_POST['emailTutor']."'");
$chackno=mysql_num_rows($chackmail);
if($chackno==''){

if($_FILES['pictureTutor']['name']<>'')
	  { 
            $ifileext=explode('.',$_FILES['pictureTutor']['name']);
			$ifileext1=$ifileext[count($ifileext)-1];
			$image_file=time().rand(1111,9999).'.'.$ifileext1;
			$itarget2 = "images/";
			$itarget2 = $itarget2.$image_file;
			move_uploaded_file($_FILES['pictureTutor']['tmp_name'], $itarget2);
			$target_file = $itarget2.basename($_FILES["pictureTutor"]["name"]);
			
			$arr=$_POST['courseTutor'];
	                   $count=count($arr);
	                   $arr=implode(",",$arr);
					   if($count>'0' && $arr<>'')
					   {
						$courseTutor=$arr;
						
					   }
					
$insertQuery=mysql_query("INSERT INTO `tutorhighschool`(`firstnameTutor`, `emailTutor`, `passwordTutor`,`universityID`, `profileTutor`, `courseTutor`, `degreeTutor`, `courseScoreTutor`,`pictureTutor`,`statustutlogin`,`type`) VALUES ('".addslashes($_POST['firstnameTutor'])."','".addslashes($_POST['emailTutor'])."','".addslashes($_POST['passwordTutor'])."','".addslashes($_POST['universityID'])."','".addslashes($_POST['profileTutor'])."','$courseTutor','".addslashes($_POST['degreeTutor'])."','".addslashes($_POST['courseScoreTutor'])."','".$image_file."','1','tutor')");

	
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

           Add an Tutor 

          </h1>

          <ol class="breadcrumb">

            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Add an Tutor </li>

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
 					
					   <input type="text" class="form-control" id="userName" pattern="[A-Za-z ]+" name="firstnameTutor" style="width:50%;"   placeholder=" Enter  Name ."required>

					  </div>

		  <div class="form-group">

			<label for="exampleInputPassword1">E-mail id<span>*</span></label><br>

			<input name="emailTutor" class="form-control" type="email" placeholder="Your@e-mail.com" style="width:50%;"  id="emailTutor" value="" onBlur="emailvalidate(this.value)" onFocus="if (this.value != ' ') {this.value = '';}"  required>
			<img src="images/wrong.jpg" title="Email-Id alrady exist." id="msgem" class="emailmsg" style="display:none;height:20px;width:20px"/><img src="images/correct.png" id="msgem1" class="emailmsg" style="display:none;height:20px;width:20px"/>

		  </div>
			<div class="form-group">

			<label for="exampleInputPassword1">Password<span>*</span></label>
			 <input type="password" class="form-control" name="passwordTutor" id="passworduser" style="width:50%;" placeholder="Password Min . 8 characters , one large, one number" onBlur="passvalidate(this.value)" required>

			</div>
			
			<div class="form-group">

			<label for="exampleInputPassword1">Password Confirmation<span>*</span></label>
			 <input type="password" class="form-control" name="cpasswordUser" id="cpasswordUser" style="width:50%;" placeholder="Password Confirmation" onBlur="conformval();" required>
			 

			</div>
			
			<div class="form-group">

			<label for="exampleInputPassword1">University<span>*</span></label>

			
			<select name="universityID" class="form-control" style="width:50%;" onChange="getsubCat(this.value)" required>
                        	<option value="">University</option>
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

			
			<select name="courseTutor[]" multiple="multiple" class="form-control" id="subcategory" style="width:50%;" required>
                        	<option value="">Course</option>
							 
                        </select>

			</div>
			
			<div class="form-group">

			<label for="exampleInputPassword1">Degree<span>*</span></label>
			 
			 <input type="text" class="form-control" pattern="[A-Za-z .,]+" style="width:50%;" name="degreeTutor" placeholder="Degree" required>
			 

			</div>
			
			<div class="form-group">

			<label for="exampleInputPassword1">Your score on that course<span>*</span></label>
			 
			 
			  <input type="text" class="form-control" style="width:50%;" name="courseScoreTutor"  placeholder="Your score on that course" required>
			 

			</div>
			
			<div class="form-group">

			<label for="exampleInputPassword1">Tell us a little bit about your experience in tutoring.<span>*</span></label>
			 
			   <textarea type="text" class="form-control" style="width:50%;" name="profileTutor" placeholder="Tell us a little bit about your experience in tutoring" required></textarea>
			 

			</div>

			
						<div class="form-group">
							  <label for="control-label">Tutor Image</label>
								<input type="file" name="pictureTutor" id="userImage" onChange="readURL(this);" required>
					<div><img id="blah" height="100px" width="100px" >
							  </div>
								</div>

                     <div class="box-footer">

                    <input type="submit" class="btn btn-primary"  id="btnSubmit" value="Submit" name="add">

					&nbsp;&nbsp;&nbsp;<a href="tutor.php"><input type="button" class="btn btn-default" value="back"></a>

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