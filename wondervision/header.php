<?php
error_reporting(0); 
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
	
   <script type="text/javascript" src="js/myScript.js"></script>
	<script language="JavaScript" type="text/javascript" src="search.js"></script>
	
<style>	
	#main1{
float:left;
padding:15px;
margin:0px 0px 0px 10px;
width: 200px;
}

	#main2{
float:right;
padding:15px;
margin:0px 0px 0px 60px;
width: 265px;
}

#layer2{
	width:198px;
	/*border:1px solid gray;*/
	margin-top: -2px;
	border-bottom-width: 0px;
	position: absolute;
	z-index:3px;
}
#layer2 a{
	text-decoration:none;
	text-transform:capitalize;
	padding:5px;
}

#layer3{
	width:198px;
	/*border:1px solid gray;*/
	margin-top: -2px;
	border-bottom-width: 0px;
	position: absolute;
	z-index:3px;
}
#layer3 aa{
	text-decoration:none;
	text-transform:capitalize;
	padding:5px;
}
.suggest_link{
background-color:#fff;
/*border-bottom:1px solid gray;*/
}
.small{
background-color:#fff;
border-bottom:1px solid gray;
}
.suggest_link_over{
/*background-color:#fff;
border-bottom:1px solid gray;*/
}
.suggest_link:hover{
/*background-color:#6d84b4;
border-bottom:1px solid gray;*/
}
.suggest_link_over:hover{
/*background-color:#6d84b4;
border-bottom:1px solid gray;*/
}
#amots{
	padding:5px;
	border-radius:none;
	width:200px;
	border:1px solid #aaaaaa;
	background: url("search.png") no-repeat scroll right 0 transparent;
}

</style>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	  
	  <script>
	  $(function() {
	    $( "#tabs" ).tabs();
	  });
	  </script>


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
				<!--<form class="navbar-search pull-left" action="">
					<input type="text" class="search-query span2" placeholder="Search">
				</form>-->
				
				
				<ul class="nav pull-right">
					<li><a href="#" class="topopup"><i class="icon-asterisk icon-white"></i>Open tickets <span class="notify"></span></a></li>
					<li><a href="logout.php"><i class="icon-off icon-white"></i> logout</a></li>
				</ul>
				
			</div>
			<div class="clearfix"></div>
		</div>
		<?php include('menu.php'); ?>
		
		
	</div> <!-- END #navbar -->