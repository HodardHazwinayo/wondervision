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
	 /*$sql = "INSERT INTO enquiry_details( 	startdate,enddate,startingplace,destination,enquirydate,totaldiscount,net_amount,servicetax,VAT,user_id,country_name,state_name) VALUES ('".$_REQUEST['arrival_date']."','".$_REQUEST['departure_date']."','".$_REQUEST['from_city']."','".$_REQUEST['to_city']."','$date','".$_REQUEST['discount']."','".$_REQUEST['net_amount']."','".$_REQUEST['s_tax']."','".$_REQUEST['vat']."',(select user_id from user_master where user_id='".$cus_code."'),(select country_name from country_master where country_name='".$_REQUEST['c_country']."'),(select state_name from state_master where state_name='".$_REQUEST['c_state']."'))";
	
	
	$rs = mysql_query($sql);
	
	
	 $get=mysql_query("SELECT enquiry_id FROM enquiry_details ORDER BY enquiry_id DESC LIMIT 1 ");
	
    while($row = mysql_fetch_assoc($get)) {
	$idmax=$row['enquiry_id'];
	
	}
	
	
	 $sql1="INSERT INTO enquiry_comments_details
	(enquiry_id,updatedate,comment) values
	((select enquiry_id from enquiry_details where enquiry_id='$idmax'),'$date','".$_REQUEST['any_notes']."')";
	
	
	$rs1 = mysql_query($sql1);*/

	header("Location:itinerary.php");
}

elseif(isset($_REQUEST['cancel'])){
   
   header("Location:dashboard.php");

}

elseif(isset($_REQUEST['h_save'])){
    $sql15 = "INSERT INTO enquiry_accomodation_mapping( 	enquiry_id,accomodation_type_id,checkindate,checkoutdate,noofadults,noofchildren,noofrooms,amount,discount,comments,commission) VALUES ((SELECT enquiry_id FROM enquiry_details ORDER BY enquiry_id DESC LIMIT 1),(SELECT accomodation_type_id FROM accomodation_type_details WHERE hotel_id = (SELECT hotel_id FROM hotel_master WHERE name = '".$_REQUEST['h_name']."')),'".$_REQUEST['arrival_date']."','".$_REQUEST['departure_date']."','".$_REQUEST['adult_count']."','".$_REQUEST['child_count']."','".$_REQUEST['no_room']."','".$_REQUEST['net_amount']."','".$_REQUEST['discount']."','".$_REQUEST['comment']."','".$_REQUEST['commision']."')";
	
	
	$rs15 = mysql_query($sql15);

   
   
   header("Location:itinerary.php");

}

elseif(isset($_REQUEST['r_save'])){
    $sql15 = "INSERT INTO enquiry_accomodation_mapping( 	enquiry_id,accomodation_type_id,checkindate,checkoutdate,noofadults,noofchildren,noofrooms,amount,discount,comments,commission) VALUES ((SELECT enquiry_id FROM enquiry_details ORDER BY enquiry_id DESC LIMIT 1),(SELECT accomodation_type_id FROM accomodation_type_details WHERE hotel_id = (SELECT hotel_id FROM hotel_master WHERE name = '".$_REQUEST['r_name']."')),'".$_REQUEST['arrival_date']."','".$_REQUEST['departure_date']."','".$_REQUEST['adult_count']."','".$_REQUEST['child_count']."','".$_REQUEST['no_room']."','".$_REQUEST['net_amount1']."','".$_REQUEST['discount1']."','".$_REQUEST['comment']."','".$_REQUEST['commision1']."')";
	
	
	$rs15 = mysql_query($sql15);

   
   
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
	

	<!-- Uncomment to use LESS The dynamic stylesheet language. | http://lesscss.org/ -->
	<!-- <link rel="stylesheet/less" type="text/css" href="css/main.less" /> -->
	<!-- <script type="text/javascript" src="js/less-1.3.0.min.js"></script> -->

	<!-- Uncomment to use CSS -->
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
height: 600,
width: 700,
modal: true,
close: function() {
allFields.val( "" ).removeClass( "ui-state-error" );
}
});
$( "#dialog-form1" ).dialog({
autoOpen: false,
height: 600,
width: 700,
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

if(serviceValues==3 )
$( "#dialog-form2" ).dialog( "open" );

if(serviceValues==4 )
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
				<!--<form class="navbar-search pull-left" action="">
					<input type="text" class="search-query span2" placeholder="Search">
				</form>-->
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

							<!--
							<tr>
								<td><h4>From city</h4></td>
								<td><input type="text" size="30px" name="from_city" id="from_city" value="" onblur="from_city_chk()"></td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>To city</h4></td>
								<td><input type="text" size="30px" name="to_city" id="to_city" value="" onblur="to_city_chk()"></td>
							</tr>
					
							<tr>
								<td><h4>Adult</h4></td>
								<td>
									<select name="adult_count" id="adult_count" style="width:220px; height:25px;" onchange="document.getElementById('noroom').value='';alert('SELECT NO. OF ROOM')">
										
										
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
								<td>&nbsp;</td>
								<td><h4>Child</h4></td>
								<td>
									<select name="child_count"  style="width:220px; height:25px; ">
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
							</tr>
							
							<tr>
								<td><h4>Arrival date</h4></td>
								<td><input type="text" size="30px" id="datepicker" name="arrival_date" readonly></td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Departure date</h4></td>
								<td><input type="text" size="30px" id="datepicker1" name="departure_date" readonly onblur="total_date()"></td>
							</tr>
							
							<tr>
								<td><h4>No of rooms</h4></td>
								<td>
									<input type="text" size="30px" id="noroom" name="noroom" onfocus="no_of_room()">
									
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Total days</h4></td>
								<td>
								<input type="text" size="30px" id="totdate" name="totdate" readonly>	
								</td>
							</tr>
							
					
							<tr>
									<td><h4>Total days</h4></td>
								<td>
								<input type="text" size="30px" id="totdate" name="totdate" onclick="no_of_days()">	
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Discount</h4></td>
								<td>
									
									<input type="text" size="30px" id="discount" name="discount" onblur="discount_chk()">	
								
								</td>
							</tr>
							<tr>
								<td><h4>Net amount</h4></td>
								<td>
								<input type="text" size="30px" id="net_amount" name="net_amount" onblur="net_amount_chk()">	
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Service TAX</h4></td>
								<td>
								<input type="text" size="30px" id="s_tax" name="s_tax" onblur="service_tax_chk()">	
								</td>
							</tr>
							-->
							<tr>
								<td><h4>Services</h4></td>
								<td>
								<select id="service" name="service" id="service" style="width:220px; height:25px; ">
								<option value="1">HOTEL</option>
								<option value="2">RESORT</option>
								<option value="3">PACKAGE</option>
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
							
							<tr style="background-color:#aaaaaa;border:1px solid #ffffff; height:25px; color:#fff">
								<td >
								Name &nbsp;<?php echo $row10['accomodation_type_id'] ;
								/* echo $query100="SELECT name FROM hotel_master where (hotel_id=(select hotel_id from accomodation_type_details where accomodation_type_id=$row10['accomodation_type_id']))";
								$result100 = mysql_query($query100);
								echo $row100['name']; */								
								?>
								</td>
								<td >Adult&nbsp; <?php echo $row10['noofadults'] ?></td>
								<td >Children&nbsp; <?php echo $row10['noofchildren'] ?></td>
								<td >Room&nbsp; <?php echo $row10['noofrooms'] ?></td>
								<td >Amount&nbsp; <?php echo $row10['amount'] ?> </td>
								<td >Discount&nbsp; <?php echo $row10['discount'] ?></td>
								<td >
								Check In&nbsp;
								<?php echo $row10['checkindate'] ?> &nbsp;&nbsp;&nbsp;
								</td>
								<td >
								Check Out&nbsp;
								<?php echo $row10['checkoutdate'] ?>

								</td>
								
							</tr>
							
							
							<?php
							}
							?>
							
							
							 
							 
							 <!-- Dynamicaly create table for travel booking -->
							
							
							
						    <tr>
								<td colspan="2">
								<p align="right">
								<input type="submit" value="Save" class="bbbtn" style="width:120px;" name="enquiry" id="enquiry">
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
			<td width="40%"><h4>Resort Name*</h4></td>
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
			<td width="20%"><input type="text" size="30px" id="net_amount" name="net_amount" onblur="net_amount_chk()" onclick="date_format()">	</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>Discount*</h4></td>
			<td width="20%"><input type="text" size="30px" id="discount" name="discount" onblur="discount_chk()">	</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>Comment</h4></td>
			<td width="20%"><input type="text" size="30px" id="comment" name="comment" >	</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>Commision*</h4></td>
			<td width="20%"><input type="text" size="30px" id="commision" name="commision">	</td>
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
			<td width="20%"><input type="text" size="30px" id="datepicker4" name="departure_date" readonly onblur="total_date()"></td>
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
			<td width="20%"><input type="text" size="30px" id="net_amount1" name="net_amount1" onblur="net_amount_chk()" onclick="date_format1()">	</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>Discount*</h4></td>
			<td width="20%"><input type="text" size="30px" id="discount1" name="discount1" onblur="discount_chk()">	</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>Comment</h4></td>
			<td width="20%"><input type="text" size="30px" id="comment" name="comment" >	</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="40%"><h4>Commision*</h4></td>
			<td width="20%"><input type="text" size="30px" id="commision1" name="commision1">	</td>
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