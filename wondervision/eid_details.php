<?php
session_start();

include('include/config.php');
date_default_timezone_set('Asia/Calcutta');
$date = date('Y-m-d H:i:s');
$eid=$_GET["eid"];

if(isset($_REQUEST['enquiry']))
{
  //create username
  $username=$_REQUEST['c_fname'].$date;
  $status=1;
   
  
    //user details insert in user_master
	 $sql2 = "INSERT INTO user_master(username,firstname,lastname,status,email,mobile,creation_date,user_typeid) VALUES ('$username','".$_REQUEST['c_fname']."','".$_REQUEST['c_lname']."','$status','".$_REQUEST['c_email']."','".$_REQUEST['c_mobile']."','$date',(SELECT user_typeid FROM `user_types` WHERE user_typeid =4) )";
	
	$rs2 = mysql_query($sql2);
	
	//fetch the highest user_id for create $cus_code
	
	$get=mysql_query("SELECT user_id FROM user_master ORDER BY user_id DESC LIMIT 1 ");	
    while($row = mysql_fetch_assoc($get)) {
	$cus_code=$row['user_id'];	
	}
	$_SESSION['cus_code']=$cus_code;
	
	//insert extra data guest_other_info table
	
	
	if($_REQUEST['c_addrs1']=="" && $_REQUEST['c_addrs2']=="" && $_REQUEST['c_place']=="" && $_REQUEST['c_zip']=="")
	 {
	 
	}
	else
	 {
	 $sql21 = "INSERT INTO user_other_info(user_id,address1,address2,place,zip) VALUES ((select user_id from user_master where user_id='$cus_code'),'".$_REQUEST['c_addrs1']."','".$_REQUEST['c_addrs2']."','".$_REQUEST['c_place']."','".$_REQUEST['c_zip']."' )";
	 $rs21 = mysql_query($sql21); 
	 }

	//insert into enquiry_details value
	
	$sql = "INSERT INTO enquiry_details( 	/*startdate,enddate,startingplace,destination,enquirydate,totaldiscount,net_amount,servicetax,VAT,*/user_id,country_name,state_name) VALUES (/*'".$_REQUEST['arrival_date']."','".$_REQUEST['departure_date']."','".$_REQUEST['from_city']."','".$_REQUEST['to_city']."','$date','".$_REQUEST['discount']."','".$_REQUEST['net_amount']."','".$_REQUEST['s_tax']."','".$_REQUEST['vat']."',*/(select user_id from user_master where user_id='".$cus_code."'),(select country_name from country_master where country_name='".$_REQUEST['c_country']."'),(select state_name from state_master where state_name='".$_REQUEST['c_state']."'))";
	
	
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
				<h2 style="width:195%;">Enquiry Details</h2>
				
					<div class="enquiryfrom" style="padding:15px;">
					
					<?php
						$query10  = "SELECT * FROM enquiry_accomodation_mapping WHERE enquiry_id = '$eid'";
							
							$result10 = mysql_query($query10);
							while($row10 = mysql_fetch_assoc($result10)) {
							
					?>
													 		<table border="0" width="100%" style="background-color:#EEEEEE;">
			<tr style="background-color:#F9F9F9;border:1px solid #ffffff; height:25px; color:#000000">
				<td align="center" colspan="4"><b>NAME&nbsp;&nbsp; </b>

				
				<?php
								  
								  $query100="SELECT name FROM hotel_master where (hotel_id=(select hotel_id from accomodation_type_details where accomodation_type_id='".$row10['accomodation_type_id']."'))";
								$result100 = mysql_query($query100);
								
								$row100=mysql_fetch_array($result100);
								
								echo $row100['name']; 								
								?>
				</td>
				
			</tr>
			<tr>
				<td width="20%" align="left"><b>ADULT</b></td>
				<td width="30%" align="left"><?php echo $row10['noofadults'] ?></td>
				<td width="20%" align="left"><b>CHILDREN</b></td>
				<td align="left"><?php echo $row10['noofchildren'] ?></td>
			</tr>
			<tr>
				<td width="20%" align="left"><b>ROOM</b></td>
				<td width="30%" align="left"><?php echo $row10['noofrooms'] ?></td>
				<td width="20%" align="left"><b>AMOUNT</b></td>
				<td align="left"><?php echo $row10['amount'] ?></td>
			</tr>
			<tr>
				<td width="20%" align="left"><b>CHECK_IN_DATE</b></td>
				<td width="30%" align="left"><?php echo $row10['checkindate'] ?> </td>
				<td width="20%" align="left"><b>CHECK_OUT_DATE</b></td>
				<td align="left"><?php echo $row10['checkoutdate'] ?></td>
			</tr>
		</table>
			<?php
							}
							?>
				</br></br>			
			<?php
							
							
							$query101  = "SELECT * FROM transport_details WHERE enquiry_id = '$eid'";
							
							$result101 = mysql_query($query101);
							while($row101 = mysql_fetch_assoc($result101)) {
							?>
							
							<table border="0" width="100%" style="background-color:#EEFFEE;">
			<tr>
				<td width="20%" align="left"><b>ADULT</b></td>
				<td width="30%" align="left"><?php echo $row101['noofadults'] ?></td>
				<td width="20%" align="left"><b>CHILDREN</b></td>
				<td align="left"><?php echo $row101['noofchildren'] ?></td>
			</tr>
			<tr>
				<td width="20%" align="left"><b>START PLACE</b></td>
				<td width="30%" align="left"><?php echo $row101['startingplace'] ?></td>
				<td width="20%" align="left"><b>DESTINATION</b></td>
				<td align="left"><?php echo $row101['destination'] ?></td>
			</tr>
			<tr>
				<td width="20%" align="left"><b>FROM_DATE</b></td>
				<td width="30%" align="left"><?php echo $row101['pickuptime'] ?> </td>
				<td width="20%" align="left"><b>TO_DATE</b></td>
				<td align="left"><?php echo $row101['estimatedtime'] ?></td>
			</tr>
			<tr>
				<td width="20%" align="left"><b>RATE</b></td>
				<td width="30%" align="left"><?php echo $row101['rate'] ?> </td>
				<td width="20%" align="left"><b>TYPE</b></td>
				<td align="left"><?php echo $row101['vehicletype'] ?></td>
			</tr>
		</table>
		
			<?php
							}
							?>


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