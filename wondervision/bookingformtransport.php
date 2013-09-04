<?php
session_start();
include("header.php");

$datetime = date('Y-m-d H:i:s');

if(isset($_REQUEST['print']))
{
	$paysql = "INSERT INTO payment_details(booking_id,paidamount,populationdate,commisionamount,totalamount,servicecharge,servicetax,grosstotal,due) VALUES ((SELECT booking_id FROM booking_details ORDER BY booking_id DESC LIMIT 1 ),'".$_REQUEST['advance']."','".$datetime."','".$_REQUEST['comm']."','".$_REQUEST['rate_f']."','".$_REQUEST['charge']."','".$_REQUEST['ser_tax']."','".$_REQUEST['gtotal']."','".$_REQUEST['due']."')"; 

	$payrs = mysql_query($paysql);
	
	
	$get=mysql_query("SELECT payment_id FROM payment_details ORDER BY payment_id DESC LIMIT 1 ");
	
    $row = mysql_fetch_assoc($get);
	$idmax=$row['payment_id'];
	
	$commissionamouts = ($_REQUEST['advance'] * ($_REQUEST['comm']/100));
	
	$transql = "INSERT INTO transaction_master(total_amount,advance_amount,remaining_amount,date,commission_amount,payment_id) VALUES ('".$_REQUEST['gtotal']."','".$_REQUEST['advance']."','".$_REQUEST['due']."','".$datetime."','".$commissionamouts."',(SELECT payment_id FROM payment_details ORDER BY payment_id DESC LIMIT 1 ))";
	
	$transrs = mysql_query($transql);
	
	$gget=mysql_query("SELECT transaction_id FROM transaction_master ORDER BY transaction_id DESC LIMIT 1 ");
	
    while($grow = mysql_fetch_assoc($gget)) {
	$trid=$grow['transaction_id'];
	
	}
	
?>

<script>
		window.location="payment.php?eid=<?php echo $_REQUEST['eid'] ?>&pid=<?php echo $idmax ?>&trid=<?php echo $trid ?>&bid=<?php echo $_REQUEST['bid'] ?>&tid=<?php echo $_REQUEST['tid'] ?>";
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
		  <form method="post">
			<div id="tabs" style="float:left;height:295px;">
				<ul>
				    <li><a href="#tabs-1">Transportation</a></li>
				    <li><a href="#tabs-2">Resort</a></li>
				    <li><a href="#tabs-3">Package</a></li>
				    <li><a href="#tabs-4">Hotel</a></li>
				  </ul>
				  <div id="tabs-1">
					 <table>
					 <?php
						$ttsql = "SELECT * FROM transport_details WHERE transport_id = '".$_REQUEST['tid']."'";
						$ttrs = mysql_query($ttsql);
						
						$ttrow = mysql_fetch_array($ttrs);
					 ?>
						<tr><td><h4>Starting place</h4></td><td><?php echo $ttrow['startingplace'] ?></td></tr>
						<tr><td><h4>Destination</h4></td><td><?php echo $ttrow['destination'] ?></td></tr>
					
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
						<td style="padding-right:40px;" align="center">No of Seat(s)</td>
						<td style="padding-right:40px;" align="center">Total Day(s)</td>
						<td style="padding-right:40px;" align="center">Departure</td>
					</tr>
					<tr>
				
						<td style="padding-right:40px;" align="center"><?php echo $ttrow['pickuptime'] ?></td>
						<td style="padding-right:40px;" align="center"><?php echo $ttrow['noofadults'] + $ttrow['noofchildren'] ?></td>
						<td style="padding-right:40px;" align="center">
						
						<?php   $diff = strtotime($ttrow['estimatedtime']) - strtotime($ttrow['pickuptime']);
								echo $tot_day=floor($diff/(3600*24));
						?>
						<input type="hidden" id="tot_day" value="<?php echo $tot_day ?>">
						</td>
						<td style="padding-right:40px;" align="center"><?php echo $ttrow['estimatedtime'] ?></td>
					</tr>
				</table>
			</div>
				
			</div>
			
			
			
			<div style="float:left;margin:10px;"></div>
			  <div style="float:left;height:auto;padding:10px 80px 10px 20px;border:1px solid #aaaaaa; border-radius:5px;margin:10px 0px;">
					
					<div style="float:left;margin:0px 0px 20px 20px;" id="printableArea">
					<?php
					$usql = mysql_query("SELECT * FROM enquiry_details INNER JOIN user_master ON enquiry_details.user_id=user_master.user_id INNER JOIN user_other_info ON user_other_info.user_id=user_master.user_id WHERE enquiry_id='".$_REQUEST['eid']."'");
					
					while($urow = mysql_fetch_array($usql))	{
					?>
					<table>
					
					<tr>
						<td align="center"><h4>Name</h4></td>
						<td><input type="text" value="<?php echo $urow['firstname']." ".$urow['lastname'] ?>" size="40" readonly></td>
							<td>&nbsp;</td><td>&nbsp;</td>
						<td align="center"><h4>Phone Number</h4></td>
						<td><input type="text" value="<?php echo $urow['mobile'] ?>" size="40" readonly></td>
					</tr>	
						
					<tr>	
						
						<td align="center"><h4>Place</h4></td>
						<td align="center"><input type="text" value="<?php echo $urow['place'] ?>" size="40" readonly></td>
						<td>&nbsp;</td><td>&nbsp;</td>
						<td align="center"><h4>Zip</h4></td>
						<td align="center"><input type="text" value="<?php echo $urow['zip'] ?>" size="40" readonly></td>
						
					</tr>	
					<?php
					}
					?>
					<tr>
						<td align="center"><h4>Adult(s)</h4></td>
						<td align="center"><input type="text" value="<?php echo $ttrow['noofadults'] ?>" size="40" readonly></td>
						<td>&nbsp;</td><td>&nbsp;</td>
						<td align="center"><h4>Child(ren)</h4></td>
						<td align="center"><input type="text" value="<?php echo $ttrow['noofchildren'] ?>" size="40" readonly></td>
					</tr>
					
					</table>
					
					<table align="center">
					<tr>
						
						<td>Booking Plan</td><td></td>
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
					<br />
					<table align="center">
					<tr>
					<form method="post">
					<td><h4>Transportation type</h4></td>
					<td>
						<input type="text" value="<?php echo $ttrow['vehicletype'] ?>" size="20" readonly>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>&nbsp;</td>
					<td>
					
					<h4>Rate of Booking(s)</h4></td>
					<td>
						<input type="text" value="" name="rate" id="rate" size="20" onblur="valid_rate()">
					</td>
						<td>INR / Day</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						
					</tr>
					
					</form>
					</table>
					<br />
					<table align="center">
					<!--<tr>
						
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
						
					</tr>-->	
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
					
				   <?php
				   
				   ?>
						
					
				   	
					
						
			<form method="post">	
					<tr><td><h4>Total Amount</h4></td><td>&nbsp;</td><td>&nbsp;</td><td><input type="text" name="rate_f" id="rate_f"onfocus="cal_ta()" readonly></td></tr>
			
				<tr><td><h4>S.C./L.T./C.C.</h4></td><td>&nbsp;</td><td>&nbsp;</td><td><input type="text" name="charge" id="charge" onblur="test_sc()">%</td></tr>
					
				<tr><td><h4>Service Tax</h4></td><td>&nbsp;</td><td>&nbsp;</td><td><input type="text" name="ser_tax" id="ser_tax" onblur="test_st()">%</td></tr>
				
				<tr><td><h4>Gross total</h4></td><td>&nbsp;</td><td>&nbsp;</td>
				<td><input type="text"  name="gtotal" id="gtotal" onfocus="cal_gt()" readonly></td></tr>
					<tr><td><h4>Advance</h4></td><td>&nbsp;</td><td>&nbsp;</td>
					<td><input type="text" value="" name="advance" id="advance" onblur="test_adv()"></td></tr>
			<tr><td><h4>Due</h4></td><td>&nbsp;</td><td>&nbsp;</td>
					<td><input type="text" value="" name="due" id="due" readonly onfocus="cal_due()"> </td></tr>
					
					<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td></td></tr>
			
						
					</table>
							
					
				   </div>	
			  
			   </div>
			   <div style="float:left;margin:10px;"></div>
			   <div style="float:left;">
			   <table>
			   <tr>
					<td><input type="text" name="comm" placeholder="Commission in %"></td>
					<td><input type="submit" name="print" value="Submit" class="bbbtn" style="width:120px;"></td>
					
			   </tr>
			   </table>
			   </div>
		  </div>
		  </form>
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
