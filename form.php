<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Flora Form</title>
		<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<style>
html{
	height:100%;
	background-image:url("leaf-on-wood.jpg");
	background-size:cover;
}
.flora {
    margin-left:auto;
    margin-right:auto;

    max-width: 500px;
    background: #F8F8F8;
    padding: 30px 30px 20px 30px;
    font: 12px Arial, Helvetica, sans-serif;
    color: #666;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
}
.flora h1 {
    font: 3.2em "Trebuchet MS", Arial, Helvetica, sans-serif;
    padding: 20px 0px 20px 30px;
    display: block;
    margin: -30px -30px 10px -30px;
    color: #FFF;
/*     background: #9DC45F; */
	background-image: url("http://cdn.morguefile.com/imageData/public/files/l/Ladyheart/08/l/1439740866eaqe9.jpg");
	background-position: 0px -170px;
    text-shadow: 1px 1px 1px #949494;
    border-radius: 5px 5px 0px 0px;
    -webkit-border-radius: 5px 5px 0px 0px;
    -moz-border-radius: 5px 5px 0px 0px;
    border-bottom:1px solid #89AF4C;

}
.flora h1>span {
    display: block;
    font-size: 11px;
    color: #FFF;
}

.flora label {
    display: block;
    margin: 0px 0px 5px;
    font-weight:600;
}
.flora label>span {
	font-family: 'Montserrat', sans-serif;
	font-size:1.1em;
    float: left;
    margin-top: 10px;
    color: #5E5E5E;
}
.flora input[type="text"], .flora input[type="email"], .flora textarea, .flora select {
    color: #555;
    height: 30px;
    line-height:15px;
    width: 100%;
    padding: 0px 0px 0px 10px;
    margin-top: 2px;
    margin-bottom:20px;
    border: 1px solid #E5E5E5;
    background: #FBFBFB;
    outline: 0;
    -webkit-box-shadow: inset 1px 1px 2px rgba(238, 238, 238, 0.2);
    box-shadow: inset 1px 1px 2px rgba(238, 238, 238, 0.2);
    font: normal 14px/14px Arial, Helvetica, sans-serif;
}
.flora textarea{
    height:100px;
    padding-top: 10px;
}
.flora select {
    background: url('down-arrow.png') no-repeat right, -moz-linear-gradient(top, #FBFBFB 0%, #E9E9E9 100%);
    background: url('down-arrow.png') no-repeat right, -webkit-gradient(linear, left top, left bottom, color-stop(0%,#FBFBFB), color-stop(100%,#E9E9E9));
   appearance:none;
    -webkit-appearance:none; 
   -moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: '';
    width:100%;
    height:30px;
}
.flora .button {
    background-color: #9DC45F;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-border-radius: 5px;
    border: none;
    padding: 10px 25px 10px 25px;
    font-size:1.3em;
    color: #FFF;
    text-shadow: 1px 1px 1px #949494;
}
.flora .button:hover {
    background-color:#80A24A;
}
.flora #reset {
	margin-top:20px;
}
	</style>
	<body>
<?php
// Only process the form if $_POST isn't empty
if ( ! empty( $_POST ) ) {
  
  // Connect to MySQL
  $mysqli = new mysqli( 'localhost', 'FLORA', 'password', 'admin' );
  
  // Check our connection
  if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
  }
  
  // Insert our data
  $sql = "INSERT INTO entries ( plant-name, soil-conditions, weather-conditions, location, person-name, notes ) VALUES ( '{$mysqli->real_escape_string($_POST['plant-name'])}', '{$mysqli->real_escape_string($_POST['soil-conditions'])}', '{$mysqli->real_escape_string($_POST['weather-conditions'])}', '{$mysqli->real_escape_string($_POST['location'])}', '{$mysqli->real_escape_string($_POST['person-name'])}', '{$mysqli->real_escape_string($_POST['notes'])}' )";
  $insert = $mysqli->query($sql);
  
  // Print response from MySQL
  if ( $insert ) {
    echo "Success! Row ID: {$mysqli->insert_id}";
  } else {
    die("Error: {$mysqli->errno} : {$mysqli->error}");
  }
  
  // Close our connection
  $mysqli->close();
}
?>

<!-- Current database model is fine, nothing too complicated -->
<form method="post" action="thankyou.php" class="flora">
	<h1>Flora Finder<span>Please fill all the text in the fields.</span></h1>
	 <label for="person-name"><span>Enter your name:</span></label>
 <input name="person-name" type="text">
	<!--   KEEP plant name a text box -->
<label for="plant-name"><span>Plant Name (Enter the name of the Plant, if known. Otherwise enter a brief description of the Plant.)</span></label>
  <input name="plant-name" type="text">
<!--   KEEP soil conditions a text box -->
 <label for="soil-conditions"><span>Soil Conditions (Enter any combination of Clay, Loam, Peat, Rocky, Sand, or Silt descriptors as well as Soil Color.)</span></label>
 <input name="soil-conditions" type="text">
<!--  weather api; but also give user ability to manually override ( she would take user-submitted data preference over API-generated) but only have one record, don't have both records in there. If you can get weather api working, populate that field with it. BUT, if the user checks a box to manually override this and enter in their own thing, then THAT field is put into the record) get temperature, high/low, description -->
 <label for="weather-conditions"><span>Weather Conditions (Enter the weather conditions while observing the Plant. Enter any combination of Sunny, Partly Sunny, Cloudy, Raining, Snowing, Fog, Misting, Windy, etc. Also enter an estimate of the Temperature.)</span></label>
 <input name="weather-conditions" type="text"> 
<!--  HAVE a date/time field, should be generated. give user ability to override date/time in case there's no connectivity with the phone. -->
<label for="datetime"><span>Date/Time</span></label>
<input name="datetime" type="text">
<!--  geolocation; have to get user permission to allow for that, but if you CAN get the geolocation that's great, but also make it possible for someone to input the latitude and longitude if they wish (try to validate it); if they don't know THAT, then just a text box for location (make at least one required if the other two fail) but don't have two records for geolocation, just one that gets data inputted into it-->
 <label for="location"><span>Location (Enter the location where the Plant was seen.)</span></label>
 <input name="location" type="text">
 <label for="notes"><span>Additional Notes (Add any additional notes and observations.)</span></label>
 <input name="notes" type="text">
  <input type="submit" value="Submit Form" class="button"><br>
  <input type="reset" value="Reset form" id="reset">
</form>
	</body>
</html>