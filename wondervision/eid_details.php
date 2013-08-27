<?php
session_start();

include('header.php');
date_default_timezone_set('Asia/Calcutta');
$date = date('Y-m-d H:i:s');
$eid=$_GET["eid"];

if(isset($_REQUEST['next_book']))
{
	


}

elseif(isset($_REQUEST['enq']))
{
	$arrdate=date("Y-m-d", strtotime($_REQUEST['arrival_date']));
	$deptdate=date("Y-m-d", strtotime($_REQUEST['departure_date']));
    
	 $sql15 = "UPDATE enquiry_accomodation_mapping SET checkindate='$arrdate',checkoutdate='$deptdate',noofadults='".$_REQUEST['adult']."',noofchildren='".$_REQUEST['child']."',noofrooms='".$_REQUEST['room']."',amount='".$_REQUEST['amount']."',commission='".$_REQUEST['commission']."',discount='".$_REQUEST['discount']."',roomtype='".$_REQUEST['rtype']."',servicetax='".$_REQUEST['servicetax']."'/*,vat='".$_REQUEST['vat']."'*/ WHERE enquiry_id='$eid'";

	$rs15 = mysql_query($sql15);
	
	
	$tarrdate=date("Y-m-d", strtotime($_REQUEST['t_arrival_date']));
	$tdeptdate=date("Y-m-d", strtotime($_REQUEST['t_d_date']));
    
	  $sql15 = "UPDATE transport_details SET pickuptime='$tarrdate',estimatedtime='$tdeptdate',noofadults='".$_REQUEST['tadult']."',noofchildren='".$_REQUEST['tchild']."',startingplace='".$_REQUEST['tsp']."',destination='".$_REQUEST['td']."',rate='".$_REQUEST['tr']."',commission='".$_REQUEST['tc']."',discount='".$_REQUEST['tdsc']."',servicetax='".$_REQUEST['ttax']."',/*vat='".$_REQUEST['vat']."',*/vehicletype='".$_REQUEST['ttype']."' WHERE enquiry_id='$eid'";

	$rs15 = mysql_query($sql15);
	
	?>
	
	<script>
	window.location='totalamount.php?eid=<?php echo $eid ?>';
	</script>
<?php	
	//Header("Location:totalamount.php?eid=$eid");
	
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
							/*if( $row10['servicetax']=="" || $row10['commission']=="" || $row10['discount']=="")
								$valid_next_page=1;*/
							
					?>
					<form method="post" onsubmit="return shownextpage()">
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
				<td width="20%" align="left"><h4>Room</h4></td>
				<td width="30%" align="left"><input type="text" value="<?php echo $row10['noofrooms'] ?>" name="room" id="room"></td>
				
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left"><h4>Adult</h4></td>
				<td width="30%" align="left"><input type="text" value="<?php echo $row10['noofadults'] ?>" name="adult" id="adult"></td>
				<td width="20%" align="left"><h4>Children</h4></td>
				<td align="left"><input type="text" value="<?php echo $row10['noofchildren'] ?>" name="child" id="child"></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left"><h4>Checkin date</h4></td>
				<td width="30%" align="left"><input type="text"  id="datepicker" name="arrival_date" value="<?php echo $row10['checkindate'] ?>"readonly> </td>
				<td width="20%" align="left"><h4>Checkout date</h4></td>
				<td align="left"><input type="text"  id="datepicker1" name="departure_date" readonly value="<?php echo $row10['checkoutdate'] ?>"></td>
			</tr>
			
			<tr><td>&nbsp;</td></tr>
			<tr>
				
				<td width="20%" align="left"><h4>Amount (INR)</h4></td>
				<td align="left"><input type="text" value="<?php echo $row10['amount'] ?>" name="amount" id="amount"></td>
				<td width="20%" align="left"><h4>Discount (%)</h4></td>
				<td width="30%" align="left"><input type="text" value="<?php echo $row10['discount'] ?>" name="discount" id="discount"></td>
			</tr>
			
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left"><h4>Commission (%)</h4></td>
				<td width="30%" align="left"><input type="text" value="<?php echo $row10['commission'] ?>" name="commission" id="commission"> </td>
				<td width="20%" align="left"><h4>Service tax (%)</h4></td>
				<td align="left"><input type="text" value="<?php echo $row10['servicetax'] ?>" name="servicetax" id="servicetax"></td>
			</tr>
			
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left"><h4>ROOM TYPE</h4></td>
				<td width="30%" align="left"><input type="text" value="<?php echo $row10['roomtype'] ?>" name="rtype" id="rtype"> </td>
				<td width="20%" align="left"><h4>&nbsp;</h4></td>
				<td align="left">&nbsp;</td>
			</tr>
			
			<tr><td>&nbsp;</td></tr>
			<!--<tr>
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
			</tr>-->
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
							
							/*if( $row101['servicetax']=="" || $row101['commission']=="" ||  $row101['discount']=="")
								$valid_next_page=1;*/
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
				<td width="20%" align="left"><h4>Adult</h4></td>
				<td width="30%" align="left"><input type="text" value="<?php echo $row101['noofadults'] ?>" name="tadult" id="tadult"> </td>
				<td width="20%" align="left"><h4>Children</h4></td>
				<td align="left"><input type="text" value="<?php echo $row101['noofchildren'] ?>" name="tchild" id="tchild"> </td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left"><h4>Start place</h4></td>
				<td width="30%" align="left"><input type="text" value="<?php echo $row101['startingplace'] ?>" name="tsp" id="tsp"></td>
				<td width="20%" align="left"><h4>Destination</h4></td>
				<td align="left"><input type="text" value="<?php echo $row101['destination'] ?>" name="td" id="td"></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left"><h4>From date</h4></td>
				<td width="30%" align="left"><input type="text"  id="datepicker3" name="t_arrival_date" value="<?php echo $row101['pickuptime'] ?>"readonly> </td>
				<td width="20%" align="left"><h4>To date</h4></td>
				<td align="left"><input type="text" id="datepicker4" name="t_d_date" value="<?php echo $row101['estimatedtime'] ?>"readonly></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left"><h4>Rate (INR)</h4></td>
				<td width="30%" align="left"><input type="text" value="<?php echo $row101['rate'] ?>" name="tr" id="tr"> </td>
				<td width="20%" align="left"><h4>Type</h4></td>
				<td align="left"><input type="text" value="<?php echo $row101['vehicletype'] ?>" name="ttype" id="ttype"></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left"><h4>Commission (%)</h4></td>
				<td width="30%" align="left"><input type="text" value="<?php echo $row101['commission'] ?>" name="tc" id="tc"> </td>
				<td width="20%" align="left"><h4>Service tax (%)</h4></td>
				<td align="left"><input type="text" value="<?php echo $row101['servicetax'] ?>" name="ttax" id="ttax"></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="20%" align="left"><h4>DISCOUNT (%)</h4></td>
				<td width="30%" align="left"><input type="text" value="<?php echo $row101['discount'] ?>" name="tdsc" id="tdsc"> </td>
				<td width="20%" align="left">&nbsp;</td>
				<td align="left">&nbsp;</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<!--<tr>
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
			</tr>-->
			<tr style="background-color:#EEFFFF;>
				<td colspan="4">&nbsp;</b></td>
				
			</tr>
		
		</table>
		
			<?php
							}
							?>

	</div>
	
	
						
		<table width="100%">
		   <tr>
								<td>
								<p align="center">
								<input type="submit" value="Submit" class="bbbtn" style="width:120px;" name="enq" id="enq">
								</p>
								</td>
								
								<td>
								<p align="center">
								<input type="button" value="Cancel" class="bbbtn" style="width:120px;" onclick="history.go(-1);">
								</p>
								</td>
			</tr>
		</table>
		<script type="text/javascript" >

	 function shownextpage()
       {
	 
           submitOK="true";
		   
		
		   if(document.getElementById("amount").value=="" || document.getElementById("discount").value=="" || document.getElementById("commission").value=="" || document.getElementById("servicetax").value=="" || document.getElementById("td").value==""|| document.getElementById("tc").value=="" || document.getElementById("ttax").value=="" || document.getElementById("tdsc").value=="" )
           	{
				  alert("Plese fill up the mandatory field");   
                  submitOK="false";
            }
            
            if(submitOK=="false")
         return false;
			else
         return true;
       }
	</script>
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