<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Flora Form</title>
		<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='../styles.css' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
<form method="post" action="../models/model.php" class="flora">
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
 <label for="location"><span>Location (Enter the location where the Plant was seen. If you have connectivity and you allow us to determine your location, we will enter in this field for you.)</span></label>
 <input name="location" type="text">
 <label for="notes"><span>Additional Notes (Add any additional notes and observations.)</span></label>
 <input name="notes" type="text">
  <input type="submit" value="Submit Form" class="button"><br>
  <input type="reset" value="Reset form" id="reset">
</form>
	</body>
</html>