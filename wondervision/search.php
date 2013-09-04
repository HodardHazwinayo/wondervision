<?php
include('include/config.php');
?>

<?php
if(isset($_POST['kw']) && $_POST['kw'] != '')
{
  $kws = $_POST['kw'];
  $kws = mysql_real_escape_string($kws);
  //$query = "select * from ajax_search where quotes RLIKE '[[:<:]]".$kws."[[:>:]]' or author RLIKE '[[:<:]]".$kws."[[:>:]]'";
  $query = "select * from user_master where firstname like '%".$kws."%' or mobile like '%".$kws."%'" ;

  $res = mysql_query($query);
  //Here we count the number of returned rows. If it returned nothing then it will store 0.
  $count = mysql_num_rows($res);
  $i = 0;
  
  if($count > 0)
  {
    echo "<ul>";
    while($row = mysql_fetch_array($res))
	{
	?>
	 <a href='enquiryshow.php?id=<?php echo $row['user_id'] ?>'><li><div id='rest'><div id='auth_dat'><?php echo $row['firstname']." ".$row['lastname']." ".$row['mobile'] ?></div></div>
	 <div style='clear:both;'></div>
	 </li></a>
	 <?php 
	  $i++;
	  if($i == 5) break;
	}
	echo "</ul>";
	if($count > 5)
	{
	  echo "<div id='view_more'><a href='#'>View more results</a></div>";
	}
  }
  else
  {
    echo "<div id='no_result'>No result found !</div>";
  }
}
?>