<?php
session_start();

$servername = "localhost";
$username = "AaliyahNicol";
$password= "AaliyahNicol";
$dbname = "ClothingStore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getItemDetails($itemId, $conn) {
    $stmt = $conn->prepare("SELECT * FROM tblClothes WHERE id = ?");
    $stmt->bind_param("i", $itemId);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
    $stmt->close();
    return $item;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'checkout') {
        $orderTotal = 0;
        $orderItems = [];

        foreach ($_SESSION['cart'] as $itemId => $quantity) {
            $item = getItemDetails($itemId, $conn);
            $orderTotal += $item['itemPrice'] * $quantity;
            $orderItems[] = [
                'itemName' => $item['itemName'],
                'itemPrice' => $item['itemPrice'],
                'quantity' => $quantity,
                'Image' => $item['Image']
            ];
        }

        // Insert order into tblOrders
        $stmt = $conn->prepare("INSERT INTO tblOrders (orderTotal) VALUES (?)");
        $stmt->bind_param("d", $orderTotal);
        $stmt->execute();
        $orderId = $stmt->insert_id;
        $stmt->close();

        // Insert order items into orderLine and decrement stock
        foreach ($orderItems as $orderItem) {
            $stmt = $conn->prepare("INSERT INTO orderLine (orderId, itemName, itemPrice, quantity, Image) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issis", $orderId, $orderItem['itemName'], $orderItem['itemPrice'], $orderItem['quantity'], $orderItem['Image']);
            $stmt->execute();
            $stmt->close();
        }

        // Empty the cart
        $_SESSION['cart'] = [];

        echo "Order placed successfully! Your order number is: " . $orderId;
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .item-image {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Shopping Cart</h1>
    <?php
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        echo "<table class='table table-striped table-bordered mt-4'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>";
        echo "<th>Image</th>";
        echo "<th>Name</th>";
        echo "<th>Price</th>";
        echo "<th>Quantity</th>";
        echo "<th>Total</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        $totalPrice = 0;

        foreach ($_SESSION['cart'] as $itemId => $quantity) {
            $item = getItemDetails($itemId, $conn);
            $itemTotal = $item['itemPrice'] * $quantity;
            $totalPrice += $itemTotal;

            echo "<tr>";
            echo "<td><img src='data:image/jpeg;base64," . base64_encode($item['Image']) . "' class='item-image'></td>";
            echo "<td>" . $item['itemName'] . "</td>";
            echo "<td>$" . $item['itemPrice'] . "</td>";
            echo "<td>" . $quantity . "</td>";
            echo "<td>$" . $itemTotal . "</td>";
            echo "</tr>";
        }

        echo "<tr>";
        echo "<td colspan='4' class='text-right'><strong>Total:</strong></td>";
        echo "<td><strong>$" . $totalPrice . "</strong></td>";
        echo "</tr>";

        echo "</tbody>";
        echo "</table>";

        echo "<form method='post'>";
        echo "<input type='hidden' name='action' value='checkout'>";
        echo "<button type='submit' class='btn btn-success'>Checkout</button>";
        echo "</form>";
    } else {
        echo "<p class='text-center'>Your cart is empty.</p>";
    }
    ?>
</div>
</body>
</html>
