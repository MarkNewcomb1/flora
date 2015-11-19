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
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	</head>
	<body>
<form method="post" action="../controllers/controller.php" class="flora">
	<input type="hidden" name="action" value="save">
	<h1>Flora Finder<span>Please fill all the text in the fields.</span></h1>
	 <label for="personname"><span>Enter your name:</span></label>
 <input name="personname" type="text" maxlength="50">
	<!--   KEEP plant name a text box -->
<label for="plantname"><span>Plant Name - Required (Enter the name of the Plant, if known. Otherwise enter a brief description of the Plant.)</span></label>
  <input name="plantname" type="text" maxlength="100" required>
<!--   KEEP soil conditions a text box -->
 <label for="soilconditions"><span>Soil Conditions (Enter any combination of Clay, Loam, Peat, Rocky, Sand, or Silt descriptors as well as Soil Color.)</span></label>
 <input name="soilconditions" type="text" maxlength="100">
<!--  weather api; but also give user ability to manually override ( she would take user-submitted data preference over API-generated) but only have one record, don't have both records in there. If you can get weather api working, populate that field with it. BUT, if the user checks a box to manually override this and enter in their own thing, then THAT field is put into the record) get temperature, high/low, description -->
 <label for="weatherconditions"><span>Weather Conditions (Enter the weather conditions while observing the Plant. Enter any combination of Sunny, Partly Sunny, Cloudy, Raining, Snowing, Fog, Misting, Windy, etc. Also enter an estimate of the Temperature.)</span></label>
 <input name="weatherconditions" type="text" maxlength="50"> 
<!--  HAVE a date/time field, should be generated. give user ability to override date/time in case there's no connectivity with the phone. -->
<label for="datetime"><span>Today's Date (mm/dd/yyyy) - Required</span></label>
<input name="datetime" type="text" pattern="\d{1,2}/\d{1,2}/\d{4}" required>
<!--  geolocation; have to get user permission to allow for that, but if you CAN get the geolocation that's great, but also make it possible for someone to input the latitude and longitude if they wish (try to validate it); if they don't know THAT, then just a text box for location (make at least one required if the other two fail) but don't have two records for geolocation, just one that gets data inputted into it-->
 <label for="location"><span>Location (Enter the location where the Plant was seen. If you have connectivity and you allow us to determine your location, we will enter in this field for you in the Latitude/Longitude fields further down the form.)</span></label>
 <input name="location" type="text">
 <label for="notes"><span>Additional Notes (Add any additional notes and observations.)</span></label>
 <input name="notes" type="text" maxlength="255">
   <fieldset>
    <legend>Location</legend>
    
    <label for="lat">Latitude: </label>
    <input type="text" name="latitude" id="lat" placeholder="Enter Latitude" value="" required><br><br>
    
    <label for="lon">Longitude: </label>
    <input type="text" name="longitude" id="lon" placeholder="Enter Longitude" value="" required><br><br>
    
    <a href="#" id="ajaxTrigger">Fetch Weather Data</a><br><br>
    
    <label for="temp">Current Temp: </label>
    <input type="text" name="temperature" id="temp" placeholder="Temperature" value="" required><br><br>    
  </fieldset>
  <input type="submit" value="Submit Form" class="button"><br>
  <input type="reset" value="Reset form" id="reset">
</form>
<script>
  // The document ready statement delays jQuery execution until the DOM if fully formed.
  $(document).ready(function(){
    
    // Test if browser supports geolocation.  If so, populate form filds with latitude and longitude
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        function( position ){  
          $('#lat').val(position.coords.latitude);
          $('#lon').val(position.coords.longitude);
        }
      )
    }    
    
    // Assign a click event to the id of "ajaxTrigger".  When a user clicks the element the enclosed code will run.
    $('#ajaxTrigger').click(function() { 
      
      // We must have lat and lon to proceed.
      // Check if lat and lon have values.  If not present error and end execution.
      if(!$('#lat').val() || !$('#lon').val()){
        alert('Please provide latitude and longitude for which to retrieve weather data.');
        return;
      }
      
      // check to see if either lat or lon is not a number. If not present error and end execution.
      if(isNaN($('#lat').val()) || isNaN($('#lon').val())){
        alert('Please provide a valid numeric value for latitude and longitude.');
        return;
      }

      // To be a little  more clear on the api url structure list out each piece here.
      var baseURL = 'http://api.openweathermap.org/data/2.5/weather'
      var lat = "?lat=" + $('#lat').val().toString();
      var lon = "&lon=" + $('#lon').val().toString();
      var appid = '&APPID=7d7fffe39e7c66965aaf15016448d3e8';
      var params = '&units=imperial';
      
      // concat all parts of the ajax url before using it.
      var ajaxURL = baseURL.concat(lat, lon, appid, params);
      
      // jQuery ajax json call... there is a .done function if all goes well and a .fail function if it doesn't
      $.getJSON( ajaxURL )
        .done(function( json ) {
          $('#temp').val(json.main.temp);
        })
        .fail(function( jqxhr, textStatus, error ) {
          var err = textStatus + ", " + error;
          alert( "Request Failed: " + err );
      });
  
      // prevent default behavior of element clicked if it has one.
      return false; 
    });
  });
</script>

	</body>
</html>
