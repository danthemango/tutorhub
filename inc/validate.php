<?php

//print error message or not??
// remember to use htmlspecialchars in formsif

/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
   if (empty($_POST["firstname"])) {
        $firstNameErr = "First name is required";
   } else {
	$firstName = test_input($_POST["lastname"]);
	if (!preg_match("/^[a-zA-Z]*$/",$firstName)) {
	      $firstNameErr = "Only letters allowed";
	}
   }
 */
// use functions like this
// $fname_err=test_name($_POST["firstname"]);
// $lname_err=test_name($_POST["lastname"]);

/*
   if (empty($_POST["lastname"])) {
	$lastNameErr = "First name is required";
   } else {
	$lastName = test_input($_POST["lastname"]);
	if (!preg_match("/^[a-zA-Z]*$/",$lastName)) {
	       $lastNameErr = "Only letters allowed";
	}
   }

   if (empty($_POST["email"])) {
	$emailErr = "Email is required";
   } else {
       $email = test_input($_POST["email"]);
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	      $emailErr = "Invalid email format";
	}
   }

   if (empty($_POST["password"])) {
	$passwordErr = "Password is required";
   } else {
       $password = test_input($_POST["password"]);
       if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',$password)) {
	       $passwordErr = "Password can only have letters, numbers or these characters !,@,#,$,% and must contain 1 number, 1 letter and be between 8 and 12 chars";
       }
   }

   if (empty($_POST["phone"])) {
	$phoneErr = "phone number is required";
   } else {
	$phone = test_input($_POST["phone"]);
	if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
		$phoneErr = "Phone number must be in this format '000-0000-0000'";
	}
   }

   if (empty($_POST["remember"])) {
	 $rememberErr = "remember should be provided";
   } else {
         $remember = test_input($_POST["remember"]);
	 if (!filter_var($remember, FILTER_SANITIZE_STRING)) {;
		 $rememberErr = "try again with valid input";
	 }
   }

}

 */

function test_name($data){
	test_input($data);
	$error= true;
	if (empty($data)){
                // name fields are required
		$error= false;
	}
        if (!preg_match("/^[a-zA-Z]*$/",$data)) {
		//Only letters allowed
		$error= false;
	}
	return $error;
}

function test_email($data){
	test_input($data);
	$error= true;
        if (empty($data)){
	         //email is required
		 $error= false;
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		 //Invalid email format
		 $error= false;
	}
	return $error;
}

function test_password($data){
	test_input($data);
	$error= true;
	if (empty($data)){
		//password is required
		$error= false;
	}
        if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',$password)) {
//"Password can only have letters, numbers or these characters !,@,#,$,% and must contain 1 number, 1 letter and be between 8 and 12 chars"
           $error= false; 
	}
	return $error;
}

function test_phone($data){
	test_input($data);
	$error= true;
	if (empty($data)){
		//phone is required
		$error= false;
	}
	if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
		// "Phone number must be in this format '000-0000-0000'"
		$error= false;
	}
	return $error;
}

function test_message($data){
	test_input($data);
	$error= true;
	if (empty($data)){
		//message is required
		$error= false;
	}
	$remember = test_input($_POST["remember"]);
	if (!filter_var($remember, FILTER_SANITIZE_STRING)) {
		// "try again with valid input";
		$error= false;
	}
	return $error;

}

function test_rate($data){

}

function test_time($data){
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
		// course has to be numeric and max. 10 chars
		$error= false;
	}
	return $error;
}
?>

