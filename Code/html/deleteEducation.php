<!--
This page was written by the Salty Groundhogs Team
True Course Website
This page is to delete an education from a clients profile.
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
#Make sure there is an id being passed through the URL
if(isset($_GET['id']))
{
$educ_id=$_GET['id'];
$identity = $queryIdentity['cust_id'];
#Remove education from the database and clients profile
$query1=pg_query("delete from education where education_id='$educ_id'");

if($query1)
{
#Return to the page previously on
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
}
?>
</body>
</html>
<?php endif; ?>
