<?php
session_start();

include('include/config.php');

$cus_code=$_SESSION['customer_id']; 
$fname=$_SESSION['fname']; 
$lname=$_SESSION['lname'];  
$mobile=$_SESSION['mobile']; 
$email=$_SESSION['email']; 
$addrs1=$_SESSION['addr1']; 
$addr2=$_SESSION['addr2']; 
$place=$_SESSION['place']; 
$zip=$_SESSION['zip']; 

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
elseif(isset($_REQUEST['save']))
{
	$sql = "INSERT INTO enq_master(partner_id,partner_name,partner_email,partner_mobile,from_city,to_city,arrival_date,departure_date,adult_count,child_count,is_hotel,is_resort,is_package,is_transportation,any_note) VALUES ('".$_REQUEST['partner_id']."','".$_REQUEST['name']."','".$_REQUEST['email']."','".$_REQUEST['mobile']."','".$_REQUEST['from_city']."','".$_REQUEST['to_city']."','".$_REQUEST['arrival_date']."','".$_REQUEST['departure_date']."','".$_REQUEST['adult_count']."','".$_REQUEST['child_count']."','".$_REQUEST['check1']."','".$_REQUEST['check2']."','".$_REQUEST['check3']."','".$_REQUEST['check4']."','".$_REQUEST['any_notes']."')";
	
	$rs = mysql_query($sql);
	
	header("Location:dashboard.php");
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
	<script type="text/javascript">
	function no_of_room(){
	
	  
	  var k=document.getElementById("adult_count").value;
	
	  var g=Math.ceil(k/2);
	
	  document.getElementById("noroom").value=g;
	  noroom.setAttribute('readonly', 'readonly');   
	  
	  var date1=new Date(document.getElementById("datepicker").value);
	var date2=new Date(document.getElementById("datepicker1").value);
	var diffDays = date2.getDate() - date1.getDate();
	document.getElementById("totdate").value=diffDays;
	}

	
	
	</script>

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
						
						<div style="float:left;margin:20px 0px 20px 140px;">
						
						<form method="post" action="">
						<table>
							<tr>
								<td><h4>Customer ID</h4></td>
								<td>
									<input type="text" size="30px" name="c_gcode" id="c_gcode" value="<?php echo($cus_code)?>" readonly>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Mobile</h4></td>
								<td>
									<input type="text" size="30px" name="c_mobile" id="c_mobile" value="<?php echo($mobile) ?>" readonly>
								</td>
								
							</tr>
							<tr>
								<td><h4>Name</h4></td>
								<td>
									<input type="text" size="30px" name="c_fname" id="c_fname" value="<?php echo($fname)." ".($lname);?>" readonly>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Email</h4></td>
								<td>
								<input type="text" size="30px" name="c_email" id="c_email" value="<?php echo($email) ?>" readonly>
								</td>
								
								
							</tr>
							<tr>
								<td><h4>Address Line 1</h4></td>
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
								<input type="text" size="30px" name="c_place" id="c_place" value="<?php echo($place) ?>" readonly >
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Zip</h4></td>
								<td>
								<input type="text" size="30px" name="c_zip" id="c_zip" value="<?php echo($zip) ?>" readonly>
								</td>
							</tr>
							<tr>
								<td><h4>From city</h4></td>
								<td><input type="text" size="30px" name="from_city" value=""></td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>To city</h4></td>
								<td><input type="text" size="30px" name="to_city" value=""></td>
							</tr>
						
							<tr>
								<td><h4>Adult</h4></td>
								<td>
									<select name="adult_count" id="adult_count" style="width:220px; height:25px;">
										
										
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
								<td><input type="text" size="30px" id="datepicker" name="arrival_date"></td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Departure date</h4></td>
								<td><input type="text" size="30px" id="datepicker1" name="departure_date" onblur="total_date()"></td>
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
								<td><h4>Services</h4></td>
								<td>
								<table border="0" width="100%">
									<tr>
										<td><input type="checkbox" value="hotel" id="1" name="1" > Hotel</td>
										<td><input type="checkbox" value="Resort" id="2" name="2" > Resort</td>
									</tr>
									<tr>
										<td><input type="checkbox" value="Package" id="3" name="3" > Package</td>
										<td><input type="checkbox" value="Transportation" id="4" name="4" > Transportation</td>
									</tr>
								</table>

								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Discount</h4></td>
								<td>
									
									<input type="text" size="30px" id="discount" name="discount">	
								
								</td>
							</tr>
							<tr>
								<td><h4>Net amount</h4></td>
								<td>
								<input type="text" size="30px" id="net_amount" name="net_amount">	
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Service TAX</h4></td>
								<td>
								<input type="text" size="30px" id="s_tax" name="s_tax">	
								</td>
							</tr>
							<tr>
								<td><h4>Reference</h4></td>
								<td>
								<input type="text" size="30px" id="ref" name="ref">	
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>VAT</h4></td>
								<td>
								<input type="text" size="30px" id="vat" name="vat">	
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