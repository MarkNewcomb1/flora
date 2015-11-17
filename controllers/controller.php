<?php

include('../models/model.php');
 
 $action = isset($_POST["action"])?$_POST["action"]:'';
 
 switch ($action) {
     case 'save':
     echo "now we save...";
     $processForm = new FormFactory($_POST);
     
     if ($processForm->validatePost()) {
       $insert = submitPost();
     } else {
       // return back to form with error text
     }        
     if ($insert){
	     include("../views/thankyou.php");
     }else {
	     echo "failure.";
     }  
         break;
     
     default:
         
     include_once('../views/form.php');
         break;
 }