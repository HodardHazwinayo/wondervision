<?php
session_start();

include('header.php');

if(isset($_REQUEST['search']))
{
	$searchv = $_REQUEST['searchv'];
	
	$query = mysql_query("SELECT * FROM `user_master` INNER JOIN `enquiry_details` ON user_master.user_id = enquiry_details.user_id WHERE firstname like('" .$searchv . "%') OR mobile like('" .$searchv . "%')");
	
	
}


?>
<!-- BEGIN #main -->
	<div class="main" id="main">
		<!-- BEGIN #main-nav -->
		<?php include('sidebar.php'); ?>
		
		

		<!-- BEGIN #main-content -->
		<div class="content" id="main-content">
			
			<div class="row-fluid" id="main-content-row">
				<!-- BEGIN #main-content-span -->
				<div class="span6" id="main-content-span">
				<h2 style="width:195%;">Enquiry Search</h2>
				
					<div class="enquiryfrom" style="padding:15px;">
						
						<form action="" method="post">
						<table>
							<tr><td><input type="text" name="searchv" id="searchv"></td><td><input type="submit" value="Search" name="search"></td></tr>
						</table>	
						</form>
						
						<div style="float:left;margin:0px 0px 20px 140px;">
							<table width="100%" cellpadding="15" cellspacing="0">
								<tr>
									<th>Name</th>
									<th>Mobile</th>
									<th>From</th>
									<th>Start Date</th>
									<th>To</th>
									<th>End Date</th>
									<th></th>
								</tr>
							<?php while($row = mysql_fetch_array($query))	{ ?>
								<tr>
									<td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
									<td><?php echo $row['mobile']; ?></td>
									<td><?php echo $row['startingplace']; ?></td>
									<td><?php echo $row['startdate']; ?></td>
									<td><?php echo $row['destination']; ?></td>
									<td><?php echo $row['enddate']; ?></td>
									<td><a href="bookingentry.php?eid=<?php echo $row['enquiry_id'] ?>&uid=<?php echo $row['user_id']?>">Book</a></td>
								</tr>	
						
							<?php }	?>
							</table>
						</div>
					
					
					
				</div><!-- END #main-content-span -->
				
				
				

				<!-- BEGIN #main-content-span -->
				

			</div><!-- END main-content-row -->

			

		</div><!-- END #main-content -->
		
	
		
	</div><!-- END #main -->

	<!-- BEGIN #footer -->
	<?php include('footer.php'); ?>