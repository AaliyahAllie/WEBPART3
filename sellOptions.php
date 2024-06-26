<!--displays the options that the user has after they are approved to sell items-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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

    <style>
        body{
    margin: 0px;
    padding: 0px;
    font-family:poppins;
    background-color: #add8e6;
    text-align: center;
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
            <li><a href="aboutUs.php" class="active">About Us</a></li>
        </ul>
        <!-- Right Elements -->
        <div class="right-elements">
            <!-- Search -->
            <a href="#" class="search">
                <i class="fas fa-search"></i>
            </a>
            <!-- Favourites -->
            <a href="favourites.php" class="favourites">
                <i class="fas fa-heart"></i>
            </a>
            <!-- Dropdown -->
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

    <br>
    <br>
    <br>
    <br>
    <br>
<!-- Main Content -->
<div class="container">
    <h2>Welcome User</h2>
    <!-- Instructions for the action -->
    <h3>Please choose an option:</h3>
</div>
        <h4>Would you like to sell an item?</h4>
        <!--redirects so users can add items to their catalog-->
        <a href="sell.php"><button type="submit" class="btn btn-primary">Sell Clothes </button></a>
         
        <h4>Would you like to view the items you have for sale?</h4>
        <!--shows users catalog-->
         <a href="USERcatalog.php"><button type="submit" class="btn btn-primary">Catalog</button></a>
         
         
</body>
</html>
