<?php
include('include/config.php');
if (isset($_GET['search1']) && $_GET['search1'] != '') {
	//Add slashes to any quotes to avoid SQL problems.
	$search1 = $_GET['search1'];
	$result3 = mysql_query("SELECT * FROM user_master where firstname like('" .$search1 . "%') OR mobile like('" .$search1 . "%')");
	while($row3 = mysql_fetch_array($result3))
	{
		echo '<a href=quickenquirregisterguest.php?id=' . $row3['user_id'] . '>' . $row3['firstname'] . " ". $row3['mobile']. "</a>\n";		
	}
}


?>