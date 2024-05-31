<?php
session_start();
// Assuming you have a session variable to store the items in the shop
if (!isset($_SESSION['shop_items'])) {
    $_SESSION['shop_items'] = array();
}

$item_id = $_POST['item_id'];

// Add the item to the shop
$_SESSION['shop_items'][] = $item_id;

// Return success response
echo "success";
?>
