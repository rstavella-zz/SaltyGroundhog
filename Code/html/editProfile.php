
<?php
    error_reporting(-1); // display all faires
        ini_set('display_errors', 1);  // ensure that faires will be seen
        ini_set('display_startup_errors', 1); // display faires that didn't born

include('loginValidate.php');
session_start();
if(!isset( $_SESSION['prof_id'])){
  load('index.php');
}
else if( isset( $_SESSION['prof_id'])) :
$prof_id = $_SESSION['prof_id'];
 ?>

<!DOCTYPE HTML>
<html>
<head>
 <title>Edit Profile</title>
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
        <li><a href="home.php"><img src="true.jpg" class="img-rounded" alt="Home" width="70" height="30"> </a></li>
        <li><a href="clientPage.php">Clients</a></li>
        <li><a href="professionalPage.php">Professionals</a></li>
        <li><a href="\Calendar\sample.php">Calendar</a></li>
        <li><a href="newClientPage.php">Add Client</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="myProfile.php"><span class="glyphicon glyphicon-user"></span></a></li>
        <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span></a></li>
        <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<body>
<?php
     error_reporting(-1); // display all faires
        ini_set('display_errors', 1);  // ensure that faires will be seen
        ini_set('display_startup_errors', 1); // display faires that didn't born

$conn_string = "host=10.10.7.159 port=5432 dbname=maindb user=postgres password=SaltyGroudhogs";
$dbconn4 = pg_connect($conn_string);

if(isset($_SESSION['prof_id']))
{

$query = pg_query("SELECT p.prof_id, p.First_Name, p.Last_Name, p.Street_Address, p.Zipcode, p.state, p.city, p.country,
                                                               p.phone_number, p.gender, p.email, p.bio
                                                               FROM professionals as p
                                                               WHERE p.prof_id = '$prof_id'");



$results=pg_fetch_array($query);
?>
                <!---header--->
                <div class="header w3ls">
                        <h1>Edit Professional Profile</h1>
                </div>
                <!---header--->
                <!---main--->
                        <div class="main">
                                <div class="main-section agile">
                                        <div class="login-form">
                                                <form action="editProfile.php?id=<?php echo $prof_id ?>" method="post">
                                                        <ul>
                                                                 <li class="text-info">First Name: </li>
                                                                 <li><input type="text" name="first_name" value="<?php echo $results['first_name']?>"></li>
                                                                 <div class="clear"></div>

                                                                 <li class="text-info">Last Name: </li>
                                                                 <li><input type="text" name="last_name" value="<?php echo $results['last_name']?>"></li>
                                                                 <div class="clear"></div>

                                                         </ul>
                                                         <ul>
                                                                 <li class="text-info">Bio: </li>
                                                                 <li><input type="textarea" name="bio" value="<?php echo $results['bio']?>"></li>
                                                                 <div class="clear"></div>
                                                         </ul>
                                                                                                                  <ul>
                                                                 <li class="text-info">Street Address: </li>
                                                                 <li><input type="text" name="street_address" value="<?php echo $results['street_address']; ?>"></li>
                                                                 <div class="clear"></div>

                                                                 <li class="text-info">City: </li>
                                                                 <li><input type="text" name="city" value="<?php echo $results['city']?>"></li>
                                                                 <div class="clear"></div>

                                                                 <li class="text-info">State: </li>
                                                                 <li class="se"><select class="form-dropdown" id="state" name="state">
                                                                        <option value="<?php echo $results['state'];?>" selected="selected"><?php echo $results['state'];?></option>
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

                                                                 <li class="text-info">Country: </li>
                                                                 <li class="se"><select class="form-dropdown" id="country" name="country">
                                                                        <option value="<?php echo $results['country'];?>" selected="selected"><?php echo $results['country'];?></option>
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

                                                                 <li class="text-info">Zip Code: </li>
                                                                 <li><input type="text" name="zipcode" value="<?php echo $results['zipcode'];?>"></li>
                                                                 <div class="clear"></div>

                                                         </ul>
                                                         <ul>
                                                                 <li class="text-info">Phone Number: </li>
                                                                 <li><input type="text" name="phone_number" value="<?php echo $results['phone_number'];?>"></li>
                                                                 <div class="clear"></div>
                                                        </ul>
                                                        <ul>
                                                                 <li class="text-info">Gender: </li>
                                                                 <li class="se"><select class="form-dropdown" id="gender" name="gender">
                                                                        <option value="<?php echo $results['gender'];?>" selected="selected"><?php echo $results['gender'];?></option>
                                                                        <option value="Female" >Female</option>
                                                                        <option value="Male" >Male</option>
                                                                  </select></li>
                                                                 <div class="clear"></div>
                                                         </ul>
                                                         <ul>
							 <li><input type=button class="btn btn-primary" onClick="location.href='uploadProfImage.php?id=<?php echo $prof_id ?>'" value='Upload Professional Profile Photo'></li><br>
 
							</ul>
							 <ul>
                                                                <li><input type="submit" class="btn btn-primary" name="submit" value="Update"></li>
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

 if(isset($_POST['submit']))
	{
	 $prof_id = $_SESSION['prof_id'];

	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$street_address=$_POST['street_address'];
	$zipcode=$_POST['zipcode'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$country=$_POST['country'];
	$phone_number=$_POST['phone_number'];
	$gender=$_POST['gender'];
	$bio=$_POST['bio'];

	$query1=pg_query("update professionals set first_name='$first_name', last_name='$last_name', street_address='$street_address', city='$city', state='$state', country='$country', phone_number='$phone_number', gender='$gender', bio='$bio'  where prof_id='$prof_id'");

        if (!$query1) {
            $errormessage = pg_last_error();
             $message = "Error with entry. Please check fields.";
             echo "<script type='text/javascript'>alert('$message');</script>";

            exit();
        }else{
            $message = "These values were updated into the database";
            echo "<script type='text/javascript'>alert('$message'); document.location.href = 'myProfile.php';</script>";
        }
}
         }
?>

</body>
</html>

<?php endif; ?>
