<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
            line-height: 1.6;
        }
    </style>
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
                <a href="adminHomePage">Admin Controls</a>
                <a href="userRegister.php">Sign Up as User</a>
                <a href="userLogin.php">Login as User</a>
            </div>
        </div>
    </div>
        
</nav>

<br>
<br>
<br>

<div class="container">
    <h1>Who We Are</h1>
    <img src="image/Hiring!.png" alt="WhoWeAre">
    <p>We are a business aiming to help users sell and buy preloved clothes. Our mission is to provide a platform where individuals can easily sell their gently used clothing items and where buyers can find great deals on unique and fashionable pieces.</p>
    <p>At our core, we believe in sustainability and reducing waste by giving clothing a second life. By facilitating the exchange of preloved clothing, we contribute to a more eco-friendly and socially responsible way of consuming fashion.</p>
    <p>Whether you're decluttering your closet or looking to refresh your wardrobe, we're here to make the process easy, convenient, and enjoyable for you.</p>
    <p>Thank you for being a part of our community!</p>
</div>

</body>
</html>
