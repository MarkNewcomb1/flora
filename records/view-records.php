<?php
	error_reporting(0);
?>
	<!DOCTYPE HTML>
	<html>
		<head>
			<title>View Records</title>
			<style>
				ul li{
				list-style: none;
				}
				
				ul {
					background-color:rgba(11, 152, 11, 0.9);
					display: inline-block;
					padding: 15px;
					font-size: 1.4em;
				}
				.next {
					display:inline-block;
					background-color:rgba(11, 152, 11, 0.9);
				}
				.clear {
					clear: both;
				}
				.label {
					background-color:rgba(171, 224, 188, 0.44);
					text-decoration: underline;
				}
			</style>
					<link href='../styles.css' rel='stylesheet' type='text/css'>
		</head>
		<body>
		<?php
$conn = mysql_connect("localhost","root","root");
mysql_select_db("flora",$conn); 
$result = mysql_query("SELECT * FROM observations");
?>
<div class="dynamic_data">
<?php
$i=0;
while($row = mysql_fetch_array($result)) {
?>
<ul>
<li><span class="label">ID:</span> <?=$row["ObservationID"];?></li>
<li><span class="label">Name:</span> <?=$row["personname"];?></li>
<li><span class="label">Plant:</span> <?=$row["plantname"];?></li>
<li><span class="label">Soil:</span> <?=$row["soilconditions"];?></li>
<li><span class="label">Weather:</span> <?=$row["weatherconditions"];?></li>
<li><span class="label">Date:</span> <?=$row["datetime"];?></li>
<li><span class="label">Location:</span> <?=$row["location"];?></li>
<li><span class="label">Lat:</span> <?=$row["latitude"];?></li>
<li><span class="label">Long:</span> <?=$row["longitude"];?></li>
<li><span class="label">Notes:</span> <?=$row["notes"];?></li>
<li><span class="label">Temp:</span> <?=$row["temperature"];?></li>
</ul>
<br />
<h2 class="next">Next Record:</h2>
<div class="clear"></div>
<?php
$i++;
}
?>
<div>
<?php
mysql_close($conn);
?>
	<a class="csvbutton" href="export.php">Export to CSV</a>
</body>
	</html>