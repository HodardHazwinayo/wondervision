<?php
session_start();

include('header.php');
date_default_timezone_set('Asia/Calcutta');
$date = date('Y-m-d H:i:s');
$eid=$_GET["eid"];
$total_amount=0;

if(isset($_REQUEST['book']))
{

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
				<h2 style="width:195%;">Total Amount</h2>
				
					<div class="enquiryfrom" style="padding:15px;">
					<div align="center">

					<table border="0" width="70%" style="background-color:#EEEEEE;">
					<?php
							
							
							$sql1="SELECT hotel_master.name,enquiry_accomodation_mapping.amount,enquiry_accomodation_mapping.accomodation_type_id,enquiry_accomodation_mapping.servicetax,enquiry_accomodation_mapping.discount FROM enquiry_accomodation_mapping INNER JOIN accomodation_type_details ON enquiry_accomodation_mapping.accomodation_type_id=accomodation_type_details.accomodation_type_id INNER JOIN hotel_master ON accomodation_type_details.hotel_id=hotel_master.hotel_id WHERE enquiry_accomodation_mapping.enquiry_id='$eid'";

							$rs1 = mysql_query($sql1);
							while($row1 = mysql_fetch_assoc($rs1)) {
					?>
							
							<tr onclick="document.location = 'hotel_bil_generate.php?eid=<?php echo $eid ?>&hname=<?php echo $row1['name'] ?>&atid=<?php echo $row1['accomodation_type_id'] ?>';">
								
								<td width="40%"><h4><?php echo $row1['name'] ?></h4></td>
							
								<td width="20%">&nbsp;</td>
								<td width="40%">
								<h4>
								<?php echo $test=$row1['amount']+(($row1['servicetax']/100)*$row1['amount'])-(($row1['discount']/100)*$row1['amount']);
									
									$total_amount=$total_amount+$test;
									$num_length = strlen((string)$test);
									$test_string = mysql_real_escape_string($test);
									
									if($test_string[$num_length-3] == ".") {
										$add_zero="";	
									} else {
										$add_zero=".00";
									}
								echo $add_zero;

								?>
								</h4>
								</td>
							</tr>
						
							
					
					<?php
							}
					?>
					</table>
					
					</br>
					
					<table border="0" width="70%" style="background-color:#EEFFEE;">
					<?php
							
							
							$sql2="SELECT startingplace,destination,rate,discount,commission,servicetax FROM transport_details WHERE enquiry_id='$eid'";

							$rs2 = mysql_query($sql2);
							while($row2 = mysql_fetch_assoc($rs2)) {
					?>
							<tr>
								<td width="40%"><h4><?php echo $row2['startingplace']?> - <?php echo $row2['destination'] ?></h4></td>
								<td width="20%">&nbsp;</td>
								<td width="40%">
								<h4>
								<?php echo $test=$row2['rate']+(($row2['servicetax']/100)*$row2['rate'])-(($row2['discount']/100)*$row2['rate']);
									
									$total_amount=$total_amount+$test;
									$num_length = strlen((string)$test);
									$test_string = mysql_real_escape_string($test);
									
									if($test_string[$num_length-3] == ".") {
										$add_zero="";	
									} else {
										$add_zero=".00";
									}
								echo $add_zero;

								?>
								</h4>
								</td>
							</tr>
					
					<?php
							}
					?>
					</table>
					</br>
					<table width="70%">
					<td width="40%"><h4>Total Amount</h4></td>
					<td width="20%">&nbsp;</td>
					<td width="40%"><h4>
					<?php
					echo $total_amount;
					$num_length = strlen((string)$total_amount);
					$test_string = mysql_real_escape_string($total_amount);
									
									if($test_string[$num_length-3] == ".") {
										$add_zero="";	
									} else {
										$add_zero=".00";
									}
								echo $add_zero;
					?>
					
					</h4>
					</td>
				
					
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