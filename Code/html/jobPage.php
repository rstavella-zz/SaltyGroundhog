<!--
Credit to the Layout with the shaded Border
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/

Code written by the Salty Groundhogs Team
Senior Project
True Course Website
This page allows a professional to add a job to a clients profile
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

<!DOCTYPE HTML>
<html>
<head>
 <title>Add Job</title>
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
        <li><a href="home.php"><img src="true.jpg" class="img-rounded" alt="Home" width="70" height="30"> </a></li>
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
<div id="wrapper">
     <div id="header">
          <center><h1>Add Job</h1></center>
     </div>
     <div id="content">
         <div class="main">
              <div class="main-section agile">
                      <div class="login-form">
                           <form action="" method="post">
                                       <ul>
                                           <li class="text-info">Employer *</li>
                                           <li><input type="text" name="employer" placeholder="Employer" required></li>
                                           <div class="clear"></div>
                                       </ul>
                                       <ul>
                                           <li class="text-info">Job Title *</li>
                                           <li><input type="text" name="job_title" placeholder="Job Title"required></li>
                                           <div class="clear"></div>
                                       </ul>
                                       <ul>
                                            <li class="text-info">Income *</li>
                                            <li class="se"><select class="form-dropdown" id="income" name="income" required>
                                            	<option value="" selected="selected"></option>
                                        	<option value="$0" >$0.00</option>
                                	        <option value="$20,000 - $39,999" >$20,000 - $39,999</option>
                        	                <option value="$40,000 - $59,999" >$40,000 - $59,999</option>
     	        	                        <option value="$60,000 - $79,999" >$60,000 - $79,999</option>
        	                                <option value="$80,000 or more" >$80,000 or more</option>
                                             </select></li>
                                             <div class="clear"></div>
                                        </ul>
                                        <ul>
                                             <li class="text-info">Job Status *</li>
                                             <li class="se"><select class="form-dropdown" id="job_status" name="job_status" required>
                                                   <option value="" selected="selected"></option>
                                                   <option value="Unemployed" >Unemployed</option>
                                                   <option value="Employed" >Employed</option>
                                             </select></li>
                                             <div class="clear"></div>
                                       </ul>
                                       <ul>
                                             <li><input type="submit" class="btn btn-primary" name="submit" value="Submit"></li>
                                             <div class="clear"></div>
                                       </ul>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
               <br>
     <div id ="footer">
        <p>True Course Life © 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc.
            True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks. </p>
    </div><!--fotter-->
<div><!--wrapper-->

<?php
    if(isset($_POST['submit'])){

        $conn_string = "host=10.10.7.159 port=5432 dbname=maindb user=postgres password=SaltyGroudhogs";
        $dbconn4 = pg_connect($conn_string);

        $identity = $_GET['id'];
        $query0 = pg_query("SELECT cp.cust_id FROM customers as c, professionals as p, appointments as a, clientprofessional as cp WHERE p.prof_id = " . $_SESSION['prof_id'] . " AND cp.prof_id = " . $_SESSION['prof_id'] . " AND cp.cust_id= '$identity '");
        if(pg_num_rows($query0) == 0){ 
          load('home.php');  
        }   
        if(isset($_POST['employer'])){ $employer = $_POST['employer']; }
        if(isset($_POST['job_title'])){ $job_title = $_POST['job_title']; }
        if(isset($_POST['income'])){ $income = $_POST['income'];  }
        if(isset($_POST['job_status'])){ $job_status = $_POST['job_status']; }

	#This strips input of any characters to stop attacks 
	$employer = preg_replace("/[^a-zA-Z0-9\s]/", "", $employer);
	$job_title = preg_replace("/[^a-zA-Z0-9\s]/", "", $job_title);

        $query1 = "INSERT INTO jobs (job_id, cust_id, job_status, income, job_title, employer) VALUES (nextval('jobs_job_id_seq'), '" . $identity . "','" . $job_status . "',
                '" . $income . "','" . $job_title . "','" . $employer . "')";

        $result = pg_query($dbconn4, $query1);

        if (!$result) {
            $errormessage = pg_last_error();
             $message = "Error with entry. Please check fields.";
             echo "<script type='text/javascript'>alert('$message');</script>";
            exit();
        }else{
            $message = "Job Successfully Added!!";
            echo "<script type='text/javascript'>alert('$message'); document.location.href = 'customerFullBio.php?id=$identity';</script>";
        }
     }
     pg_close();
?>

</body>
</html>

<?php endif; ?>


