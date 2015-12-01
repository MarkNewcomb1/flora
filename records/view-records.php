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
<li><?=$row["ObservationID"];?></li>
<li><?=$row["personname"];?></li>
<li><?=$row["plantname"];?></li>
<li><?=$row["soilconditions"];?></li>
<li><?=$row["weatherconditions"];?></li>
<li><?=$row["datetime"];?></li>
<li><?=$row["location"];?></li>
<li><?=$row["latitude"];?></li>
<li><?=$row["longitude"];?></li>
<li><?=$row["notes"];?></li>
<li><?=$row["temperature"];?></li>
</ul>
<br />
<h2 class="next">Next Record:</h2>
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