<?php

require_once './inc/twilio.inc'; // Loads secrets
require_once './res/Twilio/Twilio/autoload.php'; // Loads the library
 
use Twilio\Rest\Client;

$err = false;

if (isset($_POST['id'])) {
	$name = $_POST['id'];
} else {
	$err = true;
}

if (isset($_POST['courses'])) {
	$courses = join(', ', $_POST['courses']);
} else {
	$err = true;
}

if (isset($_POST['name'])) {
	$name = $_POST['name'];
} else {
	$err = true;
}

if (isset($_POST['email'])) {
	$email = $_POST['email'];
} else {
	$err = true;
}

if (isset($_POST['phone'])) {
	$phone = $_POST['phone'];
} else {
	$err = true;
}

if (isset($_POST['message'])) {
	$message = $_POST['message'];
} else {
	$err = true;
}

if ($err) {
	http_response_code(400);
} else {
	$body = "$name has requested tutoring in $courses and sent you the following message:\n\n$message\n\nYou can reach them at $email or $phone";

	$client = new Client($account_sid, $auth_token);
	$client->messages->create(
		"+16045375079",
		array(
			'from' => $twilio_number,
			'body' => "$body",
		)
	);
}

?>
