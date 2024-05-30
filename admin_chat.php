<?php
session_start();

// Check if user is logged in as admin
if (!isset($_SESSION["user_type"]) || $_SESSION["user_type"] !== "admin") {
    header("Location: index.php");
    exit();
}

// Sample data: replace this with actual chat data from your database
$messages = array(
    array("sender" => "Admin", "message" => "Hello Seller!"),
    array("sender" => "Seller", "message" => "Hi Admin!"),
    // Additional messages can be added here
);

// Your chat functionality can go here (e.g., sending messages)

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Chat</title>
    <style>
        /* Simple CSS for chat display */
        .chat-container {
            width: 80%;
            margin: auto;
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
            max-height: 400px;
            overflow-y: auto;
        }

        .message {
            margin-bottom: 10px;
        }

        .admin-message {
            background-color: #f0f0f0;
            padding: 8px;
            border-radius: 5px;
        }

        .seller-message {
            background-color: #d9edf7;
            padding: 8px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h2>Welcome Admin!</h2>
    <div class="chat-container">
        <?php foreach ($messages as $message) { ?>
            <div class="message <?php echo ($message['sender'] == 'Admin') ? 'admin-message' : 'seller-message'; ?>">
                <strong><?php echo $message['sender']; ?>:</strong> <?php echo $message['message']; ?>
            </div>
        <?php } ?>
    </div>
    <!-- Chat input form -->
    <form class="needs-validation" action="send_message.php" method="post" novalidate>
    <input type="hidden" name="sender" value="Admin">
    <div class="form-group">
        <textarea class="form-control" name="message" placeholder="Type your message..." rows="3" required></textarea>
        <div class="invalid-feedback">Please type your message.</div>
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
</form>

</body>

</html>
