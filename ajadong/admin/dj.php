<?php
	session_start();
	if($_SESSION['uname']=='')
{
header('location:login.php');
}
 	include_once('includes/db.php');
	global $id;
	
 	if(isset($_GET['id']))
{
$id=$_GET['id'];
	if($_GET['name']=='e')
	{
			mysql_query("update dj set difeatured='1' where djId='$id'");
	}
	else if($_GET['name']=='d')
	{
		mysql_query("update dj set difeatured='0' where djId='$id'");
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>
		function deletebanner(id)
		{
		
	    var x = confirm("Are you sure you want to delete?");
		if (x)
	    {
		
         $.ajax({type:'POST',url:'deletebanner.php',data:{id:id},success:function(result){
		 if(result=='yes')
		 {
		 alert("Banner File has been deleted successfully");
		 $('#sessiondiv'+id).hide();
		 }else
		 {
		 alert("Invalid Seletion");
		 }
		 
}});
}
      else
		alert("Not Deleted");
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
           Banner
          </h1>
          <ol class="breadcrumb">
            <li><a href="adddj.php">
<button class="btn bg-navy btn-flat margin" style="margin-top: -2%">Add a DJ </button></a></li>
            
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <!-- /.box -->

              <div class="box">
                <div class="box-header">
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
       
                        <th>Name</th>
						 <th>Country</th>
						  <th>Phone</th>
						<th>Image</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					//echo "select * from portfolioimage where abouttopId='$id'";exit;
							$appQuery=mysql_query("SELECT * FROM `dj`");
							$appCount=mysql_num_rows($appQuery);
							if($appCount>0)
							{
								while($appRes=mysql_fetch_object($appQuery))
								{
								
							?>
                      <tr id="sessiondiv<?php echo $appRes->djId;?>">
                       <td><?php echo $appRes->djname;?></td>
					    <td><?php echo $appRes->djcountry;?></td>
					  <td><?php echo $appRes->djphone;?></td>
                        <td><img src="images/<?php echo $appRes->djimage;?>" style=" width:200px; height:200px;"></td>
						
                                 <td> 
								 <?php $status=$appRes->difeatured;
            if($status==0)
            {
            ?>
            <a class="btn  btn-success" href="dj.php?id=<?php echo $appRes->djId;?>&name=e" id="Enable">
            <i class="fa fa-check-square-o"></i>  
           Featured                                       
            </a>
            <?php
            }
            else
            {
            ?>
            <a class="btn btn-warning" href="dj.php?id=<?php echo $appRes->djId;?>&name=d" id="Disable">
            <i class="icon-edit icon-white"></i>  
           UnFeatured                                        
            </a>
            <?php
            }
            ?>             	
						<a href="viewbanner.php?id=<?php echo $appRes->bannerId;?>"><button class="btn btn-info"><i class="fa fa-eye"></i>View</button></a>
								<a href="editbanner.php?id=<?php echo $appRes->bannerId;?>"><button class="btn bg-purple margin"><i class="fa fa-edit"></i>Edit</button></a>
								<a href="javascript:void(0);" onClick="deletebanner(<?php echo $appRes->bannerId;?>);"><button class="btn btn-danger">Delete</button></a>	
						</td>
                      </tr>
					  
					<?php 
					  }}
					  else {
					  echo "No Banner File Found";
					  }
					  ?>
                        </tbody>
                   </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include_once('includes/footer.php');?>
      
      <!-- Control Sidebar -->      
     
    </div><!-- ./wrapper -->

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
