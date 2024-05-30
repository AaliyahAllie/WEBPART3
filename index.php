<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!--title=================================================-->
    <title>Past'd Times</title>

    <!--stylesheet============================================-->
    <link rel="stylesheet" type="text/css" href="css/style.css"/>

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
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="categories.php">Shop</a></li>
            <li><a href="products.php">Products</a></li>
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
                    <a href="adminHomePage.php">Admin Controls</a>
                    <a href="userRegister.php">Sign Up as User</a>
                    <a href="userLogin.php">Login as User</a>
                </div>
            </div>
        </div>
            
    </nav>
    <!--Navigation end------->

    <!--main-section=====================================================-->
    <section id="main">

        <!--main-content------------------->
        <div class="main-content">

            <!--text----------->
            <div class="main-text">
                <span>Collection</span>
                <h1>Comfortable T-Shirts with Great Comfort</h1>
                <p>Fun colourful T-Shirts for women mwn and kids</p>
                <a href="#">Shop Now</a>
            </div>

            <!--main-img------->
            <div class="main-img">
                <img src="image\main.png" alt="T-Shirts"/>
            </div>
        </div>
    </section>
    <!--main section end------>

    <!--Category=====================================-->
    <section id="categories">

        <!--heading------>
        <h2>Categories</h2>

        <!--box container-------->
        <div class="category-container">

            <!--box 1-------->
            <a href="women.php" class="category-box">
                <img src="image/c-1.jpg" alt="category" />
                <span>Women</span>
            </a>
            
            <!--box 2-------->
            <a href="men.php" class="category-box">
                <img src="image\c-2.jpg" alt="category">
                <span>Men</span>
            </a>

            <!--box 3-------->
            <a href="kids.php" class="category-box">
                <img src="image\c-3.jpg" alt="category">
                <span>Kids</span>
            </a>

            <!--box 4-------->
            <a href="shoes.php" class="category-box">
                <img src="image\c-4.jpg" alt="category">
                <span>Shoes</span>
            </a>

        </div>
    </section>
    <!--category end------------------------------------>




    <!--Feature Products=========================================-->
    <section id="feature-product">

        <!--heading---------->
        <h2>Feature Products</h2>

        <!--box container--------->
        <div class="feature-product-container">

            <!--box---------->
            <div class="feature-product-box">

                <!--img------------->
                <div class="product-feature-img">
                    <img src="image/shrek.jpeg" alt="">
                </div>

                <!--text container-->
                <div class="product-feature-text-container">

                    <!--text---------->
                    <div class="product-feature-text">
                        <strong>Unique Collection</strong>
                        <span>R349.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        <!--like icon-->
                        <a href="#"><i class="far fa-heart"></i></a>
                    </div>

                </div>

            </div>



            <!--box---------->
            <div class="feature-product-box">

                <!--img------------->
                <div class="product-feature-img">
                    <img src="image/shrek.jpeg" alt="">
                </div>

                <!--text container-->
                <div class="product-feature-text-container">

                    <!--text---------->
                    <div class="product-feature-text">
                        <strong>Unique Collection</strong>
                        <span>R349.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        <!--like icon-->
                        <a href="#"><i class="far fa-heart"></i></a>
                    </div>

                </div>

            </div>


            <!--box---------->
            <div class="feature-product-box">

                <!--img------------->
                <div class="product-feature-img">
                    <img src="image/shrek.jpeg" alt="">
                </div>

                <!--text container-->
                <div class="product-feature-text-container">

                    <!--text---------->
                    <div class="product-feature-text">
                        <strong>Unique Collection</strong>
                        <span>R349.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        <!--like icon-->
                        <a href="#"><i class="far fa-heart"></i></a>
                    </div>

                </div>

            </div>


            <!--box---------->
            <div class="feature-product-box">

                <!--img------------->
                <div class="product-feature-img">
                    <img src="image/shrek.jpeg" alt="">
                </div>

                <!--text container-->
                <div class="product-feature-text-container">

                    <!--text---------->
                    <div class="product-feature-text">
                        <strong>Unique Collection</strong>
                        <span>R349.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        <!--like icon-->
                        <a href="#"><i class="far fa-heart"></i></a>
                    </div>

                </div>

            </div>


        </div>


    </section>
    <!--feature products end------------------------------------>

    <!--Banner==============================================================-->
    <section id="banner">

        <!--text------->
        <div class="banner-text">
            <strong>Beautifull Shoes</strong>
            <span>From R150</span>
            <p>Long Lasting And Confortable</p>
            <a href="#">Shop Now</a>
        </div>

        <!--img-------->
        <div class="banner-img">
            <img src="image/" alt="Banner">
        </div>



    </section>

    <!--banner end------------------------------>



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
                        <strong>Unique Collection</strong>
                        <span>R349.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
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
                        <strong>Unique Collection</strong>
                        <span>R349.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
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
                        <strong>Unique Collection</strong>
                        <span>R349.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
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
                        <strong>Unique Collection</strong>
                        <span>R349.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
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
                        <strong>Unique Collection</strong>
                        <span>R349.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
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
                        <strong>Unique Collection</strong>
                        <span>R349.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
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
                        <strong>Unique Collection</strong>
                        <span>R349.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
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
                        <strong>Unique Collection</strong>
                        <span>R349.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
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
                        <strong>Unique Collection</strong>
                        <span>R349.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
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
                        <strong>Unique Collection</strong>
                        <span>R349.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
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
                        <strong>Unique Collection</strong>
                        <span>R349.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
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
                        <strong>Unique Collection</strong>
                        <span>R349.00</span>
                    </div>

                    <!--cart like icon--->
                    <div class="cart-like">
                        <!--cart icon-->
                        <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        <!--like icon-->
                        <a href="#"><i class="far fa-heart"></i></a>
                    </div>

                </div>

            </div>


        </div>


    </section>



</body>


</html>