<?php
session_start();

// customer ID stored in the session
$customerId = 1; // Replace with actual retrieval of customerId from session

// Database connection
$db_host = 'localhost';
$db_user = 'AaliyahNicol';
$db_pass = 'AaliyahNicol';
$db_name = 'ClothingStore';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve orders for the current user
$sql = "SELECT orderId, orderDate, shippingAddress, receipt FROM tblorders WHERE customerId = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customerId);
$stmt->execute();
$result = $stmt->get_result();

$orders = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past'd Times - Purchase History</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="shortcut icon" href=""/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        /* Add your styles here */
        table {
            width: 100%;
            border-collapse: collapse;
            padding-top: 20%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        h1{
            padding-top: 10%;
            text-align: center;
        }
    </style>
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
    <br>
    <br>
    <br>
    <br>
    <!-- Purchase History Content -->
    <header id="site-header">
        <div class="container">
            <h1>Purchase History</h1>
        </div>
    </header>
<br>
    <div class="container">
        <section id="purchase-history">
            <?php if (!empty($orders)): ?>
                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Shipping Address</th>
                        <th>Receipt</th>
                    </tr>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['orderId']; ?></td>
                            <td><?php echo $order['orderDate']; ?></td>
                            <td><?php echo $order['shippingAddress']; ?></td>
                            <td><pre><?php echo $order['receipt']; ?></pre></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>No orders found.</p>
            <?php endif; ?>
        </section>
    </div>
</body>
</html>
