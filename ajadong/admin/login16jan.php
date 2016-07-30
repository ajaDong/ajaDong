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

else

{

echo '<script>alert("Wrong username or password");</script>';

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

    <!-- iCheck -->

    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

  </head>

  <body class="login-page">

    <div class="login-box">

      <div class="login-logo">

        <b>Admin</b>&nbsp;Portal Record

      </div><!-- /.login-logo -->

      <div class="login-box-body">

        <p class="login-box-msg">Please login with your Username and Password.</p>

        <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group has-feedback">

            <input type="text" class="form-control" name="usernameAdmin" placeholder="User Name"/>

            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

          </div>

          <div class="form-group has-feedback">

            <input type="password" class="form-control" name="passwordAdmin" placeholder="Password"/>

            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

          </div>

          <div class="row">

            <div class="col-xs-8">    

                                      

            </div><!-- /.col -->

            <div class="col-xs-4">

              <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Sign In</button>

            </div><!-- /.col -->

          </div>

        </form>



        <!-- /.social-auth-links -->



        <br>

        



      </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->



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