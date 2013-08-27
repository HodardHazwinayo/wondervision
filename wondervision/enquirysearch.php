<?php
session_start();

include('header.php');

if(isset($_REQUEST['search']))
{
	$searchv = $_REQUEST['searchv'];
	
	$sql = ("SELECT * FROM `user_master` INNER JOIN `enquiry_details` ON user_master.user_id = enquiry_details.user_id INNER JOIN `enquiry_accomodation_mapping` ON enquiry_details.enquiry_id = enquiry_accomodation_mapping.enquiry_id WHERE user_master.firstname like('" .$searchv . "%') OR user_master.mobile like('" .$searchv . "%')");
		$query = mysql_query($sql);
	
	
	$count = mysql_num_rows($query);
	
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
						
						<div style="float:left;margin:0px 0px 20px 0px;">
							<table width="100%" cellpadding="15" cellspacing="0">
								<tr>
									<th>Enquiry #</th>
									<th>Name</th>
									<th>Mobile</th>
									
									<th></th>
								</tr>
							<?php 
							if($count!=0)	{
							while($row = mysql_fetch_array($query))	{ ?>
								<tr>
									<td><?php echo $row['enquiry_id']; ?></td>
									<td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
									<td><?php echo $row['mobile']; ?></td>
									
									<td><a href="enquiryshow.php?id=<?php echo $row['user_id']?>">Enquiry Details</a></td>
									
									
								</tr>	
						
							<?php }	
								}	else	{	
							?>
							<tr>
									<td>No</td>
									<td>Result</td>
									<td>To</td>
									
									<td>Display</td>
									
									
								</tr>	
							
							<?php
							}
							?>
							</table>
						</div>
					
					
					
				</div><!-- END #main-content-span -->
				
				
				

				<!-- BEGIN #main-content-span -->
				

			</div><!-- END main-content-row -->

			

		</div><!-- END #main-content -->
		
	
		
	</div><!-- END #main -->

	<!-- BEGIN #footer -->
	<?php include('footer.php'); ?>