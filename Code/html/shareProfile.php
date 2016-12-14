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
if(!isset( $_SESSION['prof_id'])){
  load('index.php');
}
else if( isset( $_SESSION['prof_id'])) : ?>

<html lang="en">
<head>
 <title>Share Customer Profile</title>
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

<!-- Sends footer to bottom of screen when content is too small -->
<style>
html,
body {
    font-family: 'Ubuntu', sans-serif;
    background: -webkit-linear-gradient( #48d1cc, #afeeee, white); /* For Safari 5.1 to 6 */
    background: -o-linear-gradient(#48d1cc,#afeeee, white); /* For Opera 11.1 to 12.0/ */
    background: -moz-linear-gradient(#48d1cc,#afeeee, white); /* For Firefox 3.6 to 15  */
    background: linear-gradient(#48d1cc,#afeeee, white); /* Standard syntax (must be la st) */
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
<!-- A drop down will be filled with all professional names. A professional can chose which professional to share a clients profile with.
This will add that new professional ID linked to the cust_id in the clientsprofessional table
-->
	<div id="wrapper">		
		<div id="header">
			<center><h1>Share Client Profile</h1></center>
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
						$prof_id = $_SESSION['prof_id'];
						$sql = "SELECT prof_id, first_name, last_name FROM professionals where prof_id != $prof_id";
						$result = pg_query($sql);
						#Populate dropdown with all other professionals within the database from query above 
						echo "Choose Professional To share profile with: <select name='select_catalog' id='select_catalog'>";
						while ($row = pg_fetch_array($result)) {
							$name = $row["first_name"] . $row["last_name"];
							$prof_id = $row["prof_id"];
					?>
					<ul>
					<?php
						echo "<option value='" . $prof_id . "'>" . $name . "</option>";
						}
						echo "</select>";
					?>
					</ul>
					</center>
					<br>
					<div class="clear"></div>
					
					<center><input type="submit" name="submit" value="Submit" class="btn btn-primary"></center>
					<div class="clear"></div>
				    </form>
				</div>
		         </div>
		    </div>
		</div><!-- #content -->
		
 <?php
     if(isset($_POST['submit'])){
        $cust_id = $_GET['id'];
        $select_catalog = $_POST['select_catalog'];
	#Insert new client/professional relationship to the database
        $query = "INSERT INTO clientprofessional (prof_id, cust_id) VALUES ('" . $select_catalog . "','" . $cust_id ."')";
        $result = pg_query($dbconn4, $query);
        if (!$result) {
             $errormessage = pg_last_error();
             $message = "Error with entry. Please check fields.";
             echo "<script type='text/javascript'>alert('$message');</script>";
            exit();
        }else{
            $message = "Successfully Shared Client";
            echo "<script type='text/javascript'>";
            echo "alert('$message');";
            echo "window.location.href = 'clientPage.php';";
            echo "</script>";
        }
     }
        pg_close();
 ?>
 <br>
 <div id="footer">
	  <center><p>True Course Life © 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc.
		     True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks.</p></center>
 </div><!-- #footer -->		
</div><!-- #wrapper -->
	
</body>
</html>

<?php endif; ?>
