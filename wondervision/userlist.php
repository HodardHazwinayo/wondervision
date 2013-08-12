<?php
session_start();
include('header.php');

$_SESSION['unikey'];
$_SESSION['user_typeid'];

?>
<div class="main" id="main">
		<!-- BEGIN #main-nav -->
		<?php include('sidebar.php'); ?>
		
		

		<!-- BEGIN #main-content -->
		<div class="content" id="main-content">
			
			<div class="row-fluid" id="main-content-row">
				<!-- BEGIN #main-content-span -->
				<div class="span6" id="main-content-span">
				<h2 style="width:195%;"> User List </h2>
				
					<div>
						
						<div style="float:left;margin:20px 0px 20px 140px;">
						
							<table width="800px">
								<tr style="background-color:#aaaaaa;color:#ffffff;height:25px;">
									<th>Username</th>
									<th>Name</th>
									<th>Date of Creation</th>
									<th>User Type</th>
									<th>Action</th>
								</tr>
								<?php 
								$user = mysql_query("SELECT * FROM user_types INNER JOIN user_master ON user_types.user_typeid = user_master.user_typeid");
								//$user = mysql_query("SELECT * FROM user_master");
								while($row = mysql_fetch_array($user))
								{
								?>
								<tr>
									<td align="center"><?php echo $row['username']; ?></td>
									<td align="center"><?php echo $row['firstname']." ".$row['lastname']; ?></td>
									<td align="center"><?php echo $row['creation_date']; ?></td>
									<td align="center"><?php echo $row['name']; ?></td>
									<td align="center">
									<a href="adduser.php?action=edit&id=<?php echo $row['user_id']; ?>"><img src="images/group_edit.png"></a> 
									
									<?php if($row['user_typeid'] == '1')	{} else {?>	
									<a href="adduser.php?action=delete&id=<?php echo $row['user_id']; ?>"><img src="images/group_delete.png"></a>
									<?php } ?>
									</td>
								</tr>
								<?php
								}
								?>
							</table>
						
						</div>
					
					</div>
					
					
					
				</div><!-- END #main-content-span -->
				
				
				

				<!-- BEGIN #main-content-span -->
				

			</div><!-- END main-content-row -->

			

		</div><!-- END #main-content -->
		
	
		
	</div><!-- END #main -->
