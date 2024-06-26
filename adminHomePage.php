<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
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
        body {
            margin: 0px;
            padding: 0px;
            font-family: poppins;
            background-color: #add8e6;
            text-align: center;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            width: 100%;
            margin-bottom: 10px;
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
        <h2>Welcome Admin</h2>
        <!-- Instructions for the action -->
        <h3>Please choose an option:</h3>
        <table>
            <tr>
                <td colspan="2">
                    <form method="POST" action="Add,Delete,Updateuser.php">
                        <!-- redirects to user controls where admin can add or delete or update users-->
                        <button type="submit" class="btn btn-primary">User Controls</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>To add, delete, or edit items, click the button</h4>
                    <!-- redirects to item controls where admin can add, delete or edit clothing catalog and add it to shop-->
                    <a href="catalog.php"><button type="submit" class="btn btn-primary">Item Controls</button></a>
                </td>
                <td>
                    <h4>To view orders, click the button</h4>
                    <!-- redirects to order line which shows the admin a history of purchases-->
                    <a href="orderLine.php"><button type="submit" class="btn btn-primary">Order Line</button></a>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>To message sellers, click the button</h4>
                    <!-- redirects to message where admin can contact seller-->
                    <a href="message.php"><button type="submit" class="btn btn-primary">Message Seller</button></a>
                </td>
                <td>
                    <h4>To verify users, click the button</h4>
                    <!--Allows admin to verify user accounts when they want to login-->
                    <a href="verifyUserRequests.php"><button type="submit" class="btn btn-primary">Verify</button></a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <!--Allows admin to verify user sell requests when they want to sell items-->
                    <h4>To verify user sell requests, click the button</h4>
                    <a href="adminAccept.php"><button type="submit" class="btn btn-primary">Sell Requests</button></a>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
