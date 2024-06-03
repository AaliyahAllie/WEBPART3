<!--explains to users how the business works-->
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
<!--explaination of how business workss-->

<div class="container">
    <h1>How It Works</h1>
    <p>Welcome to our website! We've made buying and selling preloved clothes simple and convenient. Here's how it works:</p>
    <ol>
       
        <li>Create an Account: 
        <br>
         <img src="image/Account.png" alt="cREATaCCOUNT" height="150px", width="150px">
        <br>
         Sign up for an account on our website. It's quick, easy, and free!</li>
        <li>List Your Items: If you have preloved clothes to sell, simply list them on our platform. Add photos, descriptions, and set your price.</li>
        <li>Browse Listings: If you're looking to buy preloved clothes, browse through our listings. You'll find a wide variety of styles and sizes.</li>
        <li>Make a Purchase: Found something you like? Add it to your cart and proceed to checkout. You can pay securely using our payment system.</li>
        <li>Ship and Receive: Sellers ship their items to buyers, and buyers receive their purchases. We provide tracking information to ensure a smooth delivery process.</li>
        <li>Leave Feedback: After receiving your items, you can leave feedback for the seller. This helps maintain trust and transparency within our community.</li>
    </ol>
</div>

</body>
</html>
