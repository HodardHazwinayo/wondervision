<?php
session_start();
include("header.php");

$eid = $_REQUEST['eid'];	

if(isset($_REQUEST['submit']))
{
	$_SESSION['tot_amount'] = '12000';
	$_SESSION['tax'] = '2000';
	$_SESSION['total'] = '14000';
	$_SESSION['advance'] = $_REQUEST['advance'];
?>
<script>

	window.location = 'moneyreceipt.php';

</script>
<?php	
}	

 
?>


	<!-- DEMO SCRIPTS -->
	<script type="text/javascript" src="js/demo.js"></script>
	
	  	
	  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	  
	  <script>
	  $(function() {
	    $( "#tabs" ).tabs();
	  });
	  </script>
	
	
	
	
	
	
	

	<!-- BEGIN #main -->
	<div class="main" id="main">
		<!-- BEGIN #main-nav -->
		<?php include('sidebar.php'); ?>

		<!-- BEGIN #main-content -->
		<div class="content" id="main-content">
			
		<div class="row-fluid" id="main-content-row">
			<!-- BEGIN #main-content-span -->
		<div class="span6" id="main-content-span">
		<h2 style="width:195%;">Booking form</h2>
		  <div style="float:left;height:auto;margin:20px 20px 20px 30px;">
			<div id="tabs" style="float:left;height:295px;">
				<ul>
				    <li><a href="#tabs-1">Hotel</a></li>
				    <li><a href="#tabs-2">Resort</a></li>
				    <li><a href="#tabs-3">Package</a></li>
				    <li><a href="#tabs-4">Transportation</a></li>
				  </ul>
				  <div id="tabs-1">
					  <?php	$hsql = mysql_query("SELECT * FROM enquiry_accomodation_mapping INNER JOIN accomodation_type_details ON enquiry_accomodation_mapping.accomodation_type_id=accomodation_type_details.accomodation_type_id INNER JOIN hotel_master ON accomodation_type_details.hotel_id=hotel_master.hotel_id WHERE enquiry_accomodation_mapping.enquiry_id='$eid'");
					  
					  
					  
					  $hrow = mysql_fetch_array($hsql);
					 
					  ?>
						<table>
							<tr><td><h4>Hotel name</h4></td><td>&nbsp;</td><td>&nbsp;</td><td><?php echo $hrow['name']?></td></tr>
								<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
							<tr><td><h4>Address</h4></td><td>&nbsp;</td><td>&nbsp;</td><td><?php echo $hrow['address1']?></td></tr>
								<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
							<tr><td><h4>Place</h4></td><td>&nbsp;</td><td>&nbsp;</td><td><?php echo $hrow['place']?></td></tr>
								<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
							<tr><td><h4>Zip</h4></td><td>&nbsp;</td><td>&nbsp;</td><td><?php echo $hrow['zip']?></td></tr>
								<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
							<tr><td><h4>Phone number</h4></td><td>&nbsp;</td><td>&nbsp;</td><td><?php echo $hrow['phonenumber']?></td></tr>
							
						</table>
						
				  </div>
				  <div id="tabs-2">
					 
				  </div>
				  <div id="tabs-3">
					  
				  </div>
				  <div id="tabs-4">
					 
				  </div>
			</div>
			
			<div style="float:left;height:auto;margin-left:5px;border:1px solid #AAAAAA; border-radius:5px;padding:15px;">
				<table align="center">
				<tr>
					<td><img src="images/WV.png"></td>
					
				</tr>
				<tr><td><h5>An ISO 9001 : 2008 Tourism Company</h5></td></tr>
				</table>
				<table align="center">
				<tr><td>280 B. B. GANGULY STREET, KOLKATA - 700012, West bengal, India</td></tr>
				</table>
				<table align="center">
				<tr><td>PHONE:+91-33-6534-6942 / 2225 2524 / 4007 8232 FAX: +91-33-2236 5592</td></tr>
				</table>
				<table align="center">
				<tr><td>wondervisionholidays@gmail.com / wondervisionholidays@yahoo.com</td></tr>
				</table>
				<table align="center">
				<tr><td>wondervisionholidays@hotmail.com / wondervisionholidays@rediffmail.com</td></tr>
				</table>
				<table align="center">
				<tr><td><h5>www.wondervisionholidays.com</h5></td></tr>
				</table>
				<table align="center">
				<tr><td><h5>SILIGURI</h5></td>
				<td>&#8226;</td>
				<td><h5>KALIMPONG</h5></td>
				<td>&#8226;</td>
				<td><h5>GANGTOK</h5></td>
				<td>&#8226;</td>
				<td><h5>SRINAGAR</h5></td>
				<td>&#8226;</td>
				<td><h5>LEH</h5></td></tr>
				</table>
				
				
				<div style="float:left;height:auto;border:1px solid #AAAAAA;border-radius:5px;margin-top:3px;padding:10px;">
				<table align="center">
					<tr>
						<td style="padding-right:40px;" align="center">Arrival</td>
						<td style="padding-right:40px;" align="center">No of Room(s)</td>
						<td style="padding-right:40px;" align="center">Total Day(s)</td>
						<td style="padding-right:40px;" align="center">Departure</td>
					</tr>
					<tr>
						<td style="padding-right:40px;" align="center"><?php echo $hrow['checkindate']?></td>
						<td style="padding-right:40px;" align="center"><?php echo $hrow['noofrooms']?></td>
						<td style="padding-right:40px;" align="center"><?php  ?></td>
						<td style="padding-right:40px;" align="center"><?php echo $hrow['checkoutdate']?></td>
					</tr>
				</table>
			</div>
				
			</div>
			
			
			
			<div style="float:left;margin:10px;"></div>
			  <div style="float:left;height:auto;padding:10px 80px 10px 20px;border:1px solid #aaaaaa; border-radius:5px;margin:10px 0px;">
					
					<div style="float:left;margin:0px 0px 20px 20px;">
					<?php
					$usql = mysql_query("SELECT * FROM enquiry_details INNER JOIN user_master ON enquiry_details.user_id=user_master.user_id INNER JOIN user_other_info ON user_other_info.user_id=user_master.user_id WHERE enquiry_id='".$eid."'");
					
					$urow = mysql_fetch_array($usql);
					?>
					<table>
					
					<tr>
						<td align="center"><h4>Name</h4></td>
						<td><input type="text" value="<?php echo $urow['firstname']." ".$urow['lastname']?>" size="40" readonly></td>
							<td>&nbsp;</td><td>&nbsp;</td>
						<td align="center"><h4>Phone Number</h4></td>
						<td><input type="text" value="<?php echo $urow['mobile'] ?>" size="40" readonly></td>
					</tr>	
						
					<tr>	
						<td align="center"><h4>Address Line 1</h4></td>
						<td align="center"><input type="text" value="<?php echo $urow['address1'] ?>" size="40" readonly></td>
						<td>&nbsp;</td><td>&nbsp;</td>
						<td align="center"><h4>Address Line 2</h4></td>
						<td align="center"><input type="text" value="<?php echo $urow['address2'] ?>" size="40" readonly></td>
					</tr>
					<tr>	
						
						<td align="center"><h4>Place</h4></td>
						<td align="center"><input type="text" value="<?php echo $urow['place'] ?>" size="40" readonly></td>
						<td>&nbsp;</td><td>&nbsp;</td>
						<td align="center"><h4>Zip</h4></td>
						<td align="center"><input type="text" value="<?php echo $urow['zip'] ?>" size="40" readonly></td>
						
					</tr>	
					
					<tr>
						<td align="center"><h4>Adult(s)</h4></td>
						<td align="center"><input type="text" value="<?php echo $hrow['noofadults']?>" size="40" readonly></td>
						<td>&nbsp;</td><td>&nbsp;</td>
						<td align="center"><h4>Child(ren)</h4></td>
						<td align="center"><input type="text" value="<?php echo $hrow['noofchildren']?>" size="40" readonly></td>
					</tr>
					
					</table>
					<br />
					<table align="center">
					<tr>
					<td><h4>Type of room(s)/Transportation</h4></td>
					<td>
						<input type="text" value="<?php echo "Deluxe"; ?>" size="20" readonly>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>&nbsp;</td>
					<td>
					<h4>Rate of Booking(s)</h4></td>
					<td>
						<input type="text" value="<?php echo $hrow['amount'] ?>" size="20" readonly>
					</td>
						<td>INR</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						
					</tr>
					</table>
					<br />
					<table align="center">
					<tr>
						
						<td><h4>Booking Plan</h4></td><td></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>EP</td><td><input type="checkbox"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>CP</td><td><input type="checkbox"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>MAP</td><td><input type="checkbox"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>AP</td><td><input type="checkbox"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>MAPI</td><td><input type="checkbox"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>APAI</td><td><input type="checkbox"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>Transportation</td><td><input type="checkbox"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>Package</td><td><input type="checkbox"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						
					</tr>	
					</table>
					
					</div>
		  
			  </div>
			   
			 
			  <div style="float:left;width:1034px;height:330px;margin:10px 0;">
				   <div style="float:left;border:1px solid #AAAAAA;height:auto;width:40%;border-radius:5px;padding:10px;">
				   	<textarea cols="50" rows="3" placeholder="Remarks"></textarea><br>
				   	&nbsp;Rate for: Conference room/Banquet/Kitchen space/Dining space<br />
				   	&nbsp;<input type="text" size="50">
				   </div>
				   
				   <div style="float:left;border:1px solid #AAAAAA;height:auto;width:40%;border-radius:5px;margin-left:5px;">
				   <h2>Payments</h2>
				 
				   	<table style="margin-top:10px;padding:30px;">
				   		<tr><td><h4>Total Amount</h4></td><td>&nbsp;</td><td>&nbsp;</td><td><?php echo $hrow['amount'] ?></td></tr>
							<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
				   		<tr><td><h4>S.C./L.T./C.C.</h4></td><td>&nbsp;</td><td>&nbsp;</td><td></td></tr>
							<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
				   		<tr><td><h4>Service Tax</h4></td><td>&nbsp;</td><td>&nbsp;</td><td><?php echo $hrow['servicetax']?></td></tr>
							<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr><td><h4>Gross total</h4></td><td>&nbsp;</td><td>&nbsp;</td><td><?php echo $hrow['amount'] + ($hrow['amount'] * ($hrow['servicetax'] / 100)) ?></td></tr>
					</table>
						
					
				   </div>	
			  
			   </div>
			   <div style="float:left;margin:10px;"></div>
			   <div style="float:left;">
			   <table>
			   <tr>
					<td><input type="button" name="print" value="Print" class="bbbtn" style="width:120px;"></td>
					
			   </tr>
			   </table>
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
