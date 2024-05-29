<!--This page creates the tblUser in the database ClothingStore and is connected to DBConn.php page-->
<?php
include 'DBConn.php';

// Check if tblUser exists
$sql = "SHOW TABLES LIKE 'tblUser'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // If table exists, delete it
    $sql = "DROP TABLE tblUser";
    $conn->query($sql);
}

// Create table
$sql = "CREATE TABLE tblUser (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table tblUser created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Add user data manually
$userData = array(
    array("John Doe", "j.doe@abc.co.za", "29ef52e7563626a96cea7f4b4085c124"),
    array("Jane Smith", "j.smith@example.com", "5ebe2294ecd0e0f08eab7690d2a6ee69"),
    array("Alice Johnson", "a.johnson@test.com", "1a79a4d60de6718e8e5b326e338ae533"),
    array("Bob Brown", "b.brown@example.org", "6c8349cc7260ae62e3b1396831a8398f"),
    array("Eve Wilson", "e.wilson@example.net", "1bbd732b398881dee3a715d91a7b92a6")
);

foreach ($userData as $user) {
    $name = $user[0];
    $email = $user[1];
    $password = $user[2];
    
    // Insert data into table
    $sql = "INSERT INTO tblUser (name, email, password) VALUES ('$name', '$email', '$password')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
//echos when data is loaded succesfully to database
echo "Data loaded successfully<br>";

$conn->close();
?>
