<?php

include('../models/model.php');
 
 $action = isset($_POST["action"])?$_POST["action"]:'';
 
 switch ($action) {
     case 'save':
     echo "now we save...";
     $processForm = new ValidateInput($_POST);
     
     if ($processForm->validatePost()) {
       // save to database
     } else {
       // return back to form with error text
     }          
         break;
     
     default:
         
     include_once('../views/form.php');
         break;
 }