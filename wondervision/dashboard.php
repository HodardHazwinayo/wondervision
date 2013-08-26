<?php
session_start();
include('header.php'); ?>

<style type="text/css" media="all">
		
		#news-container
		{
		margin: auto;
		margin-top: 12px;
		
		}
		
		#news-container ul li 
		{
			background: #ffffff;
			margin:20px;
			color:#873C6D;
			font-weight:bold;
		}
	</style>
	
	<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
	

	<!-- DEMO SCRIPTS -->
	
	
	
	<link href="css/global.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica+SC' rel='stylesheet' type='text/css'>

	  
	  <style type="text/css">

/*Example CSS for the two demo scrollers*/

#pscroller1{
width: 550px;
height: 150px;
/* border: 1px solid black; */
padding: 5px;
/* background-color: lightyellow; */
}

#pscroller2 a{
text-decoration: none;
}

.someclass{ //class to apply to your scroller(s) if desired
}

</style>

<script type="text/javascript">

/*Example message arrays for the two demo scrollers*/

var pausecontent=new Array()
pausecontent[0]='<img src="images/messagebox_warning.png">&nbsp;&nbsp;<a href="#">Bankok Tour</a><br /><br />3 Days and 2 Nights at Bankok in 30,000 INR Only. '
pausecontent[1]='<img src="images/messagebox_warning.png">&nbsp;&nbsp;<a href="#">Kedarnath booking</a><br /><br />Do not book  any  trip to Kedarnath, due to flood situation.'
pausecontent[2]='<img src="images/messagebox_warning.png">&nbsp;&nbsp;<a href="#">Special offer for Ladakh</a><br /><br />Special offer for Ladakh 20 % discount from Wonder Vision. '
pausecontent[3]='<img src="images/messagebox_warning.png">&nbsp;&nbsp;<a href="#">Singapore tour</a><br /><br />3 Days and 2 Nights at Singapore in 40,000 INR Only . '
pausecontent[4]='<img src="images/messagebox_warning.png">&nbsp;&nbsp;<a href="#">Cancel booking</a><br /><br />Cancel all the booking at Sikkim till farther notice. '


</script>

<script type="text/javascript">

/***********************************************
* Pausing up-down scroller- © Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/

function pausescroller(content, divId, divClass, delay){
this.content=content //message array content
this.tickerid=divId //ID of ticker div to display information
this.delay=delay //Delay between msg change, in miliseconds.
this.mouseoverBol=0 //Boolean to indicate whether mouse is currently over scroller (and pause it if it is)
this.hiddendivpointer=1 //index of message array for hidden div
document.write('<div id="'+divId+'" class="'+divClass+'" style="position: relative; overflow: hidden"><div class="innerDiv" style="position: absolute; width: 100%" id="'+divId+'1">'+content[0]+'</div><div class="innerDiv" style="position: absolute; width: 100%; visibility: hidden" id="'+divId+'2">'+content[1]+'</div></div>')
var scrollerinstance=this
if (window.addEventListener) //run onload in DOM2 browsers
window.addEventListener("load", function(){scrollerinstance.initialize()}, false)
else if (window.attachEvent) //run onload in IE5.5+
window.attachEvent("onload", function(){scrollerinstance.initialize()})
else if (document.getElementById) //if legacy DOM browsers, just start scroller after 0.5 sec
setTimeout(function(){scrollerinstance.initialize()}, 500)
}

// -------------------------------------------------------------------
// initialize()- Initialize scroller method.
// -Get div objects, set initial positions, start up down animation
// -------------------------------------------------------------------

pausescroller.prototype.initialize=function(){
this.tickerdiv=document.getElementById(this.tickerid)
this.visiblediv=document.getElementById(this.tickerid+"1")
this.hiddendiv=this.hiddendiv=document.getElementById(this.tickerid+"2")
this.visibledivtop=parseInt(pausescroller.getCSSpadding(this.tickerdiv))
//set width of inner DIVs to outer DIV's width minus padding (padding assumed to be top padding x 2)
this.visiblediv.style.width=this.hiddendiv.style.width=this.tickerdiv.offsetWidth-(this.visibledivtop*2)+"px"
this.getinline(this.visiblediv, this.hiddendiv)
this.hiddendiv.style.visibility="visible"
var scrollerinstance=this
document.getElementById(this.tickerid).onmouseover=function(){scrollerinstance.mouseoverBol=1}
document.getElementById(this.tickerid).onmouseout=function(){scrollerinstance.mouseoverBol=0}
if (window.attachEvent) //Clean up loose references in IE
window.attachEvent("onunload", function(){scrollerinstance.tickerdiv.onmouseover=scrollerinstance.tickerdiv.onmouseout=null})
setTimeout(function(){scrollerinstance.animateup()}, this.delay)
}


// -------------------------------------------------------------------
// animateup()- Move the two inner divs of the scroller up and in sync
// -------------------------------------------------------------------

pausescroller.prototype.animateup=function(){
var scrollerinstance=this
if (parseInt(this.hiddendiv.style.top)>(this.visibledivtop+5)){
this.visiblediv.style.top=parseInt(this.visiblediv.style.top)-5+"px"
this.hiddendiv.style.top=parseInt(this.hiddendiv.style.top)-5+"px"
setTimeout(function(){scrollerinstance.animateup()}, 50)
}
else{
this.getinline(this.hiddendiv, this.visiblediv)
this.swapdivs()
setTimeout(function(){scrollerinstance.setmessage()}, this.delay)
}
}

// -------------------------------------------------------------------
// swapdivs()- Swap between which is the visible and which is the hidden div
// -------------------------------------------------------------------

pausescroller.prototype.swapdivs=function(){
var tempcontainer=this.visiblediv
this.visiblediv=this.hiddendiv
this.hiddendiv=tempcontainer
}

pausescroller.prototype.getinline=function(div1, div2){
div1.style.top=this.visibledivtop+"px"
div2.style.top=Math.max(div1.parentNode.offsetHeight, div1.offsetHeight)+"px"
}

// -------------------------------------------------------------------
// setmessage()- Populate the hidden div with the next message before it's visible
// -------------------------------------------------------------------

pausescroller.prototype.setmessage=function(){
var scrollerinstance=this
if (this.mouseoverBol==1) //if mouse is currently over scoller, do nothing (pause it)
setTimeout(function(){scrollerinstance.setmessage()}, 100)
else{
var i=this.hiddendivpointer
var ceiling=this.content.length
this.hiddendivpointer=(i+1>ceiling-1)? 0 : i+1
this.hiddendiv.innerHTML=this.content[this.hiddendivpointer]
this.animateup()
}
}

pausescroller.getCSSpadding=function(tickerobj){ //get CSS padding value, if any
if (tickerobj.currentStyle)
return tickerobj.currentStyle["paddingTop"]
else if (window.getComputedStyle) //if DOM2
return window.getComputedStyle(tickerobj, "").getPropertyValue("padding-top")
else
return 0
}

</script>



   <link href="themes/yui/style.css" rel="stylesheet" type="text/css" />
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
            labelText: 'Search for required tests: ',
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
	

	<div class="main" id="main">
		<!-- BEGIN #main-nav -->
		<?php include('sidebar.php');?>
		

		<!-- BEGIN #main-content -->
		<div class="content" id="main-content">
			<!-- BEGIN #main-content-row -->
			<div class="row-fluid" id="main-content-row">
				<!-- BEGIN #main-content-span -->
				<div class="span6" id="main-content-span">
					<div class="tabbable">
						<h2>  Todays action item</h2>
						<div style="height:170px;overflow-y:scroll;">
						<?php
							$action = mysql_query("SELECT * FROM `enquiry_details` INNER JOIN `enquiry_accomodation_mapping` ON enquiry_details.enquiry_id=enquiry_accomodation_mapping.enquiry_id");
							while($rowss = mysql_fetch_array($action))
							{
						?>
							<p style="padding:0 0 5px 10px;"><img alt="" src="images/1371483313_evolution-tasks.png"><a href="#"><?php echo $rowss['comments']  ?></a></p>
						<?php
							}
						?>						
							<!--<p style="padding:0 0 5px 10px;"><img alt="" src="images/1371483313_evolution-tasks.png"><a href="booking_3.php">Cab booking required for Booking ID WVB0014 at Puri Hotel  to Puri station on <?php //echo date('Y-m-d', strtotime("tomorrow"));  ?></a></p>
							
							<p style="padding:0 0 5px 10px;"><img alt="" src="images/1371483313_evolution-tasks.png"><a href="booking_3.php">Train booking required for Booking ID WVB0236 at kolkata  to New Delhi station on <?php// echo date('Y-m-d', strtotime("tomorrow"));  ?></a></p>
							
							<p style="padding:0 0 5px 10px;"><img alt="" src="images/1371483313_evolution-tasks.png"><a href="booking_3.php">Flight booking required for Booking ID WVB08963 at New Delhi to Mumbai on <?php //echo date('Y-m-d', strtotime("tomorrow"));  ?></a></p>
							
							<p style="padding:0 0 5px 10px;"><img alt="" src="images/1371483313_evolution-tasks.png"><a href="booking_3.php">Hotel booking required for Booking ID WVB4587 at Vizag on <?php //echo date('Y-m-d', strtotime("tomorrow"));  ?></a></p>
							
							<p style="padding:0 0 5px 10px;"><img alt="" src="images/1371483313_evolution-tasks.png"><a href="booking_3.php">Booking ID WVB5478 has requested for search another good hotel near his current location.</a></p>-->
						</div>
						
						
					</div>
				</div><!-- END #main-content-span -->

				<!-- BEGIN #main-content-span -->
				<div class="span6" id="main-content-span">
					<h2>  Management messages</h2>
					<div style="height:150px;">
						<ul id="ticker_02" class="ticker">
						<?php 
						$msg_sql = mysql_query("SELECT description FROM mgmt_news_feed_details WHERE status='1'");
						while($mrow = mysql_fetch_array($msg_sql))
						{
						?>
							<li>
								<?php echo $mrow['description']; ?>
							</li>
						<?php
						}
						?>
						</ul>
						
					</div>	
					
				</div><!-- END #main-content-span -->

			</div><!-- END main-content-row -->
			
			<div class="row-fluid" id="main-content-row">
				<!-- BEGIN #main-content-span -->
				<div class="span6" id="main-content-span">
					<div class="tabbable">
						<h2> Writing notes</h2>
						<div style="margin:5px;">
						<textarea cols="70" rows="7" placeholder="Quick notes"></textarea>
						<input type="button" value="Submit" class="bbbtn" onclick="alert('Your notes have been submitted');" />
						</div>
					</div>
				</div><!-- END #main-content-span -->

				<!-- BEGIN #main-content-span -->
				<div class="span6" id="main-content-span">
					
					
					<div style="height:160px;overflow-y:scroll;padding:5px;">
						<table width="100%" border="0" cellpadding="1" cellspacing="1" id="tableOne" class="yui">
							<thead>
								<tr>
									<th width="30%%" align="left">Name</th>
									<th width="30%" align="center">Mobile</th>
									<th width="40%" align="center">Date</th>
								</tr>
							</thead>	
							
							<?php
								$sub = "SELECT * FROM enquiry_details INNER JOIN user_master ON enquiry_details.user_id=user_master.user_id";
								$rs = mysql_query($sub);
								
								?>
								<!-- <table width="100%" border="0" cellpadding="1" cellspacing="1" id="my-table"> -->
								
								<?php
								while($r=mysql_fetch_array($rs))
								{
								?>
			<tbody>					
			<tr>
			<td width="30%" align="left"><font color="#C91E29" size="2px"><?php echo $r['firstname']." ".$r['lastname']; ?></font></td>
			<td width="30%" align="center"><?php echo $r['mobile']; ?> </td>
			<td width="40%" align="center"><?php echo $r['startdate']; ?></td>
			</tr>
			</tbody>
								<?php
								$k++;
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
					
				</div><!-- END #main-content-span -->

			</div>

			<!-- BEGIN #main-content-row -->
				<div id="toPopup"> 
    	
        <div class="close"></div>
       	<span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
		<div id="popup_content"> <!--your content start-->
            <p>
				<table align="center" width="100%" height="100%"> 
						<tr background="#516B38">
							<th>#</th>
							<th>Enquiry ID</th>
							<th>Name</th>
							<th>Address</th>
							<th>City</th>
							<th>Phone Number</th>
						</tr>
						<tr>
							<td align="center">01</td>
							<td align="center"><a href="existingpartner_3.php">WVE5693</a></td>
							<td align="center">Prasenjit Kumar</td>
							<td align="center">Baidyabati</td>
							<td align="center">Howrah</td>
							<td align="center">9051404842</td>
						</tr>
					<tr>
						<td align="center">02</td>
						<td align="center"><a href="existingpartner_3.php">WVE5694</a></td>
						<td align="center">Soumyajit Mandal</td>
						<td align="center">Sonarpur</td>
						<td align="center">Kolkata</td>
						<td align="center">9477411305</td>
					</tr>
					<tr>
						<td align="center">03</td>
						<td align="center"><a href="existingpartner_3.php">WVE5695</a></td>
						<td align="center">Abhirup Ghosh</td>
						<td align="center">Sealdah</td>
						<td align="center">Kolkata</td>
						<td align="center">9434538735</td>
					</tr>
				</table>	
		    </p>
            <br />
            <p align="center"><a href="#" class="livebox"></a></p>
        </div> <!--your content end-->
    
    </div> <!--toPopup end-->
    
	<div class="loader"></div>
   	<div id="backgroundPopup"></div>

			

		</div><!-- END #main-content -->
		
	
		
	</div><!-- END #main -->

	
<script>

	function tick(){
		$('#ticker_01 li:first').slideUp( function () { $(this).appendTo($('#ticker_01')).slideDown(); });
	}
	setInterval(function(){ tick () }, 5000);


	function tick2(){
		$('#ticker_02 li:first').slideUp( function () { $(this).appendTo($('#ticker_02')).slideDown(); });
	}
	setInterval(function(){ tick2 () }, 3000);


	function tick3(){
		$('#ticker_03 li:first').animate({'opacity':0}, 200, function () { $(this).appendTo($('#ticker_03')).css('opacity', 1); });
	}
	setInterval(function(){ tick3 () }, 4000);	

	function tick4(){
		$('#ticker_04 li:first').slideUp( function () { $(this).appendTo($('#ticker_04')).slideDown(); });
	}


	/**
	 * USE TWITTER DATA
	 */

	 $.ajax ({
		 url: 'http://search.twitter.com/search.json',
		 data: 'q=%23javascript',
		 dataType: 'jsonp',
		 timeout: 10000,
		 success: function(data){
		 	if (!data.results){
		 		return false;
		 	}

		 	for( var i in data.results){
		 		var result = data.results[i];
		 		var $res = $("<li />");
		 		$res.append('<img src="' + result.profile_image_url + '" />');
		 		$res.append(result.text);

		 		console.log(data.results[i]);
		 		$res.appendTo($('#ticker_04'));
		 	}
			setInterval(function(){ tick4 () }, 4000);	

			$('#example_4').show();

		 }
	});


</script>
</body>
</html>