<?php
session_start();
$item_id = $_POST['item_id'];

// Remove the item from the shop
$key = array_search($item_id, $_SESSION['shop_items']);
if ($key !== false) {
    unset($_SESSION['shop_items'][$key]);
}

// Return success response
echo "success";
?>
