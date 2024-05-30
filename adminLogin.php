<!--This page contains the code for an admin to login. Upon login they will get redirected to the adminHomePage.php.
This page contains connections to the database that checks their email and password matches the data stored on the admin table on the database ClothingStore
If the user matches all required login information and it is stored on the database, if not they can't login and are required to login first-->
<?php
include 'DBConn.php'; // Include the database connection file

// Checks if form is submitted
if(isset($_POST['login_user'])) {
    // Validates email and password against email and hashed password in the database.
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(validateUser($email, $password, $conn)) {
        // User authenticated successfully, proceed to admin home page
        session_start();
        $_SESSION['user_email'] = $email;
        header("Location: adminHomePage.php"); // Redirects the user to admin home page
        exit;
    }
    
}

function validateUser($email, $password, $conn) {
    // Prepares SQL statement to retrieve hashed password for the provided email
    $stmt = $conn->prepare("SELECT password FROM tblUser WHERE email = ?");// This line prepares a SQL statement to select the password from the tblUser table where the email matches the placeholder ?.
    $stmt->bind_param("s", $email);//This line binds the parameter ($email) to the placeholder in the prepared statement. It specifies that the parameter is a string ("s").
    $stmt->execute();//This line executes the prepared statement with the bound parameters.
    $result = $stmt->get_result();//This line fetches the result of the executed statement and stores it in the variable $result. 
                                //The result can then be fetched row by row using methods like 

    if($result->num_rows === 1) {
        $row = $result->fetch_assoc(); //to retrieve the password value.
        $hashed_password = $row['password'];//checks password against hashed password
        // Verify the password
        if(password_verify($password, $hashed_password)) {//verifies password
            return true; // Password is correct
        }
    }
    return false; // Invalid credentials
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="">
    
    <!-- Font Awesome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Google Fonts - Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
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
    <!-- Admin Login Form -->
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Admin Login</h2>
                        <?php if(isset($error)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php } ?>
                        <div class="container-fluid my-3">
                            <div class="text-center">
                                <h2>Login as a admin</h2>
                            </div>
                            <div class="row d-flex align-items-center justify-content-center">
                                <div class="col-lg-12 col-xl-6">
                                    <form action="adminHomePage.php" method="post" enctype="multipart/form-data">
                                        <div class="form-outline mb-4">
                                            <!--captures admin email and checks it against database email-->
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" id="email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required" name="email">
                                        </div>
                                        <div class="form-outline">
                                            <!--captures admin password and checks it against database hashed password-->
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" id="password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="password">
                                        </div>
                                        <div class="mt-4 pt-2">
                                            <!--logs in and redirects to adminHomePage.php-->
                                            <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="login_user">
                                        </div>
                                        <!--if user doesnt have an account theres a link for them to register-->
                                        <p>Don't have an account yet?<a href="adminRegister.php">Register</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of User Login Form -->
</body>
</html>
