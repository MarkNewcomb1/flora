<?php
//Evan's code
	class ValidateInput {
		
		public function _construct ($data) {
			//build the form with input data
			$this->personname = $data['person-name'];
			$this->plantname = $data['plant-name'];
			$this->soilconditions = $data['soil-conditions'];
			$this->weatherconditions = $data['weather-conditions'];
			$this->datetime = $data['datetime'];
			$this->location = $data['location'];
			$this->notes = $data['notes'];
		}
		
		public function validatePost() {
			
			$personName = htmlspecialchars($_POST['person-name']);
			$plantName = htmlspecialchars($_POST['plant-name']);
			$soilConditions = htmlspecialchars($_POST['soil-conditions']);
			$weatherConditions = htmlspecialchars($_POST['weather-conditions']);
			$dateTime = htmlspecialchars($_POST['datetime']);
			$location = htmlspecialchars($_POST['location']);
			$notes = htmlspecialchars($_POST['notes']);
			
			$error = 0;
			
			
			if (! preg_match('/^-?\d*\.?\d+$/' ,$_POST['latitude']) || (! preg_match('/^-?\d*\.?\d+$/' ,$_POST['longitude']))){
				print 'Your latitude and longitude must be a number in the valid format';
				$error++;
			}
			
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
  $mysqli = new mysqli( 'localhost', 'flora', '', 'root' );
  
  // Check our connection
  if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
  }
  
  // Insert our data
  $sql = "INSERT INTO observations ( plant-name, soil-conditions, weather-conditions, location, person-name, notes ) VALUES ( '{$mysqli->real_escape_string($_POST['plant-name'])}', '{$mysqli->real_escape_string($_POST['soil-conditions'])}', '{$mysqli->real_escape_string($_POST['weather-conditions'])}', '{$mysqli->real_escape_string($_POST['location'])}', '{$mysqli->real_escape_string($_POST['person-name'])}', '{$mysqli->real_escape_string($_POST['notes'])}' )";
  $insert = $mysqli->query($sql);
  
  // Print response from MySQL
  if ( $insert ) {
    echo "Success! Row ID: {$mysqli->insert_id}";
  } else {
    die("Error: {$mysqli->errno} : {$mysqli->error}");
  }
  
  // Redirect and Close our connection
  header("Location: ../views/thankyou.php");
  $mysqli->close();
	}
}
?>