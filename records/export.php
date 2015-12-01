<?php
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename=floraexport.csv');
error_reporting(0);
$conn = mysql_connect("localhost","root","root");
mysql_select_db("flora",$conn);

$query = "SELECT * FROM observations";
$result = mysql_query($query);

$num_column = mysql_num_fields($result);		

$csv_header = '';
for($i=0;$i<$num_column;$i++) {
	$csv_header .= '"' . mysql_field_name($result,$i) . '",';
}	
$csv_header .= "\n";

$csv_row ='';
while($row = mysql_fetch_row($result)) {
	for($i=0;$i<$num_column;$i++) {
		$csv_row .= '"' . $row[$i] . '",';
	}
	$csv_row .= "\n";
}
/* Download as CSV File */
echo $csv_header . $csv_row;
exit;
?>