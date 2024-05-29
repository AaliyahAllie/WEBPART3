<!--This page contains the data for creating the adminControls database and the tbl users within it-->
<?php
// Database configuration
$servername = "localhost"; // Server name
$username = "AaliyahNicol"; // Username
$password = ""; // Password

// Creates connection to MySQL server
$conn = new mysqli($servername, $username, $password);

// Checks connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // If connection fails, the system must show error message
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS AdminControls";
if ($conn->query($sql) === TRUE) {
    $dbCreationMsg = "Database created successfully"; // Database creation success message(displays if successfully made)
} else {
    $dbCreationMsg = "Error creating database: " . $conn->error; // Database creation error message (displays if connection failed)
}

$conn->close(); // Closes connection

// Creates connection to the AdminControls database
$conn = new mysqli($servername, $username, $password, "AdminControls");

// Checks connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // If connection fails, show error message
}

// SQL to create table users
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    $tableCreationMsg = "Table users created successfully"; // Table creation success message
} else {
    $tableCreationMsg = "Error creating table: " . $conn->error; // Table creation error message
}

$conn->close(); // Close connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Admin Controls</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigation bar -->
    <nav class="navigation">
        <!-- Logo -->
        <a href="#" class="logo">past'd times</a>
        <!-- Menu -->
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="categories.php">Shop</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="aboutUs.php" class="active">About Us</a></li>
        </ul>
        <!-- Right elements -->
        <div class="right-elements">
            <!-- Search -->
            <a href="#" class="search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>
            <!-- Favourites -->
            <a href="favourites.php" class="favourites">
                <i class="fa fa-heart" aria-hidden="true"></i>
            </a>
            <!-- Dropdown menu -->
            <div class="dropdown">
                <button class="dropbtn">
                    <i class="fas fa-user"></i> 
                    <i class="fas fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="profile.php">Profile</a>
                    <a href="adminRegister.php">Sign Up as Admin</a>
                    <a href="adminLogin.php">Login as Admin</a>
                    <a href="adminHomePage.php">Admin Controls</a>
                    <a href="userRegister.php">Sign Up as User</a>
                    <a href="userLogin.php">Login as User</a>
                    <a href="verifyUsers.php">Verify Users</a>
                </div>
            </div>
        </div>
    </nav>
    <br><br><br><br><br>
    <!-- Output database and table creation messages -->
    <h2>Database and Table Creation</h2>
    <p><?php echo $dbCreationMsg; ?></p>
    <p><?php echo $tableCreationMsg; ?></p>
</body>
</html>
