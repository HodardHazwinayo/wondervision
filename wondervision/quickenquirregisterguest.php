<?php
session_start();

include('include/config.php');
date_default_timezone_set('Asia/Calcutta');
$date = date('Y-m-d H:i:s');
$cus_code=$_GET["id"];

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

/*$cus_code=$_SESSION['customer_id']; 
$fname=$_SESSION['fname']; 
$lname=$_SESSION['lname'];  
$mobile=$_SESSION['mobile']; 
$email=$_SESSION['email']; 
$addrs1=$_SESSION['addr1']; 
$addr2=$_SESSION['addr2']; 
$place=$_SESSION['place']; 
$zip=$_SESSION['zip']; */

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
	 $sql = "INSERT INTO enquiry_details( 	startdate,enddate,startingplace,destination,enquirydate,totaldiscount,net_amount,servicetax,VAT,user_id,country_name,state_name) VALUES ('".$_REQUEST['arrival_date']."','".$_REQUEST['departure_date']."','".$_REQUEST['from_city']."','".$_REQUEST['to_city']."','$date','".$_REQUEST['discount']."','".$_REQUEST['net_amount']."','".$_REQUEST['s_tax']."','".$_REQUEST['vat']."',(select user_id from user_master where user_id='".$cus_code."'),(select country_name from country_master where country_name='".$_REQUEST['c_country']."'),(select state_name from state_master where state_name='".$_REQUEST['c_state']."'))";
	
	
	$rs = mysql_query($sql);
	
	
	 $get=mysql_query("SELECT enquiry_id FROM enquiry_details ORDER BY enquiry_id DESC LIMIT 1 ");
	
    while($row = mysql_fetch_assoc($get)) {
	$idmax=$row['enquiry_id'];
	
	}
	
	
	 $sql1="INSERT INTO enquiry_comments_details
	(enquiry_id,updatedate,comment) values
	((select enquiry_id from enquiry_details where enquiry_id='$idmax'),'$date','".$_REQUEST['any_notes']."')";
	
	
	$rs1 = mysql_query($sql1);

	header("Location:dashboard.php");
}

elseif(isset($_REQUEST['cancel'])){
   
   header("Location:dashboard.php");

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
			var name = $( "#name" ),
			email = $( "#email" ),
			password = $( "#password" ),
			allFields = $( [] ).add( name ).add( email ).add( password ),
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
height: 300,
width: 350,
modal: true,
buttons: {
"ADD HOTEL": function() {
var bValid = true;
allFields.removeClass( "ui-state-error" );
bValid = bValid && checkLength( name, "username", 3, 16 );
bValid = bValid && checkLength( email, "email", 6, 80 );
bValid = bValid && checkLength( password, "password", 5, 16 );
/*bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" );
bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );*/
if ( bValid ) {
$( "#users tbody" ).append( "<tr>" +
"<td> <h4>HOTEL NAME</h4> </td>" +
"  <td> <input type='text' size='27px'  value="+ name.val()+"> </td>" +

"<td>" + email.val() + "</td>" +
"<td>" + password.val() + "</td>" +
"</tr>" );
$( this ).dialog( "close" );
}
},
Cancel: function() {
$( this ).dialog( "close" );
}
},
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
	  
	 
	
	<!--<script>
	function myfunc()
	{
		document.getElementById('name').innerHTML="Abhirup ghosh";
		document.getElementById('email').innerHTML="abhirupghosh1983@gmail.com";
		document.getElementById('mobile').innerHTML="9434538735";
		document.getElementById('addr1').innerHTML="Moulali";
		document.getElementById('addr2').innerHTML="Sealdah";
		document.getElementById('city').innerHTML="Kolkata";
		document.getElementById('pin').innerHTML="700008";
	
	}
	</script>
	-->
	
	
	<script type="text/javascript" src="js/myScript.js"></script>
	<script language="JavaScript" type="text/javascript" src="search.js"></script>
	
<style>	
	#main1{
float:right;
padding:15px;
margin:0px 0px 0px 360px;
width: 265px;
}
#layer2{
	width:262px;
	/*border:1px solid gray;*/
	margin-top: -2px;
	border-bottom-width: 0px;
	position: absolute;
	z-index:3px;
}
#layer2 a{
	text-decoration:none;
	text-transform:capitalize;
	padding:5px;
}
.suggest_link{
background-color:#fff;
border-bottom:1px solid gray;
}
.small{
background-color:#fff;
border-bottom:1px solid gray;
}
.suggest_link_over{
background-color:#fff;
border-bottom:1px solid gray;
}
.suggest_link:hover{
background-color:#6d84b4;
border-bottom:1px solid gray;
}
.suggest_link_over:hover{
background-color:#6d84b4;
border-bottom:1px solid gray;
}
#amots{
	padding:5px;
	border-radius:none;
	width:250px;
	border:2px solid gray;
	background: url("search.png") no-repeat scroll right 0 transparent;
}

</style>

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
				
					<div class="enquiryfrom">
					<div id="main1">
					Search By Name or Mobile:<br />
					<input type="text" id="amots" name="amots" onKeyUp="bleble();" autocomplete="off"/>
					<div id="layer2"></div>
					</div> 
						<?php /*isset($_REQUEST['action']='edit')
						{ */
						?>
						
						<div style="float:left;margin:0px 0px 20px 140px;">
						
						
						<form method="post" action="" onsubmit="return valid()">
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
							<!-- new field add here -->
							
								<tr>
								<td><h4>Country</h4></td>
								<td>
								 <?php
								 $get=mysql_query("SELECT country_name FROM country_master");
								 ?>
								 <select name="c_country" id="c_country" style="width:220px; height:25px; ">
								 <option value="null">SELECT</option>
								 <?php
								    while($row = mysql_fetch_assoc($get))
										{
								?>
											<option value = "<?php echo($row['country_name'])?>" ><?php echo($row['country_name']) ?></option>
								<?php
										}
								?>
								 </select>	

								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
									<td><h4>State</h4></td>
								<td>
								<?php
								 $get=mysql_query("SELECT state_name FROM state_master");
								 ?>
								 <select name="c_state" id="c_state" style="width:220px; height:25px; ">
								 <option value="null">SELECT</option>
								 <?php
								    while($row = mysql_fetch_assoc($get))
										{
								?>
											<option value = "<?php echo($row['state_name'])?>" ><?php echo($row['state_name']) ?></option>
								<?php
										}
								?>
								 </select>	
								</td>
								
							</tr>
							<!-- new field add here -->
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
								<td><h4>Reference</h4></td>
								<td>
								<input type="text" size="30px" id="ref" name="ref">	
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>&nbsp;</h4></td>
								<td>
								<!--<input type="text" size="30px" id="vat" name="vat" onblur="vat_chk()">	-->
								&nbsp;
								</td>
							</tr>
							
							<!-- table create from dilouge box -->
							<tr>
							<td colspan="6">
							<div id="users-contain" class="ui-widget">

							<table id="users" class="ui-widget ui-widget-content" >

							<tbody >
							</tbody>
							</table>
							</div>
							</td>
							
							</tr>
							
							  
								<tr>
								<td><h4>Note*</h4></td>
								<td colspan="5">
								<textarea cols="80" rows="5" name="any_notes" id="any_notes"></textarea>
								</td>
							</tr>
							
							
							
							
						    <tr>
								<td colspan="3">
								<p align="right">
								<input type="submit" value="Next" class="bbbtn" style="width:120px;" name="enquiry" id="enquiry">
								</p>
								</td>
								<!--<td colspan="2">
								<p align="left">
								<input type="submit" value="Book" class="bbbtn" style="width:120px;" name="book" id="book">
								</p>
								</td>
								-->
								<td colspan="3">
								<p align="left">
								<input type="submit" value="Cancel" class="bbbtn" style="width:120px;" name="cancel" id="cancel">
								</p>
								</td>
							</tr>
						</table>
						</form>
						</div>
						<?php
						/* } */
						?>
					</div>
					
					<!-- dilouge for hotel -->
					
					<div id="dialog-form" title="HOTEL INFO">
						<p class="validateTips">All form fields are required.</p>
						<form>
							<fieldset>
							<label for="name">Hotel Name</label>
							<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
							<label for="email">Phone</label>
							<input type="text" name="email" id="email" value="" class="text ui-widget-content ui-corner-all" />
							<label for="password">Address</label>
							<input type="text" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
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