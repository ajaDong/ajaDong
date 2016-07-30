<?php
session_start();
include_once('includes/db.php');
if($_SESSION['uname']=='')
{
 header("Location:login.php");
}
if(isset($_GET['id']))
{
$id=$_GET['id'];
$chackQuery=mysql_query("SELECT * FROM `auction_product_details` WHERE product_id='$id'");
$checkRes=mysql_fetch_object($chackQuery);
$userID=$checkRes->userID;
$productname=$checkRes->product_name;
$chackQuery1=mysql_query("SELECT * FROM `usertable` WHERE userID='$userID'");
$checkRes1=mysql_fetch_object($chackQuery1);
$name1=$checkRes1->regiaterUserName;
$email1=$checkRes1->userEmail;

	if($_GET['name']=='d')
	{
			mysql_query("update auction_product_details set product_featured='1' where product_id='$id'");
			
	$site='https://erametsad.ee/beta/';          
 	$mail=$email1;
 	$url="info@erametsad.ee";
 	$subject2 =" Kinnitatud raieõiguse oksjon ";
 	$message3 ='<table width="600" border="0" align="center" cellpadding="0" cellspacing="5" style="border:solid 1px #ccc; padding:6px 20px 20px; background:#eee;"><tr><td align="center"><img src="'.$site.'images/email-logo.jpg"/></td></tr><tr><td><strong style="font-family:helvetica; font-size:20px; font-weight:lighter;">Lugupeetud  '.$name1.' pakkumine '.$productname.'  </strong>,</td></tr><tr><td><p style="font-family:helvetica; font-size:15px; line-height:24px;"><strong>Oksjon kinnitatud!</strong> Võite sellega tutvuda meie leheküljel.<br><br> Aitäh, et kasutasite meie portaali! !</p></td></tr><tr><td align="center"><a href="'.$site.'login.php" style="background:#000; padding:10px; color:#fff; font-size:13px; font-family:arial; text-decoration:none;">Mine</a></td></tr></table>';   
	 $message2 ="Thank you for Registration "."<br/><br/>Email Id: ".$_SESSION['userEmail']."<br/><br/>Password:".$_SESSION['passwordUser']."<br/><br/>From:".$url;
 	$headers2 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 	$headers2 .= "From:".' '.$url;
 //echo $email,$subject2,$message2,$headers2;exit;
     $res=mail($mail,$subject2,$message3,$headers2);
	}
	else if($_GET['name']=='e')
	{
		mysql_query("update auction_product_details set product_featured='0' where product_id='$id'");
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
		function deleteauction(id)
		{
		//alert(id);
	    var x = confirm("Are you sure you want to delete?");
		if (x)
	    {
		
         $.ajax({type:'POST',url:'deleteauctionC.php',data:{id:id},success:function(result){
		 if(result=='yes')
		 {
		 alert("Auction has been deleted successfully");
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
           All Auction File
          </h1>
          <!--<ol class="breadcrumb">
            <li><a href="addauction.php">
<button class="btn bg-navy btn-flat margin" style="margin-top: -2%">Add a new Auction</button></a></li>
            
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
                        <th>Product Name</th>
						<th>User Name</th>
						<th>Product Price</th>
						<th>Product Start Date</th>
						<th>Product End Date</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					
							$appQuery=mysql_query("select ad.*,u.regiaterUserName from auction_product_details ad,usertable u where type='cutting' and ad.userID=u.userID");
							$appCount=mysql_num_rows($appQuery);
							if($appCount>0)
							{
								while($appRes=mysql_fetch_object($appQuery))
								{
								
							?>
                      <tr id="sessiondiv<?php echo $appRes->product_id;?>">
                        <td><?php echo $appRes->product_name;?></td>
						 <td><?php echo $appRes->regiaterUserName;?></td>
						<td><?php echo $appRes->product_reatil_price;?></td>
						 <td><?php echo $appRes->product_start_date;?></td>
						 <td><?php echo $appRes->product_end_date;?></td>
						<!-- <td><?php //echo $appRes->userPassword;?></td>
						 
						 <td><?php //echo $appRes->userRegDate;?></td>-->
                        
                                 <td>   
								  <?php
								 $status=$appRes->product_featured;
								  if($status==0)
            {
            ?>
           <a class="btn  btn-success" href="newauctionC.php?id=<?php echo $appRes->product_id;?>&name=d" id="Enable">
            <i class="fa fa-check-square-o"></i>  
            approved                                        
            </a>
            <?php
            }
            else
            {
            ?>
            <a class="btn btn-warning" href="newauctionC.php?id=<?php echo $appRes->product_id;?>&name=e" id="Disable">
            <i class="icon-edit icon-white"></i>  
            Notapproved                                        
            </a>
            <?php
            }
            ?>
								                  	
						<a href="viewauctionC.php?id=<?php echo $appRes->product_id;?>"><button class="btn btn-info"><i class="fa fa-eye"></i>View</button></a>
												
					 <a href="editauctionC.php?id=<?php echo $appRes->product_id;?>"><button class="btn bg-purple margin"><i class="fa fa-edit"></i>Edit</button></a>
                     <?php 
					 $formQuery=mysql_query("SELECT * FROM `form` WHERE productID='".$appRes->product_id."'");
					 $formRes=mysql_fetch_object($formQuery);
					 if($formRes->nimi<>'' && $formRes->isiku<>'' && $formRes->address<>'' && $formRes->Telefon<>'' && $formRes->isikutToendava<>''  && $formRes->raieonlubatud<>'' && $formRes->nrKohaselt<>'' && $formRes->raieoiguslikuks<>'' && $formRes->eraldis1<>'' && $formRes->pindala1<>'' && $formRes->reieliik1<>''  &&  $formRes->orienteeruv1<>'' && $formRes->eraldis2<>'' && $formRes->pindala2<>'' && $formRes->reieliik2<>'' && $formRes->orienteeruv2<>''  && && $formRes->eraldis3<>'' && $formRes->pindala3<>'' &&  $formRes->reieliik3<>'' &&  $formRes->orienteeruv3<>'' &&  $formRes->harvendusraie1<>'' &&  $formRes->harvendusraie2<>'' &&  $formRes->harvendusraie3<>''  &&  $formRes->raietegemise<>'' &&  $formRes->saadudpuidu<>''  &&  $formRes->raielangipuhastamise<>''  &&  $formRes->toidTeostada<>'' &&  $formRes->raieoiguseTeostamine<>''  &&  $formRes->ostjapuhastab1<>''  &&  $formRes->ostjapuhastab2<>'' &&  $formRes->ostjapuhastab3<>'' &&  $formRes->ostjapuhastab4<>'' &&  $formRes->ostjapuhastab5<>'' &&  $formRes->ostjaOigused1<>'' &&  $formRes->ostjaOigused2<>'' &&  $formRes->ostjaOigused3<>'' &&  $formRes->ostjaOigused4<>'' &&  $formRes->kokkuveoteedonlooduses<>''  &&  $formRes->kokkuveoteedskeem<>'' &&  $formRes->sortiment<>'' &&  $formRes->kogus<>'' &&  $formRes->muujalelaetav<>'' &&  $formRes->tasaarveldusega<>'' &&  $formRes->summasCheck<>'' &&  $formRes->summasCheck<>'' &&  $formRes->summastext<>'' &&  $formRes->nulcheck<>'' &&  $formRes->nultext<>'' &&  $formRes->tasumiseks<>'' &&  $formRes->rikkumiseltext<>'' &&  $formRes->nulpangakonto<>'' &&  $formRes->muudkokkulepitud<>'' &&  $formRes->lepingsolmitud<>'')
					 {
					 
					 ?>
                     <a href="edittable.php?id=<?php echo $appRes->product_id;?>">
                     <button class="btn bg-purple margin">
                     <i class="fa fa-edit"></i>Complete Form</button></a>
                      <?php }else {?>
                     <a href="edittable.php?id=<?php echo $appRes->product_id;?>">
                     <button class="btn bg-purple margin"><i class="fa fa-edit"></i>Not Complete Form</button></a>
                     <?php }?>
					<a href="javascript:void(0);" onClick="deleteauction(<?php echo $appRes->product_id;?>);"><button class="btn btn-danger"><i class="fa fa-warning (alias)"></i>Delete</button></a>
												
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
