<!--this page is utilized by the catalog.php to upload code to the categories.php/ this is simply used to display the array and success message-->
<?php
session_start();
// a session variable to store the items in the shop
if (!isset($_SESSION['shop_items'])) {
    $_SESSION['shop_items'] = array();
}

//posts item id
$item_id = $_POST['item_id'];

// Add the item to the shop
$_SESSION['shop_items'][] = $item_id;

// Return success response
echo "success";
?>
