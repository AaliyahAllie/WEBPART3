<!DOCTYPE html>
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
                
                // Add product to localStorage
                var cart = JSON.parse(localStorage.getItem('cart')) || [];
                var product = {
                    name: productName,
                    price: parseFloat(productPrice),
                    image: productImage,
                    quantity: 1
                };
                cart.push(product);
                localStorage.setItem('cart', JSON.stringify(cart));
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

    <!--Banner==============================================================-->
    <section id="banner">
        <!--text------->
        <div class="banner-text">
            <strong>Beautiful Shoes</strong>
            <span>From R150</span>
            <p>Long Lasting And Comfortable</p>
            <a href="#">Shop Now</a>
        </div>
        <!--img-------->
        <div class="banner-img">
            <img src="image\b-1.png" alt="Banner">
        </div>
    </section>




    <!--==products================================================-->
    <section id="feature-product">

        <!--heading---------->
        <h2>Feature Products</h2>

        <!--box container--------->
        <div class="feature-product-container">

            <!--box 1--------->
            <div class="feature-product-box">

                <!--img------------->
                <div class="product-feature-img">
                    <img src="image/p-1.jpg" alt="">
                </div>

                <!--text container-->
                <div class="product-feature-text-container">

                    <!--text---------->
                    <div class="product-feature-text">
                        <strong>Knit Skirt</strong>
                        <span>R220.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="#" class="add-to-cart"><i class="fas fa-shopping-cart" id="cart-icon"></i></a>
                        <!--like icon-->
                        <a href="#"><i class="far fa-heart"></i></a>
                    </div>

                </div>

            </div>



            <!--box 2--------->
            <div class="feature-product-box">

                <!--img------------->
                <div class="product-feature-img">
                    <img src="image/p-2.jpg" alt="">
                </div>

                <!--text container-->
                <div class="product-feature-text-container">

                    <!--text---------->
                    <div class="product-feature-text">
                        <strong>Pleated Trousers</strong>
                        <span>R170.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="cart.php" class="add-to-cart"><i class="fas fa-shopping-cart" id="cart-icon"></i></a>
                        <!--like icon-->
                        <a href="#"><i class="far fa-heart"></i></a>
                    </div>

                </div>

            </div>


            <!--box 3--------->
            <div class="feature-product-box">

                <!--img------------->
                <div class="product-feature-img">
                    <img src="image/p-3.jpg" alt="">
                </div>

                <!--text container-->
                <div class="product-feature-text-container">

                    <!--text---------->
                    <div class="product-feature-text">
                        <strong>Pink Collared Shirt</strong>
                        <span>R80.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="cart.php" class="add-to-cart"><i class="fas fa-shopping-cart" id="cart-icon"></i></a>
                        <!--like icon-->
                        <a href="#"><i class="far fa-heart"></i></a>
                    </div>

                </div>

            </div>


            <!--box 4--------->
            <div class="feature-product-box">

                <!--img------------->
                <div class="product-feature-img">
                    <img src="image/p-4.jpg" alt="">
                </div>

                <!--text container-->
                <div class="product-feature-text-container">

                    <!--text---------->
                    <div class="product-feature-text">
                        <strong>Denim Jeans</strong>
                        <span>R280.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="cart.php" class="add-to-cart"><i class="fas fa-shopping-cart" id="cart-icon"></i></a>
                        <!--like icon-->
                        <a href="#"><i class="far fa-heart"></i></a>
                    </div>

                </div>

            </div>

             <!--box 5--------->
             <div class="feature-product-box">

                <!--img------------->
                <div class="product-feature-img">
                    <img src="image/p-5.jpg" alt="">
                </div>

                <!--text container-->
                <div class="product-feature-text-container">

                    <!--text---------->
                    <div class="product-feature-text">
                        <strong>Black Blouse</strong>
                        <span>R180.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="cart.php" class="add-to-cart"><i class="fas fa-shopping-cart" id="cart-icon"></i></a>
                        <!--like icon-->
                        <a href="#"><i class="far fa-heart"></i></a>
                    </div>

                </div>

            </div>

             <!--box 6--------->
             <div class="feature-product-box">

                <!--img------------->
                <div class="product-feature-img">
                    <img src="image/p-6.jpg" alt="">
                </div>

                <!--text container-->
                <div class="product-feature-text-container">

                    <!--text---------->
                    <div class="product-feature-text">
                        <strong>Black and White Dress</strong>
                        <span>R250.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="cart.php" class="add-to-cart"><i class="fas fa-shopping-cart" id="cart-icon"></i></a>

                        <!--like icon-->
                        <a href="#"><i class="far fa-heart"></i></a>
                    </div>

                </div>

            </div>

             <!--box 7--------->
             <div class="feature-product-box">

                <!--img------------->
                <div class="product-feature-img">
                    <img src="image/p-7.jpg" alt="">
                </div>

                <!--text container-->
                <div class="product-feature-text-container">

                    <!--text---------->
                    <div class="product-feature-text">
                        <strong>Rain Jacket</strong>
                        <span>R170.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="cart.php" class="add-to-cart"><i class="fas fa-shopping-cart" id="cart-icon"></i></a>
                        <!--like icon-->
                        <a href="#"><i class="far fa-heart"></i></a>
                    </div>

                </div>

            </div>

             <!--box 8--------->
             <div class="feature-product-box">

                <!--img------------->
                <div class="product-feature-img">
                    <img src="image/p-8.jpg" alt="">
                </div>

                <!--text container-->
                <div class="product-feature-text-container">

                    <!--text---------->
                    <div class="product-feature-text">
                        <strong>Blue Suit</strong>
                        <span>R1850.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="cart.php" class="add-to-cart"><i class="fas fa-shopping-cart" id="cart-icon"></i></a>
                        <!--like icon-->
                        <a href="#"><i class="far fa-heart"></i></a>
                    </div>

                </div>

            </div>

             <!--box 9--------->
             <div class="feature-product-box">

                <!--img------------->
                <div class="product-feature-img">
                    <img src="image/p-9.jpg" alt="">
                </div>

                <!--text container-->
                <div class="product-feature-text-container">

                    <!--text---------->
                    <div class="product-feature-text">
                        <strong>Red Dress</strong>
                        <span>R380.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="cart.php" class="add-to-cart"><i class="fas fa-shopping-cart" id="cart-icon"></i></a>
                        <!--like icon-->
                        <a href="#"><i class="far fa-heart"></i></a>
                    </div>

                </div>

            </div>

             <!--box 10--------->
             <div class="feature-product-box">

                <!--img------------->
                <div class="product-feature-img">
                    <img src="image/p-10.jpg" alt="">
                </div>

                <!--text container-->
                <div class="product-feature-text-container">

                    <!--text---------->
                    <div class="product-feature-text">
                        <strong>Hand Bag</strong>
                        <span>R100.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="cart.php" class="add-to-cart"><i class="fas fa-shopping-cart" id="cart-icon"></i></a>
                        <!--like icon-->
                        <a href="#"><i class="far fa-heart"></i></a>
                    </div>

                </div>

            </div>

             <!--box 11--------->
             <div class="feature-product-box">

                <!--img------------->
                <div class="product-feature-img">
                    <img src="image/p-11.jpg" alt="">
                </div>

                <!--text container-->
                <div class="product-feature-text-container">

                    <!--text---------->
                    <div class="product-feature-text">
                        <strong>Black Heels</strong>
                        <span>R300.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="cart.php" class="add-to-cart"><i class="fas fa-shopping-cart" id="cart-icon"></i></a>
                        <!--like icon-->
                        <a href="#"><i class="far fa-heart"></i></a>
                    </div>

                </div>

            </div>

             <!--box 12--------->
             <div class="feature-product-box">

                <!--img------------->
                <div class="product-feature-img">
                    <img src="image/p-12.jpg" alt="">
                </div>

                <!--text container-->
                <div class="product-feature-text-container">

                    <!--text---------->
                    <div class="product-feature-text">
                        <strong>White tennis Shoes</strong>
                        <span>R200.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="cart.php" class="add-to-cart"><i class="fas fa-shopping-cart" id="cart-icon"></i></a>
                        <!--like icon-->
                        <a href="#"><i class="far fa-heart"></i></a>
                    </div>

                </div>

            </div>


        </div>


    </section>



</body>


</html>