<?php
include('include/config.php');
if (isset($_GET['search']) && $_GET['search'] != '') {
	//Add slashes to any quotes to avoid SQL problems.
	$search = $_GET['search'];
	$result3 = mysql_query("SELECT * FROM user_master where firstname like('" .$search . "%') OR mobile like('" .$search . "%')");
	while($row3 = mysql_fetch_array($result3))
	{
		echo '<a href=enquiryshow.php?id=' . $row3['user_id'] . '>' . $row3['firstname'] . " ". $row3['mobile']. "</a>\n";		
	}
}


?>