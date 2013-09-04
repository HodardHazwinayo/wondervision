<?php
session_start();

include('header.php');
   //user id from user master table
$date = date('Y-m-d H:i:s');

$enid = $_REQUEST['enid'];

$sql1="SELECT * FROM `enquiry_details` INNER JOIN `user_master` ON enquiry_details.user_id=user_master.user_id WHERE enquiry_details.enquiry_id='".$enid."'";

$res1 = mysql_query($sql1);

$row1 = mysql_fetch_array($res1);
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
				<h2 style="width:195%;">Report</h2>
				
				
					<div class="enquiryfrom" style="padding:15px;">
				
	<div class="profileshow">					
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
	
	</table>
	</div>
	
		<?php
			$sql2 = "SELECT * FROM booking_details";
		?>
		<table border="0" cellpadding="1" cellspacing="1" width="100%">
		<thead>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
		</table>
					
					
					
				</div><!-- END #main-content-span -->
				
				
				

				<!-- BEGIN #main-content-span -->
				

			</div><!-- END main-content-row -->

			

		</div><!-- END #main-content -->
		
	
		
	</div><!-- END #main -->

	<!-- BEGIN #footer -->
	<?php include('footer.php'); ?>