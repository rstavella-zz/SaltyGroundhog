<!--
Credit to the Layout with the shaded Border
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/

Code written by the Salty Groundhogs Team
Senior Project
True Course Website
This page allows a professional to view a family memebers complete bio
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
 <title>Family Member Profile</title>
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
        <li><a href="home.php"><img src="true.jpg" class="img-rounded"  width="70" height="30"></a></li>
        <li class="active"><a href="clientPage.php">Clients</a></li>
        <li><a href="professionalPage.php">Professionals</a></li>
        <li><a href="\Calendar\sample.php">Calendar</a></li>
        <li><a href="newClientPage.php">Add Client</a></li>
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
<?php
    $connect = pg_connect("host=10.10.7.159 dbname=maindb user=postgres password=SaltyGroundhogs");
    $identity=$_GET['id'];
    if (!$connect) {
        die(pg_error());
    }
    #Pass in admin ID that is associated with organization
    $results = pg_query("SELECT cu.Cust_ID, cu.First_Name, cu.Last_Name, cu.relation, cu.Street_Address, cu.Zipcode, cu.state, cu.city, cu.country,
                                cu.home_phone, cu.work_phone, cu.cell_phone, cu.gender,cu.dob
                         FROM Customers as cu
                         WHERE cu.Cust_ID = '$identity'");
     $results2 = pg_query("SELECT cust_id, first_name, last_name, relation FROM customers  WHERE custr_id= '$identity '");
     while($row = pg_fetch_array($results)) {
    ?>
		<div class="main">
                        <div class="main-section agile">
                                 <div class="login-form">
                                    <form action="" method="post">
                        <ul>
			<font size="5"><b><u><?php echo $row['first_name']?> <?php echo $row['last_name']?></u></b></font>
			</ul>
			<ul>
			 <font size="4"><b><?php echo $row['relation']?></b></font>
			</ul>
                        <ul>
				<li><b>Address: </b></li>
				<li><?php echo $row['street_address']?></li>
				<div class="clear"></div>
				<li><?php echo $row['city']?> <?php echo $row['state']?> <?php echo $row['zipcode']?></li>
				<div class="clear"></div>
				<li><?php echo $row['country']?></li>
				<div class="clear"></div>
                        </ul>
                        <ul>
                                <li><b>Home Phone: </b><?php echo $row['home_phone']?></li>
				<div class="clear"></div>
                                <li><b>Work Phone: </b><?php echo $row['work_phone']?></li>
				<div class="clear"></div>
                                <li><b>Mobile Phone: </b><?php echo $row['cell_phone']?></li>
				<div class="clear"></div>
                        </ul>
                        <ul>
                                <li><b>Gender: </b><?php echo $row['gender']?></li>
				<div class="clear"></div>
                        </ul>
                        <ul>
                                <li><b>Date of Birth: </b><?php echo $row['dob']?></li>
				<div class="clear"></div>
                        </ul>
		<?php
		}
	            while($row2 = pg_fetch_array($results2)) {	
		?>
			<ul>
			<li><font size="4"><?php echo "<a href=\" familyMemeberFullBio.php?id={$familyId}\"> $first_name $last_name </a>";?> : <?php echo $row2['relation']?></font></li><br>
			</ul>
          <?php  
	   }
            ?>
			 <ul>
                                <li><input type=button class="btn btn-primary" onClick="location.href='newFamilyMember.php?id=<?php echo $identity ?>'" value='Add Family Member'></li>
                          </ul>

			  <ul>
				<li><input type=button class="btn btn-primary" onClick="location.href='editFamily.php?id=<?php echo $identity ?>'" value='Edit Profile'></li>
                          </ul>
	    </form>
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

