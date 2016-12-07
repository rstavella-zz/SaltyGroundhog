<?php
    error_reporting(-1); // display all faires
    ini_set('display_errors', 1);  // ensure that faires will be seen
    ini_set('display_startup_errors', 1); // display faires that didn't born

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
$identity=$_GET['id'];
$query1=pg_query("delete from hobbylist where hobbies_id='$identity'");
#$query2=pg_query("delete from hobbies where hobbies_id='$identity'");

    #$result3 = pg_query($dbconn4, $query3);

if($query1)# && $query2)
{
header('Location: delete.php');
}
}
?>
</body>
</html>
<?php endif; ?>
