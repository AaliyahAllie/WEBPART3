<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past'd Times - Favorites</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="shortcut icon" href=""/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
$(document).ready(function() {
    function updateFavorites() {
        var favorites = JSON.parse(localStorage.getItem('favorites')) || [];
        var favoritesContent = $('#feature-product .feature-product-container');
        favoritesContent.empty();

        if (favorites.length === 0) {
            favoritesContent.append("<h2>No favorites added yet.</h2>");
        } else {
            favorites.forEach(function(item) {
                favoritesContent.append(`
                    <div class='feature-product-box'>
                        <div class='product-feature-img'>
                            <img src='${item.image}' alt='${item.name}'>
                        </div>
                        <div class='product-feature-text-container'>
                            <div class='product-feature-text'>
                                <strong>${item.name}</strong>
                                <span>R${item.price}</span>
                            </div>
                            <div class='cart-like'>
                                <a href='#' class='add-to-cart' data-id='${item.id}'><i class='fas fa-shopping-cart' id='cart-icon'></i></a>
                                <a href='#' class='remove-from-favorites' data-id='${item.id}'><i class='far fa-heart'></i></a>
                            </div>
                        </div>
                    </div>
                `);
            });
        }
    }

    $(document).on('click', '.add-to-favorites', function() {
        var id = $(this).data('id');
        var products = JSON.parse(localStorage.getItem('products')) || [];
        var item = products.find(function(product) { return product.id == id; });

        var favorites = JSON.parse(localStorage.getItem('favorites')) || [];
        var isFavorite = favorites.find(function(favorite) { return favorite.id == id; });

        if (!isFavorite) {
            favorites.push(item);
            localStorage.setItem('favorites', JSON.stringify(favorites));
            updateFavorites();
        } else {
            alert("This item is already in favorites.");
        }
    });

    $(document).on('click', '.remove-from-favorites', function() {
        var id = $(this).data('id');
        var favorites = JSON.parse(localStorage.getItem('favorites')) || [];
        favorites = favorites.filter(function(item) { return item.id != id; });
        localStorage.setItem('favorites', JSON.stringify(favorites));
        updateFavorites();
    });

    updateFavorites();
});
</script>    

</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navigation">
        <a href="#" class="logo">past'd times</a>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="categories.php">Shop</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
        </ul>
        <div class="right-elements">
            <a href="#" class="search"><i class="fa-solid fa-magnifying-glass"></i></a>
            <a href="cart.php" class="cart"><i class="fas fa-shopping-bag"></i></a>
            <a href="favourites.php" class="favourites"><i class="fa fa-heart" aria-hidden="true"></i></a>
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

    <header>
        <h1>Favorites</h1>
    </header>

    <div class="container">
        <section id="feature-product">

            <div class="feature-product-container">
                <?php
                if(isset($_SESSION['favorites'])) {
                    $favorites = $_SESSION['favorites'];
                    foreach($favorites as $favorite) {
                        // Display favorited items
                        echo "
                        <div class='feature-product-box'>
                            <div class='product-feature-img'>
                                <img src='{$favorite['image']}' alt='{$favorite['name']}'>
                            </div>
                            <div class='product-feature-text-container'>
                                <div class='product-feature-text'>
                                    <strong>{$favorite['name']}</strong>
                                    <span>R{$favorite['price']}</span>
                                </div>
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
                    echo "<h2>No favorites added yet.</h2>";
                }
                ?>
            </div>

        </section>
    </div>
</body>
</html>