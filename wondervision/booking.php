<?php
session_start();
include("include/config.php");	

if(isset($_REQUEST['submit']))
{
	$_SESSION['tot_amount'] = '12000';
	$_SESSION['tax'] = '2000';
	$_SESSION['total'] = '14000';
	$_SESSION['advance'] = $_REQUEST['advance'];
?>
<script>

	window.location = 'moneyreceipt.php';

</script>
<?php	
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
	  
	  <script>
	  $(function() {
	    $( "#tabs" ).tabs();
	  });
	  </script>
	
	<script>
		function showUser(str)
		{
			if (str=="")
			{
				document.getElementById("txtHint").innerHTML="";
				return;
			} 
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","booking.php?ids="+str,true);
			xmlhttp.send();
		}
	</script>
	
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
		
	</script>
	
	
	<script>
		$(function() {
			
			$("#textone").change(function() {
				$("#texttwo").load("textdata/" + $(this).val() + ".txt");
			});
		});
	</script>
	
	<script>
		function myFunction1()
		{
			document.getElementById("demo1").innerHTML="12000";
			document.getElementById("demo2").innerHTML="2000";
			document.getElementById("demo3").innerHTML="14000";
			document.getElementById("demo4").innerHTML="7000";
			document.getElementById("demo5").innerHTML="7000";
			document.getElementById("demo6").innerHTML="3";
		}
	</script>
	
	<script>
		function myFunction2()
		{
			document.getElementById("demo7").innerHTML="Seven Thousand Only";
		}
	</script>
		<script type="text/javascript" src="js/myScript.js"></script>		
</head>
<body onload="loadfnc()">
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
		<h2 style="width:195%;">Booking form</h2>
		  <div style="float:left;width:1050px;height:auto;margin:20px 20px 20px 30px;">
			<div id="tabs" style="float:left;width:430px;height:280px;">
				<ul>
				    <li><a href="#tabs-1">Resort</a></li>
				    <li><a href="#tabs-2">Hotel</a></li>
				    <li><a href="#tabs-3">Package</a></li>
				    <li><a href="#tabs-4">Transportation</a></li>
				  </ul>
				  <div id="tabs-1">
					  <input type="text" placeholder="Resort name" size="30"><br>
					  <input type="text" placeholder="Address Line 1" size="30">
					  <input type="text" placeholder="Address Line 2" size="30">
					  <input type="text" placeholder="Address Line 3" size="30">
					  <input type="text" placeholder="Phone number" size="30">
				 
				  </div>
				  <div id="tabs-2">
					  <input type="text" placeholder="Hotel name" size="30"><br>
					  <input type="text" placeholder="Address Line 1" size="30">
					  <input type="text" placeholder="Address Line 2" size="30">
					  <input type="text" placeholder="Address Line 3" size="30">
					  <input type="text" placeholder="Phone number" size="30">
				  </div>
				  <div id="tabs-3">
					  <input type="text" placeholder="Package name" size="30"><br>
					  <input type="text" placeholder="Address Line 1" size="30">
					  <input type="text" placeholder="Address Line 2" size="30">
					  <input type="text" placeholder="Address Line 3" size="30">
					  <input type="text" placeholder="Phone number" size="30">
				  </div>
				  <div id="tabs-4">
					  <input type="text" placeholder="Transport" size="30"><br>
					  <input type="text" placeholder="Address Line 1" size="30">
					  <input type="text" placeholder="Address Line 2" size="30">
					  <input type="text" placeholder="Address Line 3" size="30">
					  <input type="text" placeholder="Phone number" size="30">
				  </div>
			</div>
			
			<div style="float:left;width:565px;height:215px;margin-left:30px;border:2px solid #AAAAAA; border-radius:5px;">
				<table align="center">
				<tr>
					<td><img src="images/WV.png"></td>
					
				</tr>
				<tr><td><h5>An ISO 9001 : 2008 Tourism Company</h5></td></tr>
				</table>
				<table align="center">
				<tr><td>280 B. B. GANGULY STREET, KOLKATA - 700012, West bengal, India</td></tr>
				</table>
				<table align="center">
				<tr><td>PHONE:+91-33-6534-6942 / 2225 2524 / 4007 8232 FAX: +91-33-2236 5592</td></tr>
				</table>
				<table align="center">
				<tr><td>wondervisionholidays@gmail.com / wondervisionholidays@yahoo.com</td></tr>
				</table>
				<table align="center">
				<tr><td>wondervisionholidays@hotmail.com / wondervisionholidays@rediffmail.com</td></tr>
				</table>
				<table align="center">
				<tr><td><h5>www.wondervisionholidays.com</h5></td></tr>
				</table>
				<table align="center">
				<tr><td><h5>SILIGURI</h5></td>
				<td>&#8226;</td>
				<td><h5>KALIMPONG</h5></td>
				<td>&#8226;</td>
				<td><h5>GANGTOK</h5></td>
				<td>&#8226;</td>
				<td><h5>SRINAGAR</h5></td>
				<td>&#8226;</td>
				<td><h5>LEH</h5></td></tr>
				</table>
				
				
			</div>
			
			<div style="float:left;width:565px;height:65px;margin-left:30px;border:2px solid #AAAAAA;border-radius:5px;">
				<table align="center">
					<tr>
						<td style="padding-right:40px;" align="center">Arrival</td>
						<td style="padding-right:40px;" align="center">No of Room(s)</td>
						<td style="padding-right:40px;" align="center">Total Day(s)</td>
						<td style="padding-right:40px;" align="center">Departure</td>
					</tr>
					<tr>
						<td style="padding-right:40px;" align="center"><input type="text" size="10px" id="datepicker" name="arrival_date" value=""></td>
						<td style="padding-right:40px;" align="center">
							<select>
								<option>Select</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
							</select>
						</td>
						<td style="padding-right:40px;" align="center">
							<select>
								<option>Select</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
							</select>
						</td>
						<td style="padding-right:40px;" align="center"><input type="text" size="10px" id="datepicker1" name="departure_date" value=""></td>
					</tr>
				</table>
			</div>
			<div style="float:left;margin:10px;"></div>
			  <div style="float:left;width:1034px;height:260px;border:2px solid #AAAAAA;border-radius:5px;">
					
					<div style="float:left;margin:15px 5px 5px 75px;">
					<table align="center">
					
					<tr>
						<td>Customer ID</td><td><input type="text" value="" ></td>
						<td>&nbsp;</td>
						<td>Name</td><td><input type="text" value="" ></td>
						<td>&nbsp;</td>
						<td>Phone Number</td><td><input type="text" value="" ></td>
						
					</tr>	
					</table>
					<table align="center">
						<tr>
							<td align="center">Address Line 1</td>
							<td align="center"><input type="text" value=""></td>
							<td align="center">Address Line 2</td>
							<td align="center"><input type="text" value=""></td>
						</tr>
						
						<tr>
							<td align="center">City</td>
							<td align="center"><input type="text" value=""></td>
							<td align="center">Pin</td>
							<td align="center"><input type="text" value=""></td>
						</tr>
					
					</table>
					<table align="center">
					<tr>
						
						<td>No of Guest(s)</td>
						<td>
							<select>
								<option>Select</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
							</select>
						</td>
						<td>&nbsp;</td>
						<td>Adult(s)</td>
						<td>
							<select>
								<option>Select</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
							</select>
						</td>
						<td>&nbsp;</td>
						<td>Child(ren)</td>
						<td>
						<select>
							<option>Select</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
						</select>	
						</td>
						<td>&nbsp;</td>
						<td>* Extra person will be charged as per the Hotel rools</td>
					</tr>	
					</table>
					<table align="center">
					<tr>
						
						<td>Booking Plan</td><td></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>EP</td><td><input type="checkbox"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>CP</td><td><input type="checkbox"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>MAP</td><td><input type="checkbox"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>AP</td><td><input type="checkbox"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>MAPI</td><td><input type="checkbox"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>APAI</td><td><input type="checkbox"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>Transportation</td><td><input type="checkbox"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>Package</td><td><input type="checkbox"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						
					</tr>	
					</table>
					<table align="center">
					<tr>
					<td>Type of room(s)/Transportation</td>
					<td>
					<select id="textone" style="float:left;width:150px;height:28px;border:1px solid #AAAAAA;border-radius:5px;">
						<option selected value="base_2">Select</option>
						<option value="deluxe">Deluxe</option>
						<option value="standard">Standard</option>
						<option value="duplex">Duplex</option>
					</select>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>&nbsp;</td>
					<td>
					Rate of Booking(s)</td>
					<td>
						<div id="texttwo" style="float:left;width:150px;height:28px;border:1px solid #AAAAAA;border-radius:5px;"></div>
					</td>
						<td>INR</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
						<td align="right;"><input type="image" src="images/round_arrow_right.png" alt="Submit" style="float:right;padding-right:30px;" onclick="myFunction1()"></td>
					</tr>
					</table>
					</div>
		  
			  </div>
			   
			  <div style="float:left;margin:10px;"></div>
			  <div style="float:left;width:1034px;height:330px;">
				   <div style="float:left;border:2px solid #AAAAAA;height:99%;width:49%;border-radius:5px;">
				   	<textarea cols="65" rows="10" placeholder="Remarks"></textarea><br>
				   	&nbsp;Rate for: Conference room/Banquet/Kitchen space/Dining space<br />
				   	&nbsp;<input type="text" size="50">
				   </div>
				   <div style="float:right;border:2px solid #AAAAAA;height:99%;width:50%;border-radius:5px;">
				   <h2>Payments</h2>
				   <form method="post" action="">
				   	<table align="center" style="margin-top:10px;">
				   		<tr><td>Total Amount</td><td><div id="demo1" style="float:left;width:240px;height:24px;border:1px solid #AAAAAA;border-radius:5px;"></div></td></tr>
				   		<tr><td>S.C./L.T./C.C.</td><td><div id="demo2" style="float:left;width:240px;height:24px;border:1px solid #AAAAAA;border-radius:5px;"></div></td></tr>
				   		<tr><td>Gross total</td><td><div id="demo3" style="float:left;width:240px;height:24px;border:1px solid #AAAAAA;border-radius:5px;"></div></td></tr>
				   		<tr><td>Advance</td><td><input type="text" name="advance" style="width:233px;border-radius:3px;"></td></tr>
				   		
						<tr><td>Due</td><td><input type="text" name="due" style="width:233px;border-radius:3px;"></td></tr>
						<tr><td>Service Tax</td><td><input type="text" name="tax" style="width:233px;border-radius:3px;"></td></tr>
						<td>
							<input type="submit" class="bbbtn" style="float:right;padding-right:10px;" name="submit" value="Make Payment">
						</td>
						</tr>
					</table>
						
					</form>	
				   </div>	
			  
			   </div>
			   <div style="float:left;margin:10px;"></div>
			   
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
