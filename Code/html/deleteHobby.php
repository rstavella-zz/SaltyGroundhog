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
$conn_string = "host=10.10.7.159 port=5432 dbname=maindb user=postgres password=SaltyGroudhogs";
$dbconn4 = pg_connect($conn_string);
if(isset($_GET['id']))
{
$hobbies_id=$_GET['id'];
$identity = $queryIdentity['cust_id'];
$query1=pg_query("delete from hobbies where hobbies_id='$hobbies_id'");
$query2=pg_query("delete from hobbylist where hobbies_id='$hobbies_id'");

if($query1 && $query2)
{
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
}
?>
</body>
</html>
<?php endif; ?>
