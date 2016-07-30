<aside style="background-color:#34495E;" class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->

	<section class="sidebar">

	<!-- Sidebar user panel -->

	<div style="background-color:#34495E;" class="user-panel">

		<div>

			<img style="margin-left:38px; margin-top:10px; width:128px; height:128px;" src="images/<?php echo $adminsRes->imageAdmin;?>" class="img-circle" alt="User Image" /><br/><br/>

		</div>

		<div style="margin-bottom:2px;">

			<p style="color:#fff; font-size:18px;"><?php echo $adminsRes->nameAdmin;?></p>

			<a href="#"><i class="fa fa-circle text-success"></i> Online</a>

		</div>
		
	</div>

	<ul class="sidebar-menu">

		<li style="background-color:#34495E;" class="header">MAIN NAVIGATION</li>

		<li class="treeview">

			<a href="index.php">

				<i class="fa fa-dashboard"></i>

				<span style="color:#fff;">Dashboard</span>

				<i class="fa fa-angle-left pull-right"></i>

			</a>

		</li> 
		 <li class="treeview">

			<a href="#">

				<i class="fa fa-bar-chart"></i>

				<span style="color:#fff;">All University</span>

				<i class="fa fa-angle-left pull-right"></i>

			</a>

			<ul class="treeview-menu">

				<li>

					<a href="university.php">

						<i class="fa fa-plus"></i>All University

					</a>
				</li>

			</ul>

		</li> 
		<li class="treeview">

			<a href="#">

				<i class="fa fa-users"></i>

				<span style="color:#fff;">All Course </span>

				<i class="fa fa-angle-left pull-right"></i>

			</a>

			<ul class="treeview-menu">

				<li>

					<a href="subject.php">

						<i class="fa fa-user"></i>All Course

					</a>

				</li>
						<li>

					<a href="coursecoupon.php">

						<i class="fa fa-user"></i>Courses Coupons

					</a>

				</li>
			</ul>

		</li> 
		<li class="treeview">

			<a href="#">

				<i class="fa fa-wrench"></i>

				<span style="color:#fff;">All Tutor</span>

				<i class="fa fa-angle-left pull-right"></i>

			</a>

			<ul class="treeview-menu">
                
				<li>

					<a href="tutor.php">

						<i class="fa fa-circle-o"></i>All Tutor

					</a>

				</li>
			</ul>

		</li>

		<li class="treeview">

			<a href="#">

				<i class="fa fa-wrench"></i>

				<span style="color:#fff;">All Student</span>

				<i class="fa fa-angle-left pull-right"></i>

			</a>

			<ul class="treeview-menu">

				<li>

					<a href="student.php">

						<i class="fa fa-circle-o"></i> All Student

					</a>

				</li>

			</ul>

		</li>
		
		<li class="treeview">

			<a href="#">

				<i class="fa fa-wrench"></i>

				<span style="color:#fff;">Course Video</span>

				<i class="fa fa-angle-left pull-right"></i>

			</a>

			<ul class="treeview-menu">

				<li>

					<a href="coursevideo.php">

						<i class="fa fa-circle-o"></i> All Video

					</a>

				</li>

			</ul>

		</li>
		
		<li class="treeview">

			<a href="#">

				<i class="fa fa-wrench"></i>

				<span style="color:#fff;">Settings</span>

				<i class="fa fa-angle-left pull-right"></i>

			</a>

			<ul class="treeview-menu">

				<li>

					<a href="sociallink.php">

						<i class="fa fa-circle-o"></i> Social Link

					</a>

				</li>
				
				<li>

					<a href="logo.php">

						<i class="fa fa-circle-o"></i> Logo Image

					</a>

				</li>

			</ul>

		</li>
		
	</section>

<!-- /.sidebar -->

</aside>