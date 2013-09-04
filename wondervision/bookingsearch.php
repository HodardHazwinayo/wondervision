<?php
session_start();

include('header.php');

if(isset($_REQUEST['search']))
{
	$searchv = $_REQUEST['searchv'];
	
	$sql = ("SELECT * FROM `user_master` INNER JOIN `enquiry_details` ON user_master.user_id = enquiry_details.user_id INNER JOIN `enquiry_accomodation_mapping` ON enquiry_details.enquiry_id = enquiry_accomodation_mapping.enquiry_id WHERE user_master.firstname like('" .$searchv . "%') OR user_master.mobile like('" .$searchv . "%')");
		$query = mysql_query($sql);
	
	
	$count = mysql_num_rows($query);
	
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
				<h2 style="width:195%;">Booking Search</h2>
				
					<div class="enquiryfrom" style="padding:15px;">
						
						<div class="ajax_body" style="margin:20px 0 0 20px;">
  <div id="textspan"><span>Enter Mobile or Name :</span>&nbsp;&nbsp;</div>
  <div id="inputbox">
    <input type="text" id="keywords" name="keywords" value="" />
  </div>
</div>
<div id="results" ></div>
<div class="overlay" style="z-index:5;"></div>
						
						<div style="float:left;margin:0px 0px 20px 0px;">
							
						</div>
					
					
					
				</div><!-- END #main-content-span -->
				
				
				

				<!-- BEGIN #main-content-span -->
				

			</div><!-- END main-content-row -->

			

		</div><!-- END #main-content -->
		
	
		
	</div><!-- END #main -->

	<!-- BEGIN #footer -->
	<?php include('footer.php'); ?>