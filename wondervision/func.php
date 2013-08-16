<?php
//**************************************
//     Page load dropdown results     //
//**************************************
function getTierOne()
{
	$result = mysql_query("SELECT  * FROM location_master") 
	or die(mysql_error());

	  while($tier = mysql_fetch_array( $result )) 
  
		{
		   echo '<option value="'.$tier['location_id'].'">'.$tier['place'].'</option>';
		}

}

//**************************************
//     First selection results     //
//**************************************
if($_GET['func'] == "drop_1" && isset($_GET['func'])) { 
   drop_1($_GET['drop_var']); 
}

function drop_1($drop_var)
{  
    include_once('include/config.php');
	
	//echo '<input type="text" size="10px" id="datepicker" name="arrival_date" placeholder="Arrival">';
	$result = mysql_query("SELECT * FROM hotel_master WHERE location_id='$drop_var'") 
	or die(mysql_error());
	
	
	echo '<select name="tier_two" id="tier_two">
	      <option value=" " disabled="disabled" selected="selected">Choose Hotel</option>';

		   while($drop_2 = mysql_fetch_array( $result )) 
			{
			  echo '<option value="'.$drop_2['hotel_id'].'">'.$drop_2['name'].'</option>';
			}
	
	echo '</select> ';
	
    echo '<input type="submit" name="submit" value="Submit" />';
}
?>