<?php 
session_start();
include_once("includes/db.php");
	
if(isset($_POST['savedSS']))
{

$res=mysql_query("INSERT INTO `studentTable`(`firstnameStd`, `emailStd`, `passwordStd`,`stuuiversity`, `stuDegree`) VALUES ('".addslashes($_POST['firstnameStd'])."','".addslashes($_POST['emailStd'])."','".addslashes($_POST['passwordStd'])."','".addslashes($_POST['stuuiversity'])."','".addslashes($_POST['stuDegree'])."')");
$uid=mysql_insert_id();

 $site='http://awstechnosystem.com/AjarinDong';          
 $mail=$_POST['emailStd'];
 $url="admin@AjarinDong.com";
 $subject2 ="Account Registered";
 $message3 ='<table width="600" border="0" align="center" cellpadding="0" cellspacing="5" style="border:solid 1px #ccc; padding:6px 20px 20px; background:#eee;"><tr><td align="center"><img src="'.$site.'images/email-logo.png"/></td></tr><tr><td><strong style="font-family:helvetica; font-size:20px; font-weight:lighter;">Dear Student,  '.$_POST['firstnameStd'].' '.$_SESSION['userLastName'].'</strong>,</td></tr><tr><td><p style="font-family:helvetica; font-size:15px; line-height:24px;"><strong>Welcome!</strong> You have registered yourself as a Student.<br><br>You can immediately begin to transact business .</p></td></tr><tr><td align="center"><a href="'.$site.'login.php" style="background:#000; padding:10px; color:#fff; font-size:13px; font-family:arial; text-decoration:none;">log in</a></td></tr></table>';   
 
 $headers2 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 $headers2 .= "From:".' '.$url;
 //echo $email,$subject2,$message2,$headers2;exit;
     $res1=mail($mail,$subject2,$message3,$headers2);
if($res)
{
$msg='<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> succesfully Saved</div>';
}
else
{
$msg='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Failed to save Please try again.</div>';

}
}
?>
<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Ajarin Dong Bro | Sign Up</title>



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
	<?php include_once("functions/tutors.php");?>
	<style>
.sandeep{width:100%; border:solid 10px #fbc34b; border-width:0px 0px 10px 0px; color:#fff; background:none; font-size:20px;}
</style>

  </head>

  <body id="sign-in-up">

    <!-- navbar -->

    <?php include_once("includes/header.php"); ?>



    <!-- content header -->

    <section class="form-custom-header background-color-identity container">

      <div class="content-inside row col-md-12">

        <div class="title-header col-md-12">

          <h1><span>Sign Up</span></h1>
		  <?php if(isset($msg)){echo $msg;}?>

        </div>
 <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-2 col-xs-1"></div>

        <div class="col-md-8 form-custom">

          <div class="input-group">

            <input type="text" name="firstnameStd" pattern="[A-Za-z ]+" class="sandeep" placeholder="Name" required>
			

          </div>

          <div class="input-group">

           
			<input type="email" class="sandeep" name="emailStd" placeholder="Your@e-mail.com" id="emailTutor1" value="" onBlur="emailvalidate1(this.value)" onFocus="if (this.value != ' ') {this.value = '';}"  required>

          </div>

          <div class="input-group">

			 <input type="password" class="sandeep" name="passwordStd" id="passworduser" placeholder="Password Min . 8 characters , one large, one number" onBlur="passvalidate(this.value)" required>

          </div>

          <div class="input-group">

             <input type="password" class="sandeep" name="cpasswordUser" id="cpasswordUser" placeholder="Password Confirmation" onBlur="conformval();" required>

          </div>

          <div class="input-group">

            
			<select name="stuuiversity" class="sandeep" required>
                        	<option value="">University</option>
							 <?php 
					  $mediaQuery=mysql_query("select * from university");
					  $mediaQueryno=mysql_num_rows($mediaQuery);
					  if($mediaQueryno>0)
					  {
					  while($mediaRes=mysql_fetch_object($mediaQuery))
					  {
					  ?>
					  	<option value="<?php echo $mediaRes->universityId;?>"><?php echo $mediaRes->universityName;?></option>
						<?php 
					  }
					  }
					  ?>
                        </select>

          </div>

          <div class="input-group">

            <input type="text" class="sandeep" pattern="[A-Za-z .,]+" name="stuDegree" placeholder="Degree" required>

          </div>

          <div class="go-red-button">

          <button type="submit" name="savedSS">Sign Up!</button>
          </div>

        </div>

        <div class="col-md-2 col-xs-1"></div>
		</form>

      </div>

    </section>



    <!-- testimonial content -->



    <!--

    <section class="content-testimonial container">

      <div class="content-inside row">

      </div>

    </section>

    -->



    <!-- footer -->

    <?php include_once("includes/footer.php"); ?>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="Assets/js/bootstrap.min.js"></script>



    <!-- Script to Activate colored navbar -->

    <script>



    var $document = $(document);



    $document.ready(function() {



        //right-menu sidebar

        $('.navbar-toggle').click(function() {

          $('.navbar-collapse-custom').removeClass('menu-right-push');

          $('.navbar-collapse-custom').addClass('menu-right-pull');

          $('body').addClass('overflow-hidden');

        });



        $('.close-button').click(function() {

          $('.navbar-collapse-custom').removeClass('menu-right-pull');

          $('body').removeClass('overflow-hidden');

          $('.navbar-collapse-custom').addClass('menu-right-push');

        });



    });

    /*

    $('.carousel').carousel({

        interval: 100000000 //changes the speed

    })

    */

    </script>



  </body>

</html>