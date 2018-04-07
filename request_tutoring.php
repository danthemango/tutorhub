<?php

require_once './inc/dbinfo.inc'; // Loads database secrets
require_once './inc/twilio.inc'; // Loads Twilio secrets
require_once './res/Twilio/Twilio/autoload.php'; // Loads the Twilio library
require_once('inc/validate.php');

use Twilio\Rest\Client;

$err = false;
$error=''; //holds error messages but will not output them, in place incase we decide we'd like to be specific in the future

if(test_number($_POST['rate'])){
	$id = $_POST['id'];
} else {
	$err = true; 
}

if (isset($_POST['courses'])) {
	$courses = join(', ', $_POST['courses']);
} else {
	$err = true;
	$error.="Error in courses input <br>";
}

if(test_name($_POST['name'])){
	$name = $_POST['name'];
} else {
	$err = true;
	$error.="First name is required and only letters allowed<br>";
}

if(test_email($_POST['email'])){
	$email = $_POST['email'];
} else {
	$err = true;
	$error.="Email is required and must be of valid format<br>";
}

if(test_phone($_POST['phone'])){
	$phone = $_POST['phone'];
} else {
	$err = true;
	$error.="phone number is required and and must be 10 digits<br>";
}

if(test_message($_POST['message'])){
	$message = $_POST['message'];
} else {
	$err = true;
	$error.="try again with valid input for your message<br>";
}

if(!$err){
 try {
    $dbh = new PDO("mysql:host=$host;dbname=$user", $user, $password);
    $result = $dbh->query("SELECT * FROM profiles WHERE id=$id");

	foreach ($result as $row) {
		$tutor_firstname = $row['firstname'];
   	$tutor_phone = $row['phone'];
	}

    if (!$tutor_firstname or !$tutor_phone) {
   	$err = true;
    }

	if ($err) {
		http_response_code(400);
	} else {
		$body = "Hi $tutor_firstname! $name has requested tutoring in $courses and sent you the following message:\n\n$message\n\nYou can reach them at $email or $phone";

		$client = new Client($account_sid, $auth_token);
		$client->messages->create(
			$tutor_phone,
			array(
				'from' => $twilio_number,
				'body' => "$body",
			)
		);
	}
 } catch (Exception $e) {
   http_response_code(400);
 }

}else{
   http_response_code(400);
}

?>
