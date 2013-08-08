<?Php
include("config.php");


if(isset($_REQUEST['save']))
{
	
echo $sql = "INSERT INTO enq_master(partner_id,partner_name,partner_email,partner_mobile,from_city,to_city,arrival_date,departure_date,adult_count,child_count,is_hotel,is_resort,is_package,is_transportation,any_note) VALUES ('".$_REQUEST['partner_id']."','".$_REQUEST['name']."','".$_REQUEST['email']."','".$_REQUEST['mobile']."','".$_REQUEST['from_city']."','".$_REQUEST['to_city']."','".$_REQUEST['arrival_date']."','".$_REQUEST['departure_date']."','".$_REQUEST['adult_count']."','".$_REQUEST['child_count']."','".$_REQUEST['check1']."','".$_REQUEST['check2']."','".$_REQUEST['check3']."','".$_REQUEST['check4']."','".$_REQUEST['any_notes']."')";

$rs = mysql_query($sql);

header("Location:../dashboard.html");
}
?>