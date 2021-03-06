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



	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<script>

		function deletesubject(id)

		{

		

	    var x = confirm("Are you sure you want to delete?");

		if (x)

	    {

		

         $.ajax({type:'POST',url:'deletesubject',data:{id:id},success:function(result){

		 if(result=='yes')

		 {

		 // alert(result);

		 alert("Course has been deleted successfully");

		 $('#sessiondiv'+id).hide();

		 }else

		 {

		 //alert(result);

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

           All Course

          </h1>

          <ol class="breadcrumb">

            <li><a href="addsubject.php">

<button class="btn bg-navy btn-flat margin" style="margin-top: -2%"><i class=" fa fa-user"></i>Add a new Course</button></a></li>

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

					  <th>Course Name</th>
					  <th>University Name</th>
					  <th>Subject Code</th>
					  <th>Subject Image</th>
					    <th>Actions</th>

                      </tr>

                    </thead>

                    <tbody>

					<?php

							$userQuery=mysql_query("select s.*,u.universityName from subjecthighschool s,university u where s.universityID=u.universityId");

							$userCount=mysql_num_rows($userQuery);

							if($userCount>0)

							{

								while($userRes=mysql_fetch_object($userQuery))

								{

							?>

                      <tr id="sessiondiv<?php echo $userRes->subjectId;?>">

					   <td><?php echo $userRes->subjectName	;?></td>
					    <td><?php echo $userRes->universityName;?></td>
						<td><?php echo $userRes->subjectCode;?></td>
						<td><img style="width:200px; height:200px;" src="images/<?php echo $userRes->Image;?>"></td>

                        

						<td>

						<a href="editsubject.php?id=<?php echo $userRes->subjectId;?>"><button class="btn bg-purple margin"><i class="fa fa-edit"></i>Edit</button></a>

					  <a href="javascript:void(0);" onClick="deletesubject(<?php echo $userRes->subjectId;?>);"><button class="btn btn-danger"><i class="fa fa-warning (alias)"></i>Delete</button></a>	

			

												

					</td>

                     </tr>

					  

					  <?php }}

					  else {

					  echo "No Course Found";

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



