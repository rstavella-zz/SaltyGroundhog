<?php
include('loginValidate.php'); 
session_start();
error_reporting(-1); // display all faires
ini_set('display_errors', 1);  // ensure that faires will be seen
ini_set('display_startup_errors', 1); // display faires that didn't born
if(!isset( $_SESSION['manager_id'])){
  load('index.php');
}
else if( isset( $_SESSION['manager_id'])) : ?>

<html lang="en">
<head>
  <title>Manage Licenses</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style media="screen" type="text/css">
  .table th, .table td {
     border-top: none !important;
     font-size:25px;
     border-collapse:separate;
     border-spacing:3em;
  }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 800px}

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
      background-color: #555;
      color: white;
      font-size: 10px;
      padding: 15px;
   }
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
            @media only screen and (max-width: 800px) {
        /* Force table to not be like tables anymore */
        #no-more-tables table,
        #no-more-tables thead,
        #no-more-tables tbody,
        #no-more-tables th,
        #no-more-tables td,
        #no-more-tables tr {
        display: block;
        }

        /* Hide table headers (but not display: none;, for accessibility) */
        #no-more-tables thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
        }


        #no-more-tables td {
        /* Behave like a "row" */
        position: relative;
        padding-left: 50%;
        text-align:left;
        }

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
       </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="adminPage.html"><img src="http://10.10.7.164/img/true.jpg" class="img-rounded" alt="Cinque Terre" width="70" height="30"> </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


<body id="public" onorientationchange="window.scrollTo(0, 1)">
  <div id="container" class="ltr">
  <header id="header" class="info">
  <center><h1>Manage Licenses </h1></center>
  <div></div>
</header>
<div id="no-more-tables">
<table class="table-condensed cf" style="border-collapse:separate; border-spacing:1em; border-top: none !important;">
        <thead>
            <tr>
                <td>Professional Name</td>
                <td>Organization</td>
                <td>Remove Professional</td>
            </tr>
        </thead>
        <tbody>
        <?php
            $connect = pg_connect("host=10.10.7.159 dbname=maindb user=postgres password=SaltyGroundhogs");
            if (!$connect) {
                die(pg_error());
            }
	    $id = $_SESSION['manager_id'];	
            #Pass in admin ID that is associated with organization
            $results = pg_query("Select p.first_name, p.last_name, lm.organization From professionals p, licenses l, license_managers lm Where l.manager_id = $id and  lm.manager_id = $id and p.license_key = l.license_key"); 
            while($row = pg_fetch_array($results)) {
            ?>
                <tr>
                    <td><?php echo $row['first_name']?> <?php echo $row['last_name']?></td>
                    <td><?php echo $row['organization']?></td>
                    <td><button type="submit" class="btn">Delete</button></td>
                </tr>

            <?php
            }
            ?>
            </tbody>
  </table>
  </div>

                <footer class="container-fluid text-center">
                  <p>True Course Life Ã‚Â© 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc.
                True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks.</p>
                </footer>
    </body>
</html>

<?php endif; ?>
