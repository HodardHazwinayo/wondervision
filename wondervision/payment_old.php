<?php
session_start();
include("header.php");

$recieptno = rand().rand();	

$amount = $_REQUEST['amount'];

//echo $bsql = "SELECT * FROM booking_details INNER JOIN payment_details ON booking_details.booking_id=payment_details.booking_id WHERE booking_details.enquiry_id='".$_REQUEST['pid']."' ORDER BY payment_details.payment_id DESC Limit 1";
//query for getting payment details

$bsql = mysql_query("SELECT * FROM booking_details INNER JOIN payment_details ON booking_details.booking_id=payment_details.booking_id WHERE booking_details.enquiry_id='".$_REQUEST['pid']."' ORDER BY payment_details.payment_id DESC Limit 1");
$brow = mysql_fetch_array($bsql);

$bookingid = $brow['booking_id'];

//query for seleting user details

$msql = mysql_query("SELECT * FROM enquiry_details INNER JOIN user_master ON enquiry_details.user_id=user_master.user_id WHERE enquiry_details.enquiry_id='".$_REQUEST['pid']."'");

$mrow = mysql_fetch_array($msql);

if(isset($_REQUEST['submit']))
{
	$_REQUEST['amount_recieved'];
	$_REQUEST['total_amount'];
	
	
	//echo $psql = "INSERT INTO payment_details(booking_id,paidamount,populationdate,payee,totalamount,paymentmode) VALUES ('".$bookingid."','".$_REQUEST['amount_recieved']."','".$_SESSION['populationdate']."','".$_SESSION['name']."','".$_REQUEST['total_amount']."'-'".$_REQUEST['amount_recieved']."','".$_REQUEST['paymentmode']."')";
	
	$psql = mysql_query("INSERT INTO payment_details(booking_id,paidamount,populationdate,payee,totalamount,paymentmode) VALUES ('".$bookingid."','".$_REQUEST['amount_recieved']."','".$_SESSION['populationdate']."','".$_SESSION['name']."','".$_REQUEST['total_amount']."'-'".$_REQUEST['amount_recieved']."','".$_REQUEST['paymentmode']."')");
	
?>
	<script>
	
		window.location='payment.php?refresh&pid=<?php echo $_REQUEST['pid']; ?>';
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
		<h2 style="width:195%;">Money Reciept</h2>
		    <div style="float:left;width:1050px;height:auto;margin:20px 20px 20px 30px;">
			<form method="post">
				<table border="0">
					<tr>
						<!--<td><h4>Cash reciept #</h4></td><td colspan="3"><?php //echo $_SESSION['recieptno'] = $recieptno ?></td>-->
						<td><h4>Recieved from</h4></td><td colspan="3"><?php echo $_SESSION['name'] = $mrow['firstname']." ".$mrow['lastname'] ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><h4>Date</h4></td><td colspan="3"><?php echo $_SESSION['populationdate'] = date('Y-m-d H:i:s'); ?></td>
					</tr>
					<!--<tr>
						<td><h4>Recieved from</h4></td><td colspan="3"><?php //echo $_SESSION['name'] = $mrow['firstname']." ".$mrow['lastname'] ?></td>
					</tr>-->
					<tr>
						<td><h4>Phone number</h4></td><td colspan="3"><?php echo $mrow['mobile'] ?></td>
					</tr>
				
					<tr>
						<td><h4>Amount recieved</h4></td><td><input type="text" name="amount_recieved" value="<?php //echo $brow['paidamount'] ?>" style="width:230px;">&nbsp;/- INR</td>
					</tr>
					
					<tr>
						<td><h4>Total amount</h4></td><td><input type="text" name="total_amount" value="<?php echo $brow['totalamount'] ?>" style="width:230px;" readonly>&nbsp;/- INR</td>
					</tr>
					
					<tr>
						<td><h4>Mode of Payment</h4></td>
						<td><input type="radio" value="Cheque" name="paymentmode">&nbsp;Cheque payment
							<input type="radio" value="Credit card" name="paymentmode"> &nbsp;Credit card
						<input type="radio" value="Cash" name="paymentmode" checked> &nbsp;Cash</td>
						
						
					</tr>
					<tr>
					<?php
					if($brow['totalamount'] == '0')
					{
					?>
					
						<td>&nbsp;</td><td>&nbsp;</td>
					
					<?php	}	else	{	?>
					
						<td>&nbsp;</td><td><input type="submit" value="Submit" name="submit" class="bbbtn"></td>
					
					<?php 
					}
					?>
						<td>&nbsp;</td><td><a href="totalamount.php?eid=<?php echo $_REQUEST['pid']?>"><input type="button" value="Total Bill" name="back" class="bbbtn" /></a></td>
					</tr>
				</table>
			</form>
			 <div style="float:left;width:1050px;height:auto;margin:20px 20px 20px 30px;">
			 <?php
			 $hsql = mysql_query("SELECT * FROM payment_details WHERE booking_id='".$bookingid."'");
			 
			 ?>
				<table width="100%" cellpadding="2" cellspacing="2">
					<tr>
						<th>Total amount</th>
						<th>Recieved amount</th>
						<th>Date Time</th>
						<th>Payment mode</th>
					</tr>
					<?php
					while($hrow = mysql_fetch_array($hsql))
					{
					?>
					<tr>
						<td align="center"><?php echo $hrow['totalamount'] ?></td>
						<td align="center"><?php echo $hrow['paidamount'] ?></td>
						<td align="center"><?php echo $hrow['populationdate'] ?></td>
						<td align="center"><?php echo $hrow['paymentmode'] ?></td>
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
	<div class="footer" id="footer">
		
		<div class="clearfix"></div>
	</div> <!-- END #footer -->

</body>
</html>
