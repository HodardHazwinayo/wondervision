<?php
session_start();

include('header.php');
$cus_code=$_GET["id"];   //user id from user master table
$date = date('Y-m-d H:i:s');

   $sql1=("SELECT firstname,lastname,mobile,email from user_master WHERE user_id='$cus_code'");
   $query1 = mysql_query($sql1);
   $row1=mysql_fetch_array($query1);
   
   $sql2=("SELECT * from enquiry_details INNER JOIN transport_details ON enquiry_details.enquiry_id=transport_details.enquiry_id WHERE enquiry_details.user_id='$cus_code'");
   $query2 = mysql_query($sql2);
   $count2 = mysql_num_rows($query2);
   
 $sql3=("SELECT * from enquiry_details INNER JOIN enquiry_accomodation_mapping ON enquiry_details.enquiry_id=enquiry_accomodation_mapping.enquiry_id WHERE enquiry_details.user_id='$cus_code'");
   $query3 = mysql_query($sql3);
   $count3 = mysql_num_rows($query3);
   
   
   
   
   
   
if($_REQUEST['action']=='book')
{
//echo $_SESSION['customer_id'] = $cus_code; 
/*$_SESSION['fname'] = $_REQUEST['c_fname'];
$_SESSION['lname'] = $_REQUEST['c_lname'];
$_SESSION['mobile'] = $_REQUEST['c_mobile'];
$_SESSION['email'] = $_REQUEST['c_email'];
$_SESSION['addr1'] = $_REQUEST['c_addrs1'];
$_SESSION['addr2'] = $_REQUEST['c_addrs2'];
$_SESSION['place'] = $_REQUEST['c_place'];
$_SESSION['zip'] = $_REQUEST['c_zip'];*/


/*$ttsql ="SELECT transport_id FROM transport_details ORDER BY transport_id DESC LIMIT 1 "; 
$ttrs = mysql_query($ttsql);
$ttrow = mysql_fetch_array($ttrs);

$tid = $ttrow['transport_id'];

$eesql = "SELECT enquiry_id FROM enquiry_details ORDER BY enquiry_id DESC LIMIT 1";
$eers = mysql_query($eesql);
$eerow = mysql_fetch_array($eers);

$eeid = $eerow['enquiry_id'];*/

$_REQUEST['eeeid'];
$_REQUEST['tttid'];


$bsql = "INSERT INTO booking_details(bookingdate,enquiry_id) VALUES ('".$date."','".$_REQUEST['eeeid']."')";  
$brs = mysql_query($bsql);

$bbsql = "SELECT booking_id FROM booking_details ORDER BY booking_id DESC LIMIT 1";
$bbrs = mysql_query($bbsql);

$bbrow = mysql_fetch_array($bbrs);

$bid = $bbrow['booking_id'];
//header("Location:bookingformtransport.php?tid=$tid");
?>
	<script>
		window.location="bookingformtransport.php?tid=<?php echo $_REQUEST['tttid'] ?>&bid=<?php echo $bid ?>&eid=<?php echo $_REQUEST['eeeid'] ?>";
	</script>
<?php

}
   










if($_REQUEST['action']=='hbook')
{


echo $_REQUEST['heid'];
echo $_REQUEST['hatid'];


$hbsql = "INSERT INTO booking_details(bookingdate,enquiry_id) VALUES ('".$date."','".$_REQUEST['heid']."')";  
$hbrs = mysql_query($hbsql);

$hbbsql = "SELECT booking_id FROM booking_details ORDER BY booking_id DESC LIMIT 1";
$hbbrs = mysql_query($hbbsql);

$hbbrow = mysql_fetch_array($hbbrs);

$hbid = $hbbrow['booking_id'];
//header("Location:bookingformtransport.php?tid=$tid");
?>
	<script>
		window.location="bookingformaccomodation.php?hatid=<?php echo $_REQUEST['hatid'] ?>&hbid=<?php echo $hbid ?>&heid=<?php echo $_REQUEST['heid'] ?>";
	</script>
<?php

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
	<tr>
		<td width="110"></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><a href="quickenquirregisterguest.php?id=<?php echo $cus_code ?>"><b>New Enquiry</b></a></td>
		
	</tr>
	</table>
	</div>
	
	



						
						<div style="float:left;width:100%;">
						
						<table width="100%" cellpadding="8" cellspacing="5">
						<thead>
							<tr>	
								<th colspan="10"><h4>Transport Details</h4></th>
							</tr>
							<tr>
								<th>Enquiry ID</th>
								<th>Enquiry Date</th>
								<th>Vehicle type</th>
								<th>No of adults</th>
								<th>No of children</th>
								<th>Starting place</th>
								<th>Destination</th>
								<th>Approximate price</th>
								<th></th>
							</tr>
						</thead>
						<?php   
						if($count2 != 0)
						{
						while($row2 = mysql_fetch_array($query2))	{
						?>
						<tbody>	
							<tr align="center">
								<td><a href="monitory_report.php?enid=<?php echo $row2['enquiry_id'] ?>"><?php echo $row2['enquiry_id'] ?></a></td>
								<td><?php echo $row2['enquirydate'] ?></td>
								<td><?php echo $row2['vehicletype'] ?></td>
								<td><?php echo $row2['noofadults'] ?></td>
								<td><?php echo $row2['noofchildren'] ?></td>
								<td><?php echo $row2['startingplace'] ?></td>
								<td><?php echo $row2['destination'] ?></td>
								<td><?php echo $row2['rate'] ?></td>
								<td>
								<?php 
								$bookingsql = mysql_query("SELECT * FROM booking_details WHERE enquiry_id = '".$row2['enquiry_id']."'");
								$bookingcount = mysql_fetch_array($bookingsql);
								
								if($bookingcount==0)	{
								?>
								<a href="enquiryshow.php?action=book&eeeid=<?php echo $row2['enquiry_id'] ?>&tttid=<?php echo $row2['transport_id']?>">Book</a>
								</td>
								<?php	}	else	{	}?>
							</tr>
						</tbody>	
						<?php
						}
						}	else	{
						?>
						<tbody>	
							<tr align="center">
								<td colspan="9">No Result Found</td>
							</tr>
						</tbody>	
						<?php
						}
						?>						
						</div>
						<br />
						<br />
						<br />
						<div style="float:left;width:100%;">
						
						<table width="100%" cellpadding="8" cellspacing="5">
						<thead>
						<tr>
							<th colspan="7"><h4>Accomodation Details</h4></th>
						</tr>
							<tr>
								<th>Enquiry ID</th>
								<th>Enquiry Date</th>
								<th>Room type</th>
								<th>No of adults</th>
								<th>No of children</th>
								<th>Approximate price</th>
								<th></th>
							</tr>
						</thead>
						<?php
						if($count3 != 0)
						{
						while($row3 = mysql_fetch_array($query3))	{
						?>
						<tbody>	
							<tr align="center">
								<td><?php echo $row3['enquiry_id'] ?></td>
								<td><?php echo $row3['enquirydate'] ?></td>
								<td><?php echo $row3['roomtype'] ?></td>
								<td><?php echo $row3['noofadults'] ?></td>
								<td><?php echo $row3['noofchildren'] ?></td>
								<td><?php echo $row3['amount'] ?></td>
								<td><a href="enquiryshow.php?action=hbook&heid=<?php echo $row3['enquiry_id'] ?>&hatid=<?php echo $row3['accomodation_type_id'] ?>">Book</a></td>
							</tr>
						</tbody>	
						<?php
						}
						}	else	{
						?>	
						<tbody>	
							<tr align="center">
								<td colspan="6">No Result Found</td>
															
							</tr>
						</tbody>	


						<?php
						}
						?>
						</div>
						
						
					
					
					
				</div><!-- END #main-content-span -->
				
				
				

				<!-- BEGIN #main-content-span -->
				

			</div><!-- END main-content-row -->

			

		</div><!-- END #main-content -->
		
	
		
	</div><!-- END #main -->

	<!-- BEGIN #footer -->
	<?php include('footer.php'); ?>