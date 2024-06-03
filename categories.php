<!--this is the shop page that displays item from catalog.php that has been added to the shop-->
<?php
session_start();

// Database connection
$servername = "localhost";
$username = "AaliyahNicol";
$password = "AaliyahNicol";
$dbname = "ClothingStore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch items from the tblClothes and userClothes tables
$sql = "SELECT Image, itemName, itemPrice FROM tblClothes
        UNION
        SELECT Image, itemName, itemPrice FROM userClothes";
$result = $conn->query($sql);
?>

<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past'd Times</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="shortcut icon" href=""/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
$(document).ready(function() {
    // When AddToCart is clicked
    $('.add-to-cart').click(function(event) {
        event.preventDefault();
        
        // Get product details
        var productBox = $(this).closest('.feature-product-box');
        var productName = productBox.find('.product-feature-text strong').text();
        var productPrice = productBox.find('.product-feature-text span').text().replace('R', '');
        var productImage = productBox.find('.product-feature-img img').attr('src');
        
        // Show SellPrice in a popup
        alert("Sell Price: R" + productPrice);
        
        // Add product to localStorage for cart
        var cart = JSON.parse(localStorage.getItem('cart')) || [];
        var product = {
            name: productName,
            price: parseFloat(productPrice),
            image: productImage,
            quantity: 1
        };
        cart.push(product);
        localStorage.setItem('cart', JSON.stringify(cart));
        
        // Redirect to cart page
        window.location.href = 'cart.php';
    });

    // When AddToFavorites is clicked
    $('.add-to-favorites').click(function(event) {
        event.preventDefault();
        
        // Get product details
        var productBox = $(this).closest('.feature-product-box');
        var productName = productBox.find('.product-feature-text strong').text();
        var productPrice = productBox.find('.product-feature-text span').text().replace('R', '');
        var productImage = productBox.find('.product-feature-img img').attr('src');
        
        // Show confirmation message
        alert("Added to favorites: " + productName);
        
        // Add product to localStorage for favorites
        var favorites = JSON.parse(localStorage.getItem('favorites')) || [];
        var product = {
            name: productName,
            price: parseFloat(productPrice),
            image: productImage
        };
        favorites.push(product);
        localStorage.setItem('favorites', JSON.stringify(favorites));
    });
});
    </script>
    
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
            <li><a href="products.php" class="active">Products</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
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

            <div class="dropdown">
                <button class="dropbtn">
                    <i class="fas fa-user"></i> 
                    <i class="fas fa-caret-down"></i>
                </button>
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
    
    <!-- Feature product section -->
    
    <!-- Product boxes -->
    <div class="feature-product-container">
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            //displays the outputs that where fetched from the catalog.php
            while($row = $result->fetch_assoc()) {
                $imageData = base64_encode($row['Image']);
                $itemName = $row['itemName'];
                $itemPrice = $row['itemPrice'];
                echo "
                <!--box--------->
                <div class='feature-product-box'>

                    <!--img------------->
                    <div class='product-feature-img'>
                        <img src='data:image/jpeg;base64,$imageData' alt='$itemName'>
                    </div>

                    <!--text container-->
                    <div class='product-feature-text-container'>

                        <!--text---------->
                        <div class='product-feature-text'>
                            <strong>$itemName</strong>
                            <span>R$itemPrice</span>
                        </div>

                        <!--cart like icon--->
                        <div class='cart-like'>
                            <!--cart icon-->
                            <a href='#' class='add-to-cart'><i class='fas fa-shopping-cart' id='cart-icon'></i></a>
                            <!--like icon-->
                            <a href='#' class='add-to-favorites'><i class='far fa-heart'></i></a>
                        </div>

                    </div>

                </div>";
            }
        } else {
            echo "<h2>No items found in the shop</h2>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
