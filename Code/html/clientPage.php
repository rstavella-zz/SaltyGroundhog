<!--
Credit to the Layout with the shaded Border
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/

Code Written by the Salty Groundhogs Team
Senior Project
True Course Website
This page is to view all clients a professional has  within the True Course company
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
if(!isset( $_SESSION['prof_id'])){
   load('index.php');
}
else if( isset( $_SESSION['prof_id'])) : ?>

<html lang="en">
<head>
 <title>My Clients</title>
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

<!-- Here we print all the clients that a professional has under them -->
<!-- We will see their profile photo, name and activity status -->

<body>
<div class="header w3ls">
	<h1>Clients</h1>
</div>
<div class="main">
   <div class="main-section agile">
	<div class="login-form">
		<?php
			$conn_string = "host=10.10.7.159 port=5432 dbname=maindb user=postgres password=SaltyGroudhogs";
			$dbconn4 = pg_connect($conn_string);
	  	     	$prof_id =  $_SESSION['prof_id']; 
		        if (!$dbconn4) {
                	    die(pg_error());
            		}		
		        $results = pg_query("SELECT cp.cust_id, cp.prof_id, c.cust_id, c.custpic_url, c.first_name, c.last_name, c.active_status 
						 FROM clientprofessional as cp, customers as c 
						 WHERE cp.prof_id = '$prof_id' AND cp.cust_id = c.cust_id ORDER BY c.active_status ASC, c.first_name ASC");
      while($row = pg_fetch_array($results)) {
				$active_status = $row['active_status'];	
				$cust_id = $row['cust_id'];
				#Checks if the photo should be a profile photo or generic stock photo
				if ($row['custpic_url'] == "notUploaded"){
					$custpic_url = "/uploads/noProfilePhoto.png";
				} else {
					$custpic_url = $row['custpic_url'];
				}
	 			echo "<h2><a href=\"customerProfilePage.php?id={$row['cust_id']}\">{$row['first_name']} {$row['last_name']}</a></h2>";
	    	?>
		<ul>
        		<li><a href="<?php echo "customerProfilePage.php?id=" . $row['cust_id']?>"><img src="<?php echo $custpic_url?>" style="width:100px;height:100px;"></img></a></center></li>
		</ul>
	    	<?php	
			echo "$active_status"; #Print Active status for each Client
		?>
		<br><br>
		<?php
			echo "<a href=\"shareProfile.php?id={$row['cust_id']}\"><input class='btn btn-primary' type='button' value='Share Client'/></a>";
	   		} #While Loop Close	
		?>
	</div>
    </div>
</div>
<br>
<footer class="container-fluid text-center">
  <p>True Course Life © 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc. 
     True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks.</p>
</footer>

</body>
</html>

<?php endif; ?>
