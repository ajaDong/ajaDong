<?php
session_start();
include_once("includes/db.php");

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



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

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

            Dashboard

            <small>Control panel</small>

          </h1>

          <ol class="breadcrumb">

            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Dashboard</li>
          </ol>

        </section>



        <!-- Main content -->

        <section class="content" style="min-height: 598px;">

          <!-- Small boxes (Stat box) -->

          <div class="row">
                    <div class="col-lg-2 col-sm-6">
                        <script>

window.setInterval(function(){  

 $("#time1").load("te.php");

}, 1000);

</script>
              <div  id="time1"></div>
                    </div>
                  <!--  <div class="col-lg-2 col-sm-6">
                         <script>

window.setInterval(function(){  

 $("#time2").load("ur.php");

}, 1000);

</script>

              <div  id="time2"></div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                         <script>

window.setInterval(function(){  

 $("#time3").load("er.php");

}, 1000);

</script>

             <div  id="time3"></div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                         <script>

window.setInterval(function(){  

 $("#time4").load("nm.php");

}, 1000);

</script>

             <div  id="time4"></div>
                    </div>
					 <div class="col-lg-2 col-sm-6">
                        <script>

window.setInterval(function(){  

 $("#time5").load("fullcalenderrequest.php");

}, 1000);

</script>
              <div  id="time5"></div>
                    </div>-->
                   
          </div><!-- /.content-wrapper -->
		</section>

     <div class="clearfix"></div>

      <?php include_once('includes/footer.php');?>

    </div><!-- ./wrapper -->


	</div>
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
<style>.main-footer{margin:0;}</style>
  </body>

</html>