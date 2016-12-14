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
if(!isset($_SESSION['prof_id'])){
  load('index.php');
}
else if(isset($_SESSION['prof_id'])) : ?>
<?php
$appt_id = $_GET['id'];
?>
<html lang="en">
<head>
 <title>Edit Appointments</title>
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
		<div id="header">
			<center><h1>Edit Appointments</h1></center>
		</div>
		   <div class="main">
			<div class="main-section agile">
				<div class="login-form">
				   <form name="insert" action="#" method="POST">
					<center>
					<?php
						$conn_string = "host=10.10.7.159 port=5432 dbname=maindb user=postgres password=SaltyGroudhogs";
						$dbconn4 = pg_connect($conn_string);
            $query0 = pg_query("SELECT cp.cust_id FROM customers as c, professionals as p, appointments as a, clientprofessional as cp WHERE p.prof_id = " . $_SESSION['prof_id'] . " AND cp.prof_id = " . $_SESSION['prof_id'] . " AND cp.cust_id = a.cust_id AND a.appt_id = '" . $appt_id . "'");
            if(pg_num_rows($query0) == 0){ 
              load('home.php');  
            } 
            $sql = "SELECT c.cust_id, c.first_name, c.last_name FROM customers as c, appointments as a, clientprofessional as cp WHERE cp.prof_id = '" . $_SESSION['prof_id'] . "' AND cp.cust_id = c.cust_id AND a.cust_id = c.cust_id AND a.appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
            $name = $row["first_name"] . $row["last_name"];
            $cust_id = $row["cust_id"];
            echo "Set As Appointment For <select name='cust_id' id='cust_id'>";
            echo "<option selected='selected' value='" . $cust_id . "'>" . $name . "</option>";

						$sql = "SELECT c.cust_id, c.first_name, c.last_name FROM customers as c, clientprofessional as cp WHERE c.cust_id = cp.cust_id AND cp.prof_id = '" . $_SESSION['prof_id'] . "' ORDER BY c.first_name ASC";
						$result = pg_query($sql);
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
          <div class="clear"></div>
          <ul>
          <?php
            $sql2 = "SELECT categories_id, categories FROM categories";
            $result2 = pg_query($sql2);
            $sql = "SELECT cat.categories_id, cat.categories FROM customers as c, appointments as a, clientprofessional as cp, categories as cat WHERE cp.prof_id = '" . $_SESSION['prof_id'] . "' AND cat.categories_id = a.categories_id AND cp.cust_id = c.cust_id AND a.cust_id = c.cust_id AND a.appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
            echo "Set Appointment Type <select name='categories_id' id='categories_id'>";
            echo "<option selected='selected' value='" . $row['categories_id'] . "'>" . $row['categories'] . "</option>";
            while ($row2 = pg_fetch_array($result2)) {
              $categories = $row2["categories"];
              $categories_id = $row2["categories_id"];
          ?>
          <ul>
          <?php
            echo "<option value='" . $categories_id . "'>" . $categories . "</option>";
            }
            echo "</select>";
          ?>
          </ul>
          <ul>
          <?php
            $sql = "SELECT location FROM appointments WHERE appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
          ?>
          <li class="text-info">Change Location</li>
          <li><input type="text" name="location" value="<?php echo $row['location']?>" placeholder="Location"></li>
          <div class="clear"></div>    
          </ul>
          <ul>
          <?php
            $sql = "SELECT time FROM appointments WHERE appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
            $UFtime = $row["time"];
            if(strlen($UFtime) == 7){
            $hour = substr($UFtime, 0, 2);
            $min = substr($UFtime, 3, 2);
            $ampm = substr($UFtime, 5, 2);
            } else {
            $hour = substr($UFtime, 0, 1);
            $min = substr($UFtime, 2, 2);
            $ampm = substr($UFtime, 4, 2);
            }
          ?>
          <li class="text-info">Change Time</li>
          <select class="form-dropdown" id="time1" name="time1" required>
            <option value="<?php echo $hour ?>" selected="selected"><?php echo $hour ?></option>
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
            <option value="<?php echo $min ?>" selected="selected"><?php echo $min ?></option>
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
            <option value="<?php echo $ampm ?>" selected="selected"><?php echo $ampm ?></option>
              <option value="am">am</option>
              <option value="pm">pm</option>
          </select>    
          <br>
          <br>
          <ul>
  <?php
            $sql = "SELECT date FROM appointments WHERE appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
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
            ?>
          <li class="text-info">Change Date</li>
          <select class="form-dropdown" id="date1" name="date1" required>
            <option value="<?php echo $mdate ?>" selected="selected"><?php echo $mdate2?></option>
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
            <option value="<?php echo $ddate ?>" selected="selected"><?php echo $ddate?></option>
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
            <option value="<?php echo $ydate; ?>" selected="selected"><?php echo $ydate?></option>
              <option value="1915">1915</option>
              <option value="1916">1916</option>
              <option value="1917">1917</option>
              <option value="1918">1918</option>
              <option value="1919">1919</option>
              <option value="1920">1920</option>
              <option value="1921">1921</option>
              <option value="1922">1922</option>
              <option value="1923">1923</option>
              <option value="1924">1924</option>
              <option value="1925">1925</option>
              <option value="1926">1926</option>
              <option value="1927">1927</option>
              <option value="1928">1928</option>
              <option value="1929">1929</option>
              <option value="1930">1930</option>
              <option value="1931">1931</option>
              <option value="1932">1932</option>
              <option value="1933">1933</option>
              <option value="1934">1934</option>
              <option value="1935">1935</option>
              <option value="1936">1936</option>
              <option value="1937">1937</option>
              <option value="1938">1938</option>
              <option value="1939">1939</option>
              <option value="1940">1940</option>
              <option value="1941">1941</option>
              <option value="1942">1942</option>
              <option value="1943">1943</option>
              <option value="1944">1944</option>
              <option value="1945">1945</option>
              <option value="1946">1946</option>
              <option value="1947">1947</option>
              <option value="1948">1948</option>
              <option value="1949">1949</option>
              <option value="1950">1950</option>
              <option value="1951">1951</option>
              <option value="1952">1952</option>
              <option value="1953">1953</option>
              <option value="1954">1954</option>
              <option value="1955">1955</option>
              <option value="1956">1956</option>
              <option value="1957">1957</option>
              <option value="1958">1958</option>
              <option value="1959">1959</option>
              <option value="1960">1960</option>
              <option value="1961">1961</option>
              <option value="1962">1962</option>
              <option value="1963">1963</option>
              <option value="1964">1964</option>
              <option value="1965">1965</option>
              <option value="1966">1966</option>
              <option value="1967">1967</option>
              <option value="1968">1968</option>
              <option value="1969">1969</option>
              <option value="1970">1970</option>
              <option value="1971">1971</option>
              <option value="1972">1972</option>
              <option value="1973">1973</option>
              <option value="1974">1974</option>
              <option value="1975">1975</option>
              <option value="1976">1976</option>
              <option value="1977">1977</option>
              <option value="1978">1978</option>
              <option value="1979">1979</option>
              <option value="1980">1980</option>
              <option value="1981">1981</option>
              <option value="1982">1982</option>
              <option value="1983">1983</option>
              <option value="1984">1984</option>
              <option value="1985">1985</option>
              <option value="1986">1986</option>
              <option value="1987">1987</option>
              <option value="1988">1988</option>
              <option value="1989">1989</option>
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
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

          <?php
            $sql = "SELECT num_attendies FROM appointments WHERE appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
          ?>
          <li class="text-info">Change Number of Attendies</li>
          <li><input type="text" value="<?php echo $row["num_attendies"] ?>" name="num_attendies" placeholder="Number Of Attendies"></li>
          <br>
          <br>   
          </ul>
         
          <div class="clear"></div> 
          <ul>
          <?php
            $sql = "SELECT description FROM appointments WHERE appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
          ?>
          <li class="text-info">Change Description</li>
          <li><input type="text" value="<?php echo $row['description']?>" name="description" placeholder="Description"></li>
          <div class="clear"></div>    
          </ul>
          <div class="clear"></div> 

          <?php
            $sql = "SELECT notes FROM appointments WHERE appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
          ?>
          <ul>
          <li class="text-info">Change Notes</li>
          <li><input type="text" value="<?php echo $row["notes"] ?>" name="notes" placeholder="Notes"></li>
          <div class="clear"></div>    
          </ul>
    
          <?php
            $sql = "SELECT reoccuring_int FROM appointments WHERE appt_id = '" . $appt_id . "'";
            $result = pg_query($sql);
            $row = pg_fetch_array($result);
          ?>
          <ul>
          <li class="text-info">Change Reoccuring Interval</li>
          <select class="form-dropdown" id="reoccuring_int" name="reoccuring_int" required>
            <option value="<?php echo $row['reoccuring_int'] ?>" selected="selected"><?php echo $row['reoccuring_int'] ?></option>
              <option value="Never">Never</option>
              <option value="Daily">Daily</option>
              <option value="Weekly">Weekly</option>
              <option value="Bi-Weekly">Bi-Weekly</option>
              <option value="Monthly">Monthly</option>
              <option value="Annually">Annually</option>
          </select>  
          </ul>
          <br>
          <input type="submit" name="submit_changes" value="Submit Changes" class="btn btn-primary"></center>
          <div class="clear"></div>
          <br>
          <br>
          --------- OR ---------
          <br>
          <br>
          <input type="submit" name="delete_appointment" value="Delete Appointment" class="btn btn-primary"></center>
          <br>
          <br>
            </form>
        </div>
    </div>
</div>
 <?php
     if(isset($_POST['submit_changes'])){
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
        $query = pg_query("UPDATE appointments SET cust_id = '" . $cust_id . "', categories_id = '" . $categories_id . "', location = '" . $location . "', time = '" . $time . "', num_attendies = '" . $num_attendies. "', description = '" . $description . "', notes = '" . $notes . "', reoccuring_int = '" . $reoccuring_int . "', date = '" . $date . "' WHERE appt_id = '" . $appt_id . "'");
        if (!$query) {
             $errormessage = pg_last_error();
             $message = "Error with entry. Please check fields.";
             echo "<script type='text/javascript'>alert('$message');</script>";
            exit();
        }else{
            $message = "Successfully Edited Appointment";
            echo "<script type='text/javascript'>";
            echo "alert('$message');";
            echo "window.location.href = 'viewAppointment.php?id=" . $appt_id . "';";
            echo "</script>";
        }
     }

     if(isset($_POST['delete_appointment'])){
      $query = pg_query("DELETE FROM appointments WHERE appt_id = '" . $appt_id . "'");
        if (!$query) {
             $errormessage = pg_last_error();
             $message = "Error with entry. Please check fields.";
             echo "<script type='text/javascript'>alert('$message');</script>";
            exit();
        } else {
            $message = "Successfully Deleted Appointment";
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
