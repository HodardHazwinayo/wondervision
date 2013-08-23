<?php
session_start();
error_reporting(0); 
include('include/settings.php');
include('include/config.php');


include('func.php');

$date = date('Y-m-d H:i:s');
$eid=$_GET['eid'];
$tid=$_GET['tid'];
$action=$_GET['action'];
$adt=$_GET['adt'];
$chld=$_GET['chld'];
$sp=$_GET['sp'];
$dst=$_GET['dst'];
$fd=$_GET['fd'];
$td=$_GET['td'];
$rate=$_GET['rate'];
$type=$_GET['type'];

if($action=="delete"){
echo $sql_del="DELETE FROM transport_details WHERE transport_id='$tid'";
$rsdel = mysql_query($sql_del);

Header("Location:eid_details.php?eid=$eid");
}


if(isset($_REQUEST['enquiry']))
{
	$arrdate=date("Y-m-d", strtotime($_REQUEST['arrival_date']));
	$deptdate=date("Y-m-d", strtotime($_REQUEST['departure_date']));
    
	  $sql15 = "UPDATE transport_details SET pickuptime='$arrdate',estimatedtime='$deptdate',noofadults='".$_REQUEST['adult_count']."',noofchildren='".$_REQUEST['child_count']."',startingplace='".$_REQUEST['vsp']."',destination='".$_REQUEST['vd']."',rate='".$_REQUEST['net_amount']."',commission='".$_REQUEST['com']."',discount='".$_REQUEST['dsc']."',servicetax='".$_REQUEST['st']."',/*vat='".$_REQUEST['vat']."',*/vehicletype='".$_REQUEST['ac']."' WHERE transport_id='$tid'";

	$rs15 = mysql_query($sql15);


   header("Location:eid_details.php?eid=$eid");
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
<script>
function set_dropdown_travel(){
document.getElementById("adult_count").selectedIndex = <?php echo $adt-1 ?>;
document.getElementById("child_count").selectedIndex = <?php echo $chld-- ?>;
if(("<?php echo $type ?>=="AC"))
document.getElementById("ac").selectedIndex = 0;
else
document.getElementById("ac").selectedIndex = 1;



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

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	  
	  <script>
	  $(function() {
	    $( "#tabs" ).tabs();
	  });
	  </script>


	</head>
<body onload="set_dropdown_travel()">
	<!-- BEGIN #navbar -->
	<div class="navbar" id="navbar">
		<div class="navbar-inner">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-user icon-white"></span>
			</a>
			<a class="brand" href="#">XLogistics<h3>Tour Management Edition</h3></a>
			<div class="nav-collapse collapse">
				<!--<form class="navbar-search pull-left" action="">
					<input type="text" class="search-query span2" placeholder="Search">
				</form>-->
				
				
				<ul class="nav pull-right">
					<li><a href="#" class="topopup"><i class="icon-asterisk icon-white"></i>Open tickets <span class="notify"></span></a></li>
					<li><a href="logout.php"><i class="icon-off icon-white"></i> logout</a></li>
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
				<h2 style="width:195%;">Travel Booking form</h2>
				
					<div class="enquiryfrom">
											
						<div style="float:left;margin:0px 0px 20px 140px;">

												<form method="post" action="" onsubmit="return valid()">
						<table>
							<tr>
								<td><h4>Starting Place*</h4></td>
								<td>
									<input type="text" size="30px" id="vsp" name="vsp" value='<?php echo $sp ?>'>	</td>
									
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Destination*</h4></td>
								<td>
								
								<input type="text" size="30px" id="vd" name="vd" value='<?php echo $dst ?>'>
								</td>
								
							</tr>
							<tr>
								<td><h4>From Date</h4></td>
								<td>
									<input type="text" size="30px" id="datepicker" name="arrival_date" value='<?php echo $fd ?>'readonly>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>To date</h4></td>
								<td>
									<input type="text" size="30px" id="datepicker1" name="departure_date" value='<?php echo $td ?>'readonly onblur="total_date()">
								</td>
								
								
							</tr>
							<tr>
								<td><h4>No of Adults*</h4></td>
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
								<td><h4>No of Children*</h4></td>
								<td>
								<select name="child_count"  id="child_count"style="width:220px; height:25px; ">
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
								<td><h4>AC</h4></td>
								<td>
									<select name="ac" id="ac" style="width:220px; height:25px;">
										<option value="AC">YES</option>
										<option value="NON-AC">NO</option>
									</select>
									
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Amount* (INR)</h4></td>
								<td>
									<input type="text" size="30px" id="net_amount" name="net_amount" onblur="net_amount_chk()" value='<?php echo $rate ?>'>
								</td>
							</tr>
							<tr>
								<td><h4>Commision ( % )</h4></td>
								<td>
								 <input type="text" size="30px" id="com" name="com" onblur="net_amount_chk()"  >
								

								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
									<td><h4>Discount ( % )</h4></td>
								<td>
								
								<input type="text" size="30px" id="dsc" name="dsc" onblur="net_amount_chk()" >
								</td>
							</tr>
								<tr>
								<td><h4>Service Tax ( % )</h4></td>
								<td>
								 <input type="text" size="30px" id="st" name="st" onblur="net_amount_chk()"  >
								

								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
									<td><h4>&nbsp;</h4></td>
								<td>
								
								&nbsp;
								</td>
							</tr>
													
						
						    <tr>
								<td colspan="6">
								<p align="center">
								<input type="submit" value="Save" class="bbbtn" style="width:120px;" name="enquiry" id="enquiry">
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