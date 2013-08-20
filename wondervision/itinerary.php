<?php
session_start();

include('include/config.php');
date_default_timezone_set('Asia/Calcutta');
$date = date('Y-m-d H:i:s');
$cus_code=$_SESSION['cus_code']; 

$query  = "SELECT * FROM user_master WHERE user_id = '$cus_code'";
$result = mysql_query($query);

$query1  = "SELECT * FROM user_other_info WHERE user_id = '$cus_code'";
$result1 = mysql_query($query1);

while($row = mysql_fetch_assoc($result)) {

    $fname = $row['firstname'];
	$lname=$row['lastname'];
	$mobile=$row['mobile'];
	$email=$row['email'];	
}

while($row = mysql_fetch_assoc($result1)) {
	$addrs1=$row['address1'];
	$addr2=$row['address2'];
	$place=$row['place'];
	$zip=$row['zip'];
}

if(isset($_REQUEST['book']))
{
/*$_SESSION['customer_id'] = $cus_code; 
$_SESSION['fname'] = $fname;
$_SESSION['lname'] = $lname;
$_SESSION['mobile'] = $mobile;
$_SESSION['phone'] = $phone;
$_SESSION['gender'] = $gender;
$_SESSION['email'] = $email;
$_SESSION['addr1'] = $addrs1;
$_SESSION['addr2'] = $addr2;
$_SESSION['place'] = $place;
$_SESSION['state'] = $state;
$_SESSION['country'] = $country;
$_SESSION['zip'] = $zip;
$_SESSION['mfrom'] = $mfrom;*/
header("Location:undercontruction.php");
}
elseif(isset($_REQUEST['enquiry']))
{
	header("Location:dashboard.php");
}

elseif(isset($_REQUEST['cancel'])){
   
   header("Location:dashboard.php");

}

elseif(isset($_REQUEST['h_save'])){

	$arrdate=date("Y-m-d", strtotime($_REQUEST['arrival_date']));
	$deptdate=date("Y-m-d", strtotime($_REQUEST['departure_date']));
    $sql15 = "INSERT INTO enquiry_accomodation_mapping( 	enquiry_id,accomodation_type_id,checkindate,checkoutdate,noofadults,noofchildren,noofrooms,amount,comments) VALUES ((SELECT enquiry_id FROM enquiry_details ORDER BY enquiry_id DESC LIMIT 1),(SELECT accomodation_type_id FROM accomodation_type_details WHERE hotel_id = (SELECT hotel_id FROM hotel_master WHERE name = '".$_REQUEST['h_name']."')),'$arrdate','$deptdate','".$_REQUEST['adult_count']."','".$_REQUEST['child_count']."','".$_REQUEST['no_room']."','".$_REQUEST['net_amount']."','".$_REQUEST['comment']."')";
	
	
	$rs15 = mysql_query($sql15);

   
   
   header("Location:itinerary.php");

}

elseif(isset($_REQUEST['r_save'])){
	$arrdate=date("Y-m-d", strtotime($_REQUEST['arrival_date']));
	$deptdate=date("Y-m-d", strtotime($_REQUEST['departure_date']));
    $sql15 = "INSERT INTO enquiry_accomodation_mapping( 	enquiry_id,accomodation_type_id,checkindate,checkoutdate,noofadults,noofchildren,noofrooms,amount,comments) VALUES ((SELECT enquiry_id FROM enquiry_details ORDER BY enquiry_id DESC LIMIT 1),(SELECT accomodation_type_id FROM accomodation_type_details WHERE hotel_id = (SELECT hotel_id FROM hotel_master WHERE name = '".$_REQUEST['r_name']."')),'$arrdate','$deptdate','".$_REQUEST['adult_count']."','".$_REQUEST['child_count']."','".$_REQUEST['no_room']."','".$_REQUEST['net_amount1']."','".$_REQUEST['comment']."')";
	
	
	$rs15 = mysql_query($sql15);

   
   
   header("Location:itinerary.php");

}

elseif(isset($_REQUEST['t_save'])){

	$arrdate=date("Y-m-d", strtotime($_REQUEST['arrival_date']));
	$deptdate=date("Y-m-d", strtotime($_REQUEST['dept_date']));


    echo $sql10 = "INSERT INTO transport_details( 	vehicletype,noofadults,pickuptime,enquiry_id,startingplace,destination,noofchildren,rate,comments,estimatedtime) VALUES
	('".$_REQUEST['ac']."','".$_REQUEST['adult_count']."','$arrdate',(SELECT enquiry_id FROM enquiry_details ORDER BY enquiry_id DESC LIMIT 1),'".$_REQUEST['vsp']."','".$_REQUEST['vd']."','".$_REQUEST['child_count']."','".$_REQUEST['net_amount2']."','".$_REQUEST['comment2']."','$deptdate')";
	
	
	$rs15 = mysql_query($sql10);
	

   
   
   header("Location:itinerary.php");

}


		


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Analytical and Business Process Automation & Management tool for Tourism Business</title>
	
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/glyphicons.all.css" />

	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	
	<script type="text/javascript" src="flot/jquery.flot.js"></script>
	<script type="text/javascript" src="flot/jquery.flot.pie.js"></script>
	<script type="text/javascript" src="flot/jquery.flot.resize.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-alert.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-button.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-carousel.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-collapse.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-modal.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-tooltip.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-popover.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-scrollspy.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-tab.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-transition.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-typeahead.js"></script>
	<script type="text/javascript" src="validation.js"></script>

	<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
	

	<!-- DEMO SCRIPTS -->
	<script type="text/javascript" src="js/demo.js"></script>
	
	  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	  <link rel="stylesheet" href="/resources/demos/style.css" />
	  <script>
	  $(function() {
	    $( "#datepicker" ).datepicker();
	  });
	  $(function() {
	    $( "#datepicker1" ).datepicker();
	  });
	   $(function() {
	    $( "#datepicker3" ).datepicker();
	  });
	   $(function() {
	    $( "#datepicker4" ).datepicker();
	  });
	  
	   $(function() {
	    $( "#datepicker5" ).datepicker();
	  });
	  
	   $(function() {
	    $( "#datepicker6" ).datepicker();
	  });
	  </script>
<!-- jquery for fetch value from dilouge box -->	  
	  <script>
			$(function() {
			var h_name = $( "#h_name" ),
			cd = $( "#datepicker" ),
			dd = $( "#departure_date" ),
			allFields = $( [] ).add(h_name).add(cd).add(dd),
			tips = $( ".validateTips" );
			
		
			
			
			function updateTips( t ) {
tips
.text( t )
.addClass( "ui-state-highlight" );
setTimeout(function() {
tips.removeClass( "ui-state-highlight", 1500 );
}, 500 );
}
function checkLength( o, n, min, max ) {
if ( o.val().length > max || o.val().length < min ) {
o.addClass( "ui-state-error" );
updateTips( "Length of " + n + " must be between " +
min + " and " + max + "." );
return false;
} else {
return true;
}
}
function checkRegexp( o, regexp, n ) {
if ( !( regexp.test( o.val() ) ) ) {
o.addClass( "ui-state-error" );
updateTips( n );
return false;
} else {
return true;
}
}
$( "#dialog-form" ).dialog({
autoOpen: false,
height: 472,
width: 550,
modal: true,
close: function() {
allFields.val( "" ).removeClass( "ui-state-error" );
}
});
$( "#dialog-form1" ).dialog({
autoOpen: false,
height: 472,
width: 550,
modal: true,
close: function() {
allFields.val( "" ).removeClass( "ui-state-error" );
}
});

$( "#dialog-form2" ).dialog({
autoOpen: false,
height: 472,
width: 550,
modal: true,
close: function() {
allFields.val( "" ).removeClass( "ui-state-error" );
}
});


$( "#create-user" )
.button()
.click(function() {
 var serviceValues = $("#service").val();
if(serviceValues==1 )
$( "#dialog-form" ).dialog( "open" );

if(serviceValues==2 )
$( "#dialog-form1" ).dialog( "open" );

if(serviceValues==4 )
$( "#dialog-form2" ).dialog( "open" );

if(serviceValues==3 )
$( "#dialog-form3" ).dialog( "open" );


});
});
</script>

<!-- end here the dilouge box -->
	  	
	<script type="text/javascript" src="js/myScript.js"></script>
	
</head>
<body>
	<!-- BEGIN #navbar -->
	<div class="navbar" id="navbar">
		<div class="navbar-inner">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-user icon-white"></span>
			</a>
			<a class="brand" href="#">XLogistics<br><h3>Tour Management Edition</h3></a>
			<div class="nav-collapse collapse">
				
				<ul class="nav pull-right">
					<li><a href="index.php"><i class="icon-off icon-white"></i> logout</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<?php include('menu.php'); ?>
	</div> <!-- END #navbar -->

	<!-- BEGIN #main -->
	<div class="main" id="main">
		<!-- BEGIN #main-nav -->
		<?php include('sidebar.php'); ?>
		
		

		<!-- BEGIN #main-content -->
		<div class="content" id="main-content">
			
			<div class="row-fluid" id="main-content-row">
				<!-- BEGIN #main-content-span -->
				<div class="span6" id="main-content-span">
				<h2 style="width:195%;">Enquiry form</h2>
								
						<div style="float:left;margin:0px 0px 20px 140px;">
						
						
						<form method="post" action="">
						<table>
							<tr>
								<td><h4>Mobile</h4></td>
								<td>
									<input type="text" size="30px" name="c_mobile" id="c_mobile" value="<?php echo($mobile) ?>" readonly >
									
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Email</h4></td>
								<td>
								<input type="text" size="30px" name="c_email" id="c_email" value="<?php echo($email) ?>" readonly >
								</td>
								
							</tr>
							<tr>
								<td><h4>First Name</h4></td>
								<td>
									<input type="text" size="30px" name="c_fname" id="c_fname" value="<?php echo($fname) ?>" readonly >
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Last Name</h4></td>
								<td>
									<input type="text" size="30px" name="c_lname" id="c_lname" value="<?php echo($lname) ?>" readonly>
								</td>		
							</tr>
							<tr>
								<td><h4>Address Line 1</h4></td>
								<td>
								<input type="text" size="30px" name="c_addrs1" id="c_addrs1" value="<?php echo($addrs1) ?>" readonly >
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Address Line 2</h4></td>
								<td>
								<input type="text" size="30px" name="c_addrs2" id="c_addrs2" value="<?php echo($addr2) ?>" readonly >
								</td>
							</tr>
							<tr>
								<td><h4>Place</h4></td>
								<td>
								<input type="text" size="30px" name="c_place" id="c_place" value="<?php echo($place) ?>" readonly  >
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Zip</h4></td>
								<td>
								<input type="text" size="30px" name="c_zip" id="c_zip" value="<?php echo($zip) ?>" readonly >
								</td>
							</tr>

							
							<tr>
								<td><h4>Services</h4></td>
								<td>
								<select id="service" name="service" id="service" style="width:220px; height:25px; ">
								<option value="1">HOTEL</option>
								<option value="2">RESORT</option>
								
								<option value="4">TRAVEL</option>
								</select> 
								</td>
								<td><input type="button" id="create-user"/ value="ADD"></td>
								<td>&nbsp;</td>
								<td><h4>&nbsp;</h4></td>
								<td>
								&nbsp;
								</td>
							</tr>
							
							<!-- Dynamicaly create table for hotel booking-->
							
							<?php
							
							$get=mysql_query("SELECT enquiry_id FROM enquiry_details ORDER BY enquiry_id DESC LIMIT 1 ");
	
							while($row = mysql_fetch_assoc($get)) {
							$idmax=$row['enquiry_id'];
							}
							
							$query10  = "SELECT * FROM enquiry_accomodation_mapping WHERE enquiry_id = '$idmax'";
							
							$result10 = mysql_query($query10);
							while($row10 = mysql_fetch_assoc($result10)) {
							?>
							
							<tr style="background-color:#EEEEEE;border:1px solid #ffffff; height:25px; color:#000000">								<td colspan="6">
								 		<table border="0" width="100%">
			<tr>
				<td align="center" colspan="4"><b>NAME&nbsp;&nbsp; </b>

				
				<?php
								  
								  $query100="SELECT name FROM hotel_master where (hotel_id=(select hotel_id from accomodation_type_details where accomodation_type_id='".$row10['accomodation_type_id']."'))";
								$result100 = mysql_query($query100);
								
								$row100=mysql_fetch_array($result100);
								
								echo $row100['name']; 								
								?>
				</td>
				
			</tr>
			<tr>
				<td width="20%" align="left"><b>ADULT</b></td>
				<td width="30%" align="left"><?php echo $row10['noofadults'] ?></td>
				<td width="20%" align="left"><b>CHILDREN</b></td>
				<td align="left"><?php echo $row10['noofchildren'] ?></td>
			</tr>
			<tr>
				<td width="20%" align="left"><b>ROOM</b></td>
				<td width="30%" align="left"><?php echo $row10['noofrooms'] ?></td>
				<td width="20%" align="left"><b>AMOUNT</b></td>
				<td align="left"><?php echo $row10['amount'] ?></td>
			</tr>
			<tr>
				<td width="20%" align="left"><b>CHECK_IN_DATE</b></td>
				<td width="30%" align="left"><?php echo $row10['checkindate'] ?> </td>
				<td width="20%" align="left"><b>CHECK_OUT_DATE</b></td>
				<td align="left"><?php echo $row10['checkoutdate'] ?></td>
			</tr>
		</table>


								</td>
								
							</tr>
							
							
							<?php
							}
							?>

							 <!-- Dynamicaly create table for travel booking -->
							 
							 <!-- edit korte hobe -->
							 
				<?php
							
							$get1=mysql_query("SELECT enquiry_id FROM enquiry_details ORDER BY enquiry_id DESC LIMIT 1 ");
	
							while($row1 = mysql_fetch_assoc($get1)) {
							$idmax=$row1['enquiry_id'];
							}
							
							$query101  = "SELECT * FROM transport_details WHERE enquiry_id = '$idmax'";
							
							$result101 = mysql_query($query101);
							while($row101 = mysql_fetch_assoc($result101)) {
							?>
							
							<tr style="background-color:#EEFFEE;border:1px solid #ffffff; height:25px; color:#000000">								<td colspan="6">
								 		<table border="0" width="100%">
			<tr>
				<td width="20%" align="left"><b>ADULT</b></td>
				<td width="30%" align="left"><?php echo $row101['noofadults'] ?></td>
				<td width="20%" align="left"><b>CHILDREN</b></td>
				<td align="left"><?php echo $row101['noofchildren'] ?></td>
			</tr>
			<tr>
				<td width="20%" align="left"><b>START PLACE</b></td>
				<td width="30%" align="left"><?php echo $row101['startingplace'] ?></td>
				<td width="20%" align="left"><b>DESTINATION</b></td>
				<td align="left"><?php echo $row101['destination'] ?></td>
			</tr>
			<tr>
				<td width="20%" align="left"><b>FROM_DATE</b></td>
				<td width="30%" align="left"><?php echo $row101['pickuptime'] ?> </td>
				<td width="20%" align="left"><b>TO_DATE</b></td>
				<td align="left"><?php echo $row101['estimatedtime'] ?></td>
			</tr>
			<tr>
				<td width="20%" align="left"><b>RATE</b></td>
				<td width="30%" align="left"><?php echo $row101['rate'] ?> </td>
				<td width="20%" align="left"><b>TYPE</b></td>
				<td align="left"><?php echo $row101['vehicletype'] ?></td>
			</tr>
		</table>


								</td>
								
							</tr>
							
							
							<?php
							}
							?>

						    <tr>
								<td colspan="2">
								<p align="right">
								<input type="submit" value="Save" class="bbbtn" style="width:120px;" name="enquiry" id="enquiry" onclick="fake_submit()">
								</p>
								</td>
								<td colspan="2">
								<p align="left">
								<input type="submit" value="Book" class="bbbtn" style="width:120px;" name="book" id="book">
								</p>
								</td>	
								<td colspan="2">
								<p align="left">
								<input type="submit" value="Cancel" class="bbbtn" style="width:120px;" name="cancel" id="cancel">
								</p>
								</td>
							</tr>
						</table>
						</form>
						</div>
					</div>
					
					<!-- dilouge for hotel -->
					
					<div id="dialog-form" title="HOTEL INFO">
						<p class="validateTips">* fields are required.</p>
						<p align=center>
						<form method="post" onsubmit="return vali_hotel()">					
							<fieldset>

 <table border="0" width="80%" >
		<tr>
			<td width="40%"><h4>Hotel Name*</h4></td>
			<td width="20%">
			 <?php
								 $get=mysql_query("SELECT name FROM hotel_master where hotel_type_id=1 and status=1");
								 ?>
								 <select name="h_name" id="h_name" style="width:240px; height:25px; ">
								 <option value="null">SELECT</option>
								 <?php
								    while($row = mysql_fetch_assoc($get))
										{
								?>
											<option value = "<?php echo($row['name'])?>" ><?php echo($row['name']) ?></option>
								<?php
										}
								?>
								 </select>	
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>Check In Date</h4></td>
			<td width="20%"><input type="text" size="30px" id="datepicker" name="arrival_date" readonly></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>Check Out date</h4></td>
			<td width="20%"><input type="text" size="30px" id="datepicker1" name="departure_date" readonly onblur="total_date()"></td>
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
			<td width="20%"><input type="submit" value="Save" class="bbbtn" style="width:120px;" name="h_save" id="h_save"></td>
			<td>&nbsp;</td>
		</tr>
	</table>
	
</form>
</p>
</fieldset>

						</form>
					</div>
					
					<!-- dilouge for resort -->
					
					<div id="dialog-form1" title="RESORT INFO">
						<p class="validateTips">* fields are required.</p>
						<p align=center>
						<form method="post" onsubmit="return vali_resort()">					
							<fieldset>

 <table border="0" width="80%" >
		<tr>
			<td width="40%"><h4>RESORT Name*</h4></td>
			<td width="20%">
			 <?php
								 $get=mysql_query("SELECT name FROM hotel_master where hotel_type_id=2 and status=1");
								 ?>
								 <select name="r_name" id="r_name" style="width:240px; height:25px; ">
								 <option value="null">SELECT</option>
								 <?php
								    while($row = mysql_fetch_assoc($get))
										{
								?>
											<option value = "<?php echo($row['name'])?>" ><?php echo($row['name']) ?></option>
								<?php
										}
								?>
								 </select>	
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>Check In Date</h4></td>
			<td width="20%"><input type="text" size="30px" id="datepicker3" name="arrival_date" readonly></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>Check Out date</h4></td>
			<td width="20%"><input type="text" size="30px" id="datepicker4" name="departure_date" readonly></td>
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
			<td width="20%"><input type="text" size="30px" id="net_amount1" name="net_amount1" onblur="net_amount_chk()" >	</td>
			<td>&nbsp;</td>
		</tr>
		
		<tr>
			<td width="40%"><h4>Comment</h4></td>
			<td width="20%"><input type="text" size="30px" id="comment" name="comment" >	</td>
			<td>&nbsp;</td>
		</tr>
	
		<tr>
			<td width="40%">&nbsp;</td>
			<td width="20%"><input type="submit" value="Save" class="bbbtn" style="width:120px;" name="r_save" id="r_save"></td>
			<td>&nbsp;</td>
		</tr>
	</table>
	
</form>
</p>
</fieldset>

						</form>
					</div>
					
					
					<!-- dioluge for travel -->
					
					
					<div id="dialog-form2" title="TRAVEL INFO">
						<p class="validateTips">* fields are required.</p>
						<p align=center>
						<form method="post" onsubmit="return vali_travel()">					
							<fieldset>

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
			<td width="20%"><input type="text" size="30px" id="datepicker5" name="arrival_date" readonly></td>
			<td>&nbsp;</td>
		</tr>
		
		<tr>
			<td width="40%"><h4> To Date</h4></td>
			<td width="20%"><input type="text" size="30px" id="datepicker6" name="dept_date" readonly></td>
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
			<td width="20%"><input type="submit" value="Save" class="bbbtn" style="width:120px;" name="t_save" id="t_save"></td>
			<td>&nbsp;</td>
		</tr>
	</table>
	
</form>
</p>
</fieldset>

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