<?php
session_start();
include("header.php");	

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
		  <div style="float:left;width:1050px;height:auto;margin:20px 20px 20px 30px;">
			<div id="tabs" style="float:left;width:430px;height:280px;">
				<!-- hotel details -->
			</div>
			
			<div style="float:left;width:565px;height:215px;margin-left:30px;border:2px solid #AAAAAA; border-radius:5px;">
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
				
				
			</div>
			
			<div style="float:left;width:565px;height:65px;margin-left:30px;border:2px solid #AAAAAA;border-radius:5px;">
				<table align="center">
					<tr>
						<td style="padding-right:40px;" align="center">Arrival</td>
						<td style="padding-right:40px;" align="center">No of Room(s)</td>
						<td style="padding-right:40px;" align="center">Total Day(s)</td>
						<td style="padding-right:40px;" align="center">Departure</td>
					</tr>
					<tr>
						<td style="padding-right:40px;" align="center"><?php ?></td>
						<td style="padding-right:40px;" align="center"><?php ?></td>
						<td style="padding-right:40px;" align="center"><?php ?></td>
						<td style="padding-right:40px;" align="center"><?php ?></td>
					</tr>
				</table>
			</div>
			<div style="float:left;margin:10px;"></div>
			  <div style="float:left;width:1034px;height:260px;border:2px solid #AAAAAA;border-radius:5px;">
					
					<div style="float:left;margin:15px 5px 5px 75px;">
					<table align="center">
					
					<tr>
						<td>Name</td><td></td>
						<td>&nbsp;</td>
						<td>Phone Number</td><td></td>
						
					</tr>	
					</table>
					<table align="center">
						<tr>
							<td align="center">Address Line 1</td>
							<td align="center"></td>
							<td align="center">Address Line 2</td>
							<td align="center"></td>
						</tr>
						
						<tr>
							<td align="center">City</td>
							<td align="center"></td>
							<td align="center">Pin</td>
							<td align="center"></td>
						</tr>
					
					</table>
					<table align="center">
					<tr>
						
						
						<td>Adult(s)</td>
						<td>
						<?php ?>
						</td>
						<td>&nbsp;</td>
						<td>Child(ren)</td>
						<td>
						<?php ?>
						</td>
						<td>&nbsp;</td>
						<td>* Extra person will be charged as per the Hotel rools</td>
					</tr>	
					</table>
					
					<table align="center">
					<tr>
					<td>Type of room(s)</td>
					<td>
					<?php ?>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>&nbsp;</td>
					
					</tr>
					</table>
					</div>
		  
			  </div>
			   
			  <div style="float:left;margin:10px;"></div>
			  <div style="float:left;width:1034px;height:330px;">
				   <div style="float:left;border:2px solid #AAAAAA;height:99%;width:49%;border-radius:5px;">
				   	
				   </div>
				   <div style="float:right;border:2px solid #AAAAAA;height:99%;width:50%;border-radius:5px;">
				   <h2>Payments</h2>
				  
				   	<table align="center" style="margin-top:10px;">
				   		<tr><td>Total Amount</td><td><?php ?></td></tr>
				   		<tr><td>Service Tax</td><td><?php ?></td></tr>
				   		<tr><td>Gross total</td><td><?php ?></td></tr>
				   	</table>
						
					
				   </div>	
			  
			   </div>
			   <div style="float:left;margin:10px;"></div>
			   
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
