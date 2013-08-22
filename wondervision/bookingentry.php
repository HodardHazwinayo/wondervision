<?php
session_start();

include('header.php');
include('func.php');

$date = date('Y-m-d H:i:s');

$_REQUEST['eid'];
$_REQUEST['uid'];

$query = mysql_query("SELECT * FROM `user_master` INNER JOIN `enquiry_details` ON user_master.user_id = enquiry_details.user_id WHERE user_master.user_id='".$_REQUEST['uid']."' AND enquiry_details.enquiry_id='".$_REQUEST['eid']."'");

?>



<script type="text/javascript">
$(document).ready(function() {
	$('#wait_1').hide();
	$('#drop_1').change(function(){
	  $('#wait_1').show();
	  $('#result_1').hide();
      $.get("func.php", {
		func: "drop_1",
		drop_var: $('#drop_1').val()
      }, function(response){
        $('#result_1').fadeOut();
        setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
      });
    	return false;
	});
});

function finishAjax(id, response) {
  $('#wait_1').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
</script>
</head>


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
				
					<div class="enquiryfrom">
											
						<div style="float:left;margin:0px 0px 20px 140px;">
		
						<form method="post" action="">
						<table>
							<?php while($rows = mysql_fetch_array($query))	{	?>
							<tr>
								<td><h4>Mobile</h4></td>
								<td>
									<input type="text" size="30px" name="c_mobile" id="c_mobile" value="<?php echo $rows['mobile'] ?>" readonly >
									
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Email</h4></td>
								<td>
								<input type="text" size="30px" name="c_email" id="c_email" value="<?php echo $rows['email'] ?>" readonly >
								</td>
								
							</tr>
							<tr>
								<td><h4>First Name</h4></td>
								<td>
									<input type="text" size="30px" name="c_fname" id="c_fname" value="<?php echo $rows['firstname'] ?>" readonly>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Last Name</h4></td>
								<td>
									<input type="text" size="30px" name="c_lname" id="c_lname" value="<?php echo $rows['lastname'] ?>" readonly>
								</td>
							</tr>
							
							
							
							<?php	}	?>
							
						</table>
																			  
							
						
						
						<div id="tabs" style="float:left;width:630px;">
				<ul>
				    <li><a href="#tabs-1">Hotel</a></li>
				    <li><a href="#tabs-2">Transportation</a></li>
				    <!-- <li><a href="#tabs-3">Package</a></li> -->
				</ul>
				  <div id="tabs-1">
					<div style="float:left;width:93%;background-color:#DDDBDB;height:auto;padding:20px;margin-bottom:10px;">
					<form method="post" onsubmit="return vali_hotel()">					
							<fieldset>

 <table border="0" width="80%" >
		<tr>
			<td width="40%"><h4>Hotel Name*</h4></td>
			<td width="20%">
			 <?php
								// $get=mysql_query("SELECT name FROM hotel_master where hotel_type_id=1 and status=1");
								 ?>
								 <!--<select name="h_name" id="h_name" style="width:240px; height:25px; ">
								 <option value="null">SELECT</option> -->
								 <?php
								    //while($row = mysql_fetch_assoc($get))
										//{
								?>
											<!--<option value = "<?php //echo($row['name'])?>" ><?php //echo($row['name']) ?></option>-->
								<?php
										//}
								?>
								<!-- </select>	 -->
								 
								 <select name="drop_1" id="drop_1" style="width:245px; border-radius:5px;">
						
						  <option value="" selected="selected" disabled="disabled">Select a Place</option>
						  
						  <?php getTierOne(); ?>
						
						</select> 
						
						<span id="wait_1" style="display: none;">
						<img alt="Please Wait" src="ajax-loader.gif"/>
						</span>
						<span id="result_1" style="display: none;"></span> 
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>Check In Date</h4></td>
			<td width="20%"><input type="text" size="30px" id="datepicker" name="arrival_date"></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>Check Out date</h4></td>
			<td width="20%"><input type="text" size="30px" id="datepicker1" name="departure_date" onblur="total_date()"></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>No of Adults*</h4></td>
			<td width="20%">
			<select name="adult_count" id="adult_count" style="width:240px; height:25px;">
										
										
										<option value="1">1</option>
										<option value="2" selected>2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>No of Children*</h4></td>
			<td width="20%">
			<select name="child_count"  id="child_count"style="width:240px; height:25px; ">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
			
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>Room</h4></td>
			<td width="20%">
			<select name="no_room"  id="no_room" style="width:240px; height:25px; ">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>Amount*</h4></td>
			<td width="20%"><input type="text" size="30px" id="net_amount" name="net_amount" onblur="net_amount_chk()" >	</td>
			<td>&nbsp;</td>
		</tr>
		
		<tr>
			<td width="40%"><h4>Comment</h4></td>
			<td width="20%"><input type="text" size="30px" id="comment" name="comment" >	</td>
			<td>&nbsp;</td>
		</tr>
		
		<tr>
			<td width="40%">&nbsp;</td>
			<td width="20%"><input type="submit" name="submit" value="Submit" /></td>
			<td>&nbsp;</td>
		</tr>
	</table>
	
</form>
					
					</div>
										
				
				  </div>
				  
				  <div id="tabs-2">
					
					<div style="float:left;width:93%;background-color:#DDDBDB;height:auto;padding:20px;margin-bottom:10px;">
					
						<form method="post" onsubmit="return vali_travel()">					
							

 <table border="0" width="80%" >
			<tr>
			<td width="40%"><h4>AC</h4></td>
			<td width="20%">
			<select name="ac" id="ac" style="width:240px; height:25px;">
										<option value="AC">YES</option>
										<option value="NON-AC" selected>NO</option>
									</select>
			</td>
			<td>&nbsp;</td>
		</tr>
	
		<tr>
			<td width="40%"><h4> From Date</h4></td>
			<td width="20%"><input type="text" size="30px" id="datepicker4" name="arrival_date"></td>
			<td>&nbsp;</td>
		</tr>
		
		<tr>
			<td width="40%"><h4> To Date</h4></td>
			<td width="20%"><input type="text" size="30px" id="datepicker3" name="dept_date"></td>
			<td>&nbsp;</td>
		</tr>
	
		<tr>
			<td width="40%"><h4>No of Adults*</h4></td>
			<td width="20%">
			<select name="adult_count" id="adult_count" style="width:240px; height:25px;">
										
										
										<option value="1">1</option>
										<option value="2" selected>2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>No of Children*</h4></td>
			<td width="20%">
			<select name="child_count"  id="child_count"style="width:240px; height:25px; ">
										<option value="0" selected>0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
			
			</td>
			<td>&nbsp;</td>
		</tr>
		</tr>
		<tr>
			<td width="40%"><h4>Strating Place* </h4></td>
			<td width="20%">
			<input type="text" size="30px" id="vsp" name="vsp">	</td>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>Destination* </h4></td>
			<td width="20%">
			<input type="text" size="30px" id="vd" name="vd">	</td>
			</td>
			<td>&nbsp;</td>
		</tr>
	
		<tr>
			<td width="40%"><h4>Amount*</h4></td>
			<td width="20%"><input type="text" size="30px" id="net_amount2" name="net_amount2" onblur="net_amount_chk()" >	</td>
			<td>&nbsp;</td>
		</tr>
	
		<tr>
			<td width="40%"><h4>Comment</h4></td>
			<td width="20%"><input type="text" size="30px" id="comment2" name="comment2" >	</td>
			<td>&nbsp;</td>
		</tr>
		
		<tr>
			<td width="40%">&nbsp;</td>
			<td width="20%"><input type="submit" value="Save" style="width:120px;" name="t_save" id="t_save"></td>
			<td>&nbsp;</td>
		</tr>
	</table>
	
</form>
					</div>	
						
						
						
						
					  
					  
				  </div>
				  <!-- <div id="tabs-3">
					  
				  </div>-->
				 
			</div>
					
					
					<div style="float:left;width:500px;height:auto;">
				<?php if(isset($_POST['submit'])){
					$drop = $_POST['drop_1'];
					$tier_two = $_POST['tier_two'];
					
					/*$myq = mysql_query("SELECT * FROM location_master INNER JOIN hotel_master ON location_master.location_id = hotel_master.location_id WHERE location_master.location_id='".$drop."' AND hotel_master.hotel_id='".$tier_two."'");
					$myr = mysql_fetch_array($myq);*/
					
					/* $csql = mysql_query("SELECT country_name FROM country_master WHERE country_name='India'");
					$cq = mysql_fetch_assoc($csql);
					
					$ssql = mysql_query("(SELECT state_name FROM state_master WHERE state_name='West Bengal')");
						$sq = mysql_fetch_array($ssql);
						
						$uql = mysql_query("SELECT user_id FROM user_master WHERE user_id='".$_REQUEST['uid']."'");
						$us = mysql_fetch_array($uql);*/
					
					//echo "You selected ";
					//echo $myr['name']." @ ".$myr['place']." of ".$_REQUEST['state_s']." on ".$_REQUEST['arrival_date']." to ". $_REQUEST['departure_date']." with # of guests ".$_REQUEST['guests']." Adults ".$_REQUEST['adults']." Children ".$_REQUEST['child']." Room type ".$_REQUEST['roomtype']." Total amount ".$_REQUEST['total_amount']." ";
					
					
					/*$isq = "INSERT INTO enquiry_details (startdate,enddate,destination,country_name,state_name,user_id) VALUES ('".date("Y-m-d h:i:s", strtotime($_REQUEST['arrival_date']))."','". date("Y-m-d h:i:s",strtotime($_REQUEST['departure_date']))."','".$myr['place']."','".$cq['country_name']."','".$sq['state_name']."','".$us['user_id']."')";
					
					$rrq = mysql_query($isq);*/
					
								
					
				/*	$esq = "INSERT INTO enquiry_accomodation_mapping(enquiry_id,checkindate,checkoutdate,noofadults,noofchildren,noofrooms,roomtype,amount) VALUES ((SELECT enquiry_id FROM enquiry_details ORDER BY enquiry_id DESC LIMIT 1),'".date("Y-m-d h:i:s", strtotime($_REQUEST['arrival_date']))."','". date("Y-m-d h:i:s",strtotime($_REQUEST['departure_date']))."','".$_REQUEST['adults']."','".$_REQUEST['child']."','".$_REQUEST['noofrooms']."','".$_REQUEST['roomtype']."','".$_REQUEST['total_amount']."')";
					
					$ers = mysql_query($esq);
					
					$bsql="INSERT INTO booking_details (bookingdate,enquiry_id) VALUES ('".date('Y-m-d H:i:s')."',(SELECT enquiry_id FROM enquiry_details ORDER BY enquiry_id DESC LIMIT 1))";
					
					 $rsqlb = mysql_query($bsql); */
					 
					 
	$arrdate=date("Y-m-d", strtotime($_REQUEST['arrival_date']));
	$deptdate=date("Y-m-d", strtotime($_REQUEST['departure_date']));
   $sql15 = "INSERT INTO enquiry_accomodation_mapping( 	enquiry_id,accomodation_type_id,checkindate,checkoutdate,noofadults,noofchildren,noofrooms,amount,comments) VALUES ((SELECT enquiry_id FROM enquiry_details where enquiry_id='".$_REQUEST['eid']."'),(SELECT accomodation_type_id FROM accomodation_type_details WHERE hotel_id = (SELECT hotel_id FROM hotel_master WHERE hotel_id = '".$tier_two."')),'$arrdate','$deptdate','".$_REQUEST['adult_count']."','".$_REQUEST['child_count']."','".$_REQUEST['no_room']."','".$_REQUEST['net_amount']."','".$_REQUEST['comment']."')";
	
	
	$rs15 = mysql_query($sql15);
	
	if(!empty($rs15))
	{
		$accsql = mysql_query("SELECT * FROM enquiry_accomodation_mapping "); 
	}
				}
				
				if(isset($_POST['t_save'])){
					$arrdate=date("Y-m-d", strtotime($_REQUEST['arrival_date']));
	$deptdate=date("Y-m-d", strtotime($_REQUEST['dept_date']));


    echo $sql10 = "INSERT INTO transport_details( 	vehicletype,noofadults,pickuptime,enquiry_id,startingplace,destination,noofchildren,rate,comments,estimatedtime) VALUES
	('".$_REQUEST['ac']."','".$_REQUEST['adult_count']."','$arrdate',(SELECT enquiry_id FROM enquiry_details ORDER BY enquiry_id DESC LIMIT 1),'".$_REQUEST['vsp']."','".$_REQUEST['vd']."','".$_REQUEST['child_count']."','".$_REQUEST['net_amount2']."','".$_REQUEST['comment2']."','$deptdate')";
	
	
	$rs15 = mysql_query($sql10);
				}
				?>
					
					
					</div>
					
					
			
						<table>
							<tr>
								<td colspan="3">
								<p align="right">
								<input type="submit" value="Next" class="bbbtn" style="width:120px;" name="enquiry" id="enquiry">
								</p>
								</td>
								<td colspan="3">
								<p align="left">
								<input type="submit" value="Cancel" class="bbbtn" style="width:120px;" name="cancel" id="cancel">
								</p>
								</td>
							</tr>
						</table>	
						</form>
						
						
						
						</div>
					</div>
	
					
					
					
				</div><!-- END #main-content-span -->
				
				
				

				<!-- BEGIN #main-content-span -->
				

			</div><!-- END main-content-row -->

			

		</div><!-- END #main-content -->
		
	
		
	</div><!-- END #main -->

	<!-- BEGIN #footer -->
	<?php include('footer.php'); ?>