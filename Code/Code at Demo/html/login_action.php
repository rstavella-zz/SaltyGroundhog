
<?php 
echo 'here';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	require('dbConfig.php');
	require('loginvalidate.php');
echo 'here2';
	list($usercheck, $data) = validate ($dbc, $_POST['email'], $_POST['prof_password']);

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
	}
	 else {
		$errors = $data;
	}

	load ('index.php');	
}
pg_close($dbc);	

?>
