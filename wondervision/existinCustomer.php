<?php
session_start();

include('include/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Analytical and Business Process Automation & Management tool for Tourism Business</title>
	<link rel="stylesheet" type="text/css" media="screen" href="css/glyphicons.all.css" />

	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	
	<script type="text/javascript" src="flot/jquery.flot.js"></script>
	<script type="text/javascript" src="flot/jquery.flot.pie.js"></script>
	<script type="text/javascript" src="flot/jquery.flot.resize.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-alert.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-button.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-carousel.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-collapse.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-modal.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-tooltip.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-popover.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-scrollspy.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-tab.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-transition.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-typeahead.js"></script>

	<!-- Uncomment to use LESS The dynamic stylesheet language. | http://lesscss.org/ -->
	<!-- <link rel="stylesheet/less" type="text/css" href="css/main.less" /> -->
	<!-- <script type="text/javascript" src="js/less-1.3.0.min.js"></script> -->

	<!-- Uncomment to use CSS -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
	

	<!-- DEMO SCRIPTS -->
	<script type="text/javascript" src="js/demo.js"></script>
	
	  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	  <link rel="stylesheet" href="/resources/demos/style.css" />
	  <script>
	  $(function() {
	    $( "#datepicker" ).datepicker();
	  });
	  $(function() {
	    $( "#datepicker1" ).datepicker();
	  });
	   $(function() {
	    $( "#datepicker3" ).datepicker();
	  });
	   $(function() {
	    $( "#datepicker4" ).datepicker();
	  });
	  </script>
	  
	 
	
	
	
   
	
	<script>
	function myfunc()
	{
		document.getElementById('name').innerHTML="Abhirup ghosh";
		document.getElementById('email').innerHTML="abhirupghosh1983@gmail.com";
		document.getElementById('mobile').innerHTML="9434538735";
		document.getElementById('addr1').innerHTML="Moulali";
		document.getElementById('addr2').innerHTML="Sealdah";
		document.getElementById('city').innerHTML="Kolkata";
		document.getElementById('pin').innerHTML="700008";
	
	}
	</script>
	<script src="js/jquery-1.2.6.min.js" type="text/javascript"></script>
    <script src="js/jquery.tablesorter-2.0.4.js" type="text/javascript"></script>
    <script src="js/jquery.quicksearch.js" type="text/javascript"></script>

<style type="text/css">    
    div.quicksearch 
    {              
      padding-bottom: 10px;      
    }
</style>
<script type="text/javascript">
$(document).ready(function() {

    //Setup the sorting for the table with the first column initially sorted ascending
    //and the rows striped using the zebra widget
        $("#tableOne").tablesorter({ sortList: [[0, 0]], widgets: ['zebra'] });

    //Setup the quickSearch plugin with on onAfter event that first checks to see how
    //many rows are visible in the body of the table. If there are rows still visible
    //call tableSorter functions to update the sorting and then hide the tables footer. 
    //Else show the tables footer  
        $("#tableOne tbody tr").quicksearch({
            labelText: 'Search for Customers: ',
            attached: '#tableOne',
            position: 'before',
            delay: 100,
            loaderText: 'Loading...',
            onAfter: function() {
                if ($("#tableOne tbody tr:visible").length != 0) {
                    $("#tableOne").trigger("update");
                    $("#tableOne").trigger("appendCache");
                    $("#tableOne tfoot tr").hide();
                }
                else {
                    $("#tableOne tfoot tr").show();
                }
            }
        });

});   
</script>   
	
	
	<script type="text/javascript" src="js/myScript.js"></script>
</head>
<body>
	<!-- BEGIN #navbar -->
	<div class="navbar" id="navbar">
		<div class="navbar-inner">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-user icon-white"></span>
			</a>
			<a class="brand" href="#">XLogistics<br><h3>Tour Management Edition</h3></a>
			<div class="nav-collapse collapse">
				<!--<form class="navbar-search pull-left" action="">
					<input type="text" class="search-query span2" placeholder="Search">
				</form>-->
				<ul class="nav pull-right">
					<li><a href="index.php"><i class="icon-off icon-white"></i> logout</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<?php include('menu.php'); ?>
	</div> <!-- END #navbar -->

	<!-- BEGIN #main -->
	<div class="main" id="main">
		<!-- BEGIN #main-nav -->
		<?php include('sidebar.php'); ?>
		
		

		<!-- BEGIN #main-content -->
		<div class="content" id="main-content">
			
			<div class="row-fluid" id="main-content-row">
				<!-- BEGIN #main-content-span -->
				<div class="span6" id="main-content-span">
				<h2 style="width:195%;">Customer Details</h2>
				
					<div class="enquiryfrom">
						
						<div style="float:left;margin:20px 0px 20px 140px;">
							<div style="float:left;padding:0px 5px; width:650px; height:125px; overflow:scroll;">
						
						<!-- <table width="100%" border="0" cellpadding="1" cellspacing="1"  id="menu"> -->
							<table width="100%" border="0" cellpadding="1" cellspacing="1" id="tableOne" class="yui">
							<thead>
								<tr>
									<th width="10%" align="left">Test Name</th>
									<th width="30%" align="center">Token Amount</th>
									<th width="8%" align="center">Action</th>
								</tr>
							</thead>	
							
							<?php
								$sub = "SELECT * FROM guest_master";
								$rs = mysql_query($sub);
								
								?>
								<!-- <table width="100%" border="0" cellpadding="1" cellspacing="1" id="my-table"> -->
								
								<?php
								while($r=mysql_fetch_array($rs))
								{
								?>
			<tbody>					
			<tr>
			<td width="10%" align="left"><?php echo $r['guest_code']; ?></td>
			<td width="30%" align="center"><?php echo $r['firstname']." ".$r['lastname']; ?></td>
			<td width="8%" align="center"><?php echo $r['mobile']; ?></td>
			</tr>
			</tbody>
								<?php
								//$k++;
								}
								?>
								<!-- </table> -->
								<?php 
								
								
							//}
							
							?>
	<tfoot>
	    <tr style="display:none;">
	        <td colspan="5">
	            No rows match the filter...
	        </td>
	    </tr>	    
	</tfoot>
							
							</table>
						
							</div>
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