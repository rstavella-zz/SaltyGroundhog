<!-- 
Code written by the Salty Groundhogs Team
True Course Website
This page deletes a job from the clients profile
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
#Make sure id is passed through URL
if(isset($_GET['id']))
{
$job_id=$_GET['id'];
#Remove Job from database and client profiles
$query1=pg_query("delete from jobs where job_id='$job_id'");

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
