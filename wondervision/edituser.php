<?php
session_start();
include('header.php');

$_SESSION['unikey'];
$_SESSION['user_typeid'];

if($_REQUEST['action']=='delete')
{
		$dsql = mysql_query("DELETE FROM user_master WHERE user_id='".$_REQUEST['delid']."'");
		
}
else if(isset($_REQUEST['submit']))
{
	
	$datetimeo = date("Y-m-d h:i:s");
	$usertype = $_REQUEST['usertype'];
	$status = '1';
	
	$membertype = $_REQUEST['membertype'];
	
	$utype = mysql_query("SELECT user_typeid FROM `user_types` WHERE user_typeid='".$usertype."'");
	$uutype = mysql_fetch_array($utype);
	
	$mtype = mysql_query("SELECT member_type_id FROM `user_membership_type_master` WHERE member_type_id='".$membertype."'");
	$mmtype = mysql_fetch_array($mtype);
	
	
 //$sqli = "INSERT INTO user_master (username,firstname,lastname,status,login_expiry_date,email,mobile,creation_date,user_typeid,gender,member_type_id,updateon) VALUES ('".$_REQUEST['username']."','".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$status."','".$datetimeo."','".$_REQUEST['email']."','".$_REQUEST['mobile']."','".$datetimeo."','".$uutype['user_typeid']."','".$_REQUEST['gender']."','".$mmtype['member_type_id']."','".$datetimeo."') ";
	
	$sqli = "INSERT INTO user_master (username,firstname,lastname,status,mobile,creation_date,user_typeid,member_type_id) VALUES ('".$_REQUEST['username']."','".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$status."','".$_REQUEST['mobile']."','".$datetimeo."','".$uutype['user_typeid']."','".$mmtype['member_type_id']."') ";
	
	$resulti = mysql_query($sqli);

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
				<h2 style="width:195%;">Edit User</h2>
				<div style="float:left;margin:20px 20px 20px 120px;">
				<form method="post" action="">
				<?php
				$gsql = mysql_query("SELECT * FROM user_master WHERE user_id = '".$_REQUEST['id']."'");
				while($grow = mysql_fetch_array($gsql))
				{
				?>
					<table>
						<tr>
							<td><h4>Username</h4></td><td><input type="text" name="username" id="username" value="<?php echo $grow['username'] ?>"></td>
						</tr>
						<tr>
							<td><h4>First name</h4></td><td><input type="text" name="fname" id="fname" value="<?php echo $grow['firstname'] ?>"></td>
						</tr>
						<tr>
							<td><h4>Last name</h4></td><td><input type="text" name="lname" id="lname" value="<?php echo $grow['lastname'] ?>"></td>
						</tr>
						<tr>
							<td><h4>Mobile</h4></td><td><input type="text" name="mobile" id="mobile" value="<?php echo $grow['mobile'] ?>"></td>
						</tr>
						<tr>
							<td><h4>Password</h4></td><td><input type="password" name="mobile" id="mobile" value="<?php echo $grow['mobile'] ?>"></td>
						</tr>
						
						<tr>
							<td></td><td><input type="submit" name="submit" id="submit" value="Submit" class="bbbtn" style="width:120px;float:right;"></td>
						</tr>
					</table>
					<?php
					}
					?>
					</form>
				</div>	
				</div><!-- END #main-content-span -->
				
				
				

				<!-- BEGIN #main-content-span -->
				

			</div><!-- END main-content-row -->

			

		</div><!-- END #main-content -->
		
	
		
	</div><!-- END #main -->
