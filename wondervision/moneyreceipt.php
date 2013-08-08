<?php
session_start();
include("include/config.php");	

if(isset($_REQUEST['submit']))
{
	$sql = "INSERT INTO money_reciept(booking_id,tot_amount,tax,total,advance,balance) VALUES ('WVB4587','".$_REQUEST['tot_amount']."','".$_REQUEST['tax']."','".$_REQUEST['total']."','".$_REQUEST['advance']."','".$_REQUEST['balance']."')";
	$rs = mysql_query($sql);
	
	$_SESSION['flag'] = '1';
?>
<script>

	window.location = 'booking.php';

</script>
<?php	
}	

 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Panel Admin Responsive, with Bootstrap</title>
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
			<a class="brand" href="#">Wonder Vision</a>
			<div class="nav-collapse collapse">
				<!--<form class="navbar-search pull-left" action="">
					<input type="text" class="search-query span2" placeholder="Search">
				</form>-->
				<ul class="nav pull-right">
					<li><a href="#"><i class="icon-asterisk icon-white"></i> Tickets <span class="notify">15</span></a></li>
					<li><a href="#"><i class="icon-cog icon-white"></i> Settings</a></li>
					<li><a href="index.html"><i class="icon-off icon-white"></i> logout</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="breadcrumb">
			<div class="logged pull-right"><span>logged:</span> <a href="#">User user</a></div>
			<ul>
				<li><a href="dashboard.html">Dashboard</a></li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li class="active">Existing customer</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li><a href="#">New customer</a></li>
			</ul>
		</div>
	</div> <!-- END #navbar -->

	<!-- BEGIN #main -->
	<div class="main" id="main">
		<!-- BEGIN #main-nav -->
		<div class="navigation" id="main-nav">
			<div class="facebookpen" style="padding:15px 0 0 15px;">
				
				Facebook
				
			</div>
			<div class="facebookfeed">
				<div class="text">
					<p><img src="http://peeyushchandel.files.wordpress.com/2012/01/1.jpg" alt="" /></p>
					<p><img src="http://peeyushchandel.files.wordpress.com/2012/01/2.jpg" alt="" /></p>
					<p><img src="http://peeyushchandel.files.wordpress.com/2012/01/3.jpg" alt="" /></p>
					<p><img src="http://peeyushchandel.files.wordpress.com/2012/01/4.jpg" alt="" /></p>
					<p><img src="http://peeyushchandel.files.wordpress.com/2012/01/5.jpg" alt="" /></p>
					
				</div>
				
			</div>
		</div> <!-- END #main-nav -->

		<!-- BEGIN #main-content -->
		<div class="content" id="main-content">
			
		<div class="row-fluid" id="main-content-row">
			<!-- BEGIN #main-content-span -->
		<div class="span6" id="main-content-span">
		<h2 style="width:195%;">Money reciept</h2>
		  <div style="float:left;width:1070px;height:250px;margin:25px;border:1px solid #AAAAAA;border-radius:5px;">
				<form method="post" action="">
					<table align="center" style="margin-top:10px;">
				   		<tr><td>Total Amount</td><td><input type="text" name="tot_amount" value="<?php echo $_SESSION['tot_amount'] ?>" /></td></tr>
			  <tr><td>S.C./L.T./C.C.</td><td><input type="text" name="tax" value="<?php echo $_SESSION['tax'] ?>" /></td></tr>
				   		<tr><td>Gross total</td><td><input type="text" name="total" value="<?php echo $_SESSION['total'] ?>" /></td></tr>
				   		<tr><td>Advance</td><td><input type="text" name="advance" value="<?php echo $_SESSION['advance'] ?>"></td></tr>
						<tr><td>Balance</td><td><input type="text" name="balance" value="<?php echo $_SESSION['total'] - $_SESSION['advance'] ?>"></td></tr>
				   		<tr><td>&nbsp;</td>
							<td>
								<input type="submit" class="bbbtn" style="float:right;padding-right:10px;" name="submit" value="Submit">
							</td>
						</tr>
					</table>
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
