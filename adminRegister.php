<?php
// Include the file where database connection is established
include('DBConn.php');

// Check if the form is submitted
if (isset($_POST['register_admin'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO tblAdmin (adminName, phoneNumber, adminUsername, adminEmail, adminPassword) VALUES (?, ?, ?, ?, ?)");

    if (!$stmt) {
        die('Error: ' . $conn->error);
    }

    // Hash the password before storing it in the database
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Bind parameters
    $stmt->bind_param("sssss", $name, $phone, $username, $email, $password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
       <!--fav-icon===============================================-->
       <link rel="shortcut icon" href=""/>
    <!--this is the tab icon^^^^-->

    <!--using-FontAwesome======================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--Import-Poppins-Font-Family=============================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    
</head>
<body>
<script>
        // Check if the URL contains a success parameter indicating successful registration
        const urlParams = new URLSearchParams(window.location.search);
        const success = urlParams.get('success');

        // If success parameter is present and set to true, display a pop-up message
        if (success === 'true') {
            alert("Registration successful!");
        }
    </script>
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


<!--Navigation end------->
<br>
<br>
<br>
<br>
<br>
<br>
    <div class="container-fluid my-3">
        <div class="text-center">
            <h2>Register as an admin</h2>
        </div>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="adminRegister.php" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" class="form-control" placeholder="Enter Your Name" autocomplete="off" required="required" name="name">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" id="phone" class="form-control" placeholder="Enter Your Phone Number" autocomplete="off" required="required" name="phone">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required="required" name="username">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required" name="email">
                    </div>

                    <div class="form-outline">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="password">
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="register_admin">
                    </div>

                    <p>Already have an account?<a href="adminLogin.php">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
