<!--
Credit to the Layout with the shaded Border
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/

Code written by the Salty Groundhogs Team
Senior Project
True Course Website
This page allows a professional to upload a profile photo
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
   error_reporting(-1); // display all faires
   ini_set('display_errors', 1);  // ensure that faires will be seen
   ini_set('display_startup_errors', 1); // display faires that didn't born
   if(!isset( $_SESSION['prof_id'])){
     load('index.php');
   }
   else if( isset( $_SESSION['prof_id'])) : ?>

<!DOCTYPE html>
<html>
<body>
<?php
$identity = $_GET['id'];
?>
<form action="uploadProfImage.php?id=<?php echo $identity ?> " method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">

</form>

<html>
<?php
 if(isset($_POST['submit'])){
 $conn_string = "host=10.10.7.159 port=5432 dbname=maindb user=postgres password=SaltyGroudhogs";
 $dbconn4 = pg_connect($conn_string);
 $identity=$_GET['id'];

    error_reporting(-1); // display all faires
        ini_set('display_errors', 1);  // ensure that faires will be seen
        ini_set('display_startup_errors', 1); // display faires that didn't born

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
if($imageFileType != "jpg" && $imageFileType != "JPG"  && $imageFileType != "png" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPEG"
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
         echo "<script type='text/javascript'>alert('$message');</script>";
         $prof_picture_url = $target_dir .  basename( $_FILES["fileToUpload"]["name"]);
         $query = "UPDATE professionals set prof_picture_url='$prof_picture_url' WHERE prof_id='$identity'";
         $result = pg_query($dbconn4, $query);
     if($result){
                header('Location: myProfile.php');
        }else{
         header('Location: uploadProfImage.php?id=' . $identity);
        }

    } else {
        header('Location: uploadProfImage.php?id=' . $identity);
        $message = "Sorry, there was an error uploading your file.";
        echo "<script type='text/javascript'>alert('$message');</script>";

    }
}
}
?>
</body>
</html>

<?php endif; ?>
