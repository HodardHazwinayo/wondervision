<?php
session_start();
include("include/config.php");	

if(isset($_REQUEST['submit']))
{
	
?>
<script>

	window.location = 'booking_3.php';

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
		<h2 style="width:195%;">Money Reciept</h2>
		    <div style="float:left;width:1050px;height:auto;margin:20px 20px 20px 30px;">
			<form method="post">
				<table border="0">
					<tr>
						<td><h4>Cash reciept #</h4></td><td colspan="3">1385412632</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><h4>Date</h4></td><td colspan="3"><?php echo date('Y-m-d'); ?></td>
					</tr>
					<tr>
						<td><h4>Recieved from</h4></td><td colspan="3">Prasenjit kumar</td>
					</tr>
					<tr>
						<td><h4>Phone number</h4></td><td colspan="3">9051404842</td>
					</tr>
				
					<tr>
						<td><h4>Amount recieved</h4></td><td><input type="text" name="name" value="2000" style="width:230px;">&nbsp;/- INR</td>
					</tr>
					
					<tr>
						<td><h4>Total amount</h4></td><td><input type="text" name="name" value="5000" style="width:230px;" readonly>&nbsp;/- INR</td>
					</tr>
					
					<tr>
						<td><h4>Mode of Payment</h4></td>
						<td><input type="radio" name="cheque">&nbsp;Cheque payment
							<input type="radio" name="creditcard"> &nbsp;Credit card
						<input type="radio" name="cashpayment" checked> &nbsp;Cash</td>
						
						
					</tr>
					<tr>
						<td>&nbsp;</td><td><input type="submit" value="Submit" name="submit" class="bbbtn"></td>
					</tr>
				
				</table>
			</form>
			 <div style="float:left;width:1050px;height:auto;margin:20px 20px 20px 30px;">
				
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
