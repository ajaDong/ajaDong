<?php 
session_start();
include_once("includes/db.php");
if($_SESSION['userid']=='')
{
header('Location:login.php');
}
$chapid=$_GET['chapid'];
$query=mysql_query("select * from tutorhighschool where tutorId='".$_SESSION['userid']."'");
		  $res=mysql_fetch_object($query);
		   $ui=$res->universityID;
			 $ci=$res->courseTutor;
			$tarr1=explode(",", $ci);
if(isset($_POST['addC']))
	{
	
if($_POST['chapterName']<>'' && $_POST['subjectID']<>'' && $_POST['shortOrder']<>'')

		{
			
			
			$res=mysql_query("UPDATE `chapterSubject` SET `chapterName`='".addslashes($_POST['chapterName'])."',`userID`='".$_SESSION['userid']."',`subjectID`='".addslashes($_POST['subjectID'])."',`shortOrder`='".addslashes($_POST['shortOrder'])."' WHERE chapterId='$chapid'");

			if($res){

				$msg='<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> succesfully Saved</div>';

			}

			else

   			{

   				$msg='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Something worng happend.</div>';   

          }

		

			 }

			 else
		{

			$msg='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Something worng happend.</div>';   

		}
		
		}
		
if(isset($_POST['addV']))
	{
	
if($_POST['videoName']<>'' && $_POST['courseID']<>'' && $_POST['chapterID']<>''  && $_FILES['system']['name']<>'' && $_FILES['system']['size']>0)

		{
			$vfileext=explode('.',$_FILES['system']['name']);
			$vfileext1=$vfileext[count($vfileext)-1];
			if($vfileext1=='mp4' or $vfileext1=='m4v' or $vfileext1=='wmv')
   			{
			$video_file=time().rand(1111,9999).'.'.$vfileext1;
			$path="videos/";
			$vtarget = $path.$video_file;
			move_uploaded_file($_FILES['system']['tmp_name'], $vtarget);
			$v_video = $video_file;
			
			if($_FILES['pdfupload']['name']<>'')
			{
			$ifileext=explode('.',$_FILES['pdfupload']['name']);
   			$ifileext1=$ifileext[count($ifileext)-1];
			if($ifileext1=='pdf' or $ifileext1=='docx')
			{
   			$image_file2=time().rand(1111,9999).'.'.$ifileext1;
   			$itarget2 = "pdf/";
   			$itarget2 = $itarget2.$image_file2;
   			move_uploaded_file($_FILES['pdfupload']['tmp_name'], $itarget2);
   			
			}
			else
			{
			$msg= '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Only PDF and DOC !!</div>';
			}
			}
			
			if($_POST['priceStatus']>0){
			
			
			$res=mysql_query("INSERT INTO `courseVideo`(`uiversityID`,`userID`,`courseID`,`chapterID`,`videoName`, `video`, `videoType`,`priceStatus`,`pdfupload`) VALUES('".$ui."','".$_SESSION['userid']."','".addslashes($_POST['courseID'])."','".addslashes($_POST['chapterID'])."','".addslashes($_POST['videoName'])."','".$v_video."','".$vfileext1."','".addslashes($_POST['priceStatus'])."','".$image_file2."')");
}else {

$res=mysql_query("INSERT INTO `courseVideo`(`uiversityID`,`userID`,`courseID`,`chapterID`,`videoName`, `video`, `videoType`,`priceStatus`,`pdfupload`) VALUES('".$ui."','".$_SESSION['userid']."','".addslashes($_POST['courseID'])."','".addslashes($_POST['chapterID'])."','".addslashes($_POST['videoName'])."','".$v_video."','".$vfileext1."','0','".$image_file2."')");
}
			if($res){

				$msg='<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>Well done!</strong> succesfully Saved</div>';

			}

			else

   			{

   				$msg='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Something worng happend.</div>';   

          }

		}
		else

   			{

   				$msg='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> You can only upload mp4,m4v or wmv files.</div>';   

          }

			 }

			 else
		{

			$msg='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">X</button><strong>Oh snap!</strong> Something worng happend.</div>';   

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
    <title>My Dashboard - Ajarin Dong Bro</title>

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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>


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
        }
		
		function getsubCat(id)
		{
		//alert(id);
   		$.ajax({
	  	url: "choosecource.php",
	   	data:{cat: id},
	   	type:'POST',
	   	success:function(msgs)
	   	{
		   
		   $("#subcategory1").html(msgs);
	   	   
	   	}
	   });
  		} 
		
		function getsubCat(id)
		{
		//alert(id);
   		$.ajax({
	  	url: "choosechapter.php",
	   	data:{cat: id},
	   	type:'POST',
	   	success:function(msgs)
	   	{
		   
		   $("#subcategory").html(msgs);
	   	   
	   	}
	   });
  		} 
		
		</script>

  </head>
  <body>
    <!-- navbar -->
    <?php include_once("includes/header.php"); ?>
	 <?php 
			  $queryTut=mysql_query("SELECT ts.*,u.universityName FROM tutorhighschool ts,university u WHERE tutorId='".$_SESSION['userid']."' and ts.universityID=u.universityId");
			  $resTut=mysql_fetch_object($queryTut);
			  $ui=$resTut->universityID;
			 $ci=$resTut->courseTutor;
			$tarr1=explode(",", $ci);
			
			 
			
			 ?>

    <!-- subject contain (subject details, videos, tutor details) -->
    <section class="my-profile-content no-padding container" id="my-profile">
      <div class="content-inside col-md-12">
        <!--<div class="user-header col-md-12"style="background-image: url('images/student.jpg');">
           <?php if($resTut->pictureTutor==''){ ?>
          <div class="user-img" style="background-image: url('images/no_image_available.png');"></div>
		  <?php } else {?>
		   <div class="user-img" style="background-image: url('images/<?php echo $resTut->pictureTutor;?>');"></div>
		   <?php }?>
          <div class="user-name"><?php echo $resTut->firstnameTutor;?> - Tutor</div>
          <div class="university-name"><?php echo $resTut->universityName;?></div>
          <div class="jurusan-name"><?php echo $resTut->degreeTutor;?></div>
        </div>-->
        <div class="user-detail col-md-12">
          <div class="user-detail-bg grey-bg-wrapper">
            <div>

              <!-- Nav tabs -->
              <ul class="user-detail-nav nav nav-tabs" role="tablist">
                <li role="presentation" class="active col-xs-6"><a href="#daftar-pelajaran" aria-controls="home" role="tab" data-toggle="tab"><h4>Edit Chapter</h4></a></li>
                <!--<li role="presentation" class="col-xs-6"><a href="#profile-setting" aria-controls="profile" role="tab" data-toggle="tab"><h4>Edit Video</h4></a></li>-->
              </ul>

              <!-- Tab panes -->
              <div class="user-detail-content tab-content">
                <div role="tabpanel" class="tab-pane active daftar-pelajaran" id="daftar-pelajaran">
                  <div class="content-wrapper">

        <!-- Content Header (Page header) -->
		<h1>Edit Chapter</h1>

        <!-- Main content -->

        <section class="content">
          <!-- Default box -->

          <div class="box">
		  <?php 
		  $query=mysql_query("SELECT c.*,s.* FROM chapterSubject c,subjecthighschool s WHERE c.userID='".$_SESSION['userid']."' and c.subjectID=s.subjectId and c.chapterId='$chapid'");
		  $res=mysql_fetch_object($query);
		  ?>

            

            <div class="box-body">

			<?php if(isset($msg)){echo $msg;}?>
			

              <form role="form" method="post" enctype="multipart/form-data" id="uploadForm">
			  
			 		 <div class="form-group">

			<label for="exampleInputPassword1">Course<span>*</span></label><br/>

			
			<select name="subjectID"  class="form-control" style="width:50%;" required>
                        	<option value="">Select</option>
							 <?php 
							
					  $mediaQuery1=mysql_query("select * from subjecthighschool where tutorID='".$_SESSION['userid']."'");
					
					  $mediaQueryno1=mysql_num_rows($mediaQuery1);
					  if($mediaQueryno1>0)
					  {
					  while($mediaRes1=mysql_fetch_object($mediaQuery1))
					  {
					 
					  ?>
					  	<option <?php if($mediaRes1->subjectId==$res->subjectID) { echo 'selected="selected"';}?>  value="<?php echo $mediaRes1->subjectId;?>"><?php echo $mediaRes1->subjectName;?></option>
						<?php 
					  }}
					
					  ?>
                        </select><br/>

			</div>

			 		 <div class="form-group">

                      <label for="exampleInputPassword1">Chapter Name<span>*</span></label><br/>
 					
					   <input type="text" class="form-control" id="chapterName" name="chapterName" style="width:50%;"   placeholder=" Enter Chapter  Name ." value="<?php echo $res->chapterName;?>" required><br/>

					  </div>
					  
					  <div class="form-group">

                      <label for="exampleInputPassword1">Chapter Number<span>*</span></label><br/>
 					
					   <input type="text" pattern="[1-9]+"  class="form-control" id="shortOrder" name="shortOrder" style="width:50%;" onBlur="emailvalidateC(this.value)" onFocus="if (this.value != ' ') {this.value = '';}"   placeholder=" Chapter Number ." value="<?php echo $res->shortOrder;?>" required><br/>

					  </div>

                     <div class="box-footer">

                    <input type="submit" class="go-red-button"  id="btnSubmit" value="Submit" name="addC">&nbsp;&nbsp;
					  <a href="chaptershow.php"><input type="button" class="go-red-button"  id="btnSubmit" value="Cancel"></a><br/>
                  </div>

                </form>

            </div><!-- /.box-body -->

            <!-- /.box-footer-->

          </div><!-- /.box -->



        </section><!-- /.content -->

      </div>
                </div>
                <div role="tabpanel" class="tab-pane profile-setting" id="profile-setting">
                 <div>
            
            <div class="content-wrapper">

        <!-- Content Header (Page header) -->
		<h1>Add Video</h1>

        <!-- Main content -->

        <section class="content">
          <!-- Default box -->

          <div class="box">

           

            <div class="box-body">

			<?php if(isset($msg)){echo $msg;}?>

              <form role="form" method="post" enctype="multipart/form-data" id="uploadForm">
			  
			  <div class="form-group">

			<label for="exampleInputPassword1">Course<span>*</span></label><br/>

			
			<select name="courseID"  class="form-control" onChange="getsubCat(this.value)" style="width:50%;" required>
                        	<option value="">Select</option>
							 <?php 
					  $mediaQuery1=mysql_query("select * from subjecthighschool where universityID='$ui' and tutorID='".$_SESSION['userid']."'");
					  $mediaQueryno1=mysql_num_rows($mediaQuery1);
					  if($mediaQueryno1>0)
					  {
					  while($mediaRes1=mysql_fetch_object($mediaQuery1))
					  {
					 
					  ?>
					  	<option value="<?php echo $mediaRes1->subjectId;?>"><?php echo $mediaRes1->subjectName;?></option>
						<?php 
					  }
					  }
					  ?>
                        </select>

			</div>

			 		 <div class="form-group">

                      <label for="exampleInputPassword1">Chapter Name<span>*</span></label><br/>
 					
					   <select name="chapterID" id="subcategory" class="form-control" style="width:50%;" required>
                        	<option value="">Select</option>
							 
                        </select>

					  </div>

					  <div class="form-group">

                      <label for="exampleInputPassword1">Topic Name<span>*</span></label><br/>
 					
					   <input type="text" class="form-control" id="videoName" name="videoName" style="width:50%;"   placeholder=" Enter Video  Name ."required><br/>
					  </div>
			
						<div class="form-group">
							  <label for="control-label">Video File</label>
								
								<input type="file" name="system"/>
					
								</div>
								
								<div class="form-group">
							  <label for="control-label">PDF File</label>
								
								<input type="file" name="pdfupload"/>
					
								</div>
								
								<div class="form-group">

			<label for="exampleInputPassword1">video Free<span>*</span></label>
			 
			   <input id="check88" type="checkbox" name="priceStatus" value="1" >
			 

			</div>
			
                     <div class="box-footer">

                    <div class="col-lg-12"><input type="submit" class="go-red-button"  id="btnSubmit" value="Submit" name="addV"></div>

					

                  </div>

                </form>

            </div><!-- /.box-body -->

            <!-- /.box-footer-->

          </div><!-- /.box -->



        </section><!-- /.content -->

      </div>
            </div>

            </div>
          </div>
        </div>
      </div>
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
    $('#myTabs a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
    </script>
	<style>#btnSubmit{color:#fff; border:3px solid #943f3f; border-width:0px 0px 3px 0px;}.form-control{width:100% !important;}</style>
    



  </body>
</html>