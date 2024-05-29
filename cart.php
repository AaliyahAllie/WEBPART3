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

    <!-- Cart Page Content -->

    <!-- Cart Title -->
    <h2 class="cart-tile">Your Cart</h2>
    <!-- Cart Content -->
    <div class="cart-content">
        <!-- Individual Cart Items -->
        <div class="cart-box">
            <!-- Product Image -->
            <img src="image/p-2.jpg" alt="" class="cart-img">
            <!-- Product Details -->
            <div class="detail-box">
                <!-- Product Title -->
                <div class="cart-product-title">Pleated Trousers</div>
                <!-- Product Price -->
                <div class="cart-price">R170.00</div>
                <!-- Quantity Input -->
                <input type="number" value="1" class="cart-quantity">
            </div>
            <!-- Remove Cart Button -->
            <i class="fa-solid fa-trash"></i>
        </div>
    </div>
    <!-- Total Price -->
    <div class="total">
        <!-- Total Title -->
        <div class="total-tile">Total</div>
        <!-- Total Price Display -->
        <div class="total-price">R0.00</div>
    </div>
    <!-- Check-Out Button -->
    <button type="button" class="btn-buy">Check-Out</button>
    <!-- Close Cart Button -->
    <i class="fa-solid fa-x" id="close-cart"></i>
    <!-- Closing div tag for cart-content -->
    </div>

    <!-- Link to JavaScript file -->
    <script src="js/main.js"></script>
</body>
</html>