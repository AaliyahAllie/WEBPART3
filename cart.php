<!--Allows users to make purchases based on the items in their cart-->
<?php
// Check if the request is coming from AJAX
if (isset($_POST['placeOrder'])) {
    // database connection already established
    $db_host = 'localhost';
    $db_user = 'AaliyahNicol';
    $db_pass = 'AaliyahNicol';
    $db_name = 'ClothingStore';

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process the order and insert into the database
    
    $shippingAddress = $_POST['shippingAddress'];
    $totalPrice = $_POST['totalPrice'];
    $customerId = 1; // Retrieve this from session or other means
    $orderDate = date("Y-m-d H:i:s");

    // Retrieve items from the session or wherever you're storing them
    session_start(); // Start session if not already started
    $items = json_encode($_SESSION['cart']); // storing the cart items in the session

    // Generate receipt content
    $receipt = '';
    $cartItems = json_decode($items, true);
    foreach ($cartItems as $item) {
        $itemTotal = $item['price'] * $item['quantity'];
        $receipt .= "{$item['name']} - Quantity: {$item['quantity']} - Price: R{$item['price']} - Total: R{$itemTotal}\n";
    }
    $receipt .= "Total Price: R{$totalPrice}";

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO tblorders (customerId, orderDate, shippingAddress, receipt) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $customerId, $orderDate, $shippingAddress, $receipt);
    $stmt->execute();

    // Check for successful insertion
    if ($stmt->affected_rows > 0) {
        $response = array('success' => true, 'message' => 'Order placed successfully!', 'orderId' => $stmt->insert_id);
    } else {
        $response = array('success' => false, 'message' => 'Failed to place order.');
    }

    // Close the database connection
    $stmt->close();
    $conn->close();

    // Send JSON response back to the frontend
    echo json_encode($response);
    exit(); // Terminate script after processing AJAX request
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past'd Times - Cart</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="shortcut icon" href=""/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script>
$(document).ready(function() {
    // Function to update the cart display
    function updateCart() {
        var cart = JSON.parse(localStorage.getItem('cart')) || [];
        var cartContent = $('#cart');
        cartContent.empty();
        var total = 0;

        cart.forEach(function(item, index) {
            var itemTotal = item.price * item.quantity;
            total += itemTotal;
            cartContent.append(`
                <article class="product" data-index="${index}">
                    <header>
                        <a class="remove">
                            <img src="${item.image}" alt="">
                            <h3>Remove product</h3>
                        </a>
                    </header>
                    <div class="content">
                        <h1>${item.name}</h1>                        
                    </div>
                    <footer class="content">
                        <span class="qt-minus">-</span>
                        <span class="qt" data-index="${index}">${item.quantity}</span>
                        <span class="qt-plus">+</span>
                        <h2 class="price">R ${item.price.toFixed(2)}</h2>
                        <h2 class="full-price">R ${itemTotal.toFixed(2)}</h2>
                        <button class="delete-item">Delete</button>
                    </footer>
                </article>
            `);
        });

        $('.receipt-total-price').text('R' + total.toFixed(2));
    }

    // Show Receipt and Save Shipping Address in Session
    $('#btn-show-receipt').on('click', function() {
        const shippingAddress = $('#shippingAddress').val();
        if (shippingAddress.trim() === "") {
            alert("Shipping address is required.");
            return;
        }

        // Save the shipping address to the session or perform any other necessary action
        $.ajax({
            type: "POST",
            url: "cart.php",
            data: { saveAddress: true, shippingAddress: shippingAddress },
            success: function(response) {
                const receiptItems = [];
                $('.product').each(function() {
                    const title = $(this).find('h1').text();
                    const price = parseFloat($(this).find('.price').text().replace('R', ''));
                    const quantity = parseInt($(this).find('.qt').text());
                    const totalItemPrice = price * quantity;
                    receiptItems.push({ title, price, quantity, totalItemPrice });
                });

                let receiptContent = '';
                receiptItems.forEach(item => {
                    receiptContent += `<p>${item.title} - Quantity: ${item.quantity} - Price: R${item.price.toFixed(2)} - Total: R${item.totalItemPrice.toFixed(2)}</p>`;
                });

                $('.receipt-items').html(receiptContent);
                $('.receipt-total-price').text($('.receipt-total-price').text());

                // Show receipt modal
                $('#receipt-modal').css('display', 'block');
            }
        });
    });

    // Update quantity
    $(document).on('click', '.qt-minus', function() {
        var index = $(this).siblings('.qt').data('index');
        var cart = JSON.parse(localStorage.getItem('cart')) || [];
        if (cart[index].quantity > 1) {
            cart[index].quantity--;
            localStorage.setItem
            ('cart', JSON.stringify(cart));
            updateCart();
        }
    });

    $(document).on('click', '.qt-plus', function() {
        var index = $(this).siblings('.qt').data('index');
        var cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart[index].quantity++;
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCart();
    });

    // Delete item
    
    $(document).on('click', '.delete-item', function() {
        var index = $(this).closest('.product').data('index');
        var cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCart();
    });

    // Initial cart update
    updateCart();

    // Close Receipt Button
    $('.btn-close-receipt, .close-receipt').on('click', function() {
        const shippingAddress = $('#shippingAddress').val();
        const totalPrice = parseFloat($('.receipt-total-price').text().replace('R', ''));

        // Place order and send data to the server
        $.ajax({
            type: "POST",
            url: "cart.php",
            data: { placeOrder: true, shippingAddress: shippingAddress, totalPrice: totalPrice },
            success: function(response) {
                response = JSON.parse(response);
                if (response.success) {
                    // Redirect to the purchase history page with orderId
                    window.location.href = 'purchaseHistory.php?orderId=' + response.orderId;
                } else {
                    alert(response.message);
                }
            }
        });

        $('#receipt-modal').css('display', 'none');
    });

    // Close the modal if clicked outside of receipt content
    $(window).on('click', function(event) {
        if ($(event.target).is('#receipt-modal')) {
            $('#receipt-modal').css('display', 'none');
        }
    });
});
</script>

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
            <a href="cart.php" class="active" class="cart"><i class="fas fa-shopping-bag"></i></a>
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
<br><br><br><br>
    <!-- Cart Page Content -->
    <header id="site-header">
        <div class="container">
            <h1>Shopping cart </h1>
        </div>
    </header>

    <div class="container">

        <section id="cart">
            <!-- Product articles will be dynamically added here -->
        </section>

        <form id="shipping-form">
            <label for="shippingAddress">Shipping Address:</label>
            <input type="text" id="shippingAddress" name="shippingAddress" required>
            <button type="button" id="btn-show-receipt" class="btn-buy">Check Out</button>
        </form>
        <button type="button" class="btn-continue"><a href="products.php">Continue Shopping</a></button>

        <!-- Receipt Modal -->
        <div id="receipt-modal" class="receipt-modal">
            <div class="receipt-content">
                <span class="close-receipt">&times;</span>
                <h2>Receipt</h2>
                <div class="receipt-items"></div>
                <div class="receipt-total">
                    <strong>Total: </strong><span class="receipt-total-price">R0.00</span>
                </div>
                <button type="button" class="btn-close-receipt"><a href="userLogin.php">Close</a></button>
            </div>
        </div>
    </div>
    
</body>
</html>
