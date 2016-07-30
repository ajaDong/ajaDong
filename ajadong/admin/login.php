<?php

session_start();

include('includes/db.php');

if(isset($_POST['submit']))

{

$name=addslashes($_POST['usernameAdmin']);

$pass=addslashes($_POST['passwordAdmin']);

$query=mysql_query("select * from admin where usernameAdmin='$name' and passwordAdmin='$pass'");

if(mysql_num_rows($query)>0)

{

$_SESSION['uname']=$name;

header('Location:index.php');

}
else if(mysql_num_rows($query)==0)
{

$queryS=mysql_query("select * from usertable where userEmail='$name' OR regiaterUserName='$name' and userPassword='$pass'");

if(mysql_num_rows($queryS)>0)
{
	$keyS=mysql_fetch_object($queryS);
	$_SESSION['user-name']=$keyS->userName.' '.$keyS->userLastName;
	$_SESSION['userid']=$keyS->userID;
	$_SESSION['regiaterUserName']=$keyS->regiaterUserName;
	$_SESSION['email']=$keyS->userEmail;
	header('Location:../subadmin/index.php');
}
else
{
echo '<script>alert("Wrong Email or password");</script>';
}

}
}
?>
<!DOCTYPE html>

<html>

  <head>

    <meta charset="UTF-8">

    <title>Admin::Log in</title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.4 -->

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome Icons -->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->

    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <!-- iCheck -->

    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
<style>
body { background: url('http://i.imgur.com/Eor57Ae.jpg') no-repeat fixed center center; background-size: cover; font-family: Montserrat; }
.logo { width: 300px; height: 36px; margin: 60px auto 30px; font-size:28px; color:#fff; }
.login-block { width: 320px; padding: 20px; background: #fff; border-radius: 5px; border-top: 5px solid #2c3e50; margin: 0 auto; }
.login-block h1 { text-align: center; color: #000; font-size: 18px; text-transform: uppercase; margin-top: 0; margin-bottom: 20px; }
.login-block input { width: 100%; height: 42px; box-sizing: border-box; border-radius: 5px; border: 1px solid #ccc; margin-bottom: 20px; font-size: 14px; font-family: Montserrat; padding: 0 20px 0 50px; outline: none; }
.login-block input#username { background: #fff url('images/user.png') 20px top no-repeat; background-size: 16px 80px; }
.login-block input#username:focus { background: #fff url('images/user.png') 20px bottom no-repeat; background-size: 16px 80px; }
.login-block input#password { background: #fff url('images/password.png') 20px top no-repeat; background-size: 16px 80px; }
.login-block input#password:focus { background: #fff url('images/password.png') 20px bottom no-repeat; background-size: 16px 80px; }
.login-block input:active, .login-block input:focus { border: 1px solid #2c3e50; }
.login-block button { width: 100%; height: 40px; background: #2c3e50; box-sizing: border-box; border-radius: 5px; border: 1px solid #2c3e50; color: #fff; font-weight: bold; text-transform: uppercase; font-size: 14px; font-family: Montserrat; outline: none; cursor: pointer; }
.login-block button:hover { background: #34495e; }

</style>
  </head>

  <body >

  

      <div class="logo">

        <b>Admin</b>&nbsp;AjarinDong

      </div><!-- /.login-logo -->

      <div class="login-block">

        

        <form action="" method="post" enctype="multipart/form-data">
        
    
    <h1>Login</h1>
    <input type="text" value="" name="usernameAdmin" placeholder="User Name" id="username"/>
    <input type="password" value="" name="passwordAdmin" placeholder="Password" id="password" />
    <button type="submit" name="submit">Submit</button>


        
        

         

        

         

        </form>



        <!-- /.social-auth-links -->



        <br>

        



      </div><!-- /.login-box-body -->

  



    <!-- jQuery 2.1.4 -->

    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <!-- Bootstrap 3.3.2 JS -->

    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- iCheck -->

    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>

    <script>

      $(function () {

        $('input').iCheck({

          checkboxClass: 'icheckbox_square-blue',

          radioClass: 'iradio_square-blue',

          increaseArea: '20%' // optional

        });

      });

    </script>

  </body>

</html>