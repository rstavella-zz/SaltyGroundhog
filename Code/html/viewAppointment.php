
<!--
Credit to the Layout with the shaded Border
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/

Code written by the Salty Groundhogs Team
Senior Project
True Course Website
This page allows a professional to share a client profile with another professional
-->

<?php
#Error Reporting that can be uncommented when a developer is testing queries or anything PHP related
#error_reporting(-1); // display all faires
#ini_set('display_errors', 1);  // ensure that faires will be seen
#ini_set('display_startup_errors', 1); // display faires that didn't born

#Verifies that a professional is logged in.
#This page is only viewable if you have the proper crednetials and are logged in.
include('loginValidate.php');
session_start();
error_reporting(-1); // display all faires
ini_set('display_errors', 1);  // ensure that faires will be seen
if(!isset($_SESSION['prof_id'])){
  load('index.php');
}
else if(isset($_SESSION['prof_id'])) : ?>
<?php
$appt_id = $_GET['id'];
?>
<html lang="en">
<head>
 <title>View Appointment</title>
  <link href="style.css" rel="stylesheet" type="text/css" media="all"/>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!--web-fonts-->
  <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--web-fonts-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>

<!-- This sends the footer to the bottom of the screen when the content is too small -->
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
        height:100px;
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
</nav>

<body>
<div id="wrapper">
    <div id="header">
         <center><h1>View Appointment</h1></center>
    </div>
    <div id="content">
        <div class="main">
             <div class="main-section agile">
                   <div class="login-form">
                                   <form name="insert" action="#" method="POST">
                                        <center>
                                        <?php
                                                $conn_string = "host=10.10.7.159 port=5432 dbname=maindb user=postgres password=SaltyGroudhogs";
                                                $dbconn4 = pg_connect($conn_string);
            $query0 = pg_query("SELECT cp.cust_id FROM customers as c, professionals as p, appointments as a, clientprofessional as cp WHERE p.prof_id = " . $_SESSION['prof_id'] . " AND cp.prof_id = " . $_SESSION['prof_id'] . " AND cp.cust_id = a.cust_id AND a.appt_id = '" . $appt_id . "'");
            if(pg_num_rows($query0) == 0){
              load('home.php');
            }
            $sql = "SELECT c.first_name, c.last_name FROM customers as c, appointments as a, clientprofessional as cp WHERE cp.prof_id = '" . $_SESSION['prof_id'] . "' AND cp.cust_id = c.cust_id AND a.cust_id = c.cust_id AND a.appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
            echo "Appointment For: " . $row["first_name"] . $row["last_name"] . "";
            ?>
          <br>
          <br>
          <div class="clear"></div>
          <ul>
          <?php
            $sql = "SELECT cat.categories FROM customers as c, appointments as a, clientprofessional as cp, categories as cat WHERE cp.prof_id = '" . $_SESSION['prof_id'] . "' AND cat.categories_id = a.categories_id AND cp.cust_id = c.cust_id AND a.cust_id = c.cust_id AND a.appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
            echo "Type: '" . $row["categories"] . "'";
          ?>
          <div class="clear"></div>
          <ul>
          <br>
          <?php
            $sql = "SELECT location FROM appointments WHERE appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
            echo "Location: '" . $row["location"] . "'";
            ?>
          <br>
          </ul>
          <div class="clear"></div>
          <ul>
          <?php
            $sql = "SELECT time FROM appointments WHERE appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
            echo "Time: '" . $row["time"] . "'";
            ?>
          <br>
          <br>
          <div class="clear"></div>
          <ul>
          <?php
            $sql = "SELECT date FROM appointments WHERE appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
            $ymddate = $row["date"];
            $ydate = substr($ymddate, 0, 4);
            $mdate = substr($ymddate, 5, 2);
            if($mdate === '01'){
              $mdate2 = 'Jan';
            }
            if($mdate === '02'){
              $mdate2 = 'Feb';
            }
            if($mdate === '03'){
              $mdate2 = 'Mar';
            }
            if($mdate === '04'){
              $mdate2 = 'Apr';
            }
            if($mdate === '05'){
              $mdate2 = 'May';
            }
            if($mdate === '06'){
              $mdate2 = 'Jun';
            }
            if($mdate === '07'){
              $mdate2 = 'Jul';
            }
            if($mdate === '08'){
              $mdate2 = 'Aug';
            }
            if($mdate === '09'){
              $mdate2 = 'Sep';
            }
            if($mdate === '10'){
              $mdate2 = 'Oct';
            }
            if($mdate === '11'){
              $mdate2 = 'Nov';
            }
            if($mdate === '12'){
              $mdate2 = 'Dec';
            }
            $ddate = substr($ymddate, 8, 2);
            echo "Date: '" . $mdate2 . "/" . $ddate . "/" . $ydate . "'";
            ?>
          <br>
          <br>
          <div class="clear"></div>
          <?php
            $sql = "SELECT num_attendies FROM appointments WHERE appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
            echo "Number Of Attendies: '" . $row["num_attendies"] . "'";
            ?>
          <br>
          <br>
          <div class="clear"></div>
          <ul>
          <?php
            $sql = "SELECT description FROM appointments WHERE appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
            echo "Description: '" . $row["description"] . "'";
            ?>
          <br>
          <div class="clear"></div>
          </ul>
          <ul>
          <?php
            $sql = "SELECT notes FROM appointments WHERE appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
            echo "Notes: '" . $row["notes"] . "'";
            ?>
          <br>
          <br>
          <div class="clear"></div>
          <ul>
          <?php
            $sql = "SELECT reoccuring_int FROM appointments WHERE appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
            echo "Reoccuring Interval: '" . $row["reoccuring_int"] . "'";
            ?>
          <br>
          <br>
          <div class="clear"></div>
          <?php
          echo "<a href='editAppointment.php?id=" . $appt_id . "'><input name='edit' value='Edit Appointment' class='btn btn-primary'></a>";
          ?>
        </form>
	</div>
 </div>
</div>
</div>


<?php
        pg_close();
 ?>
  <br>
  <div id="footer">
      <p>True Course Life &copy; 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc.
         True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks. </p>
  </div><!-- Footer -->
</div><!-- Wrapper -->

</body>
</html>

<?php endif; ?>

