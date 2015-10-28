<!DOCTYPE HTML>
<html>
	<head><title>Thanks!</title></head>
	<body>
		<h1>Confirmation Page - Entered Successfully</h1>
		<p>Thanks for submitting the form!</p>
		<p>Here is your entry:</p>
		
		<?php
			
			echo 'Plant Name: ' . $_POST['plant-name'] . '<br>';
			echo 'Soil Conditions: ' . $_POST['soil-conditions'] . '<br>';
			echo 'Weather Conditions: ' . $_POST['weather-conditions'] . '<br>';
			echo 'Location: ' . $_POST['location'] . '<br>';
			echo 'Your Name: ' . $_POST['person-name'] . '<br>';
			echo 'Notes: ' . $_POST['notes'] . '<br>';
		?>
	</body>
</html>