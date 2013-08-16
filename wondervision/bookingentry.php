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
									<input type="text" size="30px" name="c_fname" id="c_fname" value="<?php echo $rows['firstname'] ?>" readonly >
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
					<form action="" method="post">
					
						<input type="text" size="30px" id="datepicker" name="arrival_date" placeholder="Arrival"><br />
						
						<input type="text" size="30px" id="datepicker1" name="departure_date" placeholder="Departure"><br />
											  
						<select name="drop_1" id="drop_1" style="width:245px; border-radius:5px;">
						
						  <option value="" selected="selected" disabled="disabled">Select a Place</option>
						  
						  <?php getTierOne(); ?>
						
						</select> 
						
						<span id="wait_1" style="display: none;">
						<img alt="Please Wait" src="ajax-loader.gif"/>
						</span>
						<span id="result_1" style="display: none;"></span> 
						 
						 <br />
						 
						 <select name="guests" style="width:245px; border-radius:5px;">
							<option value="0">Guests</option>
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
					</form>
					</div>
										
				 <?php if(isset($_POST['submit'])){
					$drop = $_POST['drop_1'];
					$tier_two = $_POST['tier_two'];
					
					$myq = mysql_query("SELECT * FROM location_master INNER JOIN hotel_master ON location_master.location_id = hotel_master.location_id WHERE location_master.location_id='".$drop."' AND hotel_master.hotel_id='".$tier_two."'");
					$myr = mysql_fetch_array($myq);
					
					
					echo "You selected ";
					echo $myr['name']." @ ".$myr['place']." on ".$_REQUEST['arrival_date']." to ". $_REQUEST['departure_date']." with # of guests".$_REQUEST['guests'];
				}
				?>
				  </div>
				  
				  <div id="tabs-2">
					  
				  </div>
				  <!-- <div id="tabs-3">
					  
				  </div>-->
				 
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