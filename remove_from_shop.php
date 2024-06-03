<?php
// remove_from_shop.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the action is 'remove' and item_id is set
    if (isset($_POST['action']) && $_POST['action'] == 'remove' && isset($_POST['item_id'])) {
        // Include your database connection code here
        $servername = "localhost";
        $username = "AaliyahNicol";
        $password= "AaliyahNicol";
        $dbname = "ClothingStore";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the delete query
        $itemId = $_POST['item_id'];
        $stmt = $conn->prepare("DELETE FROM tblClothes WHERE id = ?");
        $stmt->bind_param("i", $itemId);
        $stmt->execute();

        // Check if deletion was successful
        if ($stmt->affected_rows > 0) {
            echo "Item removed from shop successfully.";
        } else {
            echo "Failed to remove item from shop.";
        }

        // Close statement and database connection
        $stmt->close();
        $conn->close();
    } else {
        // Invalid request, handle appropriately
        echo "Invalid request.";
    }
} else {
    // If the request method is not POST, handle appropriately
    echo "Method not allowed.";
}
?>
