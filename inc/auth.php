<!--
   Group:    SCAD (Sami, Camille, Angelo, and Dan)
   Purpose:  Login/authentication helper PHP functions for TutorHub
   Created:  2018-03-30 by Angelo
   Modified: 2018-03-30 by Angelo
-->
<?php
	require_once("dbinfo.inc");

	function attemptLogin($try_email, $try_pwd) {
		global $host, $database, $user, $pwd;
		$myHandle;

		try {
			$myHandle = new PDO("mysql:host=$host;dbname=$database", $user, $pwd);
		} catch(PDOException $e) {
			return false;
		}

		if ($myHandle) {
			$myStmt = $myHandle->prepare("SELECT email, password, firstname, avatar FROM profiles WHERE email=:email");
			$myStmt->bindParam(':email', $try_email);
			$myStmt->execute();
			$rslt = $myStmt->fetchAll();

			if (count($rslt) > 0) {
				foreach ($rslt as $row) {
					$hashed_pwd = $row['password'];
					$firstname = $row['firstname'];
					$avatar = $row['avatar'];
				}
			}

			if (password_check($try_pwd, $hashed_pwd)) {
				return array($firstname, $avatar);
			} else {
				return false;
			}
		} else {
			return false;
		}

		return false;
	}

	function isNewEmail($new_email) {
		global $host, $database, $user, $pwd;
		$myHandle;

		try {
			$myHandle = new PDO("mysql:host=$host;dbname=$database", $user, $pwd);
		} catch(PDOException $e) {
			return false;
		}

		if ($myHandle) {
			$myStmt = $myHandle->prepare("SELECT count(*) as total FROM profiles WHERE email=:email");
			$myStmt->bindParam(':email', $new_email);
			$myStmt->execute();
			$count = $myStmt->fetchColumn();

			if ($count == 0) {
				return true;
			} else {
				return false;			
			}
		}

		return false;
	}

	function password_encrypt($password) {
		$hash_format = "$2y$10$";
		$salt_length = 22;
		$salt = generate_salt($salt_length);
		$format_and_salt = $hash_format.$salt;
		$hash = crypt($password, $format_and_salt);
		return $hash;
	}
	
	function generate_salt($length) {
		//generate pseudo random string (good enough)
		//returns 32 characters
		$unique_random_string = md5(uniqid(mt_rand(), true));
		
		//convert it to base 64 (valid chars are [a-zA-Z0-0./] )
		$base64_string = base64_encode($unique_random_string);
		
		//remove the '+' characters, just replace with '.'
		$modified_base64_string = str_replace('+', '.', $base64_string);
		
		//truncate off just what we need
		$salt = substr($modified_base64_string, 0, $length);
		
		return $salt;
	}

	function password_check($password, $existing_hash) {
		$hash = crypt($password, $existing_hash);
		if ($hash === $existing_hash) {
			return true;
		} else {
			return false;
		}
	}

?>