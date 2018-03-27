<?php // session_start(); /* Starts the session */

echo "test";
//echo "$_POST['times']['monday'][0]";
print_r($_POST);

// CONNTECT TO DATABASE, INSERT STATEMENTS



/*
if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}*/

/* PHP for tutor signup form submission
Author: Camille Nicole James
Created: Mar 22, 2018
Edited: 
Purpose: This file submits form data to the database for tutorhub signup.php */
 




 /*
// Check that all fields were entered here (name, colours, animal, font)
if(isset($_POST['name'])){
	$userName = $_POST['name'];
	$userName = trim($userName);
 	if(strlen($userName) <=0) {
		$err = true;
	}
}
else{
	$err = true;
}


if(isset($_POST['col1'])){
	$colour1= $_POST['col1'];
	$colour1 = trim($colour1);
 	if(strlen($colour1) <=0) {
		$err = true;
	}
}
else{
	$err = true;
}

if(isset($_POST['col2'])){
	$colour2 = $_POST['col2'];
	$colour2 = trim($colour2);
 	if(strlen($colour2) <=0) {
		$err = true;
	}
}
else{
	$err = true;
}

if(isset($_POST['animal'])){
	$faveanimal = $_POST['animal'];
	$faveanimal = trim($faveanimal);
 	if(strlen($faveanimal) <=0) {
		$err = true;
	}
}
else{
	$err = true;

}

if(isset($_POST['font'])){
	$selectedfont = $_POST['font'];
}
else{
	$err = true;
}

// Test for countries selected here
if (isset($_POST['country'])) {
	$mycountry = $_POST['country'];
}


// If there was an error, load bad.html
if ($err == true) {
	header("location:bad.html");
}

// otherwise, proceed and include front.php
else {
	include('front.php'); 
}



echo "<body style=\"background-color:$colour1;color:$colour2;font-family:$selectedfont;text-align:center;border:2px solid black; \">"; 

echo "Here are your results- it's magic!";
echo "<h1>$userName's favourite animal is</h1>";
echo "$faveanimal <br><br><br>"; 
echo "You selected the following preferred country to visit: <br>";
echo "$mycountry <br><br><br>";

*/

include('back.php'); 


?>