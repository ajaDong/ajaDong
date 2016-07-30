<?php 
session_start();
include_once("includes/db.php");
?>
<!DOCTYPE html>

<html lang="en">

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

  </head>

  <body id="homepage">

    <!-- navbar -->

    <?php include_once("includes/headerindex.php"); ?>

    <!-- content header -->

    <section class="content-header container">

      <div class="content-inside row col-md-12">

        <div class="title-header col-md-12">

          <h1>Belajar mata kuliah sambil sans!</h1>

        </div>

        <div class="subtitle-header col-md-12">

          <h3>Online video, cheat sheet, past exams dan banyak lagi!</h3>

        </div>

        <div class="search-bar">

          <div class="input-group">

            <input type="text" class="sandeep" id="list-universitas" placeholder="Search University...">

            <span class="input-group-btn">

              <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>

            </span>          </div>

        </div>

      </div>

    </section>



    <!-- 2nd content -->

    <section class="content-top-course container">

      <div class="content-inside row">

        <div class="title-header col-md-12"><h1 class="red-text">TOP COURSES</h1></div>

        </div>

        <div class="three-column-courses col-md-12">
		<?php
		$appQuery=mysql_query("SELECT cv.*,u.universityName,s.*,t.firstnameTutor FROM courseVideo cv,university u,subjecthighschool s,tutorhighschool t where cv.uiversityID=u.universityId  and cv.courseID=s.subjectId and cv.userID=t.tutorId order by videoCount DESC");
		$appCount=mysql_num_rows($appQuery);
		if($appCount>0)
		{
		while($appRes=mysql_fetch_object($appQuery)){
		?>

          <div class="course-column col-sm-6 col-md-4">

            <div class="course-card grey-bg-wrapper">

              <div class="course-image">
				<img style="width:100%; height:200px;" src="admin/images/<?php echo $appRes->Image;?>">
              </div>

              <div class="course-detail">

               <h4 class="course-name"><?php echo $appRes->subjectCode;?></h4>

              <h6 class="course-name"><?php echo $appRes->videoName;?></h6>

              <h6 class="course-description"><?php echo $appRes->subjectName;?></h6>

              <p class="university-name"><?php echo $appRes->universityName;?></p>

               <a href="MATH1005.php?id=<?php echo base64_encode($appRes->videoId);?>&sbid=<?php echo base64_encode($appRes->subjectId);?>&viewcount=<?php echo 1;?>"><div class="go-blue-button">

                Go

              </div></a>

              </div>

            </div>

          </div>

         <?php }}?>

        </div>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="Assets/js/bootstrap.min.js"></script>



    <!-- Script to Activate colored navbar -->

    <script>

    /*

    $('.carousel').carousel({

        interval: 100000000 //changes the speed

    })

    */



    var $document = $(document),

        $element = $('header');



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



        //auto-complete search

        var availableTags = [

                            "Universitas Indonesia",

                            "Institut Teknologi Bandung",

                            "Universitas Brawijaya",

                            "Universitas Trisakti"];



        $( "#list-universitas" ).autocomplete({

          source: availableTags

        });

    });



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

    </script>


<style>
.sandeep{
    background: rgba(0, 0, 0, 0.2) none repeat scroll 0 0;
    border: medium none;
    color: #f2f2f2;
    font-family: arial;
    padding: 17px;
    width: 100%;
}
</style>
  </body>

</html>