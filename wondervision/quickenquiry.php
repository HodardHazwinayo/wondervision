<?php
session_start();

include('header.php');
date_default_timezone_set('Asia/Calcutta');
$date = date('Y-m-d H:i:s');



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
	
	$sql = "INSERT INTO enquiry_details( 	/*startdate,enddate,startingplace,destination,*/enquirydate,/*totaldiscount,net_amount,servicetax,VAT,*/user_id,country_name,state_name) VALUES (/*'".$_REQUEST['arrival_date']."','".$_REQUEST['departure_date']."','".$_REQUEST['from_city']."','".$_REQUEST['to_city']."','$date','".$_REQUEST['discount']."','".$_REQUEST['net_amount']."','".$_REQUEST['s_tax']."','".$_REQUEST['vat']."',*/'$date',(select user_id from user_master where user_id='".$cus_code."'),(select country_name from country_master where country_name='".$_REQUEST['c_country']."'),(select state_name from state_master where state_name='".$_REQUEST['c_state']."'))";
	
	
	$rs = mysql_query($sql);
	
	
	 $get=mysql_query("SELECT enquiry_id FROM enquiry_details ORDER BY enquiry_id DESC LIMIT 1 ");
	
    while($row = mysql_fetch_assoc($get)) {
	$idmax=$row['enquiry_id'];
	$idmax;
	}
	
	
	 $sql1="INSERT INTO enquiry_comments_details
	(enquiry_id,updatedate,comment) values
	((select enquiry_id from enquiry_details where enquiry_id='$idmax'),'$date','".$_REQUEST['any_notes']."')";
	
	
	$rs1 = mysql_query($sql1);
	
	
	
	
	
?>
 <script>
 window.location='itinerary.php';
 </script>

<?php
	//header("Location:itinerary.php");
}

?>
	



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
					
					
					<!--<div id="main1">
					Search By Name or Mobile:<br />
					<input type="text" id="amots" name="amots" onKeyUp="bleble();" autocomplete="off"/>
					<div id="layer2"></div>
					</div> -->
					
					<div class="ajax_body" style="margin:20px 0 0 20px;">
  <div id="textspan"><span>Enter Mobile or Name :</span>&nbsp;&nbsp;</div>
  <div id="inputbox">
    <input type="text" id="keywords" name="keywords" value="" />
  </div>
</div>
<div id="results" ></div>
<div class="overlay" style="z-index:5;"></div>
					
					
						<div style="float:left;margin:0px 0px 20px 140px;">
						<form method="post" action="" onsubmit="return valid()">
						<table>
							<tr>
								<td><h4>Mobile*</h4></td>
								<td>
									<input type="text" size="30px" name="c_mobile" id="c_mobile" value="" onblur="valid_phn()">
									
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Email</h4></td>
								<td>
								<input type="text" size="30px" name="c_email" id="c_email" value="" onblur="valid_mail1()">
								</td>
								
							</tr>
							<tr>
								<td><h4>First Name*</h4></td>
								<td>
									<input type="text" size="30px" name="c_fname" id="c_fname" value="" onblur="valid_fname()" onkeyup= "this.value = this.value.toUpperCase()">
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Last Name</h4></td>
								<td>
									<input type="text" size="30px" name="c_lname" id="c_lname" value="" onblur="valid_lname()" onkeyup= "this.value = this.value.toUpperCase()">
								</td>
								
								
							</tr>
							<tr>
								<td><h4>Address Line 1*</h4></td>
								<td>
								<input type="text" size="30px" name="c_addrs1" id="c_addrs1" value="" onkeyup= "this.value = this.value.toUpperCase()">
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Address Line 2</h4></td>
								<td>
								<input type="text" size="30px" name="c_addrs2" id="c_addrs2" value="" onkeyup= "this.value = this.value.toUpperCase()">
								</td>
							</tr>
							<tr>
								<td><h4>Place</h4></td>
								<td>
								<input type="text" size="30px" name="c_place" id="c_place" value=""  onblur="valid_place()" onkeyup= "this.value = this.value.toUpperCase()">
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><h4>Zip*</h4></td>
								<td>
								<input type="text" size="30px" name="c_zip" id="c_zip" value="" onblur="valid_zip()">
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
								<input type="text" size="30px" id="ref" name="ref"  autocomplete="off" onkeyup= "this.value = this.value.toUpperCase()">	
							</td>
								<div id="layer3"></div>						
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>						
								&nbsp;
								</td>
							</tr>							
							<tr>
								<td><h4>Note*</h4></td>							
								<td colspan="5">
								<textarea cols="80" rows="5" name="any_notes" id="any_notes" onkeyup= "this.value = this.value.toUpperCase()"></textarea>
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