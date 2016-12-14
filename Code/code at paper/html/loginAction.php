<?php 
	error_reporting(-1); // display all faires
	ini_set('display_errors', 1);  // ensure that faires will be seen
	ini_set('display_startup_errors', 1); // display faires that didn't born
	include('loginValidate.php');
	$conn_string = "host=10.10.7.159 port=5432 dbname=maindb user=postgres password=SaltyGroudhogs";
	$dbconn4 = pg_connect($conn_string);
	list($usercheck, $data) = validate($dbconn4, $_POST['email'], $_POST['password']);
	if($usercheck == 1) {
		session_start();
		$_SESSION['prof_id'] = $data['prof_id'];
		$_SESSION['first_name'] = $data['first_name'];
		load ('home.php');
	} 
	else if ($usercheck == 2) {
		session_start();
		$_SESSION['manager_id'] = $data['manager_id'];
		load ('adminPage.php');
	} else {
		session_start();
		$_SESSION['Error'] = $data;
		load('index.php');	
	}

pg_close($dbconn4);

?>