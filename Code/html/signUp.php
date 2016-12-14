<!--
Credit to the Layout with the shaded Border
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/

Code written by the Salty Groundhogs Team
Senior Project
True Course Website
This page is to create a new Professional within the system
-->

<!DOCTYPE HTML>
<html>
<head>
 <title>Sign-Up</title>
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
        <li><a href="index.php"><img src="true.jpg" class="img-rounded"  width="70" height="30"></a></li>
      </ul>
    </div>
  </div>
</nav>


<body>
<!-- This displays the screen that allows you to create an account for the website -->
                <div class="header w3ls">
                        <h1>Sign-Up</h1>
                </div>
                        <div class="main">
                                <div class="main-section agile">
                                        <div class="login-form">
                                                <form action="" method="post">
                                                        <ul>
                                                                 <li class="text-info">First Name *</li>
                                                                 <li><input type="text" name="first_name" placeholder="First Name" required></li>
                                                                 <div class="clear"></div>

                                                                 <li class="text-info">Last Name *</li>
                                                                 <li><input type="text" name="last_name" placeholder="Last Name" required></li>
                                                                 <div class="clear"></div>
                                                         </ul>   
                                                         <ul>
                                                                 <li class="text-info">Phone Number *</li>
                                                                 <li><input type="text" name="phone_number" maxlength="10" placeholder="Phone Number EX: 1234567890" required></li>
                                                                 <div class="clear"></div>
                                                         </ul>
                                                         <ul>
                                                                 <li class="text-info">Gender *</li>
                                                                 <li class="se"><select class="form-dropdown" id="gender" name="gender" required>
                                                                        <option value="" selected="selected"></option>
                                                                        <option value="Female" >Female</option>
                                                                        <option value="Male" >Male</option>
                                                                  </select></li>
                                                                 <div class="clear"></div>
                                                         </ul>
                                                         <ul>
                                                                 <li class="text-info">Email *</li>
                                                                 <li><input type="text" name="email" placeholder="Email" required></li>
                                                                 <div class="clear"></div>
																 
								 <li class="text-info">Password *</li>
                                                                 <li><input type="password" name="password" placeholder="Password" required></li>
                                                                 <div class="clear"></div>
								
								 <li class="text-info">Confirm Password *</li>
                                                                 <li><input type="password" name="confPass" placeholder="Confirm Password" required></li>
                                                                 <div class="clear"></div>

								
								 <li class="text-info">License Key *</li>
                                                                 <li><input type="text" name="license_key" placeholder="License Key" required></li>
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
                        <br>
<footer class="container-fluid text-center">
    <p>True Course Life &copy; 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc.
       True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks. </p>
</footer>

<?php
 #error_reporting(-1); // display all faires
 #ini_set('display_errors', 1);  // ensure that faires will be seen
 #ini_set('display_startup_errors', 1); // display faires that didn't born

  if(isset($_POST['submit'])){

        $conn_string = "host=10.10.7.159 port=5432 dbname=maindb user=postgres password=SaltyGroudhogs";
        $dbconn4 = pg_connect($conn_string);

        if(isset($_POST['first_name'])){ $first_name = $_POST['first_name']; }
        if(isset($_POST['last_name'])){ $last_name = $_POST['last_name']; }
        if(isset($_POST['phone_number'])){ $phone_number = $_POST['phone_number']; }
        if(isset($_POST['email'])){ $email = $_POST['email']; }
        if(isset($_POST['gender'])){ $gender = $_POST['gender']; }
	if(isset($_POST['license_key'])){ $license_key = $_POST['license_key']; }
	if(isset($_POST['password'])){ $newPass = $_POST['password']; }
        if(isset($_POST['confPass'])){ $comPass = $_POST['confPass']; }

	#This strips input of any characters to stop attacks 
	$first_name = preg_replace("/[^a-zA-Z0-9\s]/", "", $first_name);
	$last_name = preg_replace("/[^a-zA-Z0-9\s]/", "", $last_name);
	$phone_number = preg_replace("/[^0-9\s]/", "", $phone_number);
	$license_key = preg_replace("/[^a-zA-Z0-9\s]/", "", $license_key);
	$email = preg_replace("/[^@.a-zA-Z0-9\s]/", "", $email);
	

	$street_address = "Not Entered"; 
	$city = "Not Entered";      
	$zipcode = "12345";        
	$state = "Not Entered";          
	$country = "Not Entered";
	$bio = "Not Entered";         
	$prof_picture_url = "notUploaded";
	
	if($newPass === $comPass) {
 		   $prof_passwordORG = $newPass; 
		   $prof_password = password_hash($newPass, PASSWORD_DEFAULT);
  
		   if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/', $prof_passwordORG)){
            		$message = "Error. Password must be at least 8 characters, no more than 16 characters, and must include at least one upper case letter, 
					one lower case letter, and one numeric digit.";
                        echo "<script type='text/javascript'>alert('$message');</script>";
  		   } else {	
  			$licenseQuery = pg_query("SELECT exists (SELECT 1 FROM licenses WHERE license_key =  '$license_key')");
                 	if($licenseQuery){
                         	$query = "INSERT INTO professionals VALUES (nextval('professionals_prof_id_seq'), '" . $license_key . "','" . $email ."', '" . $prof_password . "',
  					'" . $first_name . "','" . $last_name . "', '" . $gender . "', '" . $bio . "','" . $street_address . "', '" . $city . "', '" . $zipcode . "',
  					 '" . $state . "','" . $country . "', '" .$phone_number . "', '" . $prof_picture_url . "')";
                 		$result = pg_query($dbconn4, $query);

       				if (!$result) {
       					$errormessage = pg_last_error();
       					$message = "Error with entry. Please check fields.";
       					echo "<script type='text/javascript'>alert('$message');</script>";
       				
       				}else{
       					$message = "Welcome to True Course! Please Log in!";
       					echo "<script type='text/javascript'>alert('$message'); document.location.href = 'index.php';</script>";
       				}
               		}else{
                       		$message = "Error: License Key Not Found";
       				echo "<script type='text/javascript'>alert('$message');</script>";
               		}
      		}            
  	}else{
	   $message = "Error: Passwords do not match!";
           echo "<script type='text/javascript'>alert('$message');</script>";
	}
    }
  pg_close();
?>

</body>
</html>


