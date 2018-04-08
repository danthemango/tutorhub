<?php

/*
 *Group:    SCAD (Sami, Camille, Angelo, and Dan)
 *Purpose:  validate functions for TutorHub
 *Created:  2018-03-20 by Sami 
 *Last Modified: 2018-04-06 
/*
 
 //example how to use this file and functions

 require 'inc/validate.php';

 if(test_name($_POST['firstname'])){
	$firstname = $_POST['firstname']; 
 }else{
	$error=false;
 }

 */


function test_name($data){
	test_input($data);
	$error= TRUE;
	if (empty($data)){
	//	echo "name fields are required";
		$error= FALSE;
	}
        if (!preg_match("/^[a-zA-Z]*$/",$data)){
	//	echo "Only letters allowed";
		$error= FALSE;
	}
	return $error;
}

//same as test_name but also allows spaces
function test_fullname($data){
	test_input($data);
	if (empty($data)){
	//      echo "name fields are required";
		$error= FALSE;
	}
	if (!preg_match("/^[a-zA-Z\s]*$/",$data)){
		$error= FALSE;
	}
	return $error;
}

function test_email($data){
	test_input($data);
	$error= TRUE;
        if (empty($data)){
         //	 echo "email is required";
		 $error= FALSE;
	}
	if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
	//	 echo "Invalid email format";
		 $error= FALSE;
	}
	return $error;
}

function test_password($data){
	test_input($data);
	$error= TRUE;
	if (empty($data)){
	//	echo "password is required";
		$error= FALSE;
	}
        if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/',$data)) {
         //  echo "Password can only have letters, numbers or these characters !,@,#,$,% and must contain 1 number, 1 letter and be between 8 and 20 chars";
           $error= FALSE; 
	}
	return $error;
}

function test_phone($data){
	test_input($data);
	$error= TRUE;
	if (empty($data)){
		echo "phone is required";
		$error= FALSE;
	}
	else if(!preg_match("/^[0-9]{10}$/", $data)) {
		echo "Phone number must be 10 digits";
		$error= FALSE;
	}
	return $error;
}

function test_message($data){
	test_input($data);
	$error= TRUE;
	if (empty($data)){
	//	echo "message is required";
		$error= FALSE;
	}
	$data = filter_var($data, FILTER_SANITIZE_STRING));
	return $error;
}

function test_number($data){
	test_input($data);
	$error= TRUE;
	if (empty($data)){
	//	echo "rate is required";
		$error= FALSE;
	}
        else if(!preg_match("/^[0-9]+$/", $data)) {
	//	echo "rate must be numeric";
		$error= FALSE;
	}
	return $error;
}

function test_time($data){
	test_input($data);
	$error= TRUE;
	if (empty($data)){
        	echo "time is required";
		$error= FALSE;
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function test_class($data){
	test_input($data);
	$error= TRUE;
        if (!preg_match('/^[0-9A-Za-z]{4,10}$/',$data)) {
		// "course has to be numeric and alphabetic and up to 10 digits";
		$error= FALSE;
	}
	return $error;
}

?>

