<?php
session_start();

include('include/config.php');

if(isset($_REQUEST['book']))
{
$_SESSION['customer_id'] = 'WVC1236'; 
$_SESSION['name'] = 'Soumyajit Mandal';
$_SESSION['email'] = 'sendtosoumyajit@gmail.com';
$_SESSION['addr1'] = '66 Purbachal Road';
$_SESSION['addr2'] = 'Sonarpur';
$_SESSION['city'] = 'Kolkata';
$_SESSION['pin'] = '700150';
$_SESSION['mobile'] = '9477411305';
$_SESSION['from_city'] = $_REQUEST['from_city'];
$_SESSION['to_city'] = $_REQUEST['to_city'];
$_SESSION['no_rooms'] = $_REQUEST['no_rooms'];
$_SESSION['tot_days'] = $_REQUEST['tot_days'];
$_SESSION['arrival_date'] = $_REQUEST['arrival_date'];
$_SESSION['departure_date'] = $_REQUEST['departure_date'];
$_SESSION['adult_count'] = $_REQUEST['adult_count'];
$_SESSION['child_count'] = $_REQUEST['child_count'];
//$_SESSION['1'] = $_REQUEST['1'];
//$_SESSION['2'] = $_REQUEST['2'];
//$_SESSION['3'] = $_REQUEST['3'];
//$_SESSION['4'] = $_REQUEST['4'];
$_SESSION['any_notes'] = $_REQUEST['any_notes'];

header("Location:booking_2.php");

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
									<form method="post">
										<input type="text" size="24px" name="customer_id" value="WVC2358">
										<input type="button" value="Go" name="Go" onclick="myfunc()" />
									</form>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Mobile</h4></td>
								<td>
									<div id="mobile" style="width:240px;height:25px;border:1px solid #AAAAAA;border-radius:2px;"></div>
								</td>
								
							</tr>
							<tr>
								<td><h4>Name</h4></td>
								<td>
									<div id="name" style="width:240px;height:25px;border:1px solid #AAAAAA;border-radius:2px;">
									</div>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Email</h4></td>
								<td>
								<div id="email" style="width:240px;height:25px;border:1px solid #AAAAAA;border-radius:2px;"></div>
								</td>
								
								
							</tr>
							<tr>
								<td><h4>Address Line 1</h4></td>
								<td>
								<div id="addr1" style="width:240px;height:25px;border:1px solid #AAAAAA;border-radius:2px;"></div>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Address Line 2</h4></td>
								<td>
								<div id="addr2" style="width:240px;height:25px;border:1px solid #AAAAAA;border-radius:2px;"></div>
								</td>
							</tr>
							<tr>
								<td><h4>City</h4></td>
								<td>
								<div id="city" style="width:240px;height:25px;border:1px solid #AAAAAA;border-radius:2px;"></div>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Pin</h4></td>
								<td>
								<div id="pin" style="width:240px;height:25px;border:1px solid #AAAAAA;border-radius:2px;"></div>
								</td>
							</tr>
							<tr>
								<td><h4>From City</h4></td>
								<td><input type="text" size="30px" name="from_city" value="Kolkata"></td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>To city</h4></td>
								<td><input type="text" size="30px" name="to_city" value="Puri"></td>
							</tr>
							<tr>
								<td><h4>No of rooms</h4></td>
								<td>
									<select name="no_rooms" style="width:240px; height:25px; ">
										<option value="0">1</option>
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
									
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Total days</h4></td>
								<td>
									<select name="tot_days" style="width:240px; height:25px; ">
										<option value="3">3</option>
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
								<td><input type="text" size="30px" id="datepicker1" name="departure_date"></td>
							</tr>
							<tr>
								<td><h4>Adult</h4></td>
								<td>
									<select name="adult_count" style="width:240px; height:25px; ">
										<option value="2">2</option>
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
								<td>&nbsp;</td>
								<td><h4>Child</h4></td>
								<td>
									<select name="child_count" style="width:240px; height:25px; ">
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
								<td><h4>Hotel</h4></td>
								<td>
								<div class="slideThree">	
									<input type="checkbox" value="None" id="slideThree" name="1" />
									<label for="slideThree"></label>
								</div>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Resort</h4></td>
								<td>
								<div class="slideThree1">	
									<input type="checkbox" value="None" id="slideThree1" name="2" />
									<label for="slideThree1"></label>
								</div>
								</td>
							</tr>
							<tr>
								<td><h4>Package</h4></td>
								<td>
								<div class="slideThree2">	
									<input type="checkbox" value="None" id="slideThree2" name="3" />
									<label for="slideThree2"></label>
								</div>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Transportation</h4></td>
								<td>
								<div class="slideThree1">	
									<input type="checkbox" value="None" id="slideThree3" name="4" />
									<label for="slideThree3"></label>
								</div>
								</td>
							</tr>
							<tr>
								<td><h4>Note</h4></td>
								<td colspan="5">
								<textarea cols="80" rows="5" name="any_notes"></textarea>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value="Submit" class="bbbtn" style="width:120px;" name="save" onclick="alert('Your enquiry have been saved');"></td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td></td>
								<td><input type="submit" value="Book" class="bbbtn" style="width:120px;float:right;" name="book"></td>
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