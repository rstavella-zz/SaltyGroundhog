
<?php
include('loginValidate.php');
session_start();
error_reporting(-1); // display all faires
ini_set('display_errors', 1);  // ensure that faires will be seen
ini_set('display_startup_errors', 1); // display faires that didn't born
$dateid = $_GET['id'];
$stringdate = (string)$dateid;
$stringdate = '\'' . $stringdate . '\'';
$ymddate = $dateid;
$ydate = substr($ymddate, 0, 4);
if((strlen($ymddate) == 10)){
  $mdate = substr($ymddate, 5, 2);
  $ddate = substr($ymddate, 8, 2);
} else {
  $pos1 = strpos($ymddate, '-');
  $newymd = substr_replace($ymddate, '', $pos1, 1);
  $pos2 = strpos($newymd, '-');
  $newymd2 = substr_replace($newymd, '', $pos2, 1);
  $mdate = substr($newymd2, ($pos1), ($pos2 - $pos1));
  $ddate = substr($newymd2, $pos2, (strlen($newymd2) - $pos2));
}

if($ddate > 7){
  $minusseven = ($ddate - 7);
  $lmdate = $mdate;
  $lydate = $ydate;
} else {
  $lmdate = ($mdate - 1);
  if($lmdate == 0){
    $lmdate = 12;
    $lydate = ($ydate - 1);
  } else {
    $lydate = $ydate;
  }
  $daysinlastmonth = cal_days_in_month(CAL_GREGORIAN, $lmdate, $lydate);
  $minusseven = (($ddate - 7) + $daysinlastmonth);
}

$minussevendate = $lydate . "/" . $lmdate . "/" . $minusseven;
$minussevenstringdate = (string)$minussevendate;
$minussevenstringdate = '\'' . $minussevendate . '\'';

if($mdate == '01'){
  $mdate2 = 'Jan';
}
if($mdate == '02'){
  $mdate2 = 'Feb';
}
if($mdate == '03'){
  $mdate2 = 'Mar';
}
if($mdate == '04'){
  $mdate2 = 'Apr';
}
if($mdate == '05'){
  $mdate2 = 'May';
}
if($mdate == '06'){
  $mdate2 = 'Jun';
}
if($mdate == '07'){
  $mdate2 = 'Jul';
}
if($mdate == '08'){
  $mdate2 = 'Aug';
}
if($mdate == '09'){
  $mdate2 = 'Sep';
}
if($mdate == '10'){
  $mdate2 = 'Oct';
}
if($mdate == '11'){
  $mdate2 = 'Nov';
}
if($mdate == '12'){
  $mdate2 = 'Dec';
}

if(!isset( $_SESSION['prof_id'])){
  load('index.php');
}
else if( isset( $_SESSION['prof_id'])) : ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TC Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style.css" rel="stylesheet" type="text/css" media="all"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="stylecal.css" rel="stylesheet" type="text/css" media="all"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!--web-fonts-->
  <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
   <!--web-fonts-->
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>

<style>
html,
body {
        margin:0;
        padding:0;
        height:100%;
}
#wrapper {
        min-height:100%;
        position:relative;
}
#content {
        padding-bottom:100px; /* Height of the footer element */
}
#footer {
        background:#555;
        color: white;
        font-size: 10px;
        padding: 15px;
        width:100%;
        height:110px;
        position:absolute;
        bottom:0;
        left:0;
}
</style>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="home.php"><img src="true.jpg" class="img-rounded"  width="70" height="30"></a></li>
        <li><a href="clientPage.php">Clients</a></li>
        <li><a href="professionalPage.php">Professionals</a></li>
        <li><a href="newClientPage.php">Add Client</a></li>
        <li><a href="addAppointment.php">Add Appointment</a></li>
        <li><a href="addLifeEvent.php">Add Life Event</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="myProfile.php"><span class="glyphicon glyphicon-user"></span></a></li>
        <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span></a></li>
        <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
 </div>
</nav>

<body>
<div class="container-fluid">

  <div id="container" class="ltr">
  <header id="header" class="info">
  <center><h1>Results for <?php echo "Date: '" . $mdate2 . "/" . $ddate . "/" . $ydate . "'" ?></h1></center>
  <div></div>
  <center><h2><u>Appointments</u>
  <div class="login-form">
  <?php
    $connect = pg_connect("host=10.10.7.159 dbname=maindb user=postgres password=SaltyGroundhogs");
    if (!$connect) {
        die(pg_error());
    }
    $results = pg_query("SELECT a.appt_id, c.first_name, c.last_name, a.date, a.time, a.reoccuring_int FROM customers as c, professionals as p, appointments as a, clientprofessional as cp WHERE p.prof_id = " . $_SESSION['prof_id'] . " AND cp.prof_id = " . $_SESSION['prof_id'] . " AND c.cust_id = a.cust_id AND cp.cust_id = a.cust_id AND a.date = " . $stringdate . " ORDER BY a.time ASC");
      while($row = pg_fetch_array($results)) {
  ?>
  <tr>
  <?php echo "<td> <a href='viewAppointment.php?id=" . $row['appt_id'] . "'>" . $row['first_name'] . $row['last_name']  . '- ' . $row['time'];
  if($row['reoccuring_int'] != 'Never'){
    echo " (Reoccurs " . $row['reoccuring_int'] . ")";
  }
  echo " </a> </td> <br>";
    ?>
   <?php
      }
  ?>
  </script>
  <?php
  $results1 = pg_query("SELECT a.appt_id, c.first_name, c.last_name, a.date, a.time, a.reoccuring_int FROM customers as c, professionals as p, appointments as a, clientprofessional as cp WHERE p.prof_id = " . $_SESSION['prof_id'] . " AND cp.prof_id = " . $_SESSION['prof_id'] . " AND c.cust_id = a.cust_id AND cp.cust_id = a.cust_id AND a.date = " . $minussevenstringdate . " ORDER BY a.time ASC");
        while($row = pg_fetch_array($results1)) {
  ?>
  <tr>
  <?php echo "<td> <a href='viewAppointment.php?id=" . $row['appt_id'] . "'>" . $row['first_name'] . $row['last_name']  . '- ' . $row['time'];
  if($row['reoccuring_int'] != 'Never'){
    echo " (Reoccurs " . $row['reoccuring_int'] . ")";
  }
  echo " </a> </td> <br>";
  ?>
   <?php
      }
    if((pg_num_rows($results) == 0) && (pg_num_rows($results1) == 0)){
      echo "No Appointments Scheduled On This Date";
    }
  ?>
  </script>
</div>
<br>
   <center><u>Life Events</u>
  <br>
    <div class="login-form">
            <?php
      $results = pg_query("SELECT le.le_id, le.date, le.event_name FROM life_events as le, professionals as p, clientprofessional as cp WHERE cp.prof_id = " . $_SESSION['prof_id'] . " AND cp.cust_id = le.cust_id AND p.prof_id = " . $_SESSION['prof_id'] . " AND le.date = " . $stringdate . " ORDER BY le.date ASC");
        if(pg_num_rows($results) == 0){
            echo "No Life Events Scheduled On This Date";
        }
        while($row = pg_fetch_array($results)) {
          $ymddate = $row["date"];
          $ydate = substr($ymddate, 0, 4);
          $mdate = substr($ymddate, 5, 2);
          if($mdate = '01'){
            $mdate2 = 'Jan';
          }
          if($mdate = '02'){
            $mdate2 = 'Feb';
          }
          if($mdate = '03'){
            $mdate2 = 'Mar';
          }
          if($mdate = '04'){
            $mdate2 = 'Apr';
          }
          if($mdate = '05'){
            $mdate2 = 'May';
          }
          if($mdate = '06'){
            $mdate2 = 'Jun';
          }
          if($mdate = '07'){
            $mdate2 = 'Jul';
          }
          if($mdate = '08'){
            $mdate2 = 'Aug';
          }
          if($mdate = '09'){
            $mdate2 = 'Sep';
          }
          if($mdate = '10'){
            $mdate2 = 'Oct';
          }
          if($mdate = '11'){
            $mdate2 = 'Nov';
          }
          if($mdate = '12'){
            $mdate2 = 'Dec';
          }
          $ddate = substr($ymddate, 8, 2);
          $formatteddate = $mdate2 . "/" . $ddate . "/" . $ydate;
          ?>
          <tr>
          <?php echo "<td> <a href='viewLifeEvent.php?id=" . $row['le_id'] . "'>" . $row['event_name'] . ' on ' . $stringdate . " </a> </td> <br>"?>
           <?php
              }
          ?>
  </script></center>
  </div>
  <p>

  <br>
  <br>
  </p>

</body>

<div id="footer">
  <p>True Course Life © 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc.
True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks.</p>
</div>

</html>

<?php endif; ?>

