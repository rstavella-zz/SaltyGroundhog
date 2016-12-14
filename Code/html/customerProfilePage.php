<!--
Credit to the Layout with the shaded Border
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/

Code written by the Salty Groundhogs Team
Senior Project
True Course Website
This page is to have a bried overview of a client or do some edits on a clients profile
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
ini_set('display_startup_errors', 1); // display faires that didn't born
if(!isset( $_SESSION['prof_id'])){
  load('index.php');
}
else if( isset( $_SESSION['prof_id'])) : ?>

<html lang="en">
<head>
 <title>Customer Profile</title>
  <link href="style.css" rel="stylesheet" type="text/css" media="all"/>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!--web-fonts-->
  <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <li class="active"><a href="clientPage.php">Clients</a></li>
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
<div class="main">
   <div class="main-section agile">
      <div class="login-form">
	<?php
            $connect = pg_connect("host=10.10.7.159 dbname=maindb user=postgres password=SaltyGroundhogs");
	    $identity=$_GET['id'];
            if (!$connect) {
                die(pg_error());
            }
            $query0 = pg_query("SELECT cp.cust_id FROM customers as c, professionals as p, appointments as a, clientprofessional as cp WHERE p.prof_id = " . $_SESSION['prof_id'] . " AND cp.prof_id = " . $_SESSION['prof_id'] . " AND cp.cust_id= '$identity '");
            if(pg_num_rows($query0) == 0){ 
              load('home.php');  
            } 
            $query1 = pg_query("SELECT *  FROM customers WHERE cust_id = ' $identity '");	    
	          $query2 = pg_query("SELECT cust_id, first_name, last_name, relation FROM customers  WHERE custr_id= '$identity '");
            while($row = pg_fetch_array($query1)) {
	  	  if ($row['custpic_url'] == "notUploaded"){
                      $custpic_url = "/uploads/noProfilePhoto.png";
                  } else {
                      $custpic_url = $row['custpic_url'];
                  }  
            ?>
		<ul>
			<li><b><u><font size="5"><?php echo $row['first_name']?> <?php echo $row['last_name']?></font></u></b><br></li>
			<li><img src="<?php echo $custpic_url?>" style="width:100px;height:100px;"></img></center></li><br>
	    <?php
	    } #Close while loop
	    ?>
	    <ul>
            	<li><input type=button class="btn btn-primary" onClick="location.href='uploadImage.php?id=<?php echo $identity ?>'" value='Upload Client Profile Photo'></li><br>
            	<li><input type=button class="btn btn-primary" onClick="location.href='customerFullBio.php?id=<?php echo $identity ?>'" value='View Client Profile'></li><br>
	    	<li><input type=button class="btn btn-primary" onClick="location.href='newFamilyMember.php?id=<?php echo $identity ?>'" value='Add Family Member'></li><br>

	    <?php
	     while($row2 = pg_fetch_array($query2)) {
		   $first_name=$row2['first_name'];
		   $last_name=$row2['last_name'];
		   $familyId=$row2['cust_id'];
	    ?>
	           <li><font size="4"><?php echo "<a href=\" familyMemeberFullBio.php?id={$familyId}\"> $first_name $last_name </a>";?> : <?php echo $row2['relation']?></font><font size="2"><?php echo "<a href=\"deleteFamMem.php?id={$familyId}\">Remove</a>";?></font></li><br>
                      

	    <?php
	    } #Close while loop of query2
	    ?>
            	<li><input type=button class="btn btn-primary" onClick="location.href='familyTree.php?id=<?php echo $identity ?>'" value='View Family Tree'></li><br>
        <li><h3><u>Client Appointments</u></h3></li>
          <?php
            $results = pg_query("SELECT a.appt_id, c.first_name, c.last_name, a.date, a.time, a.reoccuring_int FROM customers as c, professionals as p, appointments as a WHERE p.prof_id = " . $_SESSION['prof_id'] . " AND c.cust_id = a.cust_id AND c.cust_id = " . $identity . " ORDER BY a.date ASC, a.time ASC");
              if(pg_num_rows($results) == 0){ 
                echo "No Appointments Scheduled For This Client";  
              } 
              while($row = pg_fetch_array($results)) {
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
                $formatteddate = $mdate2 . "/" . $ddate . "/" . $ydate;
          ?>
          <tr>
          <?php echo "<td> <a href='viewAppointment.php?id=" . $row['appt_id'] . "'>" . $formatteddate  . ' at ' . $row['time']; 
          if($row['reoccuring_int'] != 'Never'){
            echo " (Reoccurs " . $row['reoccuring_int'] . ")";
          }
          echo "</a> </td> <br>";
          ?>
          </script></center>
           <?php
              }
          ?>
	     	<li><h3><u>Client Life Events</u></h3></li>
                  <?php
            $results = pg_query("SELECT le.le_id, le.date, le.event_name FROM life_events as le, professionals as p WHERE p.prof_id = " . $_SESSION['prof_id'] . " AND le.cust_id = " . $identity . " ORDER BY le.date ASC");
              if(pg_num_rows($results) == 0){ 
                echo "This Client Has No Life Events";  
              } 
              while($row = pg_fetch_array($results)) {
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
                $formatteddate = $mdate2 . "/" . $ddate . "/" . $ydate;
          ?>
          <tr>
          <?php echo "<td> <a href='viewLifeEvent.php?id=" . $row['le_id'] . "'>" . $row['event_name'] . ' on ' . $formatteddate . " </a> </td> <br>"?>
          </script></center>
           <?php
              }
          ?>
	    </ul>
      </div>
   </div>
</div>
<br>
<footer class="container-fluid text-center">
    <p>True Course Life &copy; 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc. True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks. </p>
</footer>
</body>
</html>

<?php endif; ?>

