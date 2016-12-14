<?php
include('loginValidate.php'); 
session_start();
error_reporting(-1); // display all faires
ini_set('display_errors', 1);  // ensure that faires will be seen
ini_set('display_startup_errors', 1); // display faires that didn't born
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
<div class="container-fluid">

  <div id="container" class="ltr">
  <header id="header" class="info">
  <center><h1>Home</h1></center>
  <div></div>
  <center><h2><u>Today's Appointments</u>
  <div class="login-form">
  <?php
    $connect = pg_connect("host=10.10.7.159 dbname=maindb user=postgres password=SaltyGroundhogs");
    if (!$connect) {
        die(pg_error());
    }
    $date2 = date("Y-m-d");
    $stringdate2 = (string)$date2;
    $stringdate2 = '\'' . $stringdate2 . '\'';
    $results = pg_query("SELECT a.appt_id, c.first_name, c.last_name, a.date, a.time FROM customers as c, professionals as p, appointments as a, clientprofessional as cp WHERE p.prof_id = " . $_SESSION['prof_id'] . " AND cp.prof_id = " . $_SESSION['prof_id'] . " AND cp.cust_id = a.cust_id AND c.cust_id = a.cust_id AND a.date = " . $stringdate2 . " ORDER BY a.time ASC");
    if(pg_num_rows($results) == 0){ 
      echo "No Appointments Scheduled Today";  
    } 
      while($row = pg_fetch_array($results)) {
  ?>
  <tr>
  <?php echo "<td> <a href='viewAppointment.php?id=" . $row['appt_id'] . "'>" . $row['first_name'] . $row['last_name']  . '- ' . $row['time'] ." </a> </td> <br>"?>
   <?php
      }
  ?>
    </script></center>
</div>
<br>
   <center><h2><u>Today's Life Events</u>
  <br>
    <div class="login-form">
            <?php
      $results = pg_query("SELECT le.le_id, le.date, le.event_name FROM life_events as le, professionals as p, clientprofessional as cp WHERE cp.prof_id = " . $_SESSION['prof_id'] . " AND cp.cust_id = le.cust_id AND p.prof_id = " . $_SESSION['prof_id'] . " AND le.date = " . $stringdate2 . " ORDER BY le.date ASC");
        if(pg_num_rows($results) == 0){ 
            echo "No Life Events Scheduled Today";  
        }
        while($row = pg_fetch_array($results)) {
          $ymddate2 = $row["date"];
          $ydate2 = substr($ymddate2, 0, 4);
          $mdate3 = substr($ymddate2, 5, 2);
          if($mdate3 = '01'){
            $mdate4 = 'Jan';
          }
          if($mdate3 = '02'){
            $mdate4 = 'Feb';
          }
          if($mdate3 = '03'){
            $mdate4 = 'Mar';
          }
          if($mdate3 = '04'){
            $mdate4 = 'Apr';
          }
          if($mdate3 = '05'){
            $mdate4 = 'May';
          }
          if($mdate3 = '06'){
            $mdate4 = 'Jun';
          }
          if($mdate3 = '07'){
            $mdate4 = 'Jul';
          }
          if($mdate3 = '08'){
            $mdate4 = 'Aug';
          }
          if($mdate3 = '09'){
            $mdate4 = 'Sep';
          }
          if($mdate3 = '10'){
            $mdate4 = 'Oct';
          }
          if($mdate3 = '11'){
            $mdate4 = 'Nov';
          }
          if($mdate3 = '12'){
            $mdate4 = 'Dec';
          }
          $ddate2 = substr($ymddate2, 8, 2);
          $formatteddate2 = $mdate4 . "/" . $ddate2 . "/" . $ydate2;
          ?>
          <tr>
          <?php echo "<td> <a href='viewLifeEvent.php?id=" . $row['le_id'] . "'>" . $row['event_name'] . ' on ' . $formatteddate2 . " </a> </td> <br>"?>
           <?php
              }
          ?>
  </script></center>
  </div>
  </div> 
  <!-- calendar logic -->
  <?php 
    $noncurrentmonthflag = 0;
    $ymddate = date("Y-m-d");
    if(isset($_GET['id'])){
      $ymddate = $_GET['id'];
      $noncurrentmonthflag = 1;
    }
    $ymdstrlen = strlen($ymddate);
    $ydate = substr($ymddate, 0, 4);
    if($ymdstrlen == 10){
    $mdate = substr($ymddate, 5, 2);
    $ddate = substr($ymddate, 8, 2);
    } else {
    $mdate = substr($ymddate, 5, 1); 
    $ddate = substr($ymddate, 7, 2);
    }
    $lmdate = ($mdate - 1);
    $nmdate = ($mdate + 1);
    if ($lmdate == 0){
      $lmdate = 12;
    }
    if ($nmdate == 13){
      $nmdate = 1;
    }

    $currentcheck = strlen(date("Y-m-d"));
    if($currentcheck == 10){
      $testyear = substr(date("Y-m-d"), 0, 4);
      $testmonth = substr(date("Y-m-d"), 5, 2);
      $testdate = substr(date("Y-m-d"), 8, 2);
    }
    if($currentcheck == 9){
      $testyear = substr(date("Y-m-d"), 0, 4);
      $testmonth = substr(date("Y-m-d"), 5, 1);
      $testdate = substr(date("Y-m-d"), 7, 2);
    }
    if(($testmonth == $mdate) && ($testyear == $ydate)){
      $noncurrentmonthflag = 0;
      $ddate = $testdate;
    }

    $wdate = date('w', strtotime($ymddate));
    $ymddate = strtotime($ymddate);
    $daysincurrmonth = cal_days_in_month(CAL_GREGORIAN, $mdate, $ydate);
    $daysinlastmonth = cal_days_in_month(CAL_GREGORIAN, $lmdate, $ydate);
    $firstdayofmonth = $ydate . '/' . $mdate . '/01';
    $startofmonthweekday = date('w', strtotime($firstdayofmonth)); // 0(Sun) - 6(Sat)
    $lastmonthfillday = (($daysinlastmonth - $startofmonthweekday) + 1);
    $firstweekcounter = 0;
    $firstdaystartflag = 0;
    $counterday = 1;
    $calendarMax = 43;
    $calendarCount = 1;
    $nextMonthCounter = 1;
    $lmydate = $ydate;
    $nmydate = $ydate;
    if($lmdate == 12){ 
      $lmydate = ($ydate - 1); 
      }
    if($nmdate == 1){ 
      $nmydate = ($ydate + 1); 
      }

    if($mdate == 1){
      $mdateName = 'January';
    }
    if($mdate == 2){
      $mdateName = 'February';
    }
    if($mdate == 3){
      $mdateName = 'March';
    }
    if($mdate == 4){
      $mdateName = 'April';
    }
    if($mdate == 5){
      $mdateName = 'May';
    }
    if($mdate == 6){
      $mdateName = 'June';
    }
    if($mdate == 7){
      $mdateName = 'July';
    }
    if($mdate == 8){
      $mdateName = 'August';
    }
    if($mdate == 9){
      $mdateName = 'September';
    }
    if($mdate == 10){
      $mdateName = 'October';
    }
    if($mdate == 11){
      $mdateName = 'November';
    }
    if($mdate == 12){
      $mdateName = 'December';
    }
  ?>
  <br>
  <a name="bottomOfPage"></a>  
    <div class="calcontainer">

      <div class="calendar">

        <header>        

          <h2><?php echo $mdateName?></h2>

          <a class="btn-prev fontawesome-angle-left" href="home.php?id=<?php echo $lmydate . "-" . $lmdate . "-" . '01' ?>#bottomOfPage"></a>
          <a class="btn-next fontawesome-angle-right" href="home.php?id=<?php echo $nmydate . "-" . $nmdate . "-" . '01' ?>#bottomOfPage"></a>

        </header>
        
        <table>
        
          <thead>
            
            <tr>
              
              <td>Su</td>
              <td>Mo</td>
              <td>Tu</td>
              <td>We</td>
              <td>Th</td>
              <td>Fr</td>
              <td>Sa</td>

            </tr>

          </thead>

          <tbody>
           <?php 
          while($calendarCount < $calendarMax){
            if(($calendarCount % 7) == 1){
              echo "<tr>";
            }
            if ($counterday > $daysincurrmonth) {
              $curdatestring = (string)($nmydate . "-" . $nmdate . "-" . $nextMonthCounter);
              $curdatestring = '\'' . $curdatestring . '\'';
              $results = pg_query("SELECT a.appt_id, c.first_name, c.last_name, a.date, a.time, a.reoccuring_int FROM customers as c, professionals as p, appointments as a, clientprofessional as cp WHERE cp.prof_id = " . $_SESSION['prof_id'] . " AND cp.cust_id = a.cust_id AND p.prof_id = " . $_SESSION['prof_id'] . " AND c.cust_id = a.cust_id AND a.date = " . $curdatestring . " ORDER BY a.time ASC");
              $results1 = pg_query("SELECT le.le_id, le.date, le.event_name FROM life_events as le, professionals as p, clientprofessional as cp WHERE cp.prof_id = " . $_SESSION['prof_id'] . " AND cp.cust_id = le.cust_id AND p.prof_id = " . $_SESSION['prof_id'] . " AND le.date = " . $curdatestring . " ORDER BY le.date ASC");
              echo "<td class='next-month ";
              if((pg_num_rows($results) > 0) || (pg_num_rows($results1) > 0)){ 
                echo "event";
                }
              echo "'><a href='viewDate.php?id=" . $nmydate . "-" . $nmdate . "-" . $nextMonthCounter . "'> " . $nextMonthCounter . "</a></td>";
              $nextMonthCounter++;
            } else {
              if(($firstweekcounter != $startofmonthweekday) && ($firstdaystartflag == 0)){
                $curdatestring = (string)($lmydate . "-" . $lmdate . "-" . $lastmonthfillday);
                $curdatestring = '\'' . $curdatestring . '\'';
                $results = pg_query("SELECT a.appt_id, c.first_name, c.last_name, a.date, a.time, a.reoccuring_int FROM customers as c, professionals as p, appointments as a, clientprofessional as cp WHERE cp.prof_id = " . $_SESSION['prof_id'] . " AND cp.cust_id = a.cust_id AND p.prof_id = " . $_SESSION['prof_id'] . " AND c.cust_id = a.cust_id AND a.date = " . $curdatestring . " ORDER BY a.time ASC");
                $results1 = pg_query("SELECT le.le_id, le.date, le.event_name FROM life_events as le, professionals as p, clientprofessional as cp WHERE cp.prof_id = " . $_SESSION['prof_id'] . " AND cp.cust_id = le.cust_id AND p.prof_id = " . $_SESSION['prof_id'] . " AND le.date = " . $curdatestring . " ORDER BY le.date ASC");
                echo "<td class='prev-month ";
                if((pg_num_rows($results) > 0) || (pg_num_rows($results1) > 0)){ 
                    echo "event";
                  }
                echo "'><a href='viewDate.php?id=" . $lmydate . "-" . $lmdate . "-" . $lastmonthfillday . "'> " . $lastmonthfillday . "</a></td>";
                $firstweekcounter++;
                $lastmonthfillday++;
              } else if(($firstweekcounter == $startofmonthweekday) || ($firstdaystartflag == 1)){
                if(($counterday == $ddate) && ($noncurrentmonthflag == 0)){
                  $curdatestring = (string)($ydate . "-" . $mdate . "-" . $counterday);
                  $curdatestring = '\'' . $curdatestring . '\'';
                  $results = pg_query("SELECT a.appt_id, c.first_name, c.last_name, a.date, a.time, a.reoccuring_int FROM customers as c, professionals as p, appointments as a, clientprofessional as cp WHERE cp.prof_id = " . $_SESSION['prof_id'] . " AND cp.cust_id = a.cust_id AND p.prof_id = " . $_SESSION['prof_id'] . " AND c.cust_id = a.cust_id AND a.date = " . $curdatestring . " ORDER BY a.time ASC");
                  $results1 = pg_query("SELECT le.le_id, le.date, le.event_name FROM life_events as le, professionals as p, clientprofessional as cp WHERE cp.prof_id = " . $_SESSION['prof_id'] . " AND cp.cust_id = le.cust_id  AND p.prof_id = " . $_SESSION['prof_id'] . " AND le.date = " . $curdatestring . " ORDER BY le.date ASC");
                  echo "<td class='current-day ";
                  if((pg_num_rows($results) > 0) || (pg_num_rows($results1) > 0)){ 
                    echo "event";
                  }
                  echo "'><a href='viewDate.php?id=" . $ydate . "-" . $mdate . "-" . $counterday . "'>" . $counterday . "</a></td>";
                  $counterday++;
                  $firstdaystartflag = 1;
                } else {
                  $curdatestring = (string)($ydate . "-" . $mdate . "-" . $counterday);
                  $curdatestring = '\'' . $curdatestring . '\'';
                  $results = pg_query("SELECT a.appt_id, c.first_name, c.last_name, a.date, a.time, a.reoccuring_int FROM customers as c, professionals as p, appointments as a, clientprofessional as cp WHERE cp.prof_id = " . $_SESSION['prof_id'] . " AND cp.cust_id = a.cust_id AND p.prof_id = " . $_SESSION['prof_id'] . " AND c.cust_id = a.cust_id AND a.date = " . $curdatestring . " ORDER BY a.time ASC");
                  $results1 = pg_query("SELECT le.le_id, le.date, le.event_name FROM life_events as le, professionals as p, clientprofessional as cp WHERE cp.prof_id = " . $_SESSION['prof_id'] . " AND cp.cust_id = le.cust_id AND p.prof_id = " . $_SESSION['prof_id'] . " AND le.date = " . $curdatestring . " ORDER BY le.date ASC");
                  echo "<td class='current-month ";
                  if((pg_num_rows($results) > 0) || (pg_num_rows($results1) > 0)){ 
                    echo "event";
                  }
                  echo "'><a href='viewDate.php?id=" . $ydate . "-" . $mdate . "-" . $counterday . "'>" . $counterday . "</a></td>";
                  $counterday++;
                  $firstdaystartflag = 1;
                }
              }
            }
            if(($calendarCount % 7) == 0){
              echo "</tr>";
            }
            $calendarCount++;
          }
          ?> 
          </tbody>

        </table>

      </div> <!-- end calendar -->

    </div> <!-- end container -->

  </header>
  <p>

  <br>
  <br>
  <br>
  <br>
  </p>

</body>      

<footer class="container-fluid text-center">
  <p>True Course Life © 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc. 
True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks.</p>
</footer>

</html>

<?php endif; ?>
