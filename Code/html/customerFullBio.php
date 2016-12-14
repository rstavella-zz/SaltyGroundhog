<!--
Credit to the Layout with the shaded Border
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/

Code written by the Salty Groundhogs Team
Senior Project
True Course Website
This page shows a clients full bio - meaning All inforation in the database about them are displayed on this page
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

<!-- This is where we list all client information from the database.
We access data from the Customers, customer_bios, education, job, hobby, and hobby_list machine 
-->
<body>                                                       
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
    
    #Pass in admin ID that is associated with organization
    $results = pg_query("SELECT cu.Cust_ID, cu.First_Name, cu.Last_Name, cu.Active_Status, cu.Street_Address, cu.Zipcode, cu.state, cu.city, cu.country,
                         cu.home_phone, cu.custpic_url, cu.work_phone, cu.cell_phone, cu.gender, cu.martital_status, cu.email, cu.dob
                         FROM Customers as cu
                         WHERE cu.Cust_ID = '$identity'");

    $results2 = pg_query("SELECT cu.Cust_ID, cb.fav_food, cb.fav_book, cb.pref_call_time, cb.self_awareness_practice  FROM Customers as cu, customer_bios as cb WHERE cu.Cust_ID = '$identity' and cu.Cust_ID = cb.Cust_ID");

    $results3 = pg_query("SELECT cu.cust_id, e.education_id, e.school_name, e.degree, e.grad_year FROM customers as cu, education as e WHERE cu.Cust_ID = '$identity' AND cu.Cust_ID = e.Cust_ID");

    $results4 = pg_query("SELECT cu.cust_id, j.job_id, j.job_status, j.income, j.job_title, j.employer FROM customers as cu,  jobs as j WHERE cu.Cust_ID = '$identity' AND cu.Cust_ID = j.Cust_ID");

    $results5 = pg_query("SELECT cu.cust_id, h.hobbies_id, hl.hobby_name, h.weekly_frequency FROM customers as cu, hobbies as h, hobbylist as hl WHERE cu.Cust_ID = '$identity' AND cu.Cust_ID = h.Cust_ID AND h.hobbies_id = hl.hobbies_id");

     while($row = pg_fetch_array($results)) {
	 if ($row['custpic_url'] == "notUploaded"){
 	        $custpic_url = "/uploads/noProfilePhoto.png";
         } else {
                $custpic_url = $row['custpic_url'];
         }
     
	$home_phone = $row['home_phone'];
	$home_phone = '('.substr($home_phone, 0, 3).')'.substr($home_phone, 3,3).'-'.substr($home_phone, 6,10);

	$work_phone = $row['work_phone'];
        $work_phone = '('.substr($work_phone, 0, 3).')'.substr($work_phone, 3,3).'-'.substr($work_phone, 6,10);
	
	$cell_phone = $row['cell_phone'];
        $cell_phone = '('.substr($cell_phone, 0, 3).')'.substr($cell_phone, 3,3).'-'.substr($cell_phone, 6,10);


    ?>
    <div class="main">
      <div class="main-section agile">
         <div class="login-form">
             <form action="" method="post">
                <ul>
			<font size="5"><b><u><?php echo $row['first_name']?> <?php echo $row['last_name']?></u></b></font>
		</ul>
		<ul>
			<li><img src="<?php echo $custpic_url?>" style="width:100px;height:100px;"></img></center></li><br>
                        <li><b>Email: </b><?php echo $row['email']?></li>
			<div class="clear"></div>
                        
			<li><b>Active Status: </b><?php echo $row['active_status']?></li>
			<div class="clear"></div>
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
                         <li><b>Home Phone: </b><?php echo $home_phone?></li>
			 <div class="clear"></div>

                         <li><b>Work Phone: </b><?php echo $work_phone?></li>
			 <div class="clear"></div>

                         <li><b>Mobile Phone: </b><?php echo $cell_phone?></li>
			 <div class="clear"></div>
               </ul>
               <ul>
                         <li><b>Gender: </b><?php echo $row['gender']?></li>
		  	 <div class="clear"></div>
              </ul>
              <ul>
                         <li><b>Martital Status: </b><?php echo $row['martital_status']?></li>
		 	 <div class="clear"></div>
             </ul>
             <ul>
                         <li><b>Date of Birth: </b><?php echo $row['dob']?></li>
			 <div class="clear"></div>
             </ul>
        <?php
          } #Close while with results

         while($row = pg_fetch_array($results2)) {
         ?>
              <ul>
                          <li><b>Preffered Call Time: </b><?php echo $row['pref_call_time']?></li>
	 		  <div class="clear"></div>
             </ul>
             <ul>
                          <li><b>Self Awareness Practice: </b><?php echo $row['self_awareness_practice']?></li>
			  <div class="clear"></div>
             </ul>
             <ul>
                          <li><b>Favorite Food: </b><?php echo $row['fav_food']?></li>
			  <div class="clear"></div>
             </ul>
             <ul>
                          <li><b>Favorite Book: </b><?php echo $row['fav_book']?></li>
			  <div class="clear"></div>
             </ul>
         <?php
            } #Close while of Results2

         while($row = pg_fetch_array($results3)) {
	 $education_id = $row['education_id'];
         ?>
             <ul>
                          <li><b>School Name: </b><?php echo $row['school_name']?></li>
		          <div class="clear"></div>

                          <li><b>Degree: </b><?php echo $row['degree']?></li>
			  <div class="clear"></div>

                          <li><b>Graduation Year: </b><?php echo $row['grad_year']?></li>
			  <div class="clear"></div>
			
			  <li><?php echo "<a href=\"deleteEducation.php?id={$education_id}\">Delete Education</a>";?></li>
                          <div class="clear"></div>

             </ul>
         <?php
            } #Close while of results3

         while($row = pg_fetch_array($results4)) {
	$job_id = $row['job_id'];
         ?>
            <ul>
                          <li><b>Job Status: </b><?php echo $row['job_status']?></li>
			  <div class="clear"></div>

                          <li><b>Job Title: </b><?php echo $row['job_title']?></li>
			  <div class="clear"></div>

                          <li><b>Employeer: </b><?php echo $row['employer']?></li>
			  <div class="clear"></div>

                          <li><b>Income: </b><?php echo $row['income']?></li>
			  <div class="clear"></div>

			  <li><?php echo "<a href=\"deleteJob.php?id={$job_id}\">Delete Job</a>";?></li>
                          <div class="clear"></div>

           </ul>
         <?php
            } #Close while of results4

         while($row = pg_fetch_array($results5)) {
	 $hobbies_id = $row['hobbies_id'];
         ?>
           <ul>
                          <li><b>Hobby Name: </b><?php echo $row['hobby_name']?></li>
			  <div class="clear"></div>

                          <li><b>Hobby Frequency: </b><?php echo $row['weekly_frequency']?></li>
			  <div class="clear"></div>

			  <li><?php echo "<a href=\"deleteHobby.php?id={$hobbies_id}\">Delete Hobby</a>";?></li>
			  <div class="clear"></div>
           </ul>
     
	 <?php
          } #Close while of result5
         ?>
	    <ul>
			<li><input type=button class="btn btn-primary" onClick="location.href='edit.php?id=<?php echo $identity ?>'" value='Edit Profile'></li>
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

