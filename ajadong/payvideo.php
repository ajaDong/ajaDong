<?php
session_start();
global $msg;
if($_SESSION['userid']=='')
{
 header('Location:login');
}
include_once('includes/db.php');
//$id=base64_decode($_GET['videoid']);
//$sbid=base64_decode($_GET['sbid']);

?>
<!DOCTYPE html>
<html>

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Ajarin Dong Bro</title>



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

  </head>

  <body class="skin-blue sidebar-mini">

      <!-- navbar -->

    <?php include_once("includes/header.php"); ?>
<section class="my-profile-content no-padding container" id="my-profile">
      <div class="content-inside col-md-12">
        
        <div class="user-detail col-md-12">
          <div class="user-detail-bg grey-bg-wrapper">
            <div>
            
            <div class="content-wrapper">

        <!-- Content Header (Page header) -->
		<h1>PayPal</h1>

        <!-- Main content -->

        <section class="content">
          <!-- Default box -->

          <div class="box">
		  <?php 
			$querypay=mysql_query("SELECT cv.*,c.chapterName,s.* FROM courseVideo cv, chapterSubject c,subjecthighschool s WHERE cv.chapterID=c.chapterId and cv.courseID='".$_SESSION['subjectID']."' and cv.videoId='".$_SESSION['videoId']."' and s.subjectId='".$_SESSION['subjectID']."'");
			$countpay=mysql_num_rows($querypay);
			$respay=mysql_fetch_object($querypay);
			
			?>

           

            <div class="box-body">
			<!--<label for="exampleInputPassword1">Subject Image<span>*</span></label><br/><br/>
			<img style="width:200px; height:200px;" src="admin/images/<//?php echo $respay->Image;?>"><br/><br/>

			<label for="exampleInputPassword1">Subject Code<span>*</span></label><br/><br/>
			<//?php echo $respay->subjectCode; ?><br/><br/>
			<label for="exampleInputPassword1">Chapter Name<span>*</span></label><br/><br/>
			<//?php echo $respay->chapterName; ?><br/><br/>
			<label for="exampleInputPassword1">Subject Price<span>*</span></label><br/><br/>
			<//?php echo $respay->coursePrice;?><br/><br/>
			<form action="payments.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="cmd" value="_xclick" /> 
    <input type="hidden" name="no_note" value="1" />
    <input type="hidden" name="lc" value="IN" />
    <input type="hidden" name="currency_code" value="USD" />
    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
	<input type="hidden" name="item_number" value="1" / >
	
	<input type="hidden" value="<//?php echo $_SESSION['userid'];?>" name="id">
			<input type="submit" class="go-red-button"  id="btnSubmit" value="PAY" name="pay">

              </form>-->
              
              
              <table class="table">
  <tr>
    <td><label for="exampleInputPassword1">Subject Image<span>*</span></label></td>
    <td><label for="exampleInputPassword1">Subject Code<span>*</span></label></td>
    <td><label for="exampleInputPassword1">Chapter Name<span>*</span></label></td>
    <td><label for="exampleInputPassword1">Subject Price<span>*</span></label></td>
  </tr>
  <tr>
    <td><img style="width:100px; height:100px;" src="admin/images/<?php echo $respay->Image;?>"></td>
    <td><?php echo $respay->subjectCode; ?></td>
    <td><?php echo $respay->chapterName; ?></td>
    <td><?php echo $_SESSION['totalprice'];?></td>
  </tr>
  <tr>
    <td colspan="4" align="right">
    	<form action="payments.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="cmd" value="_xclick" /> 
    <input type="hidden" name="no_note" value="1" />
    <input type="hidden" name="lc" value="IN" />
    <input type="hidden" name="currency_code" value="USD" />
    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
	<input type="hidden" name="item_number" value="1" / >
	
	<input type="hidden" value="<?php echo $_SESSION['userid'];?>" name="id">
			<input type="submit" class="go-red-button"  id="btnSubmit" value="PAY" name="pay">

              </form>
    </td>
  </tr>
</table>

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



  
<style>.form-control{width:100% !important;}#btnSubmit{color:#fff; border:3px solid #943f3f; border-width:0px 0px 3px 0px;}</style>
  </body>

</html>