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

<html lang="en">
<head>
<title>Customer Profile</title>
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
<SCRIPT language="javascript">
                function addRow(tableID) {

                        var table = document.getElementById(tableID);

                        var rowCount = table.rows.length;
                        var row = table.insertRow(rowCount);

                        var colCount = table.rows[0].cells.length;

                        for(var i=0; i<colCount; i++) {

                                var newcell     = row.insertCell(i);

                                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                                //alert(newcell.childNodes);
                                switch(newcell.childNodes[0].type) {
                                        case "text":
                                                        newcell.childNodes[0].value = "";
                                                        break;
                                        case "checkbox":
                                                        newcell.childNodes[0].checked = false;
                                                        break;
                                        case "select-one":
                                                        newcell.childNodes[0].selectedIndex = 0;
                                                        break;
                                }
                        }
                }

                function deleteRow(tableID) {
                        try {
                        var table = document.getElementById(tableID);
                        var rowCount = table.rows.length;

                        for(var i=0; i<rowCount; i++) {
                                var row = table.rows[i];
                                var chkbox = row.cells[0].childNodes[0];
                                if(null != chkbox && true == chkbox.checked) {
                                        if(rowCount <= 1) {
                                                alert("Cannot delete all the rows.");
                                                break;
                                        }
                                        table.deleteRow(i);
                                        rowCount--;
                                        i--;
                                }


                        }
                        }catch(e) {
                                alert(e);
                        }
                }

        </SCRIPT>
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
        <li><a href="home.html"><img src="http://10.10.7.164/img/true.jpg" class="img-rounded"  width="70" height="30"></a></li>
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

<body id="public" onorientationchange="window.scrollTo(0, 1)">

<div id="no-more-tables">
<table align="center" class="table-condensed cf" style="border-collapse:separate; border-spacing:1em; border-top: none !important;">
<tbody>
<?php
    $connect = pg_connect("host=10.10.7.159 dbname=maindb user=postgres password=SaltyGroundhogs");
    $identity=$_GET['id'];
    if (!$connect) {
	die(pg_error());
    }
    #Pass in admin ID that is associated with organization
    $results = pg_query("SELECT cu.Cust_ID, cu.First_Name, cu.Last_Name, cu.Active_Status, cu.Street_Address, cu.Zipcode, 
								cu.state, cu.city, cu.country, cu.home_phone, cu.work_phone, cu.cell_phone, cu.gender, cu.martital_status, 
								cu.email, cu.dob, cb.fav_food, cb.fav_book, cb.pref_call_time, cb.self_awareness_practice, e.school_name, e.degree,
								e.grad_year, j.job_status, j.income, j.job_title, j.employer, hl.hobby_name, h.weekly_frequency 
							FROM Customers as cu, customer_bios as cb, education as e, hobbies as h, hobbylist as hl, jobs as j 
							WHERE cu.Cust_ID = '$identity' and cu.Cust_ID = cb.Cust_ID AND cu.Cust_ID = e.Cust_ID AND cu.Cust_ID = j.Cust_ID 
								AND cu.Cust_ID = h.Cust_ID AND h.hobbies_id = hl.hobbies_id");
    while($row = pg_fetch_array($results)) {
    ?>
		<header><h1 align="center"><?php echo $row['first_name']?> <?php echo $row['last_name']?></h1></header><br>
			<tr>
				<td><b>Email</b></td>
				<td><b>Active Status</b></td>
				<td><b>Prefferd Call Time</b></td>
			</tr>
	<tr>
				<td><?php echo $row['email']?></td>
				<td><?php echo $row['active_status']?></td>
				<td><?php echo $row['pref_call_time']?></td>
	</tr>
			<tr>
				<td><b>Address</b></td>
				<td><b>Home Phone</b></td>
				<td><b>Work Phone</b></td>
				<td><b>Mobile Phone</b></td>
			</tr>
			 <tr>
	    <td><?php echo $row['street_address']?><?php echo $row['city']?> <?php echo $row['state']?> <?php echo $row['zipcode']?> <?php echo $row['country']?></td>
	    <td><?php echo $row['home_phone']?></td>
				<td><?php echo $row['work_phone']?></td>
				<td><?php echo $row['cell_phone']?></td>
	</tr>
			<tr>
				<td><b>Gender</b></td>
				<td><b>Martital Status</b></td>
				<td><b>Date of Birth</b></td>
			</tr>
			<tr>
				<td><?php echo $row['gender']?></td>
				<td><?php echo $row['martital_status']?></td>
				<td><?php echo $row['dob']?></td>
			</tr>
			<tr>
				<td><b>Self Awareness Practice</b></td>
				<td><b>Favorite Food</b></td>
				<td><b>Favorite Book</b></td>
			</tr>
			<tr>
				<td><?php echo $row['self_awareness_practice']?></td>
				<td><?php echo $row['fav_food']?></td>
				<td><?php echo $row['fav_book']?></td>
			</tr>
				<tr>
				<td><b>School Name</b></td>
				<td><b>Degree</b></td>
				<td><b>Graduation Year</b></td>
			</tr>
	<tr>
	    <td><?php echo $row['school_name']?></td>
				<td><?php echo $row['degree']?></td>
				<td><?php echo $row['grad_year']?></td>
	</tr>
			<tr>
				<td><b>Job Status</b></td>
				<td><b>Job Title</b></td>
				<td><b>Employeer</b></td>
				<td><b>Income</b></td>
			</tr>
	<tr>
	    <td><?php echo $row['job_status']?></td>
				<td><?php echo $row['job_title']?></td>
				<td><?php echo $row['employer']?></td>
				<td><?php echo $row['income']?></td>
			</tr>
				<tr>
				<td><b>Hobby Name</b></td>
				<td><b>Hobby Frequency</b></td>
			</tr>
	<tr>
	    <td><?php echo $row['hobby_name']?></td>
				<td><?php echo $row['weekly_frequency']?></td>
			</tr>
    <?php
            }
            ?>
            </tbody>
  </table>
  
                <footer class="container-fluid text-center">
                  <p>True Course Life © 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc.
                True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks.</p>
                </footer>
    </body>
</html>

<?php endif; ?>

