<!--Allows for retriving user data from adminControls database and displays it in a table-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
     <!--stylesheet============================================-->
     <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <!--Bootstrap CSS Link===-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
       <!--fav-icon===============================================-->
       <link rel="shortcut icon" href=""/>
    <!--this is the tab icon^^^^-->

    <!--using-FontAwesome======================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--Import-Poppins-Font-Family=============================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!--styles for this specific page and table styling-->
<style>
    body {
        text-align: center;
        background-color: cadetblue;
    }

    table {
        margin: 0 auto; 
        border-collapse: collapse;
        border: 1px solid black; 
    }

    th, td {
        border: 1px solid black; 
        padding: 8px; 
    }
</style>
</head>
<body>
        <!--navigatio-bar==========================================-->
        <nav class="navigation">

<!--logo----->
<a href="#" class="logo">past'd times</a>

<!--menu----->
<ul class= "menu">
    <li><a href="index.php">Home</a></li>
    <li><a href="categories.php">Shop</a></li>
    <li><a href="products.php">Products</a></li>
    <li><a href="aboutUs.php" class="active">About Us</a></li>
</ul>

<!--right----->
<div class="right-elements">
    <!--search-->
    <a href="#" class="search">
        <i class="fa-solid fa-magnifying-glass"></i>
    </a>

    <!--favourites-->
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

<br><br><br><br><br><br>
<!--Navigation end------->

<?php
// Establishs MySQLi connection
$mysqli = new mysqli("localhost", "AaliyahNicol", "AaliyahNicol", "adminControls");

// Checks connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Performs query
$query = "SELECT username, password FROM tblUser"; // Only selecting 'username' and 'password' columns
$result = $mysqli->query($query);

// Checks if query executed successfully
if ($result) {
    echo "<h2>User List</h2>";
    echo "<table>";
    echo "<tr>
    <th>Username</th>
    <th>Password</th>
    </tr>"; // Changed table header to reflect 'Username' and 'Password'
    
    // Process results
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['username']."</td>"; // Displaying 'username'
        echo "<td>".$row['password']."</td>"; // Displaying 'password'
        echo "</tr>";
    }
    
    echo "</table>";
    
    // Free result set
    $result->free();
} else {
    // Handle query error
    echo "Error: " . $mysqli->error;
}

// Close connection
$mysqli->close();
?>

</body>
</html>
