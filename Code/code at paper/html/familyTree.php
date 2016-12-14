<?php
include('loginValidate.php');
session_start();
error_reporting(-1); // display all faires
ini_set('display_errors', 1);  // ensure that faires will be seen
ini_set('display_startup_errors', 1); // display faires that didn't born
if(!isset( $_SESSION['prof_id'])){
  load('index.php');
}
else if( isset( $_SESSION['prof_id'])) : ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
	<style type="text/css" media="screen">
		* {margin: 0; padding: 0;}

		.tree ul {
			padding-top: 20px; position: relative;
	
			-webkit-transition: all 0.5s;
			-moz-transition: all 0.5s;
			transition: all 0.5s;
		}

		.tree li {
			float: left; text-align: center;
			list-style-type: none;
			position: relative;
			padding: 20px 5px 0 5px;
	
			-webkit-transition: all 0.5s;
			-moz-transition: all 0.5s;
			transition: all 0.5s;
		}

		/*We will use ::before and ::after to draw the connectors*/

		.tree li::before, .tree li::after{
			content: '';
			position: absolute; top: 0; right: 50%;
			border-top: 1px solid #ccc;
			width: 50%; height: 45px;
			z-index: -1;
		}
		.tree li::after{
			right: auto; left: 50%;
			border-left: 1px solid #ccc;
		}

		/*We need to remove left-right connectors from elements without 
		any siblings*/
		.tree li:only-child::after, .tree li:only-child::before {
			display: none;
		}

		/*Remove space from the top of single children*/
		.tree li:only-child{ padding-top: 0;}

		/*Remove left connector from first child and 
		right connector from last child*/
		.tree li:first-child::before, .tree li:last-child::after{
			border: 0 none;
		}
		/*Adding back the vertical connector to the last nodes*/
		.tree li:last-child::before{
			border-right: 1px solid #ccc;
			border-radius: 0 5px 0 0;
			
			-webkit-transform: translateX(1px);
			-moz-transform: translateX(1px);
			transform: translateX(1px);
			
			-webkit-border-radius: 0 5px 0 0;
			-moz-border-radius: 0 5px 0 0;
			border-radius: 0 5px 0 0;
		}
		.tree li:first-child::after{
			border-radius: 5px 0 0 0;
			-webkit-border-radius: 5px 0 0 0;
			-moz-border-radius: 5px 0 0 0;
		}

		/*Time to add downward connectors from parents*/
		.tree ul ul::before{
			content: '';
			position: absolute; top: -12px; left: 50%;
			border-left: 1px solid #ccc;
			width: 0; height: 32px;
			z-index: -1;
		}

		.tree li a{
			border: 1px solid #ccc;
			padding: 5px 10px;
			text-decoration: none;
			color: #666;
			font-family: arial, verdana, tahoma;
			font-size: 11px;
			display: inline-block;
			background: white;
	
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
	
			-webkit-transition: all 0.5s;
			-moz-transition: all 0.5s;
			transition: all 0.5s;
		}
		.tree li a+a {
			margin-left: 20px;
			position: relative;
		}
		.tree li a+a::before {
			content: '';
			position: absolute;
			border-top: 1px solid #ccc;
			top: 50%; left: -21px; 
			width: 20px;
		}

		/*Time for some hover effects*/
		/*We will apply the hover effect the the lineage of the element also*/
		.tree li a:hover, .tree li a:hover~ul li a {
			background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
		}
		/*Connector styles on hover*/
		.tree li a:hover~ul li::after, 
		.tree li a:hover~ul li::before, 
		.tree li a:hover~ul::before, 
		.tree li a:hover~ul ul::before
		{
			border-color: #94a0b4;
		}
	</style>
	<title>Family Tree</title>
	  <link href="style.css" rel="stylesheet" type="text/css" media="all"/>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <!--web-fonts-->
	  <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

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

</head>
<body>
	<!--
	We will create a family tree using just CSS(3)
	The markup will be simple nested lists
	-->
	<div class="tree">
		<ul>
			<li>
				<a href="#">Parent</a>
				<ul>
					<li>
						<a href="#">Child</a>
						<ul>
							<li>
								<a href="#">Grand Child</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Sub Parent 1</a><a href="#">Sub Parent 2</a>
						<ul>
							<li><a href="#">Grand Child</a></li>
							<li>
								<a href="#">Grand Child</a>
								<ul>
									<li>
										<a href="#">Great Grand Child</a>
									</li>
									<li>
										<a href="#">Great Grand Child</a>
									</li>
									<li>
										<a href="#">Great Grand Child</a>
									</li>
								</ul>
							</li>
							<li><a href="#">Grand Child</a></li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</body>
</html>
<?php endif; ?>
