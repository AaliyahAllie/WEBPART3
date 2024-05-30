<?php
session_start();
include('DBConn.php');

// Fetch login requests where verified status is 0
$stmt = $conn->prepare("SELECT id, name, email FROM tblUser WHERE verified = 0");
if (!$stmt) {
    die('Error: ' . $conn->error);
}
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify User Requests</title>
    <!-- Add your CSS links here -->
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta charset declaration -->
    <meta charset="UTF-8">
    <!-- Responsive viewport declaration -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the page -->
    <title>Past'd Times</title>
    <!-- Link to external stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <!-- Link to shortcut icon -->
    <link rel="shortcut icon" href=""/>
    <!-- Link to Font Awesome library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Preconnect links for Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Link to Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Link to jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        /* Basic button styling */
.button {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  border: 2px solid #4CAF50; /* Green border */
  color: #ffffff; /* White text */
  background-color: #4CAF50; /* Green background */
  cursor: pointer;
  border-radius: 5px;
}

/* Hover effect */
.button:hover {
  background-color: #45a049; /* Darker green on hover */
  border-color: #45a049; /* Darker green border on hover */
}

    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navigation">
        <!-- Logo -->
        <a href="#" class="logo">past'd times</a>
        <!-- Menu -->
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="categories.php">Shop</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
        </ul>
        <!-- Right Elements (Search, Cart, Favourites, User Dropdown) -->
        <div class="right-elements">
            <a href="#" class="search"><i class="fa-solid fa-magnifying-glass"></i></a>
            <a href="cart.php" class="cart" class="active"><i class="fas fa-shopping-bag"></i></a>
            <a href="favourites.php" class="favourites"><i class="fa fa-heart" aria-hidden="true"></i></a>
            <!-- User Dropdown -->
            <div class="dropdown">
                <button class="dropbtn">
                    <i class="fas fa-user"></i> 
                    <i class="fas fa-caret-down"></i>
                </button>
                <!-- Dropdown Content (User Options) -->
                <div class="dropdown-content">
                    <a href="profile.php">Profile</a>
                    <a href="adminRegister.php">Sign Up as Admin</a>
                    <a href="adminLogin.php">Login as Admin</a>
                    <a href="adminHomePage">Admin Controls</a>
                    <a href="userRegister.php">Sign Up as User</a>
                    <a href="userLogin.php">Login as User</a>
                </div>
            </div>
        </div>
    </nav>
    <br>
<br>
    <br>
    <br>

    <h2>Verify User Requests</h2>
    <table border="1">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <form action="verifyUser.php" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                            <button class="button"> <input type="submit" value="Verify" name="verify_user"></button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
