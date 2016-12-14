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
ini_set('display_startup_errors', 1); // display faires that didn't born
if(!isset( $_SESSION['prof_id'])){
  load('index.php');
}
else if( isset( $_SESSION['prof_id'])) : ?>

<html lang="en">
<head>
 <title>Add Appointment</title>
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
        <li class="active"><a href="addAppointment.php">Add Appointment</a></li>
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
		<div id="header">
			<center><h1>Add Appointments</h1></center>
		</div>
		   <div class="main">
			<div class="main-section agile">
				<div class="login-form">
				   <form name="insert" action="#" method="POST">
					<center>
					<?php
						$conn_string = "host=10.10.7.159 port=5432 dbname=maindb user=postgres password=SaltyGroudhogs";
						$dbconn4 = pg_connect($conn_string);

						$sql = "SELECT c.cust_id, c.first_name, c.last_name FROM customers as c, clientprofessional as cp WHERE c.cust_id = cp.cust_id AND cp.prof_id = '" . $_SESSION['prof_id'] . "' ORDER BY c.first_name ASC";
						$result = pg_query($sql);

						echo "Add Appointment For * <select name='cust_id' id='cust_id'>";
						while ($row = pg_fetch_array($result)) {
							$name = $row["first_name"] . $row["last_name"];
							$cust_id = $row["cust_id"];
					?>
					<ul>
          <center>
					<?php
						echo "<option value='" . $cust_id . "'>" . $name . "</option>";
						}
						echo "</select>";
					?>
          </ul>
          <br>
          <br>
          <div class='clear'></div>
          <?php
            $sql2 = "SELECT categories_id, categories FROM categories";
            $result2 = pg_query($sql2);

            echo "Change Appointment Type * <select name='categories_id' id='categories_id'>";
            while ($row2 = pg_fetch_array($result2)) {
              $categories = $row2["categories"];
              $categories_id = $row2["categories_id"];
          ?>
          <ul>
          <br>
          <?php
            echo "<option value='" . $categories_id . "'>" . $categories . "</option>";
            }
            echo "</select>";
          ?>
          </ul>
          <br>
          <br>
          <div class="clear"></div>
          <ul>
          <li class="text-info">Location</li>
          <li><input type="text" name="location" placeholder="Location"></li>
          <div class="clear"></div>    
          </ul>
          <ul>
          <li class="text-info">Time *</li>
          <select class="form-dropdown" id="time1" name="time1" required>
            <option value="" selected="selected"></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
          </select>
          :
          <select class="form-dropdown" id="time2" name="time2" required>
            <option value="" selected="selected"></option>
              <option value="00">00</option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
              <option value="32">32</option>
              <option value="33">33</option>
              <option value="34">34</option>
              <option value="35">35</option>
              <option value="36">36</option>
              <option value="37">37</option>
              <option value="38">38</option>
              <option value="39">39</option>
              <option value="40">40</option>
              <option value="41">41</option>
              <option value="42">42</option>
              <option value="43">43</option>
              <option value="44">44</option>
              <option value="45">45</option>
              <option value="46">46</option>
              <option value="47">47</option>
              <option value="48">48</option>
              <option value="49">49</option>
              <option value="50">50</option>
              <option value="51">51</option>
              <option value="52">52</option>
              <option value="53">53</option>
              <option value="54">54</option>
              <option value="55">55</option>
              <option value="56">56</option>
              <option value="57">57</option>
              <option value="58">58</option>
              <option value="59">59</option>
          </select>
          <select class="form-dropdown" id="time3" name="time3" required>
            <option value="" selected="selected"></option>
              <option value="am">am</option>
              <option value="pm">pm</option>
          </select>    

          <div class="clear"></div> 
          <ul>
          <li class="text-info">Date *</li>
          <select class="form-dropdown" id="date1" name="date1" required>
            <option value="" selected="selected"></option>
              <option value="01">Jan</option>
              <option value="02">Feb</option>
              <option value="03">Mar</option>
              <option value="04">Apr</option>
              <option value="05">May</option>
              <option value="06">Jun</option>
              <option value="07">Jul</option>
              <option value="08">Aug</option>
              <option value="09">Sep</option>
              <option value="10">Oct</option>
              <option value="11">Nov</option>
              <option value="12">Dec</option>
          </select>  
          /
          <select class="form-dropdown" id="date2" name="date2" required>
            <option value="" selected="selected"></option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
          </select> 
          /
          <select class="form-dropdown" id="date3" name="date3" required>
            <option value="" selected="selected"></option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
              <option value="2027">2027</option>
              <option value="2028">2028</option>
              <option value="2029">2029</option>
              <option value="2030">2030</option>
              <option value="2031">2031</option>
              <option value="2032">2032</option>
              <option value="2033">2033</option>
              <option value="2034">2034</option>
              <option value="2035">2035</option>
              <option value="2036">2036</option>
          </select> 
          </ul>
      
          </ul>
          <div class="clear"></div> 
          <ul>
          <li class="text-info">Number of Attendies*</li>
          <li><input type="text" name="num_attendies" placeholder="Number of Attendies"></li>
          <div class="clear"></div>    
          </ul>

          <div class="clear"></div> 
          <ul>
          <li class="text-info">Description</li>
          <li><input type="text" name="description" placeholder="Description"></li>
          <div class="clear"></div>    
          </ul>

          <div class="clear"></div> 
          <ul>
          <li class="text-info">Notes</li>
          <li><input type="text" name="notes" placeholder="Notes"></li>
          <div class="clear"></div>    
          </ul>

          <div class="clear"></div> 
          <ul>
          <li class="text-info">Reoccuring Interval *</li>
          <select class="form-dropdown" id="reoccuring_int" name="reoccuring_int" required>
            <option value="" selected="selected"></option>
              <option value="Never">Never</option>
              <option value="Daily">Daily</option>
              <option value="Weekly">Weekly</option>
              <option value="Bi-Weekly">Bi-Weekly</option>
              <option value="Monthly">Monthly</option>
              <option value="Annually">Annually</option>
          </select>  
          </ul>



          <input type="submit" name="submit" value="Submit" class="btn btn-primary"></center>
          <div class="clear"></div>
            </form>
        </div>
    </div>
</div>
 <?php
     if(isset($_POST['submit'])){
        if(isset($_POST['cust_id'])){ $cust_id = $_POST['cust_id']; }
        if(isset($_POST['categories_id'])){ $categories_id = $_POST['categories_id']; }
        if(isset($_POST['location'])){ $location = $_POST['location']; }
	$location = preg_replace("/[^a-zA-Z0-9\s]/", "", $location);
        if((isset($_POST['time1']) && isset($_POST['time2']) && isset($_POST['time3']))){ $time = $_POST['time1'] . ":" . $_POST['time2'] . "" . $_POST['time3']; }
        if(isset($_POST['num_attendies'])){ $num_attendies = $_POST['num_attendies']; }
	$num_attendies = preg_replace("/[^0-9\s]/", "", $num_attendies);
        if(isset($_POST['description'])){ $description = $_POST['description']; }
	$description = preg_replace("/[^a-zA-Z0-9\s]/", "", $description);
        if(isset($_POST['notes'])){ $notes = $_POST['notes']; }
	$notes = preg_replace("/[^a-zA-Z0-9\s]/", "", $notes);
        if(isset($_POST['reoccuring_int'])){ $reoccuring_int = $_POST['reoccuring_int']; }
        if((isset($_POST['date1']) && isset($_POST['date2']) && isset($_POST['date3']))){ $date = $_POST['date3'] . "-" . $_POST['date1'] . "-" . $_POST['date2']; }
        $query = "INSERT INTO appointments VALUES (DEFAULT, '" . $cust_id . "', '" . $categories_id . "', '" . $location . "', '" . $time . "', '" . $num_attendies . "', '" . $description . "', '" . $notes . "', '" . $reoccuring_int . "', '" . $date . "')";
        $result = pg_query($dbconn4, $query);
        if (!$result) {
             $errormessage = pg_last_error();
             $message = "Error with entry. Please check fields.";
             echo "<script type='text/javascript'>alert('$message');</script>";
            exit();
        }else{
            $message = "Successfully Added Appointment";
            echo "<script type='text/javascript'>";
            echo "alert('$message');";
            echo "window.location.href = 'home.php';";
            echo "</script>";
        }
     }
        pg_close();
 ?>
 <br>

 <footer class="container-fluid text-center">
            <p>True Course Life © 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc.
             True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks. </p>
 </footer>	
</body>
</html>

<?php endif; ?>
