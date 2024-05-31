``php
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
            echo "<td><button class='remove-from-shop-button' data-itemid='" . $row['id'] . "'>Remove from Shop</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>No items found in the shop</h2>";
    }

    $conn->close();
}
?>
```