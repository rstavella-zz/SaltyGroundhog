<!-- 
Code written by the salty groundhogs team
True Course Website
This page removes a family memeber from a clients profile
-->
<?php
#error_reporting(-1); // display all faires
#ini_set('display_errors', 1);  // ensure that faires will be seen
#ini_set('display_startup_errors', 1); // display faires that didn't born

include('loginValidate.php');
session_start();
if(!isset( $_SESSION['prof_id'])){
  load('index.php');
}
else if( isset( $_SESSION['prof_id'])) : ?>

<html>
<body>
<?php
#Connect to the database
$conn_string = "host=10.10.7.159 port=5432 dbname=maindb user=postgres password=SaltyGroudhogs";
$dbconn4 = pg_connect($conn_string);
#Make sure ID is set through the URL
if(isset($_GET['id']))
{
$family_id=$_GET['id'];
#remove family memeber from clients profile
$query1=pg_query("delete from customers where cust_id='$family_id'");

if($query1)
{
#Return to previous page
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
}
?>
</body>
</html>
<?php endif; ?>
