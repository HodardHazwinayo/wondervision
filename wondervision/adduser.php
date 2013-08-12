<?php
session_start();
include('header.php');

$_SESSION['unikey'];
$_SESSION['user_typeid'];

if(isset($_REQUEST['submit']))
{
	
	$datetimeo = date("Y-m-d h:i:s");
	$usertype = $_REQUEST['usertype'];
	
	$membertype = $_REQUEST['membertype'];
	
	$utype = mysql_query("SELECT user_typeid FROM `user_types` WHERE user_typeid='".$usertype."'");
	$uutype = mysql_fetch_array($utype);
	
	$mtype = mysql_query("SELECT member_type_id FROM `user_membership_type_master` WHERE member_type_id='".$membertype."'");
	$mmtype = mysql_fetch_array($mtype);
	
	
	$sql = "INSERT INTO user_master (username,firstname,lastname,status,login_expiry_date,email,mobile,creation_date,user_typeid,gender,member_type_id,updateon) VALUES ('".$_REQUEST['username']."','".$_REQUEST['fname']."','".$_REQUEST['lname']."','1','".$datetimeo."','".$_REQUEST['email']."','".$_REQUEST['mobile']."','".$datetimeo."','".$uutype['user_typeid']."','".$_REQUEST['gender']."','".$mmtype['member_type_id']."','".$datetimeo."'";
	
	 $result = mysql_query($sql);

}

?>
<div class="main" id="main">
		<!-- BEGIN #main-nav -->
		<?php include('sidebar.php'); ?>
		
		

		<!-- BEGIN #main-content -->
		<div class="content" id="main-content">
			
			<div class="row-fluid" id="main-content-row">
				<!-- BEGIN #main-content-span -->
				<div class="span6" id="main-content-span">
				<h2 style="width:195%;">Add User</h2>
				<div style="float:left;margin:20px 20px 20px 120px;">
				<form method="post" action="">
					<table>
						<tr>
							<td><h4>Username</h4></td><td><input type="text" name="username" id="username"></td>
						</tr>
						<tr>
							<td><h4>First name</h4></td><td><input type="text" name="fname" id="fname"></td>
						</tr>
						<tr>
							<td><h4>Last name</h4></td><td><input type="text" name="lname" id="lname"></td>
						</tr>
						<tr>
							<td><h4>Email</h4></td><td><input type="text" name="email" id="email"></td>
						</tr>
						<tr>
							<td><h4>Mobile</h4></td><td><input type="text" name="mobile" id="mobile"></td>
						</tr>
						<tr>
							<td><h4>User type</h4></td>
							<td>
							<select name="usertype">
								<?php $type = mysql_query("SELECT * FROM `user_types`");	
										while($r = mysql_fetch_array($type))	{
								?>
								
									<option value="<?php echo $r['user_typeid'] ?>"><?php echo $r['name'] ?></option>
								
								<?php	}	?>
							</select>	
							</td>
						</tr>
						<tr>
							<td><h4>Gender</h4></td>
							<td>
							<select name="gender">
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>	
							</td>
						</tr>
						<tr>
							<td><h4>Member type</h4></td>
							<td>
							<select name="membertype">
								<?php $member = mysql_query("SELECT * FROM `user_membership_type_master`");	
										while($ro = mysql_fetch_array($member))	{
								?>
								
									<option value="<?php echo $ro['member_type_id'] ?>"><?php echo $ro['membershipname'] ?></option>
								
								<?php	}	?>
							</select>	
							</td>
						</tr>
						<tr>
							<td></td><td><input type="submit" name="submit" id="submit" value="Submit" class="bbbtn" style="width:120px;float:right;"></td>
						</tr>
					</table>
					</form>
				</div>	
				</div><!-- END #main-content-span -->
				
				
				

				<!-- BEGIN #main-content-span -->
				

			</div><!-- END main-content-row -->

			

		</div><!-- END #main-content -->
		
	
		
	</div><!-- END #main -->
