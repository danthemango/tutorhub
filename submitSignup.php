<?php 

/* PHP for tutor signup form submission
Author: Camille Nicole James
Created: Mar 22, 2018
Edited: Mar 27, 2018, Mar 29, 2018, Apr 3, 2018
Purpose: This file submits form data to the database for tutorhub signup.php */

$error=0; //false means no error
require 'inc/header.php'; 
require_once("inc/dbinfo.inc");
require_once("inc/auth.php");
require 'inc/validate.php';
$pagetitle = "Signed up!";

// Variables to hold form values

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if(test_email($_POST['email'])){
	$email = $_POST['email'];
}else{
	$error=1;
}

if(test_name($_POST['firstname'])){
	$firstname = $_POST['firstname']; 
	echo "first name".$firstname;
}else{
	$error=1;
}

if(test_name($_POST['lastname'])){
	$lastname  = $_POST['lastname']; 
}else{
	$error=1;
}
if(test_phone($_POST['phone'])){
	$phone = $_POST['phone']; 
}else{
	$error=1;
}

if(test_password($_POST['password'])){
	$uPassword = $_POST['password'];
}else{
	$error=1;
}
if(test_rate($_POST['rate'])){
	$pay = $_POST['rate'];
}else{
	$error=1;
}

if ($error===1) {
	header("location:signup.php",  true,  301);
	exit();
}
}


echo "<div class='signupBodyStyles' style='margin:10% 10px 0 5%;'>";

// Insert personal info into database: name, email, pass, phone, date joined, hourly pay rate
try{
   $dbh = new PDO("mysql:host=$host;dbname=$database", $user, $password);
   // insert the data:
   $sql = 'insert into profiles(email,password,firstname,lastname,phone,date_joined,pay) values (:email, :uPassword, :firstname,:lastname,:phone, NOW(), :pay)';
   $sth = $dbh->prepare($sql);
   $result = $sth->execute(array(':email' => $email, ':firstname' => $firstname, ':lastname' => $lastname, ':phone' => $phone, ':pay' => $pay, ':uPassword' => password_encrypt($uPassword)));
   if($result){
    echo "Thank you for signing up! Your personal information has been submitted successfully.<br><br>";
    echo "You signed up to tutor the following classes: <br>";
   }else{
    echo "Your personal information could not be submitted. Please try again.<br><br>";
   }
   $dbh = null;
}catch(PDOException $e){
      echo "<p style=\"color:red\">Error: please contact your web administrator.</p>";
      // for debugging: 
      echo "error from database: " . $e->getMessage() . "<br />";
}

$id = ""; // variable to hold user ID


// grab user ID with query
try{
   $dbh = new PDO("mysql:host=$host;dbname=$database", $user, $password);
   // insert the data:
   $sql = 'select id from profiles where email = :email';
   $sth = $dbh->prepare($sql);
   $sth->execute(array(':email' => $email));
   $result = $sth->fetch();
   $id = $result[0];
   /*For debugging:
   if($result){
    //echo "Your user ID is as follows: $id <br>";
   }else{
    echo "User ID could not be found.<br>";
   } */
   $dbh = null;
	}catch(PDOException $e){
      echo "<p style=\"color:red\">Error: please contact your web administrator.</p>";
      // for debugging: 
      echo "error from database: " . $e->getMessage() . "<br />";
}

//Insert skills into database:
foreach ($_POST['classes'] as $classes) {
	//echo $classes;
		try{
		   $dbh = new PDO("mysql:host=$host;dbname=$database", $user, $password);
		   // insert the data:
		   $sql = 'insert into skills (id, class) values(:id, :class)';
		   $sth = $dbh->prepare($sql);
		   $result = $sth->execute(array(':id' => $id, ':class' => $classes));
		   if($result){
		    echo "$classes <br>";
		   }else{
		    echo "Error! Your class information could not be submitted.<br>";
		   }
		   $dbh = null;
		}catch(PDOException $e){
		      echo "<p style=\"color:red\">Error: please contact your web administrator.</p>";
		      // for debugging: 
		      echo "error from database: " . $e->getMessage() . "<br />";
		}
}

// Insert availability times into database
foreach($_POST['times'] as $dayNum => $dayTimes){
    foreach($dayTimes as $time){
        //echo "you want to work on $dayNum at $time<br/>";
        // explode function seperates the start and end times. ex. 8000to9000 will be 8000 and 9000
        $arrayTime = explode("to", $time); 
        $startTime; 
        $endTime; 
        // explode again to seperate 12:00:00 into distinct parts
        foreach ($arrayTime as $i => $indTimes) {
        	if ($i == 0) {
				$startTime = explode(":", $indTimes);
        	}
        	else {
        		$endTime = explode(":", $indTimes);
        	}
        }

        // connect to database and insert values here:
		try{
		   $dbh = new PDO("mysql:host=$host;dbname=$database", $user, $password);
		   // insert the data:
		   $sql = 'insert into times (id, daynum, starttime, endtime) values(:id, :dayNum, maketime(:s1, :s2, :s3), maketime(:e1, :e2, :e3))';
		   $sth = $dbh->prepare($sql);
		   $result = $sth->execute(array(':id' => $id,':dayNum' => $dayNum, ':s1' => $startTime[0], ':s2' => $startTime[1], ':s3' => $startTime[2], ':e1' => $endTime[0], ':e2' => $endTime[1], ':e3' => $endTime[2]));
		   /*For debugging:
		   if($result){
		    echo "Your availability has been submitted successfully!<br>";
		   }else{
		    echo "Your availability could not be submitted successfully.<br>";
		   }*/
		   $dbh = null;
		}catch(PDOException $e){
		      echo "<p style=\"color:red\">Error: please contact your web administrator.</p>";
		      // for debugging: 
		      //echo "error from database: " . $e->getMessage() . "<br />\n";
		}
    }
}

echo "<br><br><p style='font-weight:bold; font-size:200%;'><a href='login.php'>Sign-In To TutorHub!</a></p>";
echo "</div>";

//Debugging info:
//echo "$_POST['times']['monday'][0]";
//print_r($_POST)
//print_r ($_POST['classes']);

include('inc/footer.php'); 


?>
