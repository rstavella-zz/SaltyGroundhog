
<!--
Credit to the Layout with the shaded Border
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/

Code written by the Salty Groundhogs Team
Senior Project
True Course Website
This Page shows the family tree for a client
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
 <title>Family Tree</title>
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
  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
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
        height:100px;
        position:absolute;
        bottom:0;
        left:0;
}

</style>
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
</head>
<body>
<?php
 $connect = pg_connect("host=10.10.7.159 dbname=maindb user=postgres password=SaltyGroundhogs");
        $identity=$_GET['id'];
        if (!$connect) {
            die(pg_error());
        } 
$nameQuery = pg_query("SELECT first_name, last_name from customers where cust_id = '$identity'");
$results=pg_fetch_array($nameQuery);

?>
<div id="wrapper">
<div class="header w3ls">
   <h2><?php echo $results['first_name'] . $results['last_name'] ?>'s Family Tree</h2>
</div>
       <div id="content">
        <div class="main">
             <div class="main-section agile">
        <?php
        $tempId = $identity;
        $momQuery = pg_query("SELECT cust_id, first_name, last_name, relation FROM customers WHERE custr_id = ' $tempId ' AND relation = 'Mother'");
        $momFN='';
        $momLN='';
        $momId=0;
        while($row = pg_fetch_array($momQuery)) {
                $momFN = $row['first_name'];
                $momLN = $row['last_name'];
                $momId = $row['cust_id'];
        }
        $dadQuery = pg_query("SELECT cust_id, first_name, last_name, relation FROM customers WHERE custr_id = ' $tempId ' AND relation = 'Father'");
        $dadFN='';
        $dadLN='';
        $dadId=0;
        while($row1 = pg_fetch_array($dadQuery)){
                $dadFN = $row1['first_name'];
                $dadLN = $row1['last_name'];
                $dadId = $row1['cust_id'];
        }
        if($dadFN == '' && $momFN != ''){
                $dadFN = 'Unknown Father';
        }
        else if($dadFN != '' && $momFN == ''){
                $momFN ='Unknown Mother';
        }
        $tempId = $momId;
        ?>
        <!--
        We will create a family tree using just CSS(3)
        The markup will be simple nested lists
        -->
        <div class="tree">
                <ul>
                        <?php if($momFN != ''){ echo
                        "<li>
                                <a href='#'>$momFN $momLN</a><a href'#'>$dadFN $dadLN</a>

                                <ul>";
                        }
        $sisterQuery = pg_query("SELECT cust_id, first_name, last_name, relation FROM customers WHERE custr_id = ' $tempId ' AND relation = 'Daughter'");
        $sisterFN='';
        $sisterLN='';
        while($row3 = pg_fetch_array($sisterQuery)){
                $sisterFN = $row3['first_name'];
                $sisterLN = $row3['last_name'];
                if($sisterFN != ''){
                        echo "<li><a href='#'>$sisterFN $sisterLN</a></li>";
                }
        }

        $meQuery = pg_query("SELECT * FROM customers WHERE cust_id = ' $identity '");
        $meFN='';
        $meLN='';
        while($row4 = pg_fetch_array($meQuery)){
                $meFN = $row4['first_name'];
                $meLN = $row4['last_name'];
        }

        $partnerFN='';
        $partnerLN='';
        $partnerRel='';
        $partnerQuery = pg_query("SELECT first_name, last_name, relation FROM customers WHERE (relation = 'Wife' OR relation = 'Husband') AND (custr_id = ' $identity ')");
        while($row5 = pg_fetch_array($partnerQuery)){
                $partnerFN = $row5['first_name'];
                $partnerLN = $row5['last_name'];
                $partnerRel = $row5['relation'];
        }
                                     echo "<li>
                                                <a>$meFN $meLN</a>";?><?php if($partnerRel != ''){ echo "<a href='#'>$partnerFN $partnerLN</a>";}
        $kidFN='';
        $kidLN='';
        $kidId=0;
        $kidQuery = pg_query("SELECT cust_id, first_name, last_name, relation FROM customers WHERE (relation = 'Son' OR relation =  'Daughter') AND (custr_id = ' $identity ')");
        if(pg_num_rows($kidQuery) != 0){
                echo "<ul>";
        }
        while($row6 = pg_fetch_array($kidQuery)){
                $kidFN = $row6['first_name'];
                $kidLN = $row6['last_name'];
                $kidId = $row6['cust_id'];
                if($kidFN != ''){
                        echo "<li><a href='#'>$kidFN $kidLN</a></li>";
                }
        }
        if(pg_num_rows($kidQuery) != 0){
                echo "</ul>";
        }?>
                                        </li>
        <?php
        $broFN='';
        $broLN='';
        $broQuery = pg_query("SELECT first_name, last_name, relation FROM customers WHERE custr_id = ' $tempId ' AND relation = 'Son'");
        while($row7 = pg_fetch_array($broQuery)){
                $broFN = $row7['first_name'];
                $broLN = $row7['last_name'];
                if($broFN != ''){
                        echo "<li><a href='#'>$broFN $broLN</a></li>";
                }
        }
        if($momFN != ''){ echo "</ul></li>";}?>
                </ul>
           </div>
	</div>
      </div>
   </div>
  <br>
  <div id="footer">
      <p>True Course Life &copy; 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc.
         True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks. </p>
  </div><!-- Footer -->
</div><!--Wrapper -->
</body>
</html>
<?php endif; ?>

