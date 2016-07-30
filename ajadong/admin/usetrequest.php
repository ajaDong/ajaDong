<?php
session_start();
include_once('includes/db.php');
if($_SESSION['uname']=='')

{

 header('Location:login.php');

}
if(isset($_GET['id']))
{
$id=$_GET['id'];

	if($_GET['name']=='e')
	{
			mysql_query("update customer set custStatus='1' where customerId='$id'");
	}
	else if($_GET['name']=='d')
	{
		mysql_query("update customer set custStatus='0' where customerId='$id'");
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
		function deletecust(id)
		{
		//alert(id);
	    var x = confirm("Are you sure you want to delete?");
		if (x)
	    {
		
         $.ajax(
		 {type:'POST',url:'deletecust.php',
		 data:{id:id},
		 success:function(result)
		 {
		 if(result=='yes')
		 	{
		 alert("Trade Show/Event has been deleted successfully");
		 $('#sessiondiv'+id).hide();
		 	}
		 else
		 	{
		 alert("Invalid ");
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
        Viewed Trade Show/Event 
          </h1>
          <ol class="breadcrumb">
            <li><a href="addcustomer.php">
<button class="btn bg-navy btn-flat margin" style="margin-top: -2%">Add an Event/Trade Show</button></a></li>
            
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
					  
						<th>Event/Trade Show Name</th>
						<th>Image</th>
						<th>Address</th>
						<th>Phone Number</th>
						<th>Country</th>
						
						<th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
							$appQuery=mysql_query("select * from customer");
							$appCount=mysql_num_rows($appQuery);
							if($appCount>0)
							{
								while($appRes=mysql_fetch_object($appQuery))
								{
								$name=$appRes->first_name.' '.$appRes->last_name;
								$chackid=$appRes->userID;
							?>
                      <tr id="sessiondiv<?php echo $appRes->customerId;?>">
                        <!--<td><?php //echo $appRes->regiaterUserName;?></td>-->
						<td><?php echo $name;?></td>
<td><img  style="width:100px; height:100px;" src="../subadmin/images/<?php echo $appRes->image;?>"></td>
						 <td><?php echo $appRes->address;?></td>
						 <td><?php echo $appRes->phoneNumber;?></td>
						 <td><?php echo $appRes->country;?></td>
					
                        
                                 <td>   
						<!--	<div>	  <?php
								 $status=$appRes->custStatus;
								  if($status==0)
           					 {
            ?>
           <a class="btn  btn-success" href="usetrequest.php?id=<?php echo $appRes->customerId;?>&name=e" id="Enable">
            <i class="fa fa-check-square-o"></i>  
           approved                                       
            </a>
            <?php
            				}
            			else
            			{
            ?>
            <a class="btn btn-warning" href="usetrequest.php?id=<?php echo $appRes->customerId;?>&name=d" id="Disable">
            <i class="icon-edit icon-white"></i>  
            Notapproved                                        
            </a>
            <?php
            	}
            ?></div>-->
								                  	
						<a href="viewcustomer.php?id=<?php echo $appRes->customerId;?>"><button class="btn btn-info"><i class="fa fa-eye"></i>View</button></a>
						<?php if($chackid==0){ ?>
						<a href="editcustomer.php?id=<?php echo $appRes->customerId;?>"><button class="btn bg-purple margin"><i class="fa fa-edit"></i>Edit</button></a>
						<?php }?>
								<a href="javascript:void(0);" onClick="deletecust(<?php echo $appRes->customerId;?>);"><button class="btn btn-danger"><i class="fa fa-warning (alias)"></i>Delete</button></a>
												
												</td>
                      </tr>
					  
					  <?php }}
					  else {
					  echo "No Application File Found";
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
