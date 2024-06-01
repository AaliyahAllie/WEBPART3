<?php
session_start();

// Check if the shop items are set in the session
if (!isset($_SESSION['shop_items']) || empty($_SESSION['shop_items'])) {
    echo "<h2>No items in the shop</h2>";
} else {
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

    // Fetch items from the database based on the item IDs stored in the session
    $shop_items = implode(',', $_SESSION['shop_items']);
    $sql = "SELECT * FROM tblClothes WHERE id IN ($shop_items)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Items in the Shop</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Image</th><th>Name</th><th>Description</th><th>Size</th><th>Price</th><th>Action</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['Image']) . "' class='item-image'></td>";
            echo "<td>" . $row['itemName'] . "</td>";
            echo "<td>" . $row['itemDescription'] . "</td>";
            echo "<td>" . $row['itemSize'] . "</td>";
            echo "<td>$" . $row['itemPrice'] . "</td>";
            echo "<td>";
            echo "<button class='remove-from-shop-button' data-itemid='" . $row['id'] . "'>Remove from Shop</button>";
            echo "<button class='add-to-cart-button' data-itemid='" . $row['id'] . "' onclick='addToShop(" . $row['id'] . ")'>Add to Cart</button>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>No items found in the shop</h2>";
    }

    // Display data from userClothes table if add to shop button is clicked
    if(isset($_GET['add_to_shop'])) {
        $user_id = $_SESSION['user_id'];
        $sql_user = "SELECT * FROM userClothes WHERE user_id = $user_id";
        $result_user = $conn->query($sql_user);
        if ($result_user->num_rows > 0) {
            echo "<h2>Items in Your Collection</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Image</th><th>Name</th><th>Description</th><th>Size</th><th>Price</th><th>Action</th></tr>";
            while($row_user = $result_user->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src='data:image/jpeg;base64," . base64_encode($row_user['Image']) . "' class='item-image'></td>";
                echo "<td>" . $row_user['itemName'] . "</td>";
                echo "<td>" . $row_user['itemDescription'] . "</td>";
                echo "<td>" . $row_user['itemSize'] . "</td>";
                echo "<td>$" . $row_user['itemPrice'] . "</td>";
                echo "<td>";
                echo "<button class='add-to-shop-button' data-itemid='" . $row_user['id'] . "' onclick='addToShop(" . $row_user['id'] . ")'>Add to Shop</button>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<h2>No items found in your collection</h2>";
        }
    }

    $conn->close();
}
?>
<?php
session_start();

// Check if the shop items are set in the session
if (!isset($_SESSION['shop_items']) || empty($_SESSION['shop_items'])) {
    echo "<h2>No items in the shop</h2>";
} else {
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

    // Fetch items from the database based on the item IDs stored in the session
    $shop_items = implode(',', $_SESSION['shop_items']);
    $sql = "SELECT * FROM userClothes WHERE id IN ($shop_items)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Items in the Shop</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Image</th><th>Name</th><th>Description</th><th>Size</th><th>Price</th><th>Action</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['Image']) . "' class='item-image'></td>";
            echo "<td>" . $row['itemName'] . "</td>";
            echo "<td>" . $row['itemDescription'] . "</td>";
            echo "<td>" . $row['itemSize'] . "</td>";
            echo "<td>$" . $row['itemPrice'] . "</td>";
            echo "<td>";
            echo "<button class='remove-from-shop-button' data-itemid='" . $row['id'] . "'>Remove from Shop</button>";
            echo "<button class='add-to-cart-button' data-itemid='" . $row['id'] . "'>Add to Cart</button>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>No items found in the shop</h2>";
    }

    $conn->close();
}
?>

