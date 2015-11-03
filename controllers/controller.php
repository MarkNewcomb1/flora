<?php

	include(../models/model.php)

	
	$processForm = new ValidateInput($_POST);
	
	if ($processForm->validatePost()) {
		// save to database
	} else {
		// return back to form with error text
	}
