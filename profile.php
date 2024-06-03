
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
            <li><a href="aboutUs.php" >About Us</a></li>
        </ul>
        <!--right----->
        <div class="right-elements">
            <!--search-->
            <a href="#" class="search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>

             <!--cart-->
             <a href="cart.php" class="cart">
                <i class="fas fa-shopping-bag"></i>
            </a>

            <!--favourites-->
            <a href="favourites.php" class="favourites">
            <i class="fa fa-heart" aria-hidden="true"></i>
            </a>
            <!-- Dropdown -->
            <div class="dropdown">
                <button class="dropbtn">
                    <i class="fas fa-user"></i> 
                    <i class="fas fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="profile.php"class="active">Profile</a>
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
<div class="card-component">
    <div class="card-component-img">
        <img src="https://thumbs.dreamstime.com/b/default-profile-picture-avatar-photo-placeholder-vector-illustration-default-profile-picture-avatar-photo-placeholder-vector-189495158.jpg">
    </div>
    <div class="desc">
    <?php
                session_start();
                if(isset($_SESSION['user_email'])) {
                    echo "<h6 class='secondary-text'>" . $_SESSION['user_email'] . "</h6>";
                } else {
                    echo "<h6 class='secondary-text'>No user logged in</h6>";
                }
                ?>
    </div>
    <a href="logout.php">
        <button class="logout-button">LOG OUT</button>
    </a>
    <div class="details">
        <div class="request">
            <a href="sellClothes.php">
                <button type="submit" class="btn btn-primary">Send Request</button>
            </a>
        </div>
        <div class="purchase-history">
            <a href="purchaseHistory.php">
                <button type="submit" class="btn btn-primary">Purchase History</button>
            </a>
        </div>
    </div>
</div>
</div>

</body>
</html>
