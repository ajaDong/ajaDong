<?php 
session_start();
if($_SESSION['uname']=='')
{
 header('Location:login');
}
global $msg;
include('includes/db.php');
//$id=$_GET['id'];
	if(isset($_POST['submit']))
	{//print_r($_FILES);print_r($_POST);exit;
	  $res='';
	  if($_FILES['imageAdmin']['name']<>'' && $_FILES['imageAdmin']['size']>0)
	  {
	  	//print_r($_FILES);exit;
	    $ifileext=explode('.',$_FILES['imageAdmin']['name']);
        $ifileext1=$ifileext[count($ifileext)-1];
		
        $image_file=time().rand(1111,9999).'.'.$ifileext1;
        $itarget2 = "images/";
        $itarget2 = $itarget2.$image_file;
        move_uploaded_file($_FILES['imageAdmin']['tmp_name'], $itarget2);
        $target_file = $itarget2.basename($_FILES["imageAdmin"]["name"]); 

	   $res=mysql_query("UPDATE `admin` SET `usernameAdmin`='".addslashes($_POST['userName'])."',`passwordAdmin`='".addslashes($_POST['password'])."',`emailAdmin`='".addslashes($_POST['emailAdmin'])."',`nameAdmin`='".addslashes($_POST['nameAdmin'])."',`imageAdmin`='".$image_file."' where usernameAdmin='".$_SESSION['uname']."'");	
	    
	   }
		 else
	   {
	
	  	$res=mysql_query("UPDATE `admin` SET `usernameAdmin`='".addslashes($_POST['userName'])."',`passwordAdmin`='".addslashes($_POST['password'])."',`emailAdmin`='".addslashes($_POST['emailAdmin'])."',`nameAdmin`='".addslashes($_POST['nameAdmin'])."' where usernameAdmin='".$_SESSION['uname']."'");
		}
		if($res)
		{	
	    $msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> Succesfully Saved</div>';
	    	$_SESSION['uname']=$_POST['userName'];
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
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script type="text/javascript">
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
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
		
        <section class="content-header">
          <h1>
        Edit Your Profile
          </h1> 
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Profile</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<?php if(isset($msg)){echo $msg;}?>
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Enter Details</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
              </div>
            </div>
			  <?php
						  $prices_query=mysql_query("select * from admin");
						  $prices_queryno=mysql_num_rows($prices_query);
						  if($prices_queryno>0)
						  {
						  while($key=mysql_fetch_object($prices_query))
						  {
						  ?>
            <div class="box-body">
              <form role="form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">User Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="userName" value="<?php echo $key->usernameAdmin;?>" style="width:50%">
                    </div>
					         
					  <div class="form-group">
                      <label for="exampleInputPassword1">Password</label><br/>
                      <input type="password" class="form-control" id="exampleInputEmail1" name="password" value="<?php echo $key->passwordAdmin;?>" style="width:50%">
                    </div>
					  <div class="form-group">
                      <label for="exampleInputemail">Email ID</label><br/>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="emailAdmin" value="<?php echo $key->emailAdmin;?>" style="width:50%">
                    </div>
					  <div class="form-group">
							  <label for="control-label">Profile Image</label>
								<input type="file" name="imageAdmin" id="image" onChange="readURL(this);">
								</div>
				      <div class="controls">
							  	 <div><img  id="blah" height="100px" width="100px" src="images/<?php echo $key->imageAdmin;?>">
							  </div>
							  </div>
					  <div class="form-group">
                      <label for="exampleInputPassword1">Your Name</label><br/>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nameAdmin" value="<?php echo $key->nameAdmin;?>" style="width:50%">
                    </div>
					
					          
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="submit" class="btn btn-primary" value="Save" name="submit">
					&nbsp;&nbsp;&nbsp;<a href="index.php"><input type="button" class="btn btn-default" value="cancel"></a>
                  </div>
				  <?php }}?>
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
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <!-- FastClick -->
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
  </body>
</html>