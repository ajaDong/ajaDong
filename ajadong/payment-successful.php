<?php
session_start();
include_once('includes/db.php');
//echo '<pre>';print_r($_SESSION);print_r($_POST);exit;
if($_SESSION['videoId']<>'' && $_SESSION['totalprice']<>'' )
{

	$payer_id=addslashes($_POST['payer_id']);
	$receiver_email=addslashes($_POST['receiver_email']);
	$mc_gross=addslashes($_POST['mc_gross']);
	$payment_gross=addslashes($_POST['payment_gross']);
	$txn_id=addslashes($_POST['txn_id']);
	$payer_email=addslashes($_POST['payer_email']);
	$receiver_id=addslashes($_POST['receiver_id']);
	if($_SESSION['userid']<>''){
	
	$orderquery=mysql_query("INSERT INTO `paymentHistory`(`userID`, `videoID`, `videoPrice`, `receiver_email`, `transactionid`, `mc_gross`, `payer_id`, `payer_email`, `receiver_id`,`type`,`subjectID`) VALUES ('".$_SESSION['userid']."','".$_SESSION['videoId']."','".$_SESSION['totalprice']."','".$receiver_email."','".$txn_id."','".$mc_gross."','".$payer_id."','".$payer_email."','".$receiver_id."','".$_SESSION['type']."','".$_SESSION['subjectID']."')");
	}
if($orderquery)
{
unset($_SESSION['videoId']);
unset($_SESSION['totalprice']);
unset($_SESSION['subjectID']);
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

    <title>Mata Kuliah - Ajarin Dong Bro</title>



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

  </head>

  <body id="course-index">

    <!-- navbar -->

    <?php include_once("includes/header.php"); ?>



    <!-- subject contain (subject details, videos, tutor details) -->

    <section class="course-index-header header-padding dark-blue-bg-wrapper container full-width">

      <div class="content-inside col-md-12">

        <div class="header-padding col-md-12 container">

          
		  <h1>Payment Status</h1>

          

        </div>

      </div>

    </section>



    <section class="course-index padding-default full-width container">

      

      <div class="three-column-courses col-md-12">
	  
	 <h1>Your Payment was successfully done!!</h1>
       
		</div>

        

    </section>



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

    

    //scroll down navbar script

    var $document = $(document),

        $element = $('header');



    $document.scroll(function() {

        if ($document.scrollTop() >= 1) {

        // user scrolled 50 pixels or more;

        // do stuff

        

        $element.addClass('navbar-default-colored')

        $element.children().children().find("img").addClass('img-colored')

        } else {

        $element.removeClass('navbar-default-colored');

        $element.children().children().find("img").removeClass('img-colored')

        }

    });

    */



    //accordion script

    function toggleChevron(e) {

    $(e.target)

            .prev('.panel-heading')

            .find("i.indicator")

            .toggleClass('glyphicon-chevron-down glyphicon-chevron-up');

    }

    $('#accordion').on('hidden.bs.collapse', toggleChevron);

    $('#accordion').on('shown.bs.collapse', toggleChevron);

    </script>

    







  </body>

</html>