<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!--title=================================================-->
    <title>Past'd Times</title>

    <!--stylesheet============================================-->
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/aboutus.css"/>

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
            <li><a href="index.php">Home</a></li>
            <li><a href="categories.php">Shop</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="aboutUs.php" class="active">About Us</a></li>
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
                    <a href="verifyUsers.php">Verify Users</a>
                </div>
            </div>
        </div>
    </nav>
   <br><br><br><br><br><br>
<html lang="en">   
    <div class="content">
        <h1>ABOUT US</h1>
        <div class="card-container">
            <div class="card">
                <h2>Who we are</h2>
                <p>We are a business aiming to help users sell and buy preloved clothes</p>
                <a href="whoWeAre.php"><button>let's go</button></a>
            </div>
            <div class="card">
                <h2>How it works</h2>
                <p>Click the button to find out how we achieve our goals</p>
                <a href="Howitworks.php"><button>let's go</button></a>
            </div>
            <div class="card">
                <h2>Our Ratings</h2>
                <p>Click the button to find out more</p>
                <a href="ourRates.php"><button>let's go</button></a>
            </div>
            <div class="card">
                <h2>Help & Support</h2>
                <p>Click the button to find out more</p>
                <a href="helpSupport.php"><button>let's go</button></a>
            </div>
        </div>
    </div>
</body>
</html>
