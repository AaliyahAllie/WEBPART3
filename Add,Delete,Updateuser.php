<!-- This page contains the code for creating the Admin Controls: Add, Delete and Update Users. This code works by allowing the admin to record what users get kept on the database "adminControls". When the users are added they get stored on this database, which is later pulled onto the verifyUsers page to get displayed. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Title -->
    <title>Admin Controls: Add, Delete and Update Users</title>

    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href=""/>
    <!-- This is the tab icon -->

    <!-- Using FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Import Poppins Font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            text-align: center;
        }
    </style>

</head>
<body>
   
    <!-- Navigation Bar -->
    <nav class="navigation">

        <!-- Logo -->
        <a href="#" class="logo">past'd times</a>
        
        <!-- Menu To Navigate All Pages-->
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

            <!-- Favourites -->
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
    <!-- Navigation End -->

    <br><br><br><br><br>

    <!-- Admin Controls: Add, Delete, Update User -->
    <h2>Add, Delete, Update User</h2>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
              <!--form connecting to DBConn2.php that contains the code to upload the data to the adminControls database-->
                <form action="DBConn2.php" method="post">
                    <div class="form-group">
                      <!--captures username into database based on admin input-->
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <!--captures user password based on admin input-->
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <!--adds,deletes or updates data in database when presseed-->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="add">Add User</button>
                        <button type="submit" class="btn btn-danger" name="delete">Delete User</button>
                        <button type="submit" class="btn btn-success" name="update">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
