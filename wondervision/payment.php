<?php
session_start();
include("header.php");

$booking_id = $_REQUEST['bid'];

$transport_id = $_REQUEST['tid'];

/*if(!empty($transport_id))	{
$usql = "SELECT * FROM transport_details INNER JOIN enquiry_details ON transport_details.enquiry_id=enquiry_details.enquiry_id INNER JOIN user_master ON enquiry_details.user_id=user_master.user_id WHERE transport_id='".$transport_id."'";

$urs = mysql_query($usql);

$urow = mysql_fetch_array($urs);
}	else*/if(!empty($_REQUEST['eid']))	{
$usql = "SELECT * FROM enquiry_details INNER JOIN user_master ON enquiry_details.user_id=user_master.user_id WHERE enquiry_details.enquiry_id='".$_REQUEST['eid']."'";

$urs = mysql_query($usql);

$urow = mysql_fetch_array($urs);

}


if(isset($_REQUEST['submit']))
{
$transql=mysql_query("select * from transaction_master where payment_id='".$_REQUEST['pid']."' order by transaction_id desc limit 1");
$tranrow = mysql_fetch_array($transql);

$transid = $tranrow['transaction_id'];
?>	
<script>
	window.location="transportpayment.php?eid=<?php echo $_REQUEST['eid'] ?>&pid=<?php echo $_REQUEST['pid'] ?>&trid=<?php echo $transid ?>&bid=<?php echo $_REQUEST['bid'] ?>&tid=<?php echo $_REQUEST['tid'] ?>";
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
		    <div style="float:left;height:auto;">
			<form method="post">
				<table border="0">
					<tr>
						<!--<td><h4>Cash reciept #</h4></td><td colspan="3"><?php //echo $_SESSION['recieptno'] = $recieptno ?></td>-->
						<td><h4>Recieved from</h4></td><td colspan="3"><?php echo  $urow['firstname']." ".$urow['lastname'] ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><h4>Date</h4></td><td colspan="3"><?php echo  date('Y-m-d H:i:s'); ?></td>
					</tr>
					<!--<tr>
						<td><h4>Recieved from</h4></td><td colspan="3"><?php //echo $_SESSION['name'] = $mrow['firstname']." ".$mrow['lastname'] ?></td>
					</tr>-->
					<tr>
						<td><h4>Phone number</h4></td><td colspan="3"><?php echo $urow['mobile'] ?></td>
						
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
						<td>&nbsp;</td><td><a href="bookingformtransport.php"><input type="button" value="Back" name="back" class="bbbtn" /></a></td>
					</tr>
				</table>
			</form>
			 <div style="float:left;width:1050px;height:auto;margin:20px 20px 20px 30px;">
			 <?php
			 $hsql = mysql_query("SELECT * FROM transaction_master WHERE payment_id='".$_REQUEST['pid']."'");
			 
			 ?>
				<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
				<thead>
					<tr>
						<th>Gross Total</th>
						<th>Due</th>
						<th>Commission</th>
						<th>Advance</th>
						<th>Date Time</th>
						
					</tr>
				</thead>	
					<?php
					while($hrow = mysql_fetch_array($hsql))
					{
					?>
					<tbody>
					<tr>
						<td align="center"><?php echo $hrow['total_amount'] ?></td>
						<td align="center"><?php echo $hrow['remaining_amount'] ?></td>
						<td align="center"><?php echo $hrow['commission_amount'] ?></td>
						<td align="center"><?php echo $hrow['advance_amount'] ?></td>
						<td align="center"><?php echo $hrow['date'] ?></td>
						
					</tr>
										
					</tbody>
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
