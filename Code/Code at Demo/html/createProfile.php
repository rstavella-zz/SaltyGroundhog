
<html lang="en">
<head>
  <title>Create Professional Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
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
      background-color: #555;
      color: white;
      font-size: 10px;
      padding: 15px;
   }
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .row.content {height:auto;}
    }
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


        #no-more-tables td {
        /* Behave like a "row" */
        position: relative;
        padding-left: 50%;
        text-align:left;
        }

        #no-more-tables td:before {
        /* Now like a table header */
        position: absolute;
        /* Top/left values mimic padding */
        top: 6px;
        left: 6px;
        padding-right: 10px;
        white-space: nowrap;
        text-align:left;
        font-weight: bold;
        }

        /*
        Label the data
        */
        #no-more-tables td:before { content: attr(data-title); }
     }
        .table th, .table td {
                border-top: none !important;
                font-size:16px;
                border-collapse:separate;
                 border-spacing:1em;
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
        <li><a href="home.html"><img src="true.jpg" class="img-rounded" alt="Home" width="70" height="30"> </a></li>
        <li><a href="clientPage.php">Clients</a></li>
        <li><a href="professionalPage.php">Professionals</a></li>
        <li><a href="\Calendar\sample.php">Calendar</a></li>
        <li ><a href="newClientPage.php">Add Client</a></li>
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

<div id="container">
<header id="header" class="info">
        <center><h2>Create Profile</h2></center>
        <div></div>
</header>
</div>
<form name="insert" action="newClientPage.php" method="POST">
<div id="no-more-tables">
<table class="table-condensed cf" style="border-collapse:separate; border-spacing:1em; border-top: none !important;">
          <tr>
                                        <td><div class="form-group">
                                                <label for="first_name">First Name:</label>
                                                <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                        </div></td>
                                        <td><div class="form-group">
                                                <label for="last_name">Last Name:</label>
                                                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                        </div></td>
                                  </tr>
                                  <tr>
                                        <td><div class="form-group">
                                                <label for="street_address">Street Address:</label>
                                                <input type="text" class="form-control" name="street_address" placeholder="StreetAddress">
                                        </div></td>
                                        <td><div class="form-group">
                                                <label for="city">City:</label>
                                                <input type="text" class="form-control" name="city" placeholder="City">
                                        </div></td>
                                        <td><div class="form-group">
                                                <label for="state">State:</label>
                                                <select class="form-control" id="state">
                                                         <option value="" selected="selected"></option>
                                                        <option value="AL">Alabama</option>
                                                        <option value="AK">Alaska</option>
                                                        <option value="AZ">Arizona</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="CA">California</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="CT">Connecticut</option>
                                                        <option value="DE">Delaware</option>
                                                        <option value="DC">District Of Columbia</option>
                                                        <option value="FL">Florida</option>
                                                        <option value="GA">Georgia</option>
                                                        <option value="HI">Hawaii</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IN">Indiana</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option>
                                                        <option value="MA">Massachusetts</option>
                                                        <option value="MI">Michigan</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NV">Nevada</option>
                                                        <option value="NH">New Hampshire</option>
                                                        <option value="NJ">New Jersey</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="OH">Ohio</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="OR">Oregon</option>
                                                        <option value="PA">Pennsylvania</option>
                                                        <option value="RI">Rhode Island</option>
                                                        <option value="SC">South Carolina</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="VT">Vermont</option>
                                                        <option value="VA">Virginia</option>
                                                        <option value="WA">Washington</option>
                                                        <option value="WV">West Virginia</option>
                                                        <option value="WI">Wisconsin</option>
                                                        <option value="WY">Wyoming</option>
                                                </select>
                                        </div></td>
                                        <td><div class="form-group">
                                        <label for="country">Country</label>
                                        <select class="form-control" id="Countrys">
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
                                                        <option value="Bosnia and Herzegovina" >Bosnia and Herzegovina</option>
                                                        <option value="Botswana" >Botswana</option>
                                                        <option value="British Indian Ocean Territory" >British Indian Ocean Territory</option>
                                                        <option value="Brunei Darussalam" >Brunei Darussalam</option>
                                                        <option value="Bulgaria" >Bulgaria</option>
                                                        <option value="Burkina Faso" >Burkina Faso</option>
                                                        <option value="Burundi" >Burundi</option>
                                                        <option value="Cambodia" >Cambodia</option>
                                                        <option value="Cameroon" >Cameroon</option>
                                                        <option value="Cape Verde" >Cape Verde</option>
                                                        <option value="Cayman Islands" >Cayman Islands</option>
                                                        <option value="Central African Republic" >Central African Republic</option>
                                                        <option value="Chad" >Chad</option>
                                                        <option value="Chile" >Chile</option>
                                                        <option value="China" >China</option>
                                                        <option value="Colombia" >Colombia</option>
                                                        <option value="Comoros" >Comoros</option>
                                                        <option value="Democratic Republic of the Congo" >Democratic Republic of the Congo</option>
                                                        <option value="Republic of the Congo" >Republic of the Congo</option>
                                                        <option value="Cook Islands" >Cook Islands</option>
                                                        <option value="Costa Rica" >Costa Rica</option>
                                                        <option value="C&ocirc;te dIvoire" >Cocircte dIvoire</option>
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
                                                        <option value="Saint Kitts and Nevis" >Saint Kitts and Nevis</option>
                                                        <option value="Saint Lucia" >Saint Lucia</option>
                                                        <option value="Saint Vincent and the Grenadines" >Saint Vincent and the Grenadines</option>
                                                        <option value="Samoa" >Samoa</option>
                                                        <option value="San Marino" >San Marino</option>
                                                        <option value="Sao Tome and Principe" >Sao Tome and Principe</option>
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
                                                        <option value="Trinidad and Tobago" >Trinidad and Tobago</option>
                                                        <option value="Tunisia" >Tunisia</option>
                                                        <option value="Turkey" >Turkey</option>
                                                        <option value="Turkmenistan" >Turkmenistan</option>
                                                        <option value="Tuvalu" >Tuvalu</option>
                                                        <option value="Uganda" >Uganda</option>
                                                        <option value="Ukraine" >Ukraine</option>
                                                        <option value="United Arab Emirates" >United Arab Emirates</option>
                                                        <option value="United States Minor Outlying Islands" >United States Minor Outlying Islands</option>
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
                                        </select>
                                </div></td>
                                <td><div class="form-group">
                                        <label for="zipcode">Zip Code:</label>
                                        <input type="text" class="form-control" name="zipcode" placeholder="Zip Code">
                                </div></td>
                        </tr>
                        <tr>
                                <td><div class="form-group">
                                        <label for="home_phone">Phone Number</label>
                                        <input type="tel" class="form-control" name="phone_number" placeholder="Phone Number">
                                </div></td>
                        </tr>
                        <tr>
                                <td><div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" name="gender">
                        </tr>
                        <tr>
                                <td><div class="form-group">
                                        <label for="home_phone">Phone Number</label>
                                        <input type="tel" class="form-control" name="phone_number" placeholder="Phone Number">
                                </div></td>
                        </tr>
                        <tr>
                                <td><div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" name="gender">
                                                        <option value="" selected="selected"></option>
                                                        <option value="Female" >Female</option>
                                                        <option value="Male" >Male</option>
                                        </select>
                                </div></td>
                        </tr>
                                  <tr>
                                                <td><div class="form-group">
                                                                <label for="custpic_url">Photo Upload</label>
                                                                <input type="file" class="form-control-file" name="prof_picture_url">
                                                </div></td>
                                         
                                  </tr>
                                  <tr>
                                        <td><input type="submit" name="submit" value="Submit" class="btn btn-primary"> </td>
                                  </tr>
                                  </form>
                </table>


</div><!--container-->
<br>
<footer class="container-fluid text-center">
  <p>True Course Life ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â© 2016. True Course Life and Leadership Development includes True Course Living, Learning, Leading, LLC and True Course Ministries, Inc.
True Course Ministries, True Course Living, Learning, Leading; and True Course Life & Leadership Development are all registered trademarks.</p>
</footer>

<script>
        $("#submit").on("click", function(e) {
    e.preventDefault();
    
    // the rest of your code ...
});
</script>


<?php
        $conn_string = "host=10.10.7.159 port=5432 dbname=maindb user=postgres password=SaltyGroudhogs";
        $dbconn4 = pg_connect($conn_string);

                // Validate
                if ($_POST['first_name'] != ''  && $_POST['last_name'] != '' && $_POST['street_address'] != '' && $_POST['zipcode'] != '' && $_POST['martital_status'] != '' && $_POST['prof_picture_url'] != '') {
                        // Generate date of birth in format of YYYY-mm-dd

                        $query = "INSERT INTO professionals VALUES ('$_POST[first_name]','$_POST[last_name]', '$_POST[street_address]','$_POST[zipcode]', '$_POST[state]', '$_POST[city]', '$_POST[country]', '$_POST[hphone_number]', '$_POST[gender]', '$_POST[email]', '$_POST[prof_picture_url]')";
                        $result = pg_query($dbconn4, $query);
        }

