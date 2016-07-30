<?php
session_start();
include_once("includes/db.php");

if($_SESSION['uname']=='')

{

 header("Location:login.php");

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
	<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="dist/css/calendar.css" />
  <link rel="stylesheet" type="text/css" href="dist/css/custom_2.css" />
  <script src="js/modernizr.custom.63321.js"></script>

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

           Calender

            <small>Control panel</small>

          </h1>

          <ol class="breadcrumb">

            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Calender</li>
          </ol>

        </section>



        <!-- Main content -->

        <section class="content" style="min-height: 598px;">

          <!-- Small boxes (Stat box) -->

          <div class="row">
                    <div class="col-lg-12">
                        <div class="custom-calendar-wrap">
					<div id="custom-inner" class="custom-inner">
					<div class="custom-header clearfix">
					<nav>
					<span id="custom-prev" class="custom-prev"></span>
					<span id="custom-next" class="custom-next"></span>
					</nav>
					<h2 id="custom-month" class="custom-month"></h2>
					<h3 id="custom-year" class="custom-year"></h3>
					</div>
					<div id="calendar" class="fc-calendar-container"></div>
					</div>
					</div>
             
                    </div>
                   
                   
          </div><!-- /.content-wrapper -->
		</section>

     <div class="clearfix"></div>

      <?php include_once('includes/footer.php');?>

    </div><!-- ./wrapper -->


	</div>
	
	<script type="text/javascript" src="js/jquery.calendario.js"></script>
  <script type="text/javascript" src="js/data.js"></script>
  <script type="text/javascript"> 
   $(function() {
   
    var transEndEventNames = {
      'WebkitTransition' : 'webkitTransitionEnd',
      'MozTransition' : 'transitionend',
      'OTransition' : 'oTransitionEnd',
      'msTransition' : 'MSTransitionEnd',
      'transition' : 'transitionend'
     },
     transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
     $wrapper = $( '#custom-inner' ),
     $calendar = $( '#calendar' ),
     cal = $calendar.calendario( {
      onDayClick : function( $el, $contentEl, dateProperties ) {

       if( $contentEl.length > 0 ) {
        showEvents( $contentEl, dateProperties );
       }

      },
      caldata : codropsEvents,
      displayWeekAbbr : true
     } ),
     $month = $( '#custom-month' ).html( cal.getMonthName() ),
     $year = $( '#custom-year' ).html( cal.getYear() );

    $( '#custom-next' ).on( 'click', function() {
     cal.gotoNextMonth( updateMonthYear );
    } );
    $( '#custom-prev' ).on( 'click', function() {
     cal.gotoPreviousMonth( updateMonthYear );
    } );

    function updateMonthYear() {    
     $month.html( cal.getMonthName() );
     $year.html( cal.getYear() );
    }

    // just an example..
    function showEvents( $contentEl, dateProperties ) {

     hideEvents();
     
     var $events = $( '<div id="custom-content-reveal" class="custom-content-reveal"><h4>Equipments for ' + dateProperties.monthname + ' ' + dateProperties.day + ', ' + dateProperties.year + '</h4></div>' ),
      $close = $( '<span class="custom-content-close"></span>' ).on( 'click', hideEvents );

     $events.append( $contentEl.html() , $close ).insertAfter( $wrapper );
     
     setTimeout( function() {
      $events.css( 'top', '0%' );
     }, 25 );

    }
    function hideEvents() {

     var $events = $( '#custom-content-reveal' );
     if( $events.length > 0 ) {
      
      $events.css( 'top', '100%' );
      Modernizr.csstransitions ? $events.on( transEndEventName, function() { $( this ).remove(); } ) : $events.remove();

     }

    }
   
   });
   
  
  </script>
  <script>
			var codropsEvents = {
			<?php 
			//echo "SELECT ue.*,e.* FROM `useequipment` ue,`equipment` e where ue.equipment_ID=e.equipmentid and ue.start_date<='$sdate' and last_date>'$sdate'";exit;
			$dateQuery=mysql_query("SELECT ue.*,e.* FROM `useequipment` ue,`equipment` e where ue.equipment_ID=e.equipmentid and ue.start_date>now() and ue.last_date>now() and ue.status='1' ");

	while($dateR=mysql_fetch_object($dateQuery))
					  {
					  $lastdate=$dateR->start_date;
					  ?>
	'<?php echo date('m-d-Y',strtotime($dateR->start_date));?>' : '<?php 
	$descQuery=mysql_query("SELECT ue . * , e . * , u . *,c.first_name,c.last_name FROM `useequipment` ue, `equipment` e, `usertable` u,customer c WHERE ue.`equipment_ID` = e.`equipmentid` AND ue.customer_ID=c.customerId AND ue.`user_ID` = u.`userID` AND ue.`start_date`='$lastdate'");
	while($descRes=mysql_fetch_object($descQuery))
	{
	$fullname=$descRes->userName.' '.$descRes->userLastName;
	$full=$descRes->first_name.' '.$descRes->last_name;
	$sec=strtotime($descRes->last_date)-strtotime($descRes->start_date);
	$total=$sec/86400;
	$totalday=$total+1;
	?>
	<?php echo 'Equipments Name: '.$descRes->equipmentname.'<br/>Book By: '.$fullname.'<br/>Book For: '.$full.'<br/>Start Date: '.$descRes->start_date.' to '.$descRes->last_date.'<br/>(Total '.$totalday.' Days)<br/><br/>';}?>',
	<?php
	}?>
				/*'07-21-2015' : '<a href="http://www.wincalendar.com/Great-American-Smokeout">Great American Smokeout</a>',
	'11-21-2015' : '<a href="http://www.wincalendar.com/Great-American-Smokeout">Great American Smokeout</a>',
	'11-13-2015' : '<span>Ashura [An example of an complete date event (11-13-2013)]</span>',*/

};



		</script>
		<script>
  $(document).ready(function(ev){
    $('#custom_carousel').on('slide.bs.carousel', function (evt) {
      $('#custom_carousel .controls li.active').removeClass('active');
      $('#custom_carousel .controls li:eq('+$(evt.relatedTarget).index()+')').addClass('active');
    })
});t
</script>
    <!-- jQuery 2.1.4 -->

   

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