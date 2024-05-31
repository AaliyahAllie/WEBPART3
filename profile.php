<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: userLogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Profile</title>
</head>
<body>
    <h1>Welcome to your profile</h1>
    <p>Your request to sell clothes has been accepted!</p>
    <p>You can now proceed with selling items.</p>
    <a href="sellItems.php">Sell Items</a>
</body>
</html>
