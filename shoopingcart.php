<?php
// Start session
session_start();

// Initialize shopping cart as an empty array
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Function to add items to the shopping cart
function addToCart($item) {
    // Check if the item already exists in the cart
    $index = array_search($item['id'], array_column($_SESSION['cart'], 'id'));

    if ($index !== false) {
        // If the item exists, increase its quantity
        $_SESSION['cart'][$index]['quantity'] += 1;
    } else {
        // If the item is not in the cart, add it
        $item['quantity'] = 1;
        $_SESSION['cart'][] = $item;
    }
}

// Process AJAX request if data is received
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productId']) && isset($_POST['sellPrice'])) {
    $productId = $_POST['productId'];
    $sellPrice = $_POST['sellPrice'];

    // You may need to fetch more details of the product from your database
    // Here, I'm assuming you have an array of products where you can find the details by product ID
    $products = array(
        array('id' => 1, 'name' => 'Knit Skirt', 'price' => 220.00),
        // Add more products here
    );

    // Find the product by ID
    $product = array_filter($products, function ($item) use ($productId) {
        return $item['id'] == $productId;
    });

    // If product exists, add it to the cart
    if (!empty($product)) {
        addToCart(current($product));
        echo "Product added to cart successfully.";
    } else {
        echo "Error: Product not found.";
    }
    exit; // Exit script after processing AJAX request
}

// Rest of the code remains the same
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Shopping Cart</h1>

    <h2>Items in Cart:</h2>
    <ul>
        <?php foreach ($_SESSION['cart'] as $item): ?>
            <li><?php echo $item['name']; ?> - <?php echo $item['quantity']; ?></li>
        <?php endforeach; ?>
    </ul>

    <form action="" method="post">
        <button type="submit" name="checkout">Checkout</button>
    </form>

    <?php
    // Handle checkout button click
    if (isset($_POST['checkout'])) {
        checkout();
    }

    // Function to checkout and clear the shopping cart
    function checkout() {
        // Redirect user to login/register page
        header("Location: userLogin.php");

        // Generate a reference number for the order
        $orderNum = generateOrderNumber();

        // Get sessionId (This is a placeholder, actual implementation may vary)
        $sessionId = session_id();

        // Write entries into orderLine table and decrement quantity in database
        writeOrderLinesToDatabase($orderNum, $sessionId, $_SESSION['cart']);

        // Clear the shopping cart after checkout
        $_SESSION['cart'] = array();
    }

    // Dummy function to generate order number
    function generateOrderNumber() {
        // This is just a placeholder, actual implementation may vary
        return uniqid('order_');
    }

    // Dummy function to write order lines to the database
    function writeOrderLinesToDatabase($orderNum, $sessionId, $cart) {
        // This is just a placeholder, actual implementation may vary
        // In a real application, you would interact with your database here
        // to store the order lines along with the order number and session ID.
        // You would also decrement the quantity of items in your inventory.
        // For simplicity, we'll just print out the order details here.
        echo "Order Number: $orderNum <br>";
        echo "Session ID: $sessionId <br>";
        echo "Items in the order: <br>";
        foreach ($cart as $item) {
            echo "Item ID: {$item['id']}, Quantity: {$item['quantity']} <br>";
        }
    }
    ?>
</body>
</html>
