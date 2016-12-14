<!--
Credit to the Layout with the shaded Border
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/

Code written by the Salty Groundhogs Team
Senior Project
True Course Website
This page is the Admin Page for True Course.
Here an administrator can manage license and professionals within an organization
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
if(!isset( $_SESSION['manager_id'])){
  load('index.php');
}
else if( isset( $_SESSION['manager_id'])) : ?>

<!DOCTYPE HTML>
<html>
<head>
 <title>Manage Licences</title>
  <!-- List of Style sheets and references for our CSS -->
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
        <li><a href=""><img src="true.jpg" class="img-rounded" alt="Home" width="70" height="30"> </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	  <li><a href="changeAdminPassword.php">Change Password</a></li>
        <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<body>
<div class="header w3ls">
	<h1>Manage Licenses</h1>
</div>
<div class="main">
   <div class="main-section agile">
       <div class="login-form">
	  <form action="adminPage.php" method="post">
          <?php
            $connect = pg_connect("host=10.10.7.159 dbname=maindb user=postgres password=SaltyGroundhogs");
            if (!$connect) {
                die(pg_error());
            }
            $identity = $_SESSION['manager_id'];
            #Query to list all professionals and their organization that is shared under the administrator that is logged in
            $results = pg_query("Select p.prof_id, p.first_name, p.last_name, lm.organization From professionals p, licenses l, license_managers lm Where l.manager_id = $identity and  lm.manager_id = $identity and p.license_key = l.license_key ORDER by p.first_name ASC");
	    while($row = pg_fetch_array($results)) {
		$prof_id = $row['prof_id'];
            ?>
	 <!-- Print all professionals and the organization they are a part of. This should correspond to the organization of the License Manager -->
                <ul>
                    <li>Professional Name: <?php echo $row['first_name']?> <?php echo $row['last_name']?></li>
                    <li>Organization: <?php echo $row['organization']?></li>
                    <li><?php echo "<a href=\"deleteProfessional.php?id={$prof_id}\">Delete</a>";?></li>
		    <div class="clear"></div>                                                       
                </ul>
            <?php
            }
	    ?>
	  </form>
       </div><!-- Closes login-form -->
   </div><!-- Closes Main-section -->
</div><!-- Closes Main -->
<br>
<footer class="container-fluid text-center">
    <p>True Course Life &copy; 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc.
       True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks.</p>
</footer>
</body>
</html>

<?php endif; ?>

