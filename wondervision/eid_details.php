<?php
session_start();

include('header.php');
date_default_timezone_set('Asia/Calcutta');
$date = date('Y-m-d H:i:s');
$eid=$_GET["eid"];

if(isset($_REQUEST['enquiry']))
{
  //create username
  $username=$_REQUEST['c_fname'].$date;
  $status=1;
   
  
    //user details insert in user_master
	 $sql2 = "INSERT INTO user_master(username,firstname,lastname,status,email,mobile,creation_date,user_typeid) VALUES ('$username','".$_REQUEST['c_fname']."','".$_REQUEST['c_lname']."','$status','".$_REQUEST['c_email']."','".$_REQUEST['c_mobile']."','$date',(SELECT user_typeid FROM `user_types` WHERE user_typeid =4) )";
	
	$rs2 = mysql_query($sql2);
	
	//fetch the highest user_id for create $cus_code
	
	$get=mysql_query("SELECT user_id FROM user_master ORDER BY user_id DESC LIMIT 1 ");	
    while($row = mysql_fetch_assoc($get)) {
	$cus_code=$row['user_id'];	
	}
	$_SESSION['cus_code']=$cus_code;
	
	//insert extra data guest_other_info table
	
	
	if($_REQUEST['c_addrs1']=="" && $_REQUEST['c_addrs2']=="" && $_REQUEST['c_place']=="" && $_REQUEST['c_zip']=="")
	 {
	 
	}
	else
	 {
	 $sql21 = "INSERT INTO user_other_info(user_id,address1,address2,place,zip) VALUES ((select user_id from user_master where user_id='$cus_code'),'".$_REQUEST['c_addrs1']."','".$_REQUEST['c_addrs2']."','".$_REQUEST['c_place']."','".$_REQUEST['c_zip']."' )";
	 $rs21 = mysql_query($sql21); 
	 }

	//insert into enquiry_details value
	
	$sql = "INSERT INTO enquiry_details( 	/*startdate,enddate,startingplace,destination,enquirydate,totaldiscount,net_amount,servicetax,VAT,*/user_id,country_name,state_name) VALUES (/*'".$_REQUEST['arrival_date']."','".$_REQUEST['departure_date']."','".$_REQUEST['from_city']."','".$_REQUEST['to_city']."','$date','".$_REQUEST['discount']."','".$_REQUEST['net_amount']."','".$_REQUEST['s_tax']."','".$_REQUEST['vat']."',*/(select user_id from user_master where user_id='".$cus_code."'),(select country_name from country_master where country_name='".$_REQUEST['c_country']."'),(select state_name from state_master where state_name='".$_REQUEST['c_state']."'))";
	
	
	$rs = mysql_query($sql);
	
	
	 $get=mysql_query("SELECT enquiry_id FROM enquiry_details ORDER BY enquiry_id DESC LIMIT 1 ");
	
    while($row = mysql_fetch_assoc($get)) {
	$idmax=$row['enquiry_id'];
	
	}
	
	
	 $sql1="INSERT INTO enquiry_comments_details
	(enquiry_id,updatedate,comment) values
	((select enquiry_id from enquiry_details where enquiry_id='$idmax'),'$date','".$_REQUEST['any_notes']."')";
	
	
	$rs1 = mysql_query($sql1);

	header("Location:itinerary.php");
}

?>

	  <!--Include JQuery File-->
<script type="text/javascript" language="Javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 
<!--Include JQuery UI File-->
<script type="text/javascript" language="Javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
 

 
	<script type="text/javascript" src="js/myScript.js"></script>
	<script language="JavaScript" type="text/javascript" src="search.js"></script>

	



	<!-- BEGIN #main -->
	<div class="main" id="main">
		<!-- BEGIN #main-nav -->
		<?php include('sidebar.php'); ?>
<!-- BEGIN #main-content -->
		<div class="content" id="main-content">
			
			<div class="row-fluid" id="main-content-row">
				<!-- BEGIN #main-content-span -->
				<div class="span6" id="main-content-span">
				<h2 style="width:195%;">Enquiry Details</h2>
				
					<div class="enquiryfrom" style="padding:15px;">
					
					<?php
						$query10  = "SELECT * FROM enquiry_accomodation_mapping WHERE enquiry_id = '$eid'";
							
							$result10 = mysql_query($query10);
							while($row10 = mysql_fetch_assoc($result10)) {
							
					?>
					<div style="background-color:#EEEEEE;padding:20px;border-radius:8px;">
		 <table border="0" width="100%">
			<tr>
				<td><h4>Hotel details </h4></td>

				<td>
				-----
				</td>
				
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td><h4>Name </h4></td>

				<td>
				<?php
								  
								  $query100="SELECT name,hotel_id FROM hotel_master where (hotel_id=(select hotel_id from accomodation_type_details where accomodation_type_id='".$row10['accomodation_type_id']."'))";
								$result100 = mysql_query($query100);
								
								$row100=mysql_fetch_array($result100);
								
								echo $row100['name']; 								
				?>
				</td>
				
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left"><h4>Adult</h4></td>
				<td width="30%" align="left"><?php echo $row10['noofadults'] ?></td>
				<td width="20%" align="left"><h4>Children</h4></td>
				<td align="left"><?php echo $row10['noofchildren'] ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left"><h4>Room</h4></td>
				<td width="30%" align="left"><?php echo $row10['noofrooms'] ?></td>
				<td width="20%" align="left"><h4>Amount</h4></td>
				<td align="left"><?php echo $row10['amount'] ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left"><h4>Checkin date</h4></td>
				<td width="30%" align="left"><?php echo $row10['checkindate'] ?> </td>
				<td width="20%" align="left"><h4>Checkout date</h4></td>
				<td align="left"><?php echo $row10['checkoutdate'] ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left"><b>&nbsp;</b></td>
				<td width="30%" align="center">
				<table border=0 width=100%>
				<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td align="right">
				<a  href="edithotel.php?eid=<?php echo $eid ?>&hid=<?php echo $row100['hotel_id'] ?>&hname=<?php echo $row100['name'] ?>&adl=<?php echo $row10['noofadults'] ?>&chl=<?php echo $row10['noofchildren'] ?>&rum=<?php echo $row10['noofrooms'] ?>&amt=<?php echo $row10['amount'] ?>&cid=<?php echo $row10['checkindate'] ?>&cod=<?php echo $row10['checkoutdate'] ?>&aid=<?php echo $row10['accomodation_type_id'] ?>&action=edit"><b>Proceed</b></a>
				</td>
				<td align="center"><a  href="edithotel.php?eid=<?php echo $eid ?>&aid=<?php echo $row10['accomodation_type_id'] ?>&action=delete" onclick="return confirm('Are you sure want to delete ??');"><b>Delete</b></a></td>
				</tr>
				</table>
				
				
				
				</td>
				<td width="20%" align="right">&nbsp;</td>
				<td align="left">&nbsp;</td>
			</tr>
		</table>
			<?php
							}
							?>
		</div>					
				</br></br>	
			<div style="background-color:#EEFFEE;padding:20px;border-radius:8px;">		
			<?php
							
							
							$query101  = "SELECT * FROM transport_details WHERE enquiry_id = '$eid'";
							
							$result101 = mysql_query($query101);
							while($row101 = mysql_fetch_assoc($result101)) {
							?>
							
			<table border="0" width="100%">
			<tr>
				<td><h4>Transport details </h4></td>

				<td>
				-----
				</td>
				
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left"><h4>ADULT</h4></td>
				<td width="30%" align="left"><?php echo $row101['noofadults'] ?></td>
				<td width="20%" align="left"><h4>CHILDREN</h4></td>
				<td align="left"><?php echo $row101['noofchildren'] ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left"><h4>START PLACE</h4></td>
				<td width="30%" align="left"><?php echo $row101['startingplace'] ?></td>
				<td width="20%" align="left"><h4>DESTINATION</h4></td>
				<td align="left"><?php echo $row101['destination'] ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left"><h4>FROM_DATE</h4></td>
				<td width="30%" align="left"><?php echo $row101['pickuptime'] ?> </td>
				<td width="20%" align="left"><h4>TO_DATE</h4></td>
				<td align="left"><?php echo $row101['estimatedtime'] ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left"><h4>RATE</h4></td>
				<td width="30%" align="left"><?php echo $row101['rate'] ?> </td>
				<td width="20%" align="left"><h4>TYPE</h4></td>
				<td align="left"><?php echo $row101['vehicletype'] ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left">&nbsp;</td>
				<td width="30%" align="center">
				<table border=0 width=100%>
				<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td align="right">
				<a  href="edittravel.php?tid=<?php echo $row101['transport_id'] ?>&action=edit&eid=<?php echo $eid ?>&adt=<?php echo $row101['noofadults'] ?>&chld=<?php echo $row101['noofchildren'] ?>&sp=<?php echo $row101['startingplace'] ?>&dst=<?php echo $row101['destination'] ?>&fd=<?php echo $row101['pickuptime'] ?>&td=<?php echo $row101['estimatedtime'] ?>&rate=<?php echo $row101['rate'] ?>&type=<?php echo $row101['vehicletype'] ?>"><b>Proceed</b></a>
				</td>
				<td align="center"><a  href="edittravel.php?tid=<?php echo $row101['transport_id'] ?>&action=delete&eid=<?php echo $eid ?>"onclick="return confirm('Are you sure want to delete ??');"><b>Delete</b></a></td>
				</tr>
				</table>
				
				
				
				</td>
				<td width="20%" align="right">&nbsp;</td>
				<td align="left">&nbsp;</td>
			</tr>
			<tr style="background-color:#EEFFFF;>
				<td colspan="4">&nbsp;</b></td>
				
			</tr>
		
		</table>
		
			<?php
							}
							?>

	</div>
	
	
	
					</div>

				</div><!-- END #main-content-span -->
				<!-- BEGIN #main-content-span -->
			</div><!-- END main-content-row -->
		</div><!-- END #main-content -->	
	</div><!-- END #main -->
	<!-- BEGIN #footer -->
	<div class="footer" id="footer">	
		<div class="clearfix"></div>
	</div> <!-- END #footer -->
</body>
</html>