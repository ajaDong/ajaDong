<option value="">Select</option>
		 	<?php
			  include_once('includes/db.php'); 
					  $id=$_POST['cat'];

							$userQuery=mysql_query("select * from chapterSubject where subjectID='$id'");

							$rec=mysql_num_rows($userQuery);

							if($rec>0){

							while($userRes=mysql_fetch_object($userQuery))

								{

							?>

			<option value="<?php echo $userRes->chapterId;?>"><?php echo $userRes->chapterName;?></option>

				<?php 
					  }
					  }
					  else
					  {
					  echo '<option value="">No option available</option>';
					  }
 ?>
					 