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
<html lang="en">
<head>
  <title>TC Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style.css" rel="stylesheet" type="text/css" media="all"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="stylecal.css" rel="stylesheet" type="text/css" media="all"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {
      height: 600px;}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
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
        <li class="active"><a href="home.php"><img src="true.jpg" class="img-rounded"  width="70" height="30"> </a></li>
        <li><a href="clientPage.php ">Clients</a></li>
	<li><a href="professionalPage.php">Professionals</a></li>
        <li><a href="\Calendar\sample.php">Calendar</a></li>
	<li><a href="newClientPage.php">Add Client</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="myProfile.php"><span class="glyphicon glyphicon-user"></span></a></li>
        <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

 
<div class="container-fluid">

  <div id="container" class="ltr">
  <header id="header" class="info">
  <center><h1>Home</h1></center>
  <div></div>
  <center><h2>Today's Appointments<h2>
  <div class="login-form">
  <?php
    $connect = pg_connect("host=10.10.7.159 dbname=maindb user=postgres password=SaltyGroundhogs");
    if (!$connect) {
        die(pg_error());
    }
    $date = date("d-m-Y");
    $stringdate = (string)$date;
    $stringdate = '\'' . $stringdate . '\'';
    $results = pg_query("SELECT c.first_name, c.last_name, a.date, a.time, a.categories_id, cat.categories, a.categories_id, cat.categories_id FROM customers as c, professionals as p, appointments as a, categories as cat WHERE p.prof_id = " . $_SESSION['prof_id'] . " AND c.cust_id = a.cust_id AND a.categories_id = cat.categories_id AND a.date = " . $stringdate . " ORDER BY a.time ASC");
      while($row = pg_fetch_array($results)) {
  ?>
  <tr>
  <?php echo "<td>" . $row['first_name'] . $row['last_name']  . '- ' . $row['time'] . ' Event Type: ' . $row['categories'] . "</td><br>"?>
   <?php
   }
  ?>
  </div>
    <div class="calcontainer">

      <div class="calendar">

        <header>        

          <h2>December</h2>

          <a class="btn-prev fontawesome-angle-left" href="#"></a>
          <a class="btn-next fontawesome-angle-right" href="#"></a>

        </header>
        
        <table>
        
          <thead>
            
            <tr>
              
              <td>Su</td>
              <td>Mo</td>
              <td>Tu</td>
              <td>We</td>
              <td>Th</td>
              <td>Fr</td>
              <td>Sa</td>

            </tr>

          </thead>

          <tbody>
            
            <tr>
              <td class="prev-month">26</td>
              <td class="prev-month">27</td>
              <td class="prev-month">28</td>
              <td class="prev-month">29</td>
              <td>1</td>
              <td>2</td>
              <td>3</td>
            </tr>
            <tr>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td class="current-day event">7</td>
              <td>8</td>
              <td>9</td>
              <td class="event">10</td>
            </tr>
            <tr>
              <td>11</td>
              <td>12</td>
              <td>13</td>
              <td>14</td>
              <td>15</td>
              <td>16</td>
              <td>17</td>
            </tr>
            <tr>
              <td>18</td>
              <td>19</td>
              <td>20</td>
              <td class="event">21</td>
              <td>22</td>
              <td>23</td>
              <td>24</td>
            </tr>

            <tr>
              <td>25</td>
              <td>26</td>
              <td>27</td>
              <td>28</td>
              <td>29</td>
              <td>30</td>
              <td>31</td>
            </tr>
            <tr>
              <td class="next-month">1</td>
              <td class="next-month">2</td>
              <td class="next-month">3</td>
              <td class="next-month">4</td>
              <td class="next-month">5</td>
              <td class="next-month">6</td>
              <td class="next-month">7</td>
            </tr>

          </tbody>

        </table>

      </div> <!-- end calendar -->

    </div> <!-- end container -->

  </header>
  <p>

  <br>
  <br>
  <br>
  <br>
  </p>

</body>        

<footer class="container-fluid text-center">
  <p>True Course Life © 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc. 
True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks.</p>
</footer>

</html>

<?php endif; ?>
