<html>
<head>
<script>
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>

<form>
<select name="users" onchange="showUser(this.value)">
<option value="">Select a person:</option>
<option value="1">Peter Griffin</option>
<option value="2">Lois Griffin</option>
</select>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here.</b></div>

</body>
</html>


<?php
$q=$_GET["q"];

include("../php_apis/config.php");

$sql="SELECT * FROM resort_list WHERE resort_id = '".$q."'";

$result = mysql_query($sql);

echo "<table border='1'>
";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['resort_name'] . "</td>";
  echo "<td>" . $row['resort_place'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


?>