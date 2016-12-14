
<!--
Code written by the Salty Groundhogs Team
Senior Project
True Course Website
This is the Login Page
-->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TrueCourse Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: auto;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #008b8b;
      height: 100%;
    }
  body {
        background: -webkit-linear-gradient( #48d1cc, #afeeee, white); /* For Safari 5.1 to 6 */
        background: -o-linear-gradient(#48d1cc,#afeeee, white); /* For Opera 11.1 to 12.0/ */
        background: -moz-linear-gradient(#48d1cc,#afeeee, white); /* For Firefox 3.6 to 15  */
        background: linear-gradient(#48d1cc,#afeeee, white); /* Standard syntax (must be la st) */
  }

    /* Set black background color, white text and some padding */
     footer {
      position: bottom;
      background-color: #555;
      color: white;
      padding: 15px;
      font-size: 10px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
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
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="true.jpg" class="img-rounded" alt="Cinque Terre" width="90" height="50">    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Login</a></li>
        <li><a href="http://discoveryourtruecourse.com/about/">About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-8 text-left">
<div class="container-fluid">

<h1>Login</h1><br>
<?php
session_start();
if (isset($_SESSION['Error'])){
  echo 'Error Logging In: ';
  print $_SESSION['Error'];
  unset($_SESSION['Error']);
}
?>
<div id="wrapper">
	<div id="content">
		<form action="loginAction.php" method="POST">
		  <div class="form-group">
			<label for="usr">Email:</label>
			<input type="text" class="form-control" name="email" id="email">
		  </div>
		  <div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" name="password" id="password">
		  </div>
			<input type="submit" value="Submit" style="margin-right: 30px" class="btn btn-primary"> <input type=button class="btn btn-primary" onClick="location.href='signUp.php'" value='Sign-Up'>
		</form>   
	</div>
    </div>
  </div>
</div>
<div id="footer">
  <p>True Course Life © 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc.
True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks.</p>
</div>
</div>

</body>
</html>

