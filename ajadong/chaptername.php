<?php
session_start();
global $msg;
if($_SESSION['userid']=='')
{
 header('Location:login');
}
include_once('includes/db.php');
//print_r($_SESSION);exit;
	if(isset($_POST['add']))
	{
	
if($_POST['chapterName']<>'' && $_POST['subjectID']<>'' && $_POST['shortOrder']<>'')

		{
			
			$res=mysql_query("INSERT INTO `chapterSubject`(`chapterName`,`subjectID`,`userID`,`shortOrder`) VALUES('".addslashes($_POST['chapterName'])."','".addslashes($_POST['subjectID'])."','".$_SESSION['userid']."','".addslashes($_POST['shortOrder'])."')");

			if($res){

				$msg='<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> succesfully Saved</div>';

			}

			else

   			{

   				$msg='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Something worng happend.</div>';   

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

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Form</title>



    <!-- favicon -->

    <link rel="icon" type="image/png" href="images/AjarinDongBroFav-Icon.png">



    <!-- Bootstrap -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">



    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">



    <!-- Linearicons -->

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">



    <!-- Custom CSS -->

    <link href="Assets/css/main.css" rel="stylesheet">



    <!-- Google Font -->

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,500,700' rel='stylesheet' type='text/css'>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
	<style>
.sandeep{width:100%; border:solid 10px #fbc34b; border-width:0px 0px 10px 0px; color:#fff; background:none; font-size:20px;}
</style>
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
<?php include_once("includes/header.php"); ?>
   <section class="my-profile-content no-padding container" id="my-profile">
      <div class="content-inside col-md-12">
        
        <div class="user-detail col-md-12">
          <div class="user-detail-bg grey-bg-wrapper">
            <div>
            	<div class="content-wrapper">

        <!-- Content Header (Page header) -->
		<h1>Add Video</h1>

        <!-- Main content -->

        <section class="content">
          <!-- Default box -->

          <div class="box">
		  <?php 
		  $query=mysql_query("select * from tutorhighschool where tutorId='".$_SESSION['userid']."'");
		  $res=mysql_fetch_object($query);
		   $ui=$res->universityID;
			 $ci=$res->courseTutor;
			$tarr1=explode(",", $ci);
		  ?>

            

            <div class="box-body">

			<?php if(isset($msg)){echo $msg;}?>

              <form role="form" method="post" enctype="multipart/form-data" id="uploadForm">
			  
			 		 <div class="form-group">

			<label for="exampleInputPassword1">Course<span>*</span></label><br/><br/>

			
			<select name="subjectID"  class="form-control" style="width:50%;" required>
                        	<option value="">Select</option>
							 <?php 
							
					  $mediaQuery1=mysql_query("select * from subjecthighschool where universityID='$ui'");
					
					  $mediaQueryno1=mysql_num_rows($mediaQuery1);
					  if($mediaQueryno1>0)
					  {
					  while($mediaRes1=mysql_fetch_object($mediaQuery1))
					  {
					 if(in_array($mediaRes1->subjectId,$tarr1))
					 {
					  ?>
					  	<option value="<?php echo $mediaRes1->subjectId;?>"><?php echo $mediaRes1->subjectName;?></option>
						<?php 
					  }}
					  }
					  ?>
                        </select><br/><br/>

			</div>

			 		 <div class="form-group">

                      <label for="exampleInputPassword1">Chapter Name<span>*</span></label><br/><br/>
 					
					   <input type="text" class="form-control" id="chapterName" name="chapterName" style="width:50%;"   placeholder=" Enter Chapter  Name ."required><br/><br/>

					  </div>
					  
					  <div class="form-group">

                      <label for="exampleInputPassword1">Short Order<span>*</span></label><br/><br/>
 					
					   <input type="text" pattern="[1-9]+"  class="form-control" id="shortOrder" name="shortOrder" style="width:50%;"   placeholder=" Enter Short Order ."required><br/><br/>

					  </div>

                     <div class="box-footer">

                    <input type="submit" class="go-red-button"  id="btnSubmit" value="Submit" name="add"><br/><br/>
                  </div>

                </form>

            </div><!-- /.box-body -->

            <!-- /.box-footer-->

          </div><!-- /.box -->



        </section><!-- /.content -->

      </div>
            </div>
        </div>
      </div>
	  
    </div></div></section>
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



  <style>#btnSubmit{color:#fff; border:3px solid #943f3f; border-width:0px 0px 3px 0px;}.form-control{width:100% !important;}</style>

  </body>

</html>