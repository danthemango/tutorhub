<?php

function test_name($data){
	test_input($data);
	$error= true;
	if (empty($data)){
                // name fields are required
		echo "name fields are required";
		$error= false;
	}
        if (!preg_match("/^[a-zA-Z]*$/",$data)) {
		//Only letters allowed
		echo "Only letters allowed";
		$error= false;
	}
	return $error;
}

function test_email($data){
	test_input($data);
	$error= true;
        if (empty($data)){
         	 echo "email is required";
		 $error= false;
	}
	if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
		 echo "Invalid email format";
		 $error= false;
	}
	return $error;
}

function test_password($data){
	test_input($data);
	$error= true;
	if (empty($data)){
		echo "password is required";
		$error= false;
	}
        if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',$data)) {
        echo"Password can only have letters, numbers or these characters !,@,#,$,% and must contain 1 number, 1 letter and be between 8 and 12 chars";
           $error= false; 
	}
	return $error;
}

function test_phone($data){
	test_input($data);
	$error= true;
	if (empty($data)){
		echo "phone is required"
		$error= false;
	}
	else if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $data)) {
		echo "Phone number must be in this format '000-0000-0000'";
		$error= false;
	}
	return $error;
}

function test_message($data){
	test_input($data);
	$error= true;
	if (empty($data)){
		echo "message is required";
		$error= false;
	}
	else if (!filter_var($data, FILTER_SANITIZE_STRING)) {
		echo "try again with valid input for your message";
		$error= false;
	}
	return $error;
}

function test_rate($data){
	test_input($data);
	$error= true;
	if (empty($data)){
		echo "rate is required";
		$error= false;
	}
        else if(preg_match("/^[0-9]+$/", $data)) {
		echo "rate must be numeric";
		$error= false;
	}
	return $error;
}

function test_time($data){
	test_input($data);
	$error= true;
	if (empty($data)){
		echo "time is required";
		$error= false;
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function test_course($data){
	test_input($data);
	$error= true;
        if (!preg_match('/^[0-9]{8,12}$/',$data)) {
	echo "course has to be numeric and max. 10 chars"
		$error= false;
	}
	return $error;
}
?>

