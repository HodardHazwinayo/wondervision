<?php
session_start();

include('include/settings.php');
include('include/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Analytical and Business Process Automation & Management tool for Tourism Business</title>
	<link rel="stylesheet" type="text/css" media="screen" href="css/glyphicons.all.css" />	
	
	<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="style/style.css" />
	
	</head>
<body>
	<!-- BEGIN #navbar -->
	<div class="navbar" id="navbar">
		<div class="navbar-inner">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-user icon-white"></span>
			</a>
			<a class="brand" href="#">XLogistics<h3>Tour Management Edition</h3></a>
			<div class="nav-collapse collapse">
<?php
if(isset($_REQUEST['submit']))
{
	
	$_SESSION['username'] = $_REQUEST['username'];
	$_SESSION['password'] = md5($_REQUEST['password']);
	
	$login = "SELECT * FROM user_master INNER JOIN user_passwd_mgmt ON user_master.user_id = user_passwd_mgmt.user_id WHERE user_master.username = '".$_SESSION['username']."' AND user_passwd_mgmt.password = '".$_SESSION['password']."' AND status='1'";
	
	$loginresult = mysql_query($login);
	
	$row = mysql_fetch_array($loginresult);
	
	$_SESSION['user_typeid'] = $row['user_typeid'];
	
	$lcount = mysql_num_rows($loginresult);
	
	if($lcount == '0')
	{
	?>
	<script>
		alert('Invalid Username or Password');
	</script>
	<?php
	}
	else
	{
	$user = "INSERT INTO user_session (session_id,remotehost,logintime,logouttime,user_id,status_type) VALUES (session_id(),'".$_SERVER['SERVER_NAME']."',NOW(),'NULL','".$row['user_id']."','".$row['status']."')";
	
	$insert = mysql_query($user);
	?>
	<script>
		window.location = 'dashboard.php?unikey=<?php echo $_SESSION['unikey'] = session_id() ?>&typeid=<?php echo $_SESSION['user_typeid'] ?>';
	</script>
	<?php
	}
	

}

?>

	<!-- BEGIN #main -->
	<div class="main" id="main">
		

		
		<div class="content" id="main-content">
			

			 <div id="container">
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="User Name">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password">
           
               
                <input type="submit" value="Login" name="submit">
           
        </form>
    </div><!--/ container-->
		
			
			
		</div>

	</div>
			


	<!-- BEGIN #footer -->
<?php include('footer.php');?>