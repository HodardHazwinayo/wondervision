
 <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
		<title>DataTables (table plug-in for jQuery) Data Manager Add-on</title>
		
		<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/media/images/favicon.ico">
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
		
		<style type="text/css" media="screen">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
			@import "http://www.datatables.net/media/css/site_jui.ccss";
			@import "media/css/demo_table_jui.css";
			@import "media/css/themes/base/jquery-ui.css";
			@import "media/css/themes/smoothness/jquery-ui-1.7.2.custom.css";
			/*
			 * Override styles needed due to the mix of three different CSS sources! For proper examples
			 * please see the themes example in the 'Examples' section of this site
			 */
			.dataTables_info { padding-top: 0; }
			.dataTables_paginate { padding-top: 0; }
			.css_right { float: right; }
			#example_wrapper .fg-toolbar { font-size: 0.8em }
			#theme_links span { float: left; padding: 2px 10px; }
		</style>

		
		<script type="text/javascript" src="js/complete.js"></script>
		<script src="js/jquery.min.js" type="text/javascript"></script>
        	<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.dataTables.editable.js"></script>
		<script src="js/jquery.jeditable.js" type="text/javascript"></script>
        	<script src="js/jquery-ui.js" type="text/javascript"></script>
        	<script src="js/jquery.validate.js" type="text/javascript"></script>

		<script type="text/javascript" charset="utf-8">
			$(document).ready( function () {
				var id = -1;//simulation of id
				$('#example').dataTable({ bJQueryUI: true,

							"sPaginationType": "full_numbers"
}).makeEditable({
									sUpdateURL: function(value, settings)
									{
                             							return(value); //Simulation of server-side response using a callback function
									},
                             			sAddURL: "AddData.php",
                             			sAddHttpMethod: "GET",
                                    sDeleteHttpMethod: "GET",
									sDeleteURL: "DeleteData.php",
                    							"aoColumns": [
                    									{ 	cssclass: "required" },
                    									{
                    									},
                    									{
                									        indicator: 'Saving platforms...',
                                                            					tooltip: 'Click to edit platforms',
												type: 'textarea',
                                                 						submit:'Save changes'
                    									},
                    									{
                                                            					indicator: 'Saving Engine Version...',
                                                            					tooltip: 'Click to select engine version',
                                                            					loadtext: 'loading...',
                           					                                type: 'select',
                               						            		onblur: 'cancel',
												submit: 'Ok',
                                                            					loadurl: 'EngineVersionList.php',
												loadtype: 'GET'
                    									},
                    									{
                                                            					indicator: 'Saving CSS Grade...',
                                                            					tooltip: 'Click to select CSS Grade',
                                                            					loadtext: 'loading...',
                           					                                type: 'select',
                               						            		onblur: 'submit',
                                                            					data: "{'':'Please select...', 'A':'A','B':'B','C':'C'}"
                                                        				}
											],
									oAddNewRowButtonOptions: {	label: "Add...",
													icons: {primary:'ui-icon-plus'} 
									},
									oDeleteRowButtonOptions: {	label: "Remove", 
													icons: {primary:'ui-icon-trash'}
									},

									oAddNewRowFormOptions: { 	
                                                    title: 'Add a new browser',
													show: "blind",
													hide: "explode",
                                                    modal: true
									}	,
sAddDeleteToolbarSelector: ".dataTables_length"								

										});
				
			} );
		</script>

        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-17838786-2']);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

</script>
	</head>
	

<body id="index" class="grid_2_3">
		<div id="fw_container">
			
								
						
			<div id="fw_content">
				
				
				
				<div class="css_clear css_spacing"></div>
				
				<h3>Example</h3>
				<div class="full_width">
<form id="formAddNewRow" action="#" title="Add a new browser" style="width:600px;min-width:600px">
        <label for="engine">Rendering engine</label><br />
	<input type="text" name="engine" id="name" class="required" rel="0" />
        <br />
        <label for="browser">Browser</label><br />
	<input type="text" name="browser" id="browser" rel="1" />
        <input type="hidden" name="platform" rel="2" />
        <br />
        <label for="version">Engine version</label><br />
	<select name="version" id="version" rel="3">
                <option>1.5</option>
                <option>1.7</option>
                <option>1.8</option>
        </select>
        <br />
        <label for="grade">CSS grade</label><br />
		<input type="radio" name="grade" value="A" rel="4"> First<br>
		<input type="radio" name="grade" value="B" rel="4"> Second<br>
		<input type="radio" name="grade" value="C" checked rel="4"> Third
        <br />
</form>

<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Rendering engine</th>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
		</tr>
	</thead>
	<tfoot>
		<tr>

			<th>Rendering engine</th>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
		</tr>

	</tfoot>
	<tbody>
		<tr class="odd_gradeX" id="2">
			<td class="read_only"> A Trident(read only cell)</td>
			<td>Internet Explorer 4.0</td>
			<td>Win 95+</td>
			<td class="center">4</td>

			<td class="center">X</td>
		</tr>
		<tr class="even_gradeC" id="4">
			<td>Trident</td>
			<td>Internet Explorer 5.0</td>
			<td>Win 95+</td>
			<td class="center">5</td>

			<td class="center">C</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Trident</td>
			<td>Internet Explorer 5.5</td>
			<td>Win 95+</td>
			<td class="center">5.5</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Trident</td>
			<td class="read_only">Internet Explorer 6(read only cell)</td>
			<td>Win 98+</td>
			<td class="center">6</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Trident</td>
			<td>Internet Explorer 7</td>
			<td class="read_only">Win XP SP2+(read only cell)</td>
			<td class="center">7</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Trident</td>
			<td>AOL browser (AOL desktop)</td>
			<td>Win XP</td>
			<td class="center">6</td>

			<td class="center read_only">A(read only cell)</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko (UTF-8: $��)</td>
			<td>Firefox 1.0</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.7</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Firefox 1.5</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Firefox 2.0</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Firefox 3.0</td>
			<td>Win 2k+ / OSX.3+</td>
			<td class="center">1.9</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Camino 1.0</td>
			<td>OSX.2+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Camino 1.5</td>
			<td>OSX.3+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Netscape 7.2</td>
			<td>Win 95+ / Mac OS 8.6-9.2</td>
			<td class="center">1.7</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Netscape Browser 8</td>
			<td>Win 98SE+</td>
			<td class="center">1.7</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Netscape Navigator 9</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Mozilla 1.0</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Mozilla 1.1</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.1</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Mozilla 1.2</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.2</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Mozilla 1.3</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.3</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Mozilla 1.4</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.4</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Mozilla 1.5</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.5</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Mozilla 1.6</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.6</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Mozilla 1.7</td>
			<td>Win 98+ / OSX.1+</td>
			<td class="center">1.7</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Mozilla 1.8</td>
			<td>Win 98+ / OSX.1+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Seamonkey 1.1</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Epiphany 2.20</td>
			<td>Gnome</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Webkit</td>
			<td>Safari 1.2</td>
			<td>OSX.3</td>
			<td class="center">125.5</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Webkit</td>
			<td>Safari 1.3</td>
			<td>OSX.3</td>
			<td class="center">312.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Webkit</td>
			<td>Safari 2.0</td>
			<td>OSX.4+</td>
			<td class="center">419.3</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Webkit</td>
			<td>Safari 3.0</td>
			<td>OSX.4+</td>
			<td class="center">522.1</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Webkit</td>
			<td>OmniWeb 5.5</td>
			<td>OSX.4+</td>
			<td class="center">420</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Webkit</td>
			<td>iPod Touch / iPhone</td>
			<td>iPod</td>
			<td class="center">420.1</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Webkit</td>
			<td>S60</td>
			<td>S60</td>
			<td class="center">413</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Presto</td>
			<td>Opera 7.0</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Presto</td>
			<td>Opera 7.5</td>
			<td>Win 95+ / OSX.2+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Presto</td>
			<td>Opera 8.0</td>
			<td>Win 95+ / OSX.2+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Presto</td>
			<td>Opera 8.5</td>
			<td>Win 95+ / OSX.2+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Presto</td>
			<td>Opera 9.0</td>
			<td>Win 95+ / OSX.3+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Presto</td>
			<td>Opera 9.2</td>
			<td>Win 88+ / OSX.3+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Presto</td>
			<td>Opera 9.5</td>
			<td>Win 88+ / OSX.3+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Presto</td>
			<td>Opera for Wii</td>
			<td>Wii</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Presto</td>
			<td>Nokia N800</td>
			<td>N800</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Presto</td>
			<td>Nintendo DS browser</td>
			<td>Nintendo DS</td>
			<td class="center">8.5</td>

			<td class="center">C/A<sup>1</sup></td>
		</tr>
		<tr class="even_gradeC" id="4">
			<td>KHTML</td>
			<td>Konqureror 3.1</td>
			<td>KDE 3.1</td>

			<td class="center">3.1</td>
			<td class="center">C</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>KHTML</td>
			<td>Konqureror 3.3</td>
			<td>KDE 3.3</td>

			<td class="center">3.3</td>
			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>KHTML</td>
			<td>Konqureror 3.5</td>
			<td>KDE 3.5</td>

			<td class="center">3.5</td>
			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeX" id="2">
			<td>Tasman</td>
			<td>Internet Explorer 4.5</td>
			<td>Mac OS 8-9</td>

			<td class="center">-</td>
			<td class="center">X</td>
		</tr>
		<tr class="even_gradeC" id="4">
			<td>Tasman</td>
			<td>Internet Explorer 5.1</td>
			<td>Mac OS 7.6-9</td>

			<td class="center">1</td>
			<td class="center">C</td>
		</tr>
		<tr class="odd_gradeC" id="3">
			<td>Tasman</td>
			<td>Internet Explorer 5.2</td>
			<td>Mac OS 8-X</td>

			<td class="center">1</td>
			<td class="center">C</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Misc</td>
			<td>NetFront 3.1</td>
			<td>Embedded devices</td>

			<td class="center">-</td>
			<td class="center">C</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Misc</td>
			<td>NetFront 3.4</td>
			<td>Embedded devices</td>

			<td class="center">-</td>
			<td class="center">A</td>
		</tr>
		<tr class="even_gradeX" id="11">
			<td>Misc</td>
			<td>Dillo 0.8</td>
			<td>Embedded devices</td>

			<td class="center">-</td>
			<td class="center">X</td>
		</tr>
		<tr class="odd_gradeX" id="2">
			<td>Misc</td>
			<td>Links</td>
			<td>Text only</td>

			<td class="center">-</td>
			<td class="center">X</td>
		</tr>
		<tr class="even_gradeX" id="11">
			<td>Misc</td>
			<td>Lynx</td>
			<td>Text only</td>

			<td class="center">-</td>
			<td class="center">X</td>
		</tr>
		<tr class="odd_gradeC" id="3">
			<td>Misc</td>
			<td>IE Mobile</td>
			<td>Windows Mobile 6</td>

			<td class="center">-</td>
			<td class="center">C</td>
		</tr>
		<tr class="even_gradeC" id="4">
			<td>Misc</td>
			<td>PSP browser</td>
			<td>PSP</td>

			<td class="center">-</td>
			<td class="center">C</td>
		</tr>
		<tr class="odd_gradeU" id="10">
			<td>Other browsers</td>
			<td>All others</td>
			<td>-</td>

			<td class="center">-</td>
			<td class="center">U</td>
		</tr>
	</tbody>
</table>
				</div>
			</div>
			<div class="css_clear"></div>
			
			<div class="css_spacing"></div>

		</div>

		
	</body>

</html>