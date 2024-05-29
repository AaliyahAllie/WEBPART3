<?php
// Starts the session
session_start();

// Includes the file where database connection is established
include('DBConn.php');

// Checks if the form is submitted
if (isset($_POST['login_user'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepares SQL statement to retrieve user data based on email
    $stmt = $conn->prepare("SELECT id, name, password FROM tblUser WHERE email = ?");
    if (!$stmt) {
        die('Error: ' . $conn->error);
    }

    // Binds parameters
    $stmt->bind_param("s", $email);

    // Executes the statement
    $stmt->execute();

    // Stores result
    $result = $stmt->get_result();

    // Checks if user exists
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verifies the password
        if (password_verify($password, $user['password'])) {
            // Starts a new session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header('Location: profile.php'); // Redirects to profile page
            exit();
        } else {
            $error = "Invalid email or password!"; // Password does not match
        }
    } else {
        $error = "Invalid email or password!"; // Email does not exist
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
    <title>User Login</title>
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
        <ul class="menu">
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
<br><br><br><br><br>
    <div class="container-fluid my-3">
        <div class="text-center">
            <h2>User Login</h2>
        </div>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="userLogin.php" method="post" enctype="multipart/form-data">
                    <?php if(isset($error)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>
                    <div class="form-outline mb-4">
                        <!-- captures email and checks against database-->
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required" name="email">
                    </div>

                    <div class="form-outline">
                        <!--captures password and checks against database-->
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="password">
                    </div>
                        <!--redirects to profile page-->
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="login_user">
                    </div>
                        <!--ALLOWS USER TO CREATE AN ACCOUNT IF THEY DONT HAVE ONE-->
                    <p>Don't have an account? <a href="userRegister.php">Register</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
