<?php
session_start();

if($_SESSION['uname']=='')
{
 header('Location:login');
}
include('include/db.php');

 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script>
		function deletegallery(id)
		{
		
	    var x = confirm("Are you sure you want to delete?");
        if (x)
	    {
         $.ajax({type:'POST',url:'deletegallery.php',data:{id:id},success:function(result){
		 if(result=='yes')
		 {
		  setTimeout(function(){
       confirm("Gallery info has been deleted successfully");
		 $('#sessiondiv'+id).hide();
    }, 300);
 
		 }
		 else
		 {
		 confirm("Invalid Seletion");
		 }
		 
}});
}
      else
		alert("Not Deleted");
}
		</script>
		
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <?php include('include/header.php');?>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <?php include('include/left.php');?>
                <!--/span-->
                <div class="span9" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">File Type</div>
								<div class="muted pull-right"><a href="alltypesfiles.php"><span class="badge badge-warning">Add  New</span></a></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   
                                    
                         <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                            <thead>
                             <tr>
							     <th>Category</th>
								  <th>media</th>
								 <th>Action</th>
                                 </tr>               
                             </thead>
                             <tbody>
							<?php
							$BannQuery=mysql_query("select gid.*,dd.eventName from  gallery gid, events dd where gid.title=dd.eventId");
							$BannQueryno=mysql_num_rows($BannQuery);
							if($BannQueryno>0)
							{
								while($BannRes=mysql_fetch_object($BannQuery))
								{
							?>
                            
								<tr class="odd gradeX" id="sessiondiv<?php echo $BannRes->	gid;?>">
								       <td><?php echo $BannRes->eventName; ?></td>
									   	<td>
										<?php 
										$image=$BannRes->gimage;
										$youtube=$BannRes->youtube_url;
										$v_image=$BannRes->vid_image;
										$v_video=$BannRes->vid_video;
										if(isset($image) && $image<>''){?>
					                   <img width="200" height="200" src="videos/<?php echo $image;?>"/>
										<?php }elseif(isset($youtube) && $youtube<>''){?>
										<iframe style="width:200; height:200;" src="https://www.youtube.com/embed/<?php echo $youtube; ?>"></iframe>
										<?php }elseif(isset($v_video) && $v_video<>''){?>
										<video style="width:200px; height:200px;" poster="videos/<?php echo $v_image;?>" controls="">
           <source src="videos/<?php echo $v_video;?>" type="video/mp4">
       </video>
										<?php }else{?>
										NO File
										<?php }?></td>
										
											
                                   	 	<td>
												
											<!--<a href="viewdesigner?id=<?php echo $BannRes->	gid; ?>"><button class="btn btn-success">View</button></a>-->
									<a href="editgallery?id=<?php echo $BannRes->gid; ?>"><button class="btn btn-info">Edit</button></a>
		<a href="deletegallery?id=<?php echo $BannRes->gid;?>"><button class="btn btn-danger">Delete</button></a>
												
											</td>
                                </tr>
                                            <?php
											}
											}
											else
											{
											echo 'No Results Found';
											}
											?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
            <hr>
            <footer>
               <?php include('include/footer.php');?>
            </footer>
        </div>
        <!--/.fluid-container-->

        <script src="vendors/jquery-1.9.1.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>


        <script src="assets/scripts.js"></script>
        <script src="assets/DT_bootstrap.js"></script>
        <script>
        $(function() {
            
        });
        </script>
    </body>

</html>
