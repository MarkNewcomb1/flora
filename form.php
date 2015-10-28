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
<form method="post" action="thankyou.php">
<label for="plant-name">Plant Name (Enter the name of the Plant, if known. Otherwise enter a brief description of the Plant.)</label><br>
  <input name="plant-name" type="text"><br>
 <label for="soil-conditions">Soil Conditions (Enter any combination of Clay, Loam, Peat, Rocky, Sand, or Silt descriptors as well as Soil Color.)</label><br>
 <input name="soil-conditions" type="text">
 <label for="weather-conditions">Weather Conditions (Enter the weather conditions while observing the Plant. Enter any combination of Sunny, Partly Sunny, Cloudy, Raining, Snowing, Fog, Misting, Windy, etc. Also enter an estimate of the Temperature.)</label><br>
 <input name="weather-conditions" type="text">
 <label for="location">Location (Enter the location where the Plant was seen.)</label><br>
 <input name="location" type="text"><br>
 <label for="person-name">Enter your name:</label><br>
 <input name="person-name" type="text">
 <label for="notes">Additional Notes (Add any additional notes and observations.)</label><br>
 <input name="notes" type="text">
  <input type="submit" value="Submit Form">
</form>