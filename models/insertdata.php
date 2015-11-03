<?php
// Only process the form if $_POST isn't empty
if ( ! empty( $_POST ) ) {
  
  // Connect to MySQL
  $mysqli = new mysqli( 'localhost', 'flora', '', 'root' );
  
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
