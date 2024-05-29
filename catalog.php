<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Catalog</title>   
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
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #dddddd;
            margin-left: auto;
            margin-right: auto;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .item-image {
            max-width: 100px;
            max-height: 100px;
        }
        .delete-button {
    background-color: #ff6347; /* Red */
    color: white;
    border: none;
    padding: 8px 12px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.delete-button:hover {
    background-color: #ff4136; /* Darker Red */
}

    </style>
</head>
<body>
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
<br>
    <h1>Clothing Catalog</h1>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Size</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
        <?php

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_item']) && isset($_POST['item_id'])) {
        $item_id = $_POST['item_id'];
        $sql = "DELETE FROM tblClothes WHERE id = $item_id";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}

$sql = "SELECT * FROM tblClothes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['Image']) . "' alt='" . $row['itemName'] . "' class='item-image'></td>";
        echo "<td>" . $row['itemName'] . "</td>";
        echo "<td>" . $row['itemDescription'] . "</td>";
        echo "<td>" . $row['itemSize'] . "</td>";
        echo "<td>$" . $row['itemPrice'] . "</td>";
        echo "<td>
                <form method='post'>
                    <input type='hidden' name='item_id' value='" . $row['id'] . "'>
                    <button type='submit' name='delete_item' class='delete-button'>Delete</button>
                </form>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>0 results</td></tr>";
}
$conn->close();
?>



        </tbody>
    </table>
</body>
</html>
