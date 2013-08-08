<?php
session_start();



include('include/config.php');
 date_default_timezone_set('Asia/Calcutta');
 $date = date('Y-m-d H:i:s');
 $cus_code=$_SESSION['code'];
 
 
 
 $query  = "SELECT * FROM guest_master WHERE guest_code = '$cus_code'";
$result = mysql_query($query);

while($row = mysql_fetch_assoc($result)) {

    $fname = $row['firstname'];
	$lname=$row['lastname'];
	$mobile=$row['mobile'];
	$phone=$row['phone'];
	$gender=$row['gender'];
	$email=$row['email'];
	$addrs1=$row['address1'];
	$addr2=$row['address2'];
	$place=$row['place'];
	$state=$row['state'];
	$country=$row['country'];
	$zip=$row['zip'];
	$mfrom=$row['membershipfrom'];
	
}

if(isset($_REQUEST['book']))
{
$_SESSION['customer_id'] = $cus_code; 
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
$_SESSION['mfrom'] = $mfrom;

header("Location:undercontruction.php");

}
else if(isset($_REQUEST['enquiry']))
{

 
$_SESSION['customer_id'] = $cus_code; 
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
$_SESSION['mfrom'] = $mfrom;
	
	header("Location:firstguestenquiry.php");
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Analytical and Business Process Automation & Management tool for Tourism Business</title>
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
	  
	  <style>
	  	input[type=checkbox] {
	  	visibility: hidden;
	  	}

		/* SLIDE THREE */
.slideThree {
	width: 80px;
	height: 26px;
	background: #333;
	margin: 20px auto;

	-webkit-border-radius: 50px;
	-moz-border-radius: 50px;
	border-radius: 50px;
	position: relative;

	-webkit-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
	-moz-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
	box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
}

.slideThree:after {
	content: 'OFF';
	font: 12px/26px Arial, sans-serif;
	color: #F71818;
	position: absolute;
	right: 10px;
	z-index: 0;
	font-weight: bold;
	text-shadow: 1px 1px 0px rgba(255,255,255,.15);
}

.slideThree:before {
	content: 'ON';
	font: 12px/26px Arial, sans-serif;
	color: #00bf00;
	position: absolute;
	left: 10px;
	z-index: 0;
	font-weight: bold;
}

.slideThree label {
	display: block;
	width: 34px;
	height: 20px;

	-webkit-border-radius: 50px;
	-moz-border-radius: 50px;
	border-radius: 50px;

	-webkit-transition: all .4s ease;
	-moz-transition: all .4s ease;
	-o-transition: all .4s ease;
	-ms-transition: all .4s ease;
	transition: all .4s ease;
	cursor: pointer;
	position: absolute;
	top: 3px;
	left: 3px;
	z-index: 1;

	-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
	-moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
	box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
	background: #fcfff4;

	background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -o-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -ms-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 );
}

.slideThree input[type=checkbox]:checked + label {
	left: 43px;
}







.slideThree1 {
	width: 80px;
	height: 26px;
	background: #333;
	margin: 20px auto;

	-webkit-border-radius: 50px;
	-moz-border-radius: 50px;
	border-radius: 50px;
	position: relative;

	-webkit-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
	-moz-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
	box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
}

.slideThree1:after {
	content: 'OFF';
	font: 12px/26px Arial, sans-serif;
	color: #F71818;
	position: absolute;
	right: 10px;
	z-index: 0;
	font-weight: bold;
	text-shadow: 1px 1px 0px rgba(255,255,255,.15);
}

.slideThree1:before {
	content: 'ON';
	font: 12px/26px Arial, sans-serif;
	color: #00bf00;
	position: absolute;
	left: 10px;
	z-index: 0;
	font-weight: bold;
}

.slideThree1 label {
	display: block;
	width: 34px;
	height: 20px;

	-webkit-border-radius: 50px;
	-moz-border-radius: 50px;
	border-radius: 50px;

	-webkit-transition: all .4s ease;
	-moz-transition: all .4s ease;
	-o-transition: all .4s ease;
	-ms-transition: all .4s ease;
	transition: all .4s ease;
	cursor: pointer;
	position: absolute;
	top: 3px;
	left: 3px;
	z-index: 1;

	-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
	-moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
	box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
	background: #fcfff4;

	background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -o-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -ms-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 );
}

.slideThree1 input[type=checkbox]:checked + label {
	left: 43px;
}




.slideThree2 {
	width: 80px;
	height: 26px;
	background: #333;
	margin: 20px auto;

	-webkit-border-radius: 50px;
	-moz-border-radius: 50px;
	border-radius: 50px;
	position: relative;

	-webkit-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
	-moz-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
	box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
}

.slideThree2:after {
	content: 'OFF';
	font: 12px/26px Arial, sans-serif;
	color: #F71818;
	position: absolute;
	right: 10px;
	z-index: 0;
	font-weight: bold;
	text-shadow: 1px 1px 0px rgba(255,255,255,.15);
}

.slideThree2:before {
	content: 'ON';
	font: 12px/26px Arial, sans-serif;
	color: #00bf00;
	position: absolute;
	left: 10px;
	z-index: 0;
	font-weight: bold;
}

.slideThree2 label {
	display: block;
	width: 34px;
	height: 20px;

	-webkit-border-radius: 50px;
	-moz-border-radius: 50px;
	border-radius: 50px;

	-webkit-transition: all .4s ease;
	-moz-transition: all .4s ease;
	-o-transition: all .4s ease;
	-ms-transition: all .4s ease;
	transition: all .4s ease;
	cursor: pointer;
	position: absolute;
	top: 3px;
	left: 3px;
	z-index: 1;

	-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
	-moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
	box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
	background: #fcfff4;

	background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -o-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -ms-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 );
}

.slideThree2 input[type=checkbox]:checked + label {
	left: 43px;
}






.slideThree3 {
	width: 80px;
	height: 26px;
	background: #333;
	margin: 20px auto;

	-webkit-border-radius: 50px;
	-moz-border-radius: 50px;
	border-radius: 50px;
	position: relative;

	-webkit-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
	-moz-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
	box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
}

.slideThree3:after {
	content: 'OFF';
	font: 12px/26px Arial, sans-serif;
	color: #F71818;
	position: absolute;
	right: 10px;
	z-index: 0;
	font-weight: bold;
	text-shadow: 1px 1px 0px rgba(255,255,255,.15);
}

.slideThree3:before {
	content: 'ON';
	font: 12px/26px Arial, sans-serif;
	color: #00bf00;
	position: absolute;
	left: 10px;
	z-index: 0;
	font-weight: bold;
}

.slideThree3 label {
	display: block;
	width: 34px;
	height: 20px;

	-webkit-border-radius: 50px;
	-moz-border-radius: 50px;
	border-radius: 50px;

	-webkit-transition: all .4s ease;
	-moz-transition: all .4s ease;
	-o-transition: all .4s ease;
	-ms-transition: all .4s ease;
	transition: all .4s ease;
	cursor: pointer;
	position: absolute;
	top: 3px;
	left: 3px;
	z-index: 1;

	-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
	-moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
	box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
	background: #fcfff4;

	background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -o-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -ms-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 );
}

.slideThree3 input[type=checkbox]:checked + label {
	left: 43px;
}

			  
	</style>
	
	
	
   
	
	
	
	
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
				<h2 style="width:195%;">  WELCOME &nbsp;&nbsp;&nbsp;&nbsp;<?php echo($fname)." ".($lname);?></h2>
				
					<div class="enquiryfrom">
						
						<div style="float:left;margin:20px 0px 20px 140px;">
						
						<form method="post" action="" onsubmit="return vali()">
						<table>
						    <tr>
								<td><h4>Guest Code</h4></td>
								<td>
								<input type="text" size="30px" name="c_gcode" id="c_gcode" value="<?php echo($cus_code)?>" readonly>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Membership from*</h4></td>
								<td>
								<input type="text" size="30px" name="c_mfrom" id="c_mfrom" value="<?php echo($mfrom) ?>" readonly>
								</td>
							</tr>
							<tr>
								<td><h4>First Name*</h4></td>
								<td>
									<input type="text" size="30px" name="c_fname" id="c_fname" value="<?php echo($fname) ?>" readonly onblur="valid_fname()">
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Last Name*</h4></td>
								<td>
									<input type="text" size="30px" name="c_lname" id="c_lname" value="<?php echo($lname) ?>" readonly onblur="valid_lname()">
								</td>
								
							</tr>
							<tr>
								<td><h4>Mobile</h4></td>
								<td>
									<input type="text" size="30px" name="c_mobile" id="c_mobile" value="<?php echo($mobile) ?>" readonly onblur="valid_phn()">
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Phone</h4></td>
								<td>
								<input type="text" size="30px" name="c_phone" id="c_phone" value="<?php echo($phone) ?>" readonly onblur="valid_phnland()">
								</td>
								
								
							</tr>
								<tr>
								<td><h4>Gender</h4></td>
								<td>
									<input type="text" size="30px" name="c_gender" id="c_gender" value="<?php echo($gender) ?>" readonly >
									
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Email</h4></td>
								<td>
									<input type="text" size="30px" name="c_email" id="c_email" value="<?php echo($email) ?>" readonly onblur="valid_mail1()">
								</td>
							</tr>
							<tr>
								<td><h4>Address Line 1*</h4></td>
								<td>
								<input type="text" size="30px" name="c_addrs1" id="c_addrs1" value="<?php echo($addrs1) ?>" readonly>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Address Line 2</h4></td>
								<td>
								<input type="text" size="30px" name="c_addrs2" id="c_addrs2" value="<?php echo($addr2) ?>" readonly>
								</td>
							</tr>
							<tr>
								<td><h4>Place</h4></td>
								<td>
								<input type="text" size="30px" name="c_place" id="c_place" value="<?php echo($place) ?>" readonly onblur="valid_place()">
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>State*</h4></td>
								<td>
								<input type="text" size="30px" name="c_state" id="c_state" value="<?php echo($state) ?>" readonly>
		
								</td>
							</tr>
							<tr>
								<td><h4>Country*</h4></td>
								<td>
								<input type="text" size="30px" name="c_country" id="c_country" value="<?php echo($country) ?>" readonly onblur="valid_place()">
								 
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Zip</h4></td>
								<td>
								<input type="text" size="30px" name="c_zip" id="c_zip" value="<?php echo($zip) ?>" readonly onblur="valid_zip()">
								</td>
							</tr>
							
						
						
							
							<tr>
								<td colspan="3">
								<p align="right">
								<input type="submit" value="Enquiry" class="bbbtn" style="width:120px;" name="enquiry" id="enquiry">
								</p>
								</td>
								<td colspan="3">
								<p align="left">
								<input type="submit" value="Book" class="bbbtn" style="width:120px;" name="book" id="book">
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
	<div class="footer" id="footer">
		
		<div class="clearfix"></div>
	</div> <!-- END #footer -->

</body>
</html>