<?php
	$conn_string = "host=10.10.7.159 port=5432 dbname=maindb user=postgres password=SaltyGroudhogs";
	$dbconn4 = new pg_connect($conn_string);

	if ($dbconn4->connect_error) {
	    die("Connection failed: " . $dbconn4->connect_error);
	}
?>

