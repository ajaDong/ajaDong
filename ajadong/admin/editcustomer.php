<?php
session_start();
global $msg;
$id=$_GET['id'];
if($_SESSION['uname']=='')
{
 header('Location:login');
}
include_once('includes/db.php');
	if(isset($_POST['add']))
	{
	if($_FILES['image']['name']<>'')
	  {
	  //print_r($_POST);exit;
            $ifileext=explode('.',$_FILES['image']['name']);
			$ifileext1=$ifileext[count($ifileext)-1];
			$image_file=time().rand(1111,9999).'.'.$ifileext1;
			$itarget2 = "../subadmin/images/";
			$itarget2 = $itarget2.$image_file;
			move_uploaded_file($_FILES['image']['tmp_name'], $itarget2);
			$target_file = $itarget2.basename($_FILES["image"]["name"]);
				

		
	$insertQuery=mysql_query("UPDATE `customer` SET `first_name`='".$_POST['first_name']."',`last_name`='".$_POST['last_name']."',`image`='".$image_file."',`emailId`='".$_POST['emailId']."',`phoneNumber`='".$_POST['phoneNumber']."',`address`='".$_POST['address']."',`city`='".$_POST['city']."',`country`='".$_POST['country']."',`zipcode`='".$_POST['zipcode']."',`fax`='".$_POST['fax']."' WHERE customerId='$id'");
			}	
			if($insertQuery>0)
			{
		 $msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> Succesfully Saved</div>';
			}
		else if($_POST['first_name']<>'' && $_POST['emailId']<>'' && $_POST['phoneNumber']<>'' && $_POST['address']<>'' && $_POST['city']<>'' && $_POST['country']<>'')
		{
		
		$insertQuery=mysql_query("UPDATE `customer` SET `first_name`='".$_POST['first_name']."',`last_name`='".$_POST['last_name']."',`emailId`='".$_POST['emailId']."',`phoneNumber`='".$_POST['phoneNumber']."',`address`='".$_POST['address']."',`city`='".$_POST['city']."',`country`='".$_POST['country']."',`zipcode`='".$_POST['zipcode']."',`fax`='".$_POST['fax']."' WHERE customerId='$id'");
			}	
			if($insertQuery>0)
			{
		 $msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> Succesfully Saved</div>';
			}
		
		
		else
		{
			$msg= '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Something worng happend !!</div>';
   	
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
	<link href="jquerydatepick/jquery.datepick.css" rel="stylesheet">
	<link href="php/ckeditor/_samples/sample.css" rel="stylesheet" type="text/css"/>
     <script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="plugins/ckfinder/ckfinder.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<?php include_once("functions/tutors.php");?>

<script type="text/javascript">
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
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
           Edit an Event/Trade Show
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit an Event/Trade Show</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Enter Details</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
              </div>
            </div>
            <div class="box-body">
			<?php if(isset($msg)){echo $msg;}?>
              <form role="form" method="post" enctype="multipart/form-data" id="uploadForm">
			  <?php 
			  $editquery=mysql_query("SELECT * FROM `customer` WHERE customerId='$id'");
			  $key=mysql_fetch_object($editquery);
			  
			  ?>
			  
			  
			  
			  
					  <div class="form-group">
                      <label for="exampleInputPassword1">First name<span>*</span></label><br/>
					   <input type="text" class="form-control"  name="first_name" style="width:50%;" placeholder=" Enter Your First Name"required value="<?php echo $key->first_name;?>">
					  </div>
					  
					  <div class="form-group">
                      <label for="exampleInputPassword1">Last name</label><br/>
					 <input type="text" class="form-control" id="last_name"  name="last_name" style="width:50%;"  placeholder=" Enter Your Last Name" value="<?php echo $key->last_name;?>">
                      </div>
					  
					  
		  <div class="form-group">
			<label for="exampleInputPassword1">email id<span>*</span></label><br>
<input name="emailId" type="email" class="form-control" placeholder="Enter your Email Id" style="width:50%;"  id="emailTutor"  value="<?php echo $key->emailId;?>" readonly>
		  </div>
		  
					<div class="form-group">
				<label for="exampleInputPassword1">Phone</label><br>
			<input type="text"  id="phoneNumber"  class="form-control" placeholder="enter your phone number"  style="width:50%;" name="phoneNumber" onBlur="mobilevalidate(this.value)" onFocus="if (this.value != ' ') {this.value = '';}" required value="<?php echo $key->phoneNumber;?>" maxlength="13"><img src="images/wrong.jpg" title="Phone number worng." id="mw" class="emailmsg" style="display:none;height:20px;width:20px"/><img src="images/correct.png" id="mc" class="emailmsg" style="display:none;height:20px;width:20px"/>
					 </div>
                <div class="form-group">
					<label for="exampleInputPassword1">City</label>
					<input type="text" class="form-control" placeholder="Enter your City name"name="city" id="cityUser" style="width:50%;" value="<?php echo $key->city;?>"/>
					</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <textarea class="form-control" rows="3" name="address" style="width:50%;" id="addressUser"><?php echo $key->address;?></textarea>
  </div>
  
  
  				<div class="form-group">
							  <label for="control-label">Image</label>
								<input type="file" name="image" id="image" onChange="readURL(this);">
					<div><img id="blah" height="100px" width="100px" src="../subadmin/images/<?php echo $key->image;?>">
							  </div>
								</div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Country</label>
    <select name="country" id="user_country" class="form-control" style="width:50%;">
	<script language="javascript">

var states = new Array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino", " Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");



for(var hi=0; hi<states.length; hi++)

document.write("<option value=\""+states[hi]+"\">"+states[hi]+"</option>");

</script>
<option value="<?php echo $key->country;?>" selected="selected"><?php echo $key->country;?></option>
</select>
  </div>
  
  					<div class="form-group">
					<label for="exampleInputPassword1">ZipCode</label>
					<input type="text" class="form-control" placeholder="Enter your zipcode here" name="zipcode"  style="width:50%;" value="<?php echo $key->zipcode;?>"/>
					</div>
					<div class="form-group">
					<label for="exampleInputPassword1">Fax&nbsp;(if any)</label>
					<input type="text" class="form-control" placeholder="Enter your fax number if any" name="fax" style="width:50%;" value="<?php echo $key->fax;?>"/>
					</div>
					
    
                      
 <!-- <div class="form-group">
    <label for="exampleInputPassword1">Gmail</label>
	<input type="text"  class="form-control" placeholder="Email Address" name="usergmail" id="usergmail">
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Facebook</label>
	<input type="text"  class="form-control" placeholder="Facebook" name="userfacebook" id="userfacebook">
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Twitter</label>
	<input type="text"  class="form-control" placeholder="Twitter" name="usertwittter" id="usertwittter" >
  </div>
  
  <div class="form-group">
    <label for="exampleInputFile">Profile Image</label>
    <input type="file" name="userImage" id="userImage" onChange="readURL(this);">
	         <div class="controls">
			<img id="blash" style="height:100px;width:100px;" src="images/" alt="NO Image"/>
			</div>
   <p class="help-block">Example: block-level help text here.</p>
  </div>-->
  
  				  
                     <div class="box-footer">
                    <input type="submit" class="btn btn-primary"  id="btnSubmit" value="Submit" name="add">
					&nbsp;&nbsp;&nbsp;<a href="usetrequest.php"><input type="button" class="btn btn-default" value="back"></a>
                  </div>
                </form>
            </div><!-- /.box-body -->
            <!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div>
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

  
  </body>
</html>