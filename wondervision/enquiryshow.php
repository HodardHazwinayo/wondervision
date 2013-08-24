<?php
session_start();

include('header.php');
$cus_code=$_GET["id"];

   $sql1=("SELECT firstname,lastname,mobile,email from user_master WHERE user_id='$cus_code'");
   $query1 = mysql_query($sql1);
   $row1=mysql_fetch_array($query1);
   
   $sql2=("SELECT enquiry_id,enquirydate from enquiry_details WHERE user_id='$cus_code'");
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
				
	<div style="float:left;padding:30px;border-radius:8px;border:1px solid #aaaaaa;background-color:background: #e4efc0; /* Old browsers */
background: -moz-linear-gradient(top,  #e4efc0 0%, #abbd73 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e4efc0), color-stop(100%,#abbd73)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #e4efc0 0%,#abbd73 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #e4efc0 0%,#abbd73 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #e4efc0 0%,#abbd73 100%); /* IE10+ */
background: linear-gradient(to bottom,  #e4efc0 0%,#abbd73 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e4efc0', endColorstr='#abbd73',GradientType=0 ); /* IE6-9 */
;">					
	<table border="0" width="100%">
	<tr>
		<td width="110"><h4>Name</h4></td>
		<td><b>:</b></td>
		<td><b><?php echo $row1['firstname']." ".$row1['lastname'] ?></b></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="110"><h4>Phone Number</h4></td>
		<td><b>:</b></td>
		<td><b><?php echo $row1['mobile'] ?></b></td>
		
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="110"><h4>Email Id</h4></td>
		<td><b>:</b></td>
		<td><b><?php echo $row1['email'] ?></b></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="110"></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><a href="quickenquirregisterguest.php?id=<?php echo $cus_code ?>"><b>New Enquiry</b></a></td>
		<td>&nbsp;</td>
	</tr>
	</table>
	</div>
	
	



					
						<div style="float:left;width:auto;margin-left:150px;">
						
							<table border="0" width="100%">
								<tr>
								<th align="center">Enquiry #</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th align="center">Enquiey_Date</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th align="center">&nbsp;</th>
								</tr>
							<?php while($row2 = mysql_fetch_assoc($query2))	{ ?>
								<tr>
									<td align="center"><?php echo $row2['enquiry_id']; ?></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td align="center">
									
									<?php echo $row2['enquirydate']; ?>
									</td >
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									
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