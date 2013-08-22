<?php
session_start();

include('header.php');
$cus_code=$_GET["id"];

   $sql1=("SELECT firstname,lastname,mobile,email from user_master WHERE user_id='$cus_code'");
   $query1 = mysql_query($sql1);
   $row1=mysql_fetch_array($query1);
   
   $sql2=("SELECT enquiry_id,startdate from enquiry_details WHERE user_id='$cus_code'");
   $query2 = mysql_query($sql2);
   
   
   
	

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
				
						
						<table border="0" width="100%">
	<tr>
		<td width="110"><b>Name</b></td>
		<td><b>:</b></td>
		<td><b><?php echo $row1['firstname'] ?>&nbsp;<?php echo $row1['lastname'] ?></b></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="110"><b>Phone Number</b></td>
		<td><b>:</b></td>
		<td><b><?php echo $row1['mobile'] ?></b></td>
		<td><a href="quickenquirregisterguest.php?id=<?php echo $cus_code ?>"><b>New Enquiry</b></a></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="110"><b>Email Id</b></td>
		<td><b>:</b></td>
		<td><b><?php echo $row1['email'] ?></b></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>
<br></br>


					
						<div style="margin:0px 0px 20px 200px;">
						
							<table border="0" width="50%">
								<tr>
								<td align="center">Enquiry #</td>
								<td align="center">Enquiey_Date</td>
								
								<td align="center">&nbsp;</td>
								</tr>
							<?php while($row2 = mysql_fetch_assoc($query2))	{ ?>
								<tr>
									<td align="center"><?php echo $row2['enquiry_id']; ?></td>
									<td align="center">
									
									<?php echo $row2['startdate']; ?>
									</td >
									
									
									
									
									<td><a href="eid_details.php?eid=<?php echo $row2['enquiry_id'] ?>">Details</a></td>
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