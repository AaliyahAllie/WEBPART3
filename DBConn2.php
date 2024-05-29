<!--this page creates the database adminControls and the table users, it works in conjunction with the actions done on Add,Delete,Updateuser.php by recording it into the database-->
<?php
$servername = "localhost"; // server name
$username = "AaliyahNicol"; // database username
$password = "AaliyahNicol"; //  database password
$database = "adminControls"; //  database name

// Creates connection to adminControls Database
$conn = mysqli_connect($servername, $username, $password);

// Checks connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());//kills connection if connection fails
}

// Creates database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully or already exists";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

// Selects database
mysqli_select_db($conn, $database);

// SQL to create tblUser table
$sql = "CREATE TABLE IF NOT EXISTS tblUser (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

// Executes query to create table
if (mysqli_query($conn, $sql)) {
    echo "Table tblUser created successfully or already exists";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!-- used for capturing the data on the add,delete,update page and stores it-->
<?php
$servername = "localhost"; // server name
$username = "AaliyahNicol"; // database username
$password = "AaliyahNicol"; // database password
$database = "adminControls"; // database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Checks which button was clicked
if(isset($_POST['add'])) {
    // Adds user to the database
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tblUser (username, password) VALUES ('$username', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "User added successfully";
    } else {
        echo "Error adding user: " . mysqli_error($conn);
    }
}
elseif(isset($_POST['delete'])) {
    // Deletes user from the database
    $username = $_POST['username'];

    $sql = "DELETE FROM tblUser WHERE username='$username'";

    if (mysqli_query($conn, $sql)) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}
elseif(isset($_POST['update'])) {
    // Updates user in the database
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE tblUser SET password='$password' WHERE username='$username'";

    if (mysqli_query($conn, $sql)) {
        echo "User updated successfully";
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
