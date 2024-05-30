<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["user_type"]) || !isset($_POST["sender"]) || !isset($_POST["message"])) {
    header("Location: index.php");
    exit();
}

// Get sender and message from POST data
$sender = $_POST["sender"];
$message = $_POST["message"];

// Sample data: replace this with actual database operations to store messages
$messages = isset($_SESSION["messages"]) ? $_SESSION["messages"] : array();

// Add new message to the messages array
$messages[] = array(
    "sender" => $sender,
    "message" => $message
);

// Store messages array in session
$_SESSION["messages"] = $messages;

// Redirect to appropriate chat page based on sender
if ($_SESSION["user_type"] === "admin" && $sender === "Admin") {
    header("Location: admin_chat.php");
} elseif ($_SESSION["user_type"] === "seller" && $sender === "Seller") {
    header("Location: seller_chat.php");
} else {
    // Redirect to index.php if the sender doesn't match the logged-in user type
    header("Location: index.php");
}
exit();
?>
