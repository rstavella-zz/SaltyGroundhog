<!--
Code written by the Salty Groundhogs team
True Course Website
This page validates the login to the True Course Website
-->
<?php

function load($page = 'index.php') {
	$url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname($_SERVER['PHP_SELF']);
	$url = rtrim($url, '/\\');
	$url .= '/' . $page;
	header("Location: $url");
	exit();
}

function validate($db, $email = '', $password = '') {
	if(empty($email)){ 
		$error = 'You must enter an email.' ; 
		return array(0, $error);
	} else { 
		$e = pg_escape_string($db, trim($email));
	}
	if(empty($password)){ 
		$error = 'You must enter a password' ; 
		return array(0, $error);
	} else { 
		$tempp = pg_escape_string($db, trim($password));
		$p = $tempp;
	}
	if(empty($error)) {
		$becryptQuery = "SELECT prof_password
			  FROM professionals as p
			  WHERE email = '$e'";

			$becryptr = pg_query($db, $becryptQuery);
			$becryptrow = pg_fetch_array ($becryptr);
			$becrypt = $becryptrow['prof_password'];

		$becryptQuery2 = "SELECT password
			  FROM license_managers
			  WHERE email = '$e'";

			$becryptr2 = pg_query($db, $becryptQuery2);
			$becryptrow2 = pg_fetch_array ($becryptr2);
			$becrypt2 = $becryptrow2['password'];

		if (password_verify($p, $becrypt)){	
			$q = "SELECT prof_id, first_name
				  FROM professionals
				  WHERE email = '$e'";
		  
			$r = pg_query($db, $q);
			
			if(pg_num_rows($r) == 1) {
				$row = pg_fetch_array ($r);
				return array(1, $row);
			}
		} else if (password_verify($p, $becrypt2)){
			$q2 = "SELECT manager_id
			  	  FROM license_managers
			  	  WHERE email = '$e'";
			  
			$r2 = pg_query($db, $q2);

			if(pg_num_rows($r2) == 1) {
				$row = pg_fetch_array ($r2);
				return array(2, $row);
			}
		} else {
			$error = 'Invalid Email or Password.' ; 
			return array(0, $error);
		}
	}
}

function logout(){
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
    load('index.php');
}
?>
