<?php
session_start();
include_once('includes/db.php');
if($_SESSION['uname']=='')

{

 header('Location:login.php');

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
		function deletehistory(id)
		{
		//alert(id);
	    var x = confirm("Are you sure you want to delete?");
		if (x)
	    {
		
         $.ajax({type:'POST',url:'deleteauctionU.php',data:{id:id},success:function(result){
		 if(result=='yes')
		 {
		 alert("History has been clean successfully");
		 $('#sessiondiv'+id).hide();
		 }else
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
           Booking history
          </h1>
          <!--<ol class="breadcrumb">
            <li><a href="addauction.php">
<button class="btn bg-navy btn-flat margin" style="margin-top: -2%">Add a new use equipment request</button></a></li>
            
            </ol>-->
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
					 	 <th>Equipment Booked By</th>
                        <th>Equipment Name</th>
						<th>Equipment Image</th>
						<th>Equipment Quantity</th>
						<th>Event/Trade Show Name</th>
						<th>Equipment Booking Date</th>
						<th>Equipment End Date</th>
						<th>Total Booking Days </th>
						
                      </tr>
                    </thead>
                    <tbody>
					<?php
							$appQuery=mysql_query("select ue.*,e.equipmentname,e.equipment_image,c.first_name,c.last_name,ut.regiaterUserName from useequipment ue,equipment e,customer c,usertable ut where ue.equipment_ID=e.equipmentid and ue.customer_ID=c.customerId and ue.user_ID=ut.userID and ue.status='1'");
							$appCount=mysql_num_rows($appQuery);
							if($appCount>0)
							{
								while($appRes=mysql_fetch_object($appQuery))
								{
								$cname=$appRes->first_name.' '.$appRes->last_name;
								$sec=strtotime($appRes->last_date)-strtotime($appRes->start_date);
									$total=$sec/86400;
									$totalday=$total+1;
								
							?>
                      <tr id="sessiondiv<?php echo $appRes->useequipment_ID;?>">
					   <td><?php echo $appRes->regiaterUserName;?></td>
                        <td><?php echo $appRes->equipmentname;?></td>
						<td><img  style="width:100px; height:100px;"src="images/<?php echo $appRes->equipment_image;?>"></td>
						<td><?php echo $appRes->quantity;?>
						<td><?php echo $cname;?></td>
						 <td><?php echo $appRes->start_date;?></td>
						 <td><?php echo $appRes->last_date;?></td>
						  <td><?php echo $totalday; echo "Days";?></td>
                                
				<td>				                  	
						<!--<a href="viewauction.php?id=<?php //echo $appRes->useequipment_ID;?>"><button class="btn btn-info"><i class="fa fa-eye"></i>View</button></a>-->
												
				<!--	 <a href="editauction.php?id=<?php //echo $appRes->useequipment_ID;?>"><button class="btn bg-purple margin"><i class="fa fa-edit"></i>Edit</button></a>-->
								<!--<a href="javascript:void(0);" onClick="deletehistory(<?php echo $appRes->useequipment_ID;?>);"><button class="btn btn-danger"><i class="fa fa-warning (alias)"></i>Delete</button></a>-->
												
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
