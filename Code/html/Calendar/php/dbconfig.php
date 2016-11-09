
<?php
//db details
class DBConnection{
        function getConnection(){
                $dbHost = 'localhost';
                $dbUsername = 'postgres';
                $dbPassword = 'SaltyGroundhogs';
                $dbName = 'maindb';

                //Connect and select the database
                $db = new pg_connect($dbHost, $dbUsername, $dbPassword, $dbName);

                if ($db->connect_error) {
                    die("Connection failed: " . $db->connect_error);
                }
        }
}
?>
~

