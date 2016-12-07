<!--
Credit to the Layout with the shaded Border
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/

Code written by the Salty Groundhogs Team
Senior Project
True Course Website
This page allows a professional to view their settings
-->

<?php
#Error Reporting that can be uncommented when a developer is testing queries or anything PHP related
#error_reporting(-1); // display all faires
#ini_set('display_errors', 1);  // ensure that faires will be seen
#ini_set('display_startup_errors', 1); // display faires that didn't born

#Verifies that a professional is logged in.
#This page is only viewable if you have the proper crednetials and are logged in. include('loginValidate.php');
session_start();
if(!isset( $_SESSION['prof_id'])){
  load('index.php');
}
else if( isset( $_SESSION['prof_id'])) :
$prof_id = $_SESSION['prof_id'];
 ?>

<!DOCTYPE HTML>
<html>
<head>
 <title>Settings</title>
  <link href="style.css" rel="stylesheet" type="text/css" media="all"/>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<!-- Sends footer to bottom of screen when content is too small -->
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
        height:120px;
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
        <li><a href="home.php"><img src="true.jpg" class="img-rounded" alt="Home" width="70" height="30"> </a></li>
        <li><a href="clientPage.php">Clients</a></li>
        <li><a href="professionalPage.php">Professionals</a></li>
        <li><a href="\Calendar\sample.php">Calendar</a></li>
        <li><a href="newClientPage.php">Add Client</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="myProfile.php"><span class="glyphicon glyphicon-user"></span></a></li>
        <li class="active"><a href="settings.php"><span class="glyphicon glyphicon-cog"></span></a></li>
        <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<body>
	<div id="wrapper">
                <div class="header">
                        <center><h1>Settings</h1></center>
                </div>
		<div id="content">
                        <div class="main">
                            <div class="main-section agile">
				<div class="login-form">
				<?php
					$connect = pg_connect("host=10.10.7.159 dbname=maindb user=postgres password=SaltyGroundhogs");
					if (!$connect) {
						die(pg_error());
					}
					$identity = $_SESSION['prof_id'];
					$results = pg_query("SELECT p.email, lm.organization FROM professionals as p, licenses as l, license_managers as lm WHERE prof_id = ' $identity ' AND p.license_key = l.license_key AND l.manager_id = lm.manager_id");
					while($row = pg_fetch_array($results)) {
				?>
				<center>
				<ul>
					<b>Email: </b><?php echo $row['email']?>
					<input type="button" class="btn btn-primary" onclick="location.href='changeEmail.php';" value="Change Email" />
				</ul>
				<ul>
					<b>Organization: </b><?php echo $row['organization']?>
				</ul>
				<?php
					}#close while loop
				?>
				<ul>
					<input type="button" class="btn btn-primary" onclick="location.href='changePassword.php';" value="Change Password" />
				</ul>
				</center>
				</div>
			  </div>
		     </div>
		</div>
<br>
<div id="footer">
<p>True Course Life © 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Minisulies, Inc.
       True Course Minisulies, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered Trademarks.</p>
</div><!-- Footer -->
</div><!-- wrapper -->

</body>
</html>
<?php endif; ?>

