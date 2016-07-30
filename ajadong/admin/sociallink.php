<?php
 	include_once('includes/db.php');
	session_start();
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
           Social Links
          </h1>
          <ol class="breadcrumb">
          
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
                                  <th>Facebook Link</th>
								  <th>Twitter Link</th>
								  <th>Instagram Link</th>
								  <th>Googleplus Link</th>
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
							$social=mysql_query("select * from  social_link");
							$socialno=mysql_num_rows($social);
							if($socialno>0)
							{
							while($socialRes=mysql_fetch_object($social))
							{
					?>
                      <tr id="sessiondiv<?php echo $socialRes->link_id;?>">
                        <td><?php echo $socialRes->facebook;?></td>
                        <td><?php echo $socialRes->twitter;?></td>
						 <td><?php echo $socialRes->instagram;?></td>
						 <td><?php echo $socialRes->google_plus;?></td>
						<td>
						<a href="editsocial.php?id=<?php echo $socialRes->link_id;?>"><button class="btn bg-purple margin"><i class="fa fa-edit"></i>Edit</button></a>
						</td>
                      </tr>
					  <?php }}
					  else {
					  echo "No Social Link  Found";
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

