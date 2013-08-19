<?php
session_start();

include('include/config.php');
date_default_timezone_set('Asia/Calcutta');
$date = date('Y-m-d H:i:s');
$cus_code=$_GET["id"];
$_SESSION['cus_code']=$cus_code;

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


if(isset($_REQUEST['enquiry']))
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
							<tr>
								<td><h4>Reference</h4></td>
								<td>
								<input type="text" size="30px" id="ref" name="ref">	
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
								<td colspan="3">
								<p align="left">
								<input type="reset" value="Cancel" class="bbbtn" style="width:120px;" name="cancel" id="cancel">
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