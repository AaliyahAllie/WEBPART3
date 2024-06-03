<!--INTERFACE FOR USERS TO MESSAGE EACH OTHER ADMIN-USER-->
<?php
session_start();

// Sample data: admin username and password
$admin_username = "admin";
$admin_password = "adminpass";

// Sample data: seller username and password
$seller_username = "seller";
$seller_password = "sellerpass";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user is admin
    if ($_POST["user_type"] == "admin") {
        // Check if the username and password are correct
        if ($_POST["username"] == $admin_username && $_POST["password"] == $admin_password) {
            $_SESSION["user_type"] = "admin";
            header("Location: admin_chat.php");
            exit();
        } else {
            $error_message = "Invalid username or password for admin.";
        }
    }
    // Check if the user is seller
    elseif ($_POST["user_type"] == "seller") {
        // Check if the username and password are correct
        if ($_POST["username"] == $seller_username && $_POST["password"] == $seller_password) {
            $_SESSION["user_type"] = "seller";
            header("Location: seller_chat.php");
            exit();
        } else {
            $error_message = "Invalid username or password for seller.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messaging System</title>
    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    
        
</head>

<body>

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
            <!-- Dropdown To Profile Pages and Logins-->
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
    <!-- Navigation end -->
<br><br><br><br><br>
    <h2>Login</h2>
    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
    <form class="needs-validation" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" novalidate>
    <div class="form-group">
        <label for="user_type">Select User Type:</label>
        <select class="form-control" name="user_type" id="user_type" required>
            <option value="admin">Admin</option>
            <option value="seller">Seller</option>
        </select>
        <div class="invalid-feedback">Please select a user type.</div>
    </div>
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="username" id="username" required>
        <div class="invalid-feedback">Please enter a username.</div>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
        <div class="invalid-feedback">Please enter a password.</div>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>

</body>

</html>
