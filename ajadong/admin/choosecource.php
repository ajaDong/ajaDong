<option value="">Select</option>
		 	<?php
			  include_once('includes/db.php'); 
					  $id=$_POST['cat'];

							$userQuery=mysql_query("select * from subjecthighschool where universityID='$id'");

							$rec=mysql_num_rows($userQuery);

							if($rec>0){

							while($userRes=mysql_fetch_object($userQuery))

								{

							?>

			<option value="<?php echo $userRes->subjectId;?>"><?php echo $userRes->subjectName;?></option>

				<?php 
					  }
					  }
					  else
					  {
					  echo '<option value="">No option available</option>';
					  }
 ?>
					 