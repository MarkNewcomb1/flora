<?php
//Evan's code
	class ValidateInput {
		
		public function _construct ($data) {
			//build the form with input data
			$this->personname = $data['personname'];
			$this->plantname = $data['plantname'];
			$this->soilconditions = $data['soilconditions'];
			$this->weatherconditions = $data['weatherconditions'];
			$this->datetime = $data['datetime'];
			$this->location = $data['location'];
			$this->notes = $data['notes'];
		}
		
		public function validatePost() {
			
			$personName = htmlspecialchars($_POST['personname']);
			$plantName = htmlspecialchars($_POST['plantname']);
			$soilConditions = htmlspecialchars($_POST['soilconditions']);
			$weatherConditions = htmlspecialchars($_POST['weatherconditions']);
			$dateTime = htmlspecialchars($_POST['datetime']);
			$location = htmlspecialchars($_POST['location']);
			$notes = htmlspecialchars($_POST['notes']);
			
			$error = 0;
			
			
/*
			if (! preg_match('^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}' ,$_POST['latitude']) || (! preg_match('^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}' ,$_POST['longitude']))){
				print 'Your latitude and longitude must be a number in the valid format';
				$error++;
			}
*/
			
			if ($error > 0) {
				return false;
			} else {
				return true;
				submitPost();
			}//end else
		}
		
	}

function submitPost(){
if ( ! empty( $_POST ) ) {
  
  // Connect to MySQL
  $mysqli = new mysqli( 'localhost', 'root', 'root', 'flora' );
  
  // Check our connection
  if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
  }
  
  // Insert our data
  $sql = "INSERT INTO observations ( personname, plantname, soilconditions, weatherconditions, datetime, location, notes ) VALUES ( '{$mysqli->real_escape_string($_POST['personname'])}', '{$mysqli->real_escape_string($_POST['plantname'])}', '{$mysqli->real_escape_string($_POST['soilconditions'])}', '{$mysqli->real_escape_string($_POST['weatherconditions'])}', '{$mysqli->real_escape_string($_POST['datetime'])}', '{$mysqli->real_escape_string($_POST['location'])}', '{$mysqli->real_escape_string($_POST['notes'])}' )";
  $insert = $mysqli->query($sql);
  
  // Print response from MySQL
  if ( $insert ) {
	  return true;
    echo "Success! Row ID: {$mysqli->insert_id}";
  } else {
	  return false;
    die("Error: {$mysqli->errno} : {$mysqli->error}");
  }
  
  // Redirect and Close our connection
  header("Location: ../views/thankyou.php");
  $mysqli->close();
	}
}
?>