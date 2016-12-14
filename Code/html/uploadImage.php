
<!--
Credit to the Layout with the shaded Border
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/

Code written by the Salty Groundhogs Team
Senior Project
True Course Website
This page allows a professional to add and hobby for a clients profile
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
 <title>Upload Client Profile</title>
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
<!-- This sends the footer to the bottom of the screen when the content is too small -->
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
<?php
$identity = $_GET['id'];
?>
<div id="wrapper">
    <div id="header">
         <center><h1>Upload Client Image</h1></center>
    </div>
    <div id="content">
        <div class="main">
             <div class="main-section agile">
                   <div class="login-form">
                        <form action="uploadImage.php?id=<?php echo $identity ?> " method="post" enctype="multipart/form-data">
							<ul>
								 <li class="text-info">Upload Image: </li>
								<li><input type="file" name="fileToUpload" id="fileToUpload"></li>
								<div class="clear"></div>
							</ul>
							<ul>
								<input type="submit" value="Upload Image" name="submit">
								<div class="clear"></div>
							<ul>
						</form>
            </div>
         </div>
      </div>
   </div>
  <br>
  <div id="footer">
      <p>True Course Life &copy; 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc.
         True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks. </p>
  </div><!-- Footer -->
</div><!-- Wrapper -->

<?php
 if(isset($_POST['submit'])){
 $conn_string = "host=10.10.7.159 port=5432 dbname=maindb user=postgres password=SaltyGroudhogs";
 $dbconn4 = pg_connect($conn_string);
 $identity=$_GET['id'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $message = "File is not an image.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $message = "Sorry, file already exists.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000000) {
   $message = "Sorry, your file is too large.";
   echo "<script type='text/javascript'>alert('$message');</script>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg" && $imageFileType != "JPEG"
&& $imageFileType != "gif" && $imageFileType != "GIF" ) {
    $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $message =  "Sorry, your file was not uploaded.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    exit();

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
         $message =  "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
         echo "<script type='text/javascript'>alert('$message'); document.location.href = 'customerProfilePage.php?id=$identity';</script>";
         $custpic_url = $target_dir .  basename( $_FILES["fileToUpload"]["name"]);
         $query = "UPDATE customers set custpic_url='$custpic_url' WHERE cust_id='$identity'";
         $result = pg_query($dbconn4, $query);
    } else {
        $message = "Sorry, there was an error uploading your file.";
        echo "<script type='text/javascript'>alert('$message'); document.location.href = 'uploadImage.php?id=$identity';</script>";

    }
}
}
?>
</body>
</html>

<?php endif; ?>

