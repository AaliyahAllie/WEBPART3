<?php
// Includes the file where database connection is established
include('DBConn.php');

// Checks if the form is submitted
if (isset($_POST['register_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepares and binds SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO tblUser (name, email, password) VALUES (?, ?, ?)");

    if (!$stmt) {
        die('Error: ' . $conn->error);
    }

    // Hashs the password before storing it in the database
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Binds parameters
    $stmt->bind_param("sss", $name, $email, $password);

    // Executes the statement
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Closes the statement
    $stmt->close();
}

// Closes the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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


<!--Navigation end------->

<br>
<br>
<br>
<br>
<br>
<br>

    <div class="container-fluid my-3">
        <div class="text-center">
            <h2>Register as a user</h2>
        </div>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="userRegister.php" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <!--captures and stores name-->
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" class="form-control" placeholder="Enter Your Name" autocomplete="off" required="required" name="name">
                    </div>

                    <div class="form-outline mb-4">
                        <!--captures and stores email-->
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required" name="email">
                    </div>

                    <div class="form-outline">
                        <!--captures,stores and hashes password onto database-->
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="password">
                    </div>
                    <!--redirects to login page-->
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="register_user">
                    </div>
                    <!--allows users to login if they have an account-->
                    <p>Already have an account?<a href="userLogin.php">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
