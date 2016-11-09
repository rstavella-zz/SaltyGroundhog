
<?php

function load( $page ='index.php') {
	$url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname($_SERVER['PHP_SELF']);
	$url = rtrim($url, '/\\');
	$url .= '/' . $page;
	header( "Location: $url");
	exit();
}


function validate($db, $email = '', $prof_password = '') {
	$errors = array();

	if(empty($email)){ 
		$errors[] = 'Enter your email.' ; 
	} else { 
		$e = pg_real_escape_string($db, trim($email));
	}

	if(empty($prof_password)){ 
		$errors[] = 'Enter your password.' ; 
	} else { 
		$tempp = pg_real_escape_string($db, trim($prof_password));
		$p = sha1($tempp);
	}


	if(empty($errors)) {
		$q = "SELECT p.prof_id, p.first_name
			  FROM professionals as p
			  WHERE email = '$e'
			  AND prof_password = '$p'";
			  
		$r = pg_query($db, $q);

		if(pg_num_rows($r) == 1) {
			$row = pg_fetch_array ($r);
			return array(1, $row);
		}
		else if {
			$q = "SELECT license_key
			  	  FROM license_managers
			  	  WHERE email = '$e'
			 	  AND password = '$p'";
			  
			$r = pg_query($db, $q);

			if(pg_num_rows($r) == 1) {
				$row = pg_fetch_array ($r);
				return array(2, $row);
			}
		}
	} else {
		$errors[] = 'Invalid Email or Password'; 
		return array(false, $errors);
	}
}

?>
