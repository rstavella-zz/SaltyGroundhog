<!--
Credit to the Layout with the shaded Border
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/

Code written by the Salty Groundhogs Team
Senior Project
True Course Website
This page allows a professional to add a new Client
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
 <title>Create Client Profile</title>
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
        <li><a href="home.php"><img src="true.jpg" class="img-rounded"  width="70" height="30"></a></li>
        <li><a href="clientPage.php">Clients</a></li>
        <li><a href="professionalPage.php">Professionals</a></li>
        <li class="active"><a href="newClientPage.php">Add Client</a></li>
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
	<!-- This page displays the create profile page -->
                <div class="header w3ls">
                        <h1>Create Client Profile</h1>
                </div>
                        <div class="main">
                                <div class="main-section agile">
                                        <div class="login-form">
                                                <form action="newClientPage.php" method="post">
                                                        <ul>
                                                                 <li class="text-info">First Name *</li>
                                                                 <li><input type="text" name="first_name" placeholder="First Name" required></li>
                                                                 <div class="clear"></div>

                                                                 <li class="text-info">Last Name *</li>
                                                                 <li><input type="text" name="last_name" placeholder="Last Name" required></li>
                                                                 <div class="clear"></div>

                                                         </ul>
                                                         <ul>
                                                                 <li class="text-info">Street Address *</li>
                                                                 <li><input type="text" name="street_address" placeholder="Street Address" required></li>
                                                                 <div class="clear"></div>

                                                                 <li class="text-info">City *</li>
                                                                 <li><input type="text" name="city" placeholder="City" required></li>
                                                                 <div class="clear"></div>

                                                                 <li class="text-info">State *</li>
                                                                 <li class="se"><select class="form-dropdown" id="state" name="state" required>
                                                                        <option value="" selected="selected"></option>
                                                                        <option value="Alabama">Alabama</option>
                                                                        <option value="Alaska">Alaska</option>
                                                                        <option value="Arizona">Arizona</option>
                                                                        <option value="Arkansas">Arkansas</option>
                                                                        <option value="California">California</option>
                                                                        <option value="Colorado">Colorado</option>
                                                                        <option value="Connecticut">Connecticut</option>
                                                                        <option value="Delaware">Delaware</option>
                                                                        <option value="District of Columbia">District Of Columbia</option>
                                                                        <option value="Florida">Florida</option>
                                                                        <option value="Georgia">Georgia</option>
                                                                        <option value="Hawaii">Hawaii</option>
                                                                        <option value="Idaho">Idaho</option>
                                                                        <option value="Illinois">Illinois</option>
                                                                        <option value="Indiana">Indiana</option>
                                                                        <option value="Iowa">Iowa</option>
                                                                        <option value="Kansas">Kansas</option>
                                                                        <option value="Kentucky">Kentucky</option>
                                                                        <option value="Louisiana">Louisiana</option>
                                                                        <option value="Maine">Maine</option>
                                                                        <option value="Maryland">Maryland</option>
                                                                        <option value="Massachusetts">Massachusetts</option>
                                                                        <option value="Michigan">Michigan</option>
                                                                        <option value="Minnesota">Minnesota</option>
                                                                        <option value="Mississippi">Mississippi</option>
                                                                        <option value="Missouri">Missouri</option>
                                                                        <option value="Montana">Montana</option>
                                                                        <option value="Nebraska">Nebraska</option>
                                                                        <option value="Nevada">Nevada</option>
                                                                        <option value="New Hampshire">New Hampshire</option>
                                                                        <option value="New Jersey">New Jersey</option>
                                                                        <option value="New Mexico">New Mexico</option>
                                                                        <option value="New York">New York</option>
                                                                        <option value="North Caronlina">North Carolina</option>
                                                                        <option value="North Dakota">North Dakota</option>
                                                                        <option value="Ohio">Ohio</option>
                                                                        <option value="Oklahoma">Oklahoma</option>
                                                                        <option value="Oregon">Oregon</option>
                                                                        <option value="Pennsylvania">Pennsylvania</option>
                                                                        <option value="Rhode Island">Rhode Island</option>
                                                                        <option value="South Caronlina">South Carolina</option>
                                                                        <option value="South Dakota">South Dakota</option>
                                                                        <option value="Tennessee">Tennessee</option>
                                                                        <option value="Texas">Texas</option>
                                                                        <option value="Utah">Utah</option>
                                                                        <option value="Vermont">Vermont</option>
                                                                        <option value="Virginia">Virginia</option>
                                                                        <option value="Washington">Washington</option>
                                                                        <option value="West Virginia">West Virginia</option>
                                                                        <option value="Wisconsin">Wisconsin</option>
                                                                        <option value="Wyoming">Wyoming</option>
                                                                  </select></li>
                                                                 <div class="clear"></div>

                                                                 <li class="text-info">Country *</li>
                                                                 <li class="se"><select class="form-dropdown" id="country" name="country" required>
                                                                        <option value="" selected="selected"></option>
                                                                        <option value="United States" >United States</option>
                                                                        <option value="United Kingdom" >United Kingdom</option>
                                                                        <option value="Australia" >Australia</option>
                                                                        <option value="Canada" >Canada</option>
                                                                        <option value="France" >France</option>
                                                                        <option value="New Zealand" >New Zealand</option>
                                                                        <option value="India" >India</option>
                                                                        <option value="Brazil" >Brazil</option>
                                                                        <option value="Afghanistan" >Afghanistan</option>
                                                                        <option value="Ãƒâ€¦land Islands" >Ãƒâ€¦land Islands</option>
                                                                        <option value="Albania" >Albania</option>
                                                                        <option value="Algeria" >Algeria</option>
                                                                        <option value="American Samoa" >American Samoa</option>
                                                                        <option value="Andorra" >Andorra</option>
                                                                        <option value="Angola" >Angola</option>
                                                                        <option value="Anguilla" >Anguilla</option>
                                                                        <option value="Antarctica" >Antarctica</option>
                                                                        <option value="Antigua and Barbuda" >Antigua and Barbuda</option>
                                                                        <option value="Argentina" >Argentina</option>
                                                                        <option value="Armenia" >Armenia</option>
                                                                        <option value="Aruba" >Aruba</option>
                                                                        <option value="Austria" >Austria</option>
                                                                        <option value="Azerbaijan" >Azerbaijan</option>
                                                                        <option value="Bahamas" >Bahamas</option>
                                                                        <option value="Bahrain" >Bahrain</option>
                                                                        <option value="Bangladesh" >Bangladesh</option>
                                                                        <option value="Barbados" >Barbados</option>
                                                                        <option value="Belarus" >Belarus</option>
                                                                        <option value="Belgium" >Belgium</option>
                                                                        <option value="Belize" >Belize</option>
                                                                        <option value="Benin" >Benin</option>
                                                                        <option value="Bermuda" >Bermuda</option>
                                                                        <option value="Bhutan" >Bhutan</option>
                                                                        <option value="Bolivia" >Bolivia</option>
                                                                        <option value="Botswana" >Botswana</option>
                                                                        <option value="Brunei Darussalam" >Brunei Darussalam</option>
                                                                        <option value="Bulgaria" >Bulgaria</option>
                                                                        <option value="Burkina Faso" >Burkina Faso</option>
                                                                        <option value="Burundi" >Burundi</option>
                                                                        <option value="Cambodia" >Cambodia</option>
                                                                        <option value="Cameroon" >Cameroon</option>
                                                                        <option value="Cape Verde" >Cape Verde</option>
                                                                        <option value="Cayman Islands" >Cayman Islands</option>
                                                                        <option value="Chad" >Chad</option>
                                                                        <option value="Chile" >Chile</option>
                                                                        <option value="China" >China</option>
                                                                        <option value="Colombia" >Colombia</option>
                                                                        <option value="Cook Islands" >Cook Islands</option>
                                                                        <option value="Costa Rica" >Costa Rica</option>
                                                                        <option value="Cocircte dIvoire" >Cocircte dIvoire</option>
                                                                        <option value="Croatia" >Croatia</option>
                                                                        <option value="Cuba" >Cuba</option>
                                                                        <option value="Cyprus" >Cyprus</option>
                                                                        <option value="Czech Republic" >Czech Republic</option>
                                                                        <option value="Denmark" >Denmark</option>
                                                                        <option value="Djibouti" >Djibouti</option>
                                                                        <option value="Dominica" >Dominica</option>
                                                                        <option value="Dominican Republic" >Dominican Republic</option>
                                                                        <option value="East Timor" >East Timor</option>
                                                                        <option value="Ecuador" >Ecuador</option>
                                                                        <option value="Egypt" >Egypt</option>
                                                                        <option value="El Salvador" >El Salvador</option>
                                                                        <option value="Equatorial Guinea" >Equatorial Guinea</option>
                                                                        <option value="Eritrea" >Eritrea</option>
                                                                        <option value="Estonia" >Estonia</option>
                                                                        <option value="Ethiopia" >Ethiopia</option>
                                                                        <option value="Faroe Islands" >Faroe Islands</option>
                                                                        <option value="Fiji" >Fiji</option>
                                                                        <option value="Finland" >Finland</option>
                                                                        <option value="Gabon" >Gabon</option>
                                                                        <option value="Gambia" >Gambia</option>
                                                                        <option value="Georgia" >Georgia</option>
                                                                        <option value="Germany" >Germany</option>
                                                                        <option value="Ghana" >Ghana</option>
                                                                        <option value="Gibraltar" >Gibraltar</option>
                                                                        <option value="Greece" >Greece</option>
                                                                        <option value="Grenada" >Grenada</option>
                                                                        <option value="Guatemala" >Guatemala</option>
                                                                        <option value="Guinea" >Guinea</option>
                                                                        <option value="Guinea-Bissau" >Guinea-Bissau</option>
                                                                        <option value="Guyana" >Guyana</option>
                                                                        <option value="Haiti" >Haiti</option>
                                                                        <option value="Honduras" >Honduras</option>
                                                                        <option value="Hong Kong" >Hong Kong</option>
                                                                        <option value="Hungary" >Hungary</option>
                                                                        <option value="Iceland" >Iceland</option>
                                                                        <option value="Indonesia" >Indonesia</option>
                                                                        <option value="Iran" >Iran</option>
                                                                        <option value="Iraq" >Iraq</option>
                                                                        <option value="Ireland" >Ireland</option>
                                                                        <option value="Israel" >Israel</option>
                                                                        <option value="Italy" >Italy</option>
                                                                        <option value="Jamaica" >Jamaica</option>
                                                                        <option value="Japan" >Japan</option>
                                                                        <option value="Jordan" >Jordan</option>
                                                                        <option value="Kazakhstan" >Kazakhstan</option>
                                                                        <option value="Kenya" >Kenya</option>
                                                                        <option value="Kiribati" >Kiribati</option>
                                                                        <option value="North Korea" >North Korea</option>
                                                                        <option value="South Korea" >South Korea</option>
                                                                        <option value="Kuwait" >Kuwait</option>
                                                                        <option value="Kyrgyzstan" >Kyrgyzstan</option>
                                                                        <option value="Laos" >Laos</option>
                                                                        <option value="Latvia" >Latvia</option>
                                                                        <option value="Lebanon" >Lebanon</option>
                                                                        <option value="Lesotho" >Lesotho</option>
                                                                        <option value="Liberia" >Liberia</option>
                                                                        <option value="Libya" >Libya</option>
                                                                        <option value="Liechtenstein" >Liechtenstein</option>
                                                                        <option value="Lithuania" >Lithuania</option>
                                                                        <option value="Luxembourg" >Luxembourg</option>
                                                                        <option value="Macedonia" >Macedonia</option>
                                                                        <option value="Madagascar" >Madagascar</option>
                                                                        <option value="Malawi" >Malawi</option>
                                                                        <option value="Malaysia" >Malaysia</option>
                                                                        <option value="Maldives" >Maldives</option>
                                                                        <option value="Mali" >Mali</option>
                                                                        <option value="Malta" >Malta</option>
                                                                        <option value="Marshall Islands" >Marshall Islands</option>
                                                                        <option value="Mauritania" >Mauritania</option>
                                                                        <option value="Mauritius" >Mauritius</option>
                                                                        <option value="Mexico" >Mexico</option>
                                                                        <option value="Micronesia" >Micronesia</option>
                                                                        <option value="Moldova" >Moldova</option>
                                                                        <option value="Monaco" >Monaco</option>
                                                                        <option value="Mongolia" >Mongolia</option>
                                                                        <option value="Montenegro" >Montenegro</option>
                                                                        <option value="Morocco" >Morocco</option>
                                                                        <option value="Mozambique" >Mozambique</option>
                                                                        <option value="Myanmar" >Myanmar</option>
                                                                        <option value="Namibia" >Namibia</option>
                                                                        <option value="Nauru" >Nauru</option>
                                                                        <option value="Nepal" >Nepal</option>
                                                                        <option value="Netherlands" >Netherlands</option>
                                                                        <option value="Curacao" >Curacao</option>
                                                                        <option value="Nicaragua" >Nicaragua</option>
                                                                        <option value="Niger" >Niger</option>
                                                                        <option value="Nigeria" >Nigeria</option>
                                                                        <option value="Norway" >Norway</option>
                                                                        <option value="Oman" >Oman</option>
                                                                        <option value="Pakistan" >Pakistan</option>
                                                                        <option value="Palau" >Palau</option>
                                                                        <option value="Palestine" >Palestine</option>
                                                                        <option value="Panama" >Panama</option>
                                                                        <option value="Papua New Guinea" >Papua New Guinea</option>
                                                                        <option value="Paraguay" >Paraguay</option>
                                                                        <option value="Peru" >Peru</option>
                                                                        <option value="Philippines" >Philippines</option>
                                                                        <option value="Poland" >Poland</option>
                                                                        <option value="Portugal" >Portugal</option>
                                                                        <option value="Puerto Rico" >Puerto Rico</option>
                                                                        <option value="Qatar" >Qatar</option>
                                                                        <option value="Romania" >Romania</option>
                                                                        <option value="Russia" >Russia</option>
                                                                        <option value="Rwanda" >Rwanda</option>
                                                                        <option value="Saint Lucia" >Saint Lucia</option>
                                                                        <option value="Samoa" >Samoa</option>
                                                                        <option value="San Marino" >San Marino</option>
                                                                        <option value="Saudi Arabia" >Saudi Arabia</option>
                                                                        <option value="Senegal" >Senegal</option>
                                                                        <option value="Serbia" >Serbia</option>
                                                                        <option value="Seychelles" >Seychelles</option>
                                                                        <option value="Sierra Leone" >Sierra Leone</option>
                                                                        <option value="Singapore" >Singapore</option>
                                                                        <option value="Sint Maarten" >Sint Maarten</option>
                                                                        <option value="Slovakia" >Slovakia</option>
                                                                        <option value="Slovenia" >Slovenia</option>
                                                                        <option value="Solomon Islands" >Solomon Islands</option>
                                                                        <option value="Somalia" >Somalia</option>
                                                                        <option value="South Africa" >South Africa</option>
                                                                        <option value="Spain" >Spain</option>
                                                                        <option value="Sri Lanka" >Sri Lanka</option>
                                                                        <option value="Sudan" >Sudan</option>
                                                                        <option value="Suriname" >Suriname</option>
                                                                        <option value="Swaziland" >Swaziland</option>
                                                                        <option value="Sweden" >Sweden</option>
                                                                        <option value="Switzerland" >Switzerland</option>
                                                                        <option value="Syria" >Syria</option>
                                                                        <option value="Taiwan" >Taiwan</option>
                                                                        <option value="Tajikistan" >Tajikistan</option>
                                                                        <option value="Tanzania" >Tanzania</option>
                                                                        <option value="Thailand" >Thailand</option>
                                                                        <option value="Togo" >Togo</option>
                                                                        <option value="Tonga" >Tonga</option>
                                                                        <option value="Tunisia" >Tunisia</option>
                                                                        <option value="Turkey" >Turkey</option>
                                                                        <option value="Turkmenistan" >Turkmenistan</option>
                                                                        <option value="Tuvalu" >Tuvalu</option>
                                                                        <option value="Uganda" >Uganda</option>
                                                                        <option value="Ukraine" >Ukraine</option>
                                                                        <option value="Uruguay" >Uruguay</option>
                                                                        <option value="Uzbekistan" >Uzbekistan</option>
                                                                        <option value="Vanuatu" >Vanuatu</option>
                                                                        <option value="Vatican City" >Vatican City</option>
                                                                        <option value="Venezuela" >Venezuela</option>
                                                                        <option value="Vietnam" >Vietnam</option>
                                                                        <option value="Virgin Islands, British" >Virgin Islands, British</option>
                                                                        <option value="Virgin Islands, U.S." >Virgin Islands, U.S.</option>
                                                                        <option value="Yemen" >Yemen</option>
                                                                        <option value="Zambia" >Zambia</option>
                                                                        <option value="Zimbabwe" >Zimbabwe</option>
                                                                  </select></li>
                                                                 <div class="clear"></div>

                                                                 <li class="text-info">Zip Code *</li>
                                                                 <li><input type="text" name="zipcode" maxlength="5" placeholder="Zip Code" required></li>
                                                                 <div class="clear"></div>

                                                         </ul>
                                                         <ul>
                                                                 <li class="text-info">Home Phone *</li>
                                                                 <li><input type="text" name="home_phone" maxlength="10" placeholder="Home Phone EX: 1234567890" required></li>
                                                                 <div class="clear"></div>

                                                                 <li class="text-info">Cell Phone *</li>
                                                                 <li><input type="text" name="cell_phone" maxlength="10" placeholder="Cell Phone EX: 1234567890" required></li>
                                                                 <div class="clear"></div>

                                                                 <li class="text-info">Work Phone *</li>
                                                                 <li><input type="text" name="work_phone" maxlength="10" placeholder="Work Phone EX: 1234567890" required></li>
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
                                                                 <li class="text-info">Marital Status *</li>
                                                                 <li class="se"><select class="form-dropdown" id="martital_status" name="martital_status" required>
                                                                        <option value="" selected="selected"></option>
                                                                        <option value="Single" >Single</option>
                                                                        <option value="Married" >Married</option>
                                                                        <option value="Divorced" >Divorced</option>
                                                                        <option value="Widowed" >Widowed</option>
                                                                  </select></li>
                                                                 <div class="clear"></div>
                                                         </ul>
							 <ul>
							 <li class="text-info">Birthday *</li>
                                                            <li class="se"> 
								<select class="form-dropdown" id="dob_month" name="dob_month" required>
									<option value="">Month</option>
                                                                        <option value="01">January</option>
                                                                        <option value="02">Febuary</option>
                                                                        <option value="03">March</option>
                                                                        <option value="04">April</option>
                                                                        <option value="05">May</option>
                                                                        <option value="06">June</option>
                                                                        <option value="07">July</option>
                                                                        <option value="08">August</option>
                                                                        <option value="09">September</option>
                                                                        <option value="10">October</option>
                                                                        <option value="11">November</option>
                                                                        <option value="12">December</option>
                                                                 </select>
                                                                 <select class="form-dropdown" id="dob_day" name="dob_day" required>
                                                                        <option value="">Day</option>
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
                                                                 <select class="form-dropdown" id="dob_year" name="dob_year" required>
                                                                        <option value="">Year</option>
                                                                        <option value="2016">2016</option>
                                                                        <option value="2015">2015</option>
                                                                        <option value="2014">2014</option>
                                                                        <option value="2013">2013</option>
                                                                        <option value="2012">2012</option>
                                                                        <option value="2011">2011</option>
                                                                        <option value="2010">2010</option>
                                                                        <option value="2009">2009</option>
                                                                        <option value="2008">2008</option>
                                                                        <option value="2007">2007</option>
                                                                        <option value="2006">2006</option>
                                                                        <option value="2005">2005</option>
                                                                        <option value="2004">2004</option>
                                                                        <option value="2003">2003</option>
                                                                        <option value="2002">2002</option>
                                                                        <option value="2001">2001</option>
                                                                        <option value="2000">2000</option>
                                                                        <option value="1999">1999</option>
                                                                        <option value="1998">1998</option>
                                                                        <option value="1997">1997</option>
                                                                        <option value="1996">1996</option>
                                                                        <option value="1995">1995</option>
                                                                        <option value="1994">1994</option>
                                                                        <option value="1993">1993</option>
                                                                        <option value="1992">1992</option>
                                                                        <option value="1991">1991</option>
                                                                        <option value="1990">1990</option>
                                                                        <option value="1989">1989</option>
                                                                        <option value="1988">1988</option>
                                                                        <option value="1987">1987</option>
                                                                        <option value="1986">1986</option>
                                                                        <option value="1985">1985</option>
                                                                        <option value="1984">1984</option>
                                                                        <option value="1983">1983</option>
                                                                        <option value="1982">1982</option>
                                                                        <option value="1981">1981</option>
                                                                        <option value="1980">1980</option>
                                                                        <option value="1979">1979</option>
                                                                        <option value="1978">1978</option>
                                                                        <option value="1977">1977</option>
                                                                        <option value="1976">1976</option>
                                                                        <option value="1975">1975</option>
                                                                        <option value="1974">1974</option>
                                                                        <option value="1973">1973</option>
                                                                        <option value="1972">1972</option>
                                                                        <option value="1971">1971</option>
                                                                        <option value="1970">1970</option>
                                                                        <option value="1969">1969</option>
                                                                        <option value="1968">1968</option>
                                                                        <option value="1967">1967</option>
                                                                        <option value="1966">1966</option>
                                                                        <option value="1965">1965</option>
                                                                        <option value="1964">1964</option>
                                                                        <option value="1963">1963</option>
                                                                        <option value="1962">1962</option>
                                                                        <option value="1961">1961</option>
                                                                        <option value="1960">1960</option>
                                                                        <option value="1959">1959</option>
                                                                        <option value="1958">1958</option>
                                                                        <option value="1957">1957</option>
                                                                        <option value="1956">1956</option>
                                                                        <option value="1955">1955</option>
                                                                        <option value="1954">1954</option>
                                                                        <option value="1953">1953</option>
                                                                        <option value="1952">1952</option>
                                                                        <option value="1951">1951</option>
                                                                        <option value="1950">1950</option>
                                                                        <option value="1949">1949</option>
                                                                        <option value="1948">1948</option>
                                                                        <option value="1947">1947</option>
                                                                        <option value="1946">1946</option> <option value="1945">1945</option> <option value="1944">1944</option> <option value="1943">1943</option> <option value="1942">1942</option> <option value="1941">1941</option> <option value="1940">1940</option> <option value="1939">1939</option> <option value="1938">1938</option> <option value="1937">1937</option> <option value="1936">1936</option> <option value="1935">1935</option> <option value="1934">1934</option> <option value="1933">1933</option> <option value="1932">1932</option> <option value="1931">1931</option> <option value="1930">1930</option> <option value="1929">1929</option> <option value="1928">1928</option> <option value="1927">1927</option> <option value="1926">1926</option> <option value="1925">1925</option> <option value="1924">1924</option> <option value="1923">1923</option> <option value="1922">1922</option> <option value="1921">1921</option> <option value="1920">1920</option> <option value="1919">1919</option> <option value="1918">1918</option> <option value="1917">1917</option> <option value="1916">1916</option> <option value="1915">1915</option>
                                                                  </select></li>
                                                                 <div class="clear"></div>

                                                         </ul>

							  <ul>
                                                                  <li class="text-info">Prefered Call Time *</li> <li class="se">
                                                                  <select class="form-dropdown" id="pref_call_time" name="pref_call_time" required>
                                                                        <option value="" selected="selected"></option>
                                                                        <option value="Early Morning" >Early Morning</option>
                                                                        <option value="Morning" >Morning</option>
                                                                        <option value="Late Morning" >Late Morning</option>
                                                                        <option value="Early Afternoon" >Early Afternoon</option>
                                                                        <option value="Afternoon" >Afternoon</option>
                                                                        <option value="Late Afternoon" >Late Afternoon</option>
                                                                        <option value="Early Evening" >Early Evening</option>
                                                                        <option value="Evening" >Evening</option>
                                                                        <option value="Late Evening">Late Evening</option>
                                                                        </select></li>
                                                                 <div class="clear"></div>
                                                        </ul>
                                                        <ul>
								<li class="text-info">Self Awareness Practice *</li>
									<li><input type="text" name="self_awareness_practice" placeholder="Yoga, Meditation, Prayer, etc." required></li>
                                                                 <div class="clear"></div>
                                                        </ul>
                                                         <ul>
                                                                 <li class="text-info">Email *</li>
                                                                 <li><input type="text" name="email" placeholder="Email" required></li>
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
    <p>True Course Life © 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc.
       True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks. </p>
</footer>

<?php
	if(isset($_POST['submit'])){

        $conn_string = "host=10.10.7.159 port=5432 dbname=maindb user=postgres password=SaltyGroudhogs";
        $dbconn4 = pg_connect($conn_string);

        $prof_id = $_SESSION['prof_id'];
        $active_status = "Active";

        if(isset($_POST['dob_month'])){ $month = $_POST['dob_month']; }
        if(isset($_POST['dob_day'])){ $day = $_POST['dob_day']; }
        if(isset($_POST['dob_year'])){ $year = $_POST['dob_year']; }

        $month = $_POST['dob_month'];
        $day = $_POST['dob_day'];
        $year = $_POST['dob_year'];
        $dob =  $month."-".$day."-".$year;

        if(isset($_POST['first_name'])){ $first_name = $_POST['first_name']; }
        if(isset($_POST['last_name'])){ $last_name = $_POST['last_name']; }
        if(isset($_POST['street_address'])){ $street_address = $_POST['street_address']; }
        if(isset($_POST['zipcode'])){ $zipcode = $_POST['zipcode']; }
        if(isset($_POST['state'])){ $state = $_POST['state']; }
        if(isset($_POST['city'])){ $city = $_POST['city']; }
        if(isset($_POST['country'])){ $country = $_POST['country']; }
        if(isset($_POST['home_phone'])){ $home_phone = $_POST['home_phone']; }
	if(isset($_POST['work_phone'])){ $work_phone = $_POST['work_phone']; } 
        if(isset($_POST['cell_phone'])){ $cell_phone = $_POST['cell_phone']; } 
	if(isset($_POST['martital_status'])){ $martital_status = $_POST['martital_status']; }
        if(isset($_POST['email'])){ $email = $_POST['email']; }
        if(isset($_POST['gender'])){ $gender = $_POST['gender']; }
        if(isset($_POST['pref_call_time'])){ $pref_call_time = $_POST['pref_call_time']; }
        if(isset($_POST['self_awareness_practice'])){ $self_awareness_practice = $_POST['self_awareness_practice']; }
        $custr_id = "00";
        $relation = "null";
	$custpic_url = "notUploaded";

	#This strips input of any characters to stop attacks 
	$first_name = preg_replace("/[^a-zA-Z0-9\s]/", "", $first_name);
	$last_name = preg_replace("/[^a-zA-Z0-9\s]/", "", $last_name);
	$street_address = preg_replace("/[^a-zA-Z0-9\s]/", "", $street_address);
	$zipcode = preg_replace("/[^0-9\s]/", "",$zipcode);
	$city = preg_replace("/[^a-zA-Z0-9\s]/", "", $city);
	$home_phone = preg_replace("/[^0-9\s]/","", $home_phone);
	$work_phone = preg_replace("/[^0-9\s]/","", $work_phone);
	$cell_phone = preg_replace("/[^0-9\s]/","", $cell_phone);
	$self_awareness_practice = preg_replace("/[^a-zA-Z0-9\s]/", "", $self_awareness_practice);
	$email = preg_replace("/[^@.a-zA-Z0-9\s]/", "", $email);	

       	$query = "INSERT INTO customers VALUES (nextval('customers_cust_id_seq'), '" . $custr_id . "','" . $relation ."', '" . $first_name . "','" . $last_name . "',
                        '" . $active_status . "', '" . $street_address . "','" . $zipcode . "', '" . $state . "', '" . $city . "', '" . $country . "', '" . $home_phone . "',
                        '" . $work_phone . "', '" .$cell_phone . "', '" . $gender . "', '" . $martital_status . "', '" . $email . "','" . $dob . "', '" . $custpic_url . "')";
	
       	$query2 = "INSERT INTO customer_bios (cust_id, pref_call_time, self_awareness_practice) VALUES ((currval('customers_cust_id_seq')), '" . $pref_call_time . "', '" . $self_awareness_practice . "')";
       	$query3 = "INSERT INTO clientprofessional (prof_id, cust_id) VALUES ('" . $prof_id . "', (currval('customers_cust_id_seq')))";

       	$result = pg_query($dbconn4, $query);
      	$result2 = pg_query($dbconn4, $query2);
	$result3 = pg_query($dbconn4, $query3);


        if (!$result || !$result2 || !$result3) {
            $errormessage = pg_last_error();
             $message = "Error with entry. Please check fields.";
             echo "<script type='text/javascript'>alert('$message');</script>";
            exit();
        }else{
            $message = "New Client Successfully Added!!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
     }
        pg_close();
?>

</body>
</html>

<?php endif; ?>

