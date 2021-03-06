<?php

session_start();

if($_SESSION['uname']=='')

{

 header('Location:login');

}

include('includes/db.php');
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

		function deletehouseofbid(id)

		{

		

	    var x = confirm("Are you sure you want to delete?");

		if (x)

	    {
         $.ajax(
		 {type:'POST',
		 url:'deletehouseofbid.php',
		 data:{id:id},
		 success:function(result){

		 if(result=='yes')

		 {

		 alert("Testimonial has been deleted successfully");

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

           Testimonial

          </h1>

          <ol class="breadcrumb">

           

            <li><a href="addhouseofbid"><button class="btn bg-navy btn-flat margin" style="margin-top: -2%">Add House Of Bid </button>

</a></li>

            

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
						<th>Image</th>
						<th>Heading</th>
						<th>Discription</th>
						<th>Action</th>

                      </tr>

                    </thead>

                    <tbody>

					<?php

							$logo=mysql_query("select * from houseofbid");
                            $logoNo=mysql_num_rows($logo);
							if($logoNo>0){
							while($logoRes=mysql_fetch_object($logo))
                            {
							?>

                      <tr id="sessiondiv<?php echo $logoRes->houseBID_ID;?>">

					 
					  <td><img style="width:180px; height:90px;" src="images/<?php echo $logoRes->image;?>"/></td>
					  <td><?php echo $logoRes->heading;?></td>
					  <td><?php echo $logoRes->discription;?></td>
					  <td>
      <a href="edithouseofbid.php?id=<?php echo $logoRes->houseBID_ID;?>"><button class="btn bg-purple margin"><i class="fa fa-edit"></i>Edit</button></a>
												
		   
		   <a href="javascript:void(0);" onClick="deletehouseofbid(<?php echo $logoRes->houseBID_ID;?>);"><button class="btn btn-danger"><i class="fa fa-warning (alias)"></i>Delete</button></a>
		   
                      </tr>

					  
                       <?php }}else{echo "No Testimonial found";}?>

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

      <!-- /.control-sidebar -->

      <!-- Add the sidebar's background. This div must be placed

           immediately after the control sidebar -->

      <div class='control-sidebar-bg'></div>

    </div><!-- ./wrapper -->



    <!-- jQuery 2.1.4 -->

    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <!-- Bootstrap 3.3.2 JS -->

    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- DATA TABES SCRIPT -->

    <script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>

    <script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

    <!-- SlimScroll -->

    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>

    <!-- FastClick -->

    <script src='plugins/fastclick/fastclick.min.js'></script>

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

