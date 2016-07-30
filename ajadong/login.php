<?php
session_start();
include_once("includes/db.php");
$videoid=$_GET['videoid'];
$sbid=$_GET['sbid'];
if (isset($_POST['login'])) 
{

    $email = addslashes($_POST['emailTutor']);
    $pass = addslashes($_POST['passwordTutor']);
    $query = mysql_query("select * from tutorhighschool where emailTutor='$email' and `passwordTutor`='$pass'");
	
	$query_num=mysql_num_rows($query);
		
	if($query_num>0)
	{
	$key=mysql_fetch_object($query);
	$type=$key->type;
	$userStatus=$key->statustutlogin;
	if($userStatus==1){
	$_SESSION['user-name']=$key->firstnameTutor;
	$_SESSION['userid']=$key->tutorId;
	$_SESSION['email']=$key->emailTutor;
	$_SESSION['type']=$key->type;
	if(isset($_POST['videoid']) && $_POST['videoid']<>'' && $_POST['sbid']<>''){
	header("location:varifypayvideo.php?videoid=".$_POST['videoid']."&sbid=".$_POST['sbid']."");
	}
	else{
	if($type=='tutor'){
	header("location:tutorprofile.php");
	}
	else
	{
	header("location:studentprofile.php");
	}
	}
	}
	else
	{
	$msg='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> You are not approved by admin Sorry!!</div>';
	}
	}
	else 
	{
	  
	  $msg='<div class="alert alert-error alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Your login information is
incorrect, if you have not signed up &nbsp; &nbsp;<a href="signup.php">click here</a></div>';
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

    <title>Ajarin Dong Bro | Login</title>



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

  </head>

  <body id="sign-in-up">

    <!-- navbar -->

    <?php include_once("includes/header.php"); ?>



    <!-- content header -->

    <section class="form-custom-header background-color-identity container">

      <div class="content-inside row col-md-12">

        <div class="title-header col-md-12">

          <h1><span>Login<span></h1>
		  <?php if(isset($msg)){echo $msg;}?>

        </div>

        <div class="col-md-2 col-xs-1"></div>
 <form action="" method="post" enctype="multipart/form-data">
  <input type="hidden" name="videoid" value="<?php echo $videoid;?>">
  <input type="hidden" name="sbid" value="<?php echo $sbid;?>">
        <div class="col-md-8 form-custom">

          <div class="input-group">

            <input type="email" name="emailTutor" class="sandeep" placeholder="Your@e-mail.com">

          </div>

          <div class="input-group">

            <input type="password" name="passwordTutor" class="sandeep" placeholder="Password">

          </div>

          <div class="go-red-button">
		  <button type="submit" name="login">Sign In!</button>

           

          </div>

        </div>
		</form>

        <div class="col-md-2 col-xs-1"></div></div>

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


<style>
.close{width:auto; float:right;}
</style>
  </body>

</html>