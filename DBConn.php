<!--creates a connection to our database ClothingStore-->
<?php
$servername = "localhost";//server name
$username = "AaliyahNicol";//username used to connect to database
$password = "AaliyahNicol";//password for user account
$dbname = "ClothingStore";//database name

$conn = new mysqli($servername, $username, $password, $dbname);//creates connection to database


// Database connected successfully message
echo "Database connected successfully!";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);//error message if database doesn't connect
}

?>
