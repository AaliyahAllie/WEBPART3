<!--contains code for user profile, allows them to connect to sell.php and catalog.php or logout of their account-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--fav-icon===============================================-->
    <link rel="shortcut icon" href=""/>
    <!-- This is the tab icon^^^^ -->

    <!-- Using FontAwesome====================================== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Import Poppins Font Family============================= -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<style>
    body {
        text-align: center;
        align-items: center;
    }
    .button {
        display: inline-block;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
<body>
<!-- Navigation Bar ========================================== -->
<nav class="navigation">
    <!-- Logo -->
    <a href="#" class="logo">past'd times</a>
    <!-- Menu -->
    <ul class= "menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="categories.php">Shop</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="aboutUs.php" class="active">About Us</a></li>
    </ul>
    <!-- Right Elements -->
    <div class="right-elements">
        <!-- Search -->
        <a href="#" class="search">
            <i class="fa-solid fa-magnifying-glass"></i>
        </a>
        <!-- Favorites -->
        <a href="favourites.php" class="favourites">
            <i class="fa fa-heart" aria-hidden="true"></i>
        </a>
        <!-- Dropdown To Profile Pages and Logins -->
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
<!-- Navigation End -->
<?php
// Starting the session
session_start();

// Checks if user is logged in, if not, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: userLogin.php");
    exit;
}

// Database connection parameters
$db_host = "localhost"; //  database host
$db_name = "ClothingStore"; // database name
$db_user = "AaliyahNicol"; // database username
$db_pass = "AaliyahNicol"; // database password

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch user data from the database
    $stmt = $pdo->prepare("SELECT name FROM tbluser WHERE id = :user_id");
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Display user profile
    //displays message to user
    echo " <h2>User Profile</h2><br>";
    echo "WELCOME TO YOUR PROFILE<br>";
    echo "User " . $user['name'] . " logged in.";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<!-- User Profile Section ==================================== -->
   
    <p>Would You Like To Sell An Item?</p>
    <a href="sell.php" class="button">Post Item</a>
    <br>
    <p>Would You Like To View Items You Are Selling?</p>
    <a href="USERcatalog.php" class="button">View Items</a>
    <br>
    <br>
    <p>Would you like to view your purchase history?</p>
    <a href="purchaseHistory.php" class="button">Purchase History</a>
    <br>
    <br>
    <a href="logout.php" class="button">Logout</a>
</body>


</html>
