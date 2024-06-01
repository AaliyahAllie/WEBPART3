
<?php
// Check if the request is coming from AJAX
if (isset($_POST['placeOrder'])) {
    // Assuming you have a database connection already established
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
    // Assuming you have a table named 'orders' with columns 'id', 'shipping_address', 'total_price', 'items' in the database
    $shippingAddress = $_POST['shippingAddress'];
    $totalPrice = $_POST['totalPrice']; // Assuming you're sending the total price from the frontend

    // Retrieve items from the session or wherever you're storing them
    session_start(); // Start session if not already started
    $items = json_encode($_SESSION['cart']); // Assuming you're storing the cart items in the session

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO orders (shipping_address, total_price, items) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $shippingAddress, $totalPrice, $items);
    $stmt->execute();

    // Check for successful insertion
    if ($stmt->affected_rows > 0) {
        $response = array('success' => true, 'message' => 'Order placed successfully!');
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
            var cartContent = $('.cart-content');
            cartContent.empty();
            var total = 0;

            cart.forEach(function(item, index) {
                var itemTotal = item.price * item.quantity;
                total += itemTotal;
                cartContent.append(`
                    <div class="cart-box">
                        <img src="${item.image}" alt="" class="cart-img">
                        <div class="detail-box">
                            <div class="cart-product-title">${item.name}</div>
                            <div class="cart-price">R${item.price.toFixed(2)}</div>
                            <input type="number" value="${item.quantity}" class="cart-quantity" data-index="${index}">
                        </div>
                        <i class="fa-solid fa-trash" data-index="${index}"></i>
                    </div>
                `);
            });

            $('.total-price').text('R' + total.toFixed(2));
        }

        // Place Order Button
        $('#btn-place-order').on('click', function() {
            // Extracting shipping address
            var shippingAddress = $('#shippingAddress').val();
            if (shippingAddress.trim() === "") {
                alert("Shipping address is required.");
                return;
            }

            // Sending data to process_order.php
            $.ajax({
                type: "POST",
                url: "process_order.php",
                data: {
                    placeOrder: true,
                    shippingAddress: shippingAddress,
                    totalPrice: parseFloat($('.total-price').text().replace('R', '').replace(',', ''))
                },
                success: function(response) {
                    const result = JSON.parse(response);
                    if (result.success) {
                        // Show the receipt modal
                        $('#receipt-modal').css('display', 'block');
                        // You can clear the cart here or perform any other action
                    } else {
                        alert(result.message);
                    }
                }
            });
        });

        // Initial cart update
        updateCart();

        // Update quantity
        $(document).on('change', '.cart-quantity', function() {
            var index = $(this).data('index');
            var cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart[index].quantity = $(this).val();
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCart();
        });

        // Remove item from cart
        $(document).on('click', '.fa-trash', function() {
            var index = $(this).data('index');
            var cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCart();
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

    <!-- Cart Page Content -->
    <h2 class="cart-tile">Your Cart</h2>
    <div class="cart-content"></div>
    <div class="total">
        <div class="total-tile">Total</div>
        <div class="total-price">R0.00</div>
    </div>
    

    <!-- Shipping Address Form -->
    <form id="shipping-form">
        <label for="shippingAddress">Shipping Address:</label>
        <input type="text" id="shippingAddress" name="shippingAddress" required>
        <button type="button" id="btn-show-receipt" class="btn-buy">Check-Out</button>
    </form>
    <button type="button" class="btn-continue">Continue Shopping</button>

    <!-- Receipt Modal -->
    <div id="receipt-modal" class="receipt-modal">
        <div class="receipt-content">
            <span class="close-receipt">&times;</span>
            <h2>Receipt</h2>
            <div class="receipt-items"></div>
            <div class="receipt-total">
                <strong>Total: </strong><span class="receipt-total-price">R0.00</span>
            </div>
            <button type="button" id="btn-place-order" class="btn-close-receipt">Place Order</button>
        </div>
    </div>

    <script>
    // Continue Shopping Button
    $('.btn-continue').on('click', function() {
        window.location.href = 'products.php';
    });

    // Show Receipt and Save Shipping Address in Session
    $('#btn-show-receipt').on('click', function() {
                const shippingAddress = $('#shippingAddress').val();
                if (shippingAddress.trim() === "") {
                    alert("Shipping address is required.");
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: "cart.php",
                    data: { saveAddress: true, shippingAddress: shippingAddress },
                    success: function(response) {
                        const receiptItems = [];
                        $('.cart-box').each(function() {
                            const title = $(this).find('.cart-product-title').text();
                            const price = parseFloat($(this).find('.cart-price').text().replace('R', ''));
                            const quantity = parseInt($(this).find('.cart-quantity').val());
                            const totalItemPrice = price * quantity;
                            receiptItems.push({ title, price, quantity, totalItemPrice });
                        });

                        let receiptContent = '';
                        receiptItems.forEach(item => {
                            receiptContent += `<p>${item.title} - Quantity: ${item.quantity} - Price: R${item.price.toFixed(2)} - Total: R${item.totalItemPrice.toFixed(2)}</p>`;
                        });

                        $('.receipt-items').html(receiptContent);
                        $('.receipt-total-price').text($('.total-price').text());

                        // Show receipt modal
                        $('#receipt-modal').css('display', 'block');
                    }
                });
            });

            // Place Order Button
            $('#btn-place-order').on('click', function() {
                $.ajax({
                    type: "POST",
                    url: "cart.php",
                    data: { placeOrder: true },
                    success: function(response) {
                        const result = JSON.parse(response);
                        if (result.success) {
                            alert(result.message);
                            window.location.href = 'order-confirmation.php'; // Redirect to a confirmation page
                        } else {
                            alert(result.message);
                        }
                    }
                });
            });

            // Close Receipt Button
            $('.btn-close-receipt, .close-receipt').on('click', function() {
                $('#receipt-modal').css('display', 'none');
            });

            // Close the modal if clicked outside of receipt content
            $(window).on('click', function(event) {
                if ($(event.target).is('#receipt-modal')) {
                    $('#receipt-modal').css('display', 'none');
                }
            });
</script>
</body>
</html>